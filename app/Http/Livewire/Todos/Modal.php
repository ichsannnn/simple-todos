<?php

namespace App\Http\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Modal extends Component
{
    public $state = 'add';
    public $todoId;
    public $title;
    public $description;

    protected $listeners = ['showModal'];
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    public function render()
    {
        return view('todos.modal');
    }

    public function save()
    {
        $this->validate();

        $todo = new Todo();
        if ($this->state == 'edit') {
            $todo = Todo::find($this->todoId);
        }
        $todo->user_id = Auth::id();
        $todo->title = $this->title;
        $todo->description = $this->description;
        $todo->is_complete = false;
        $todo->save();

        $state = $this->state == 'edit' ? 'edited' : 'created';
        session()->flash('success', "Todo $state successfully.");
        return redirect()->route('home');
    }

    public function showModal($data)
    {
        $this->todoId = null;
        $this->title = null;
        $this->description = null;
        $this->state = 'add';

        $id = $data['id'];
        if (!empty($id)) {
            $todo = Todo::find($id);
            $this->todoId = $id;
            $this->title = $todo->title;
            $this->description = $todo->description;
            $this->state = 'edit';
        }
    }
}
