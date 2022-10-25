<?php

namespace App\Http\Livewire\Todos;

use App\Models\Todo;
use Livewire\Component;

class Index extends Component
{
    public $check;

    public function render()
    {
        $todos = Todo::orderBy('is_complete')->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'))->extends('layouts.app');
    }

    public function delete($id)
    {
        Todo::find($id)->delete();

        session()->flash('success', 'Todo deleted successfully.');
        return redirect()->route('home');
    }

    public function setStatus($id)
    {
        $todo = Todo::find($id);
        $todo->is_complete = !$todo->is_complete;
        $todo->save();
    }

    public function showModal($id = null)
    {
        $this->dispatchBrowserEvent('showModal');
        $this->emitTo('todos.modal', 'showModal', ['id' => $id]);
    }
}
