<?php

namespace App\Http\Livewire\Todos;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $check;
    public $userId;

    public function mount($id = null)
    {
        if (is_numeric($id)) {
            $this->userId = $id;
        }
    }

    public function render()
    {
        $todos = Todo::where('user_id', $this->userId ?: Auth::id())
            ->orderBy('is_complete')
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')->get();
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

        if ($todo->is_complete) {
            session()->flash('success', "Todo, {$todo->title}, marked as complete.");
        }
    }

    public function showModal($id = null)
    {
        $this->dispatchBrowserEvent('showModal');
        $this->emitTo('todos.modal', 'showModal', ['id' => $id]);
    }
}
