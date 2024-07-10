<?php

namespace App\Livewire;

use App\Models\RegisterForm as ModelsRegisterForm;
use Livewire\Attributes\On;
use Livewire\Component;

class RegisterTable extends Component
{
    public $username;
    public $registerForms;

    #[On('user-created')]
    public function updatedRegisterForm($myUser = null){
        $this->username = $myUser['name'] ?? null ;
    }

    public function render()
    {
        $this->registerForms = ModelsRegisterForm::orderBy('id', 'desc')->get();

        return view('livewire.register-table');
    }
}
