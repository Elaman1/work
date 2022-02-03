<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('users.show', ['user' => $user]);
    }

    public function showBind(User $user)
    {
        return view('users.show', ['user' => $user]);
    }
}
