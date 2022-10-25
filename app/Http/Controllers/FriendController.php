<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function __invoke()
    {
        $users = User::get();
        return view('friends.index', compact('users'));
    }
}
