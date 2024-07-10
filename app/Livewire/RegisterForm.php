<?php

namespace App\Livewire;

use App\Models\RegisterForm as ModelsRegisterForm;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Exception;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    // protected $listeners = ['wael' => 'handleWael'];

    use WithFileUploads;

    public $registerForms;
    public $name;

    public $password;

    public $email;

    public $image;

    public function mount(){


    }

    protected function rules()
    {
        return [
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'password'=>'required|string|min:3',
            'image' => 'nullable|image|max:1024',
        ];
    }
    

    public function create(){

        sleep(2);
        
        $validate = $this->validate();

        if($this->image){
            $validate['image'] = $this->image->store('uploads','public');
        }

        $myUser = ModelsRegisterForm::create($validate);

        $this->reset('name','password','email','image');

        session()->flash('success','form has been created successfully');

        $this->dispatch('user-created',$myUser);
    }

    #[On('wael')]
    public function handleWael(){
        dd(1);
    }

    public function render()
    {
        $this->registerForms = ModelsRegisterForm::all();

        return view('livewire.register-form');
    }
}
