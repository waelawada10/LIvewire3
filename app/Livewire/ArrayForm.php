<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RegisterForm as Kiko;


class ArrayForm extends Component
{

    public $registerForms = [];

    protected function rules(){

        return [

            'registerForms'=>'array',
            'registerForms.*.name' => 'required|string|min:3',
            'registerForms.*.email' => 'required|email',
            'registerForms.*.password' => 'required|string|min:3',
        ];

    }

    protected $messages = [
        'registerForms.*.name.required' => 'The name field is required.',
        'registerForms.*.name.string' => 'The name must be a string.',
        'registerForms.*.name.min' => 'The name must be at least :min characters.',
        'registerForms.*.email.required' => 'The email field is required.',
        'registerForms.*.email.email' => 'The email must be a valid email address.',
        'registerForms.*.password.required' => 'The password field is required.',
        'registerForms.*.password.string' => 'The password must be a string.',
        'registerForms.*.password.min' => 'The password must be at least :min characters.',
    ];

    public function addRow(){
        $this->registerForms[] =  [
            'name'=>'' ,
            'email'=>'' ,
            'password'=>'' ,
        ];
    }

    public function removeRow($index){
        unset($this->registerForms[$index]);
        $this->registerForms = array_values($this->registerForms); 
    }

    public function printTest(){
        dd($this->registerForms , count($this->registerForms));
    }

    public function create(){
        $this->validate();
        foreach($this->registerForms as $index =>$registerForm){
            Kiko::Create([
                'name'=>  $registerForm['name'],
                'email'=>  $registerForm['email'],
                'password'=>  $registerForm['password'],

            ]);
        }

        
        if (count($this->registerForms) >= 1) {
            session()->flash('success', 'Records created successfully.');
        }
        $this->registerForms = [];
    }
    public function render()
    {
        return view('livewire.array-form');
    }
}
