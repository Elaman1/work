<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::create($request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]));
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        return $user->update($request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]));
    }
    
    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }
}
