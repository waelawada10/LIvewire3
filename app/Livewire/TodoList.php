<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Validate('required|string|min:3|max:50')]
    public $name;

    public $search;

    public $editingTodoId;

    #[Validate('required|string|min:3|max:50')]
    public $editingTodoName;

    public function create(){
        $validate = $this->validateOnly('name');
        Todo::create($validate);

        $this->reset('name');

        session()->flash('success','list has been created successfully');
        
        //if we are in paginate number 3 so when we create its send us back to paginate 1
        $this->resetPage();
    }

    public function edit($todoId){
        $this->editingTodoId = $todoId;
        $this->editingTodoName = Todo::find($todoId)->name;
    }

    public function cancelEdit(){
        $this->reset('editingTodoId','editingTodoName');
    }

    public function update(){
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoId)->update([
            'name'=>$this->editingTodoName,
        ]);
        
        $this->cancelEdit();
    }

    public function delete($todoId){

        try{
            Todo::findOrFail($todoId)->delete();
        }catch(Exception $e){
            session()->flash('error', 'Failed to Delete Todo List');
            return;
        }
    }

    public function completed($todoId){

        $todo = Todo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }
    
    public function render()
    {
        $todos = Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5) ;

        return view('livewire.todo-list', [ 'todos' => $todos  ] );
    }
}
