<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Validate('required|string|min:3|max:50')]
    public $name;

    public $search;



    public function create(){
        $validate = $this->validateOnly('name');
        Todo::create($validate);

        $this->reset('name');

        session()->flash('success','list has been created successfully');
    }

    public function delete($todoId){
        $deleteTodo = Todo::find($todoId)->delete();
        // dd($deleteTodo);
    }
    
    public function render()
    {
        return view('livewire.todo-list', [ 'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5) ] );
    }
}
