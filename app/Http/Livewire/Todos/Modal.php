<?php

namespace App\Http\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Modal extends Component
{
    public $state = 'add';
    public $title;
    public $description;
    protected $listeners = ['showModal'];

    public function render()
    {
        return view('todos.modal');
    }

    public function save()
    {
        $todo = new Todo();
        $todo->user_id = Auth::id();
        $todo->title = $this->title;
        $todo->description = $this->description;
        $todo->is_complete = false;
        $todo->save();

        session()->flash('success', 'Todo created successfully.');
        return redirect()->route('home');
    }

    public function showModal($data)
    {
        $id = $data['id'];
        $this->title = null;
        $this->description = null;
        $this->state = 'add';
        if (!empty($id)) {
            $todo = Todo::find($id);
            $this->title = $todo->title;
            $this->description = $todo->description;
            $this->state = 'edit';
        }
    }
}
