<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination;
    public $count = 0;
    
    #[Validate('required', message: 'Please provide your name')]
    #[Validate('max:10', message: 'Name cannot exceed 10 characters')]
    public $name ;

    #[Validate('required|email')] 
    public $email ;

    #[Validate('required|min:3')] 
    public $password ;


    // protected function rules()
    // {
    //     $rules = [
    //         'name' => ['required', 'string'],
    //         'email' => ['required', 'string'],
    //         'password' => ['required', 'string'],

    //     ];

    //     return $rules;
    // }

    public function createUser(){
        $this->validate();

        $user = User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,

        ]);
        $this->reset(['name','email','password']);
        request()->session()->flash('success','User Id ' .$user->id .' has been created successfully' );


    }

    public function addCount(){
        $this->count++;
    }

    public function render()
    {
        // for pagination : php artisan livewire:publish --config + go to livewire.php in config change pagination theme to bootstrap 

        $users= User::all();
        $usersPagination= User::paginate(3);

        return view('livewire.clicker',['users'=>$users,'usersPagination'=>$usersPagination]);
    }
}
