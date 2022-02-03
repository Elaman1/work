<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\ItemStoreRequest;

class IndexController extends Controller
{
    public function index() 
    {
        $users = User::get();
        
        return view('welcome', [
            'title' => 'Welcome',
            'users' => $users
        ]);
    }

    public function table() {
        return view('table', [
            'data' => User::all(),
        ]);
    }

    public function auth()
    {
        return view('auth');
    }

    public function items(ItemStoreRequest $request) 
    {
        return $request->validate();
    }

}
