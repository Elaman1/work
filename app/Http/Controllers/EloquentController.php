<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class EloquentController extends Controller
{
    public function task2()
    {
        $products = Item::where('active', true)->orderByDesc('created_at')->limit(3)->get();
        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task3()
    {
        $products = Item::active()->orderByDesc('created_at')->limit(3)->get();

        return view('eloquent.task2', [
            'products' => $products
        ]);
    }

    public function task4($id)
    {
        $product = Item::findOrFail($id);

        return view('eloquent.task4', [
            'product' => $product
        ]);
    }

    public function task5(Request $request)
    {
        Item::create($request->validate(
            ['title' => 'required']
        ));
        return redirect()->route('index');
    }

    public function task6($id, Request $request) {
        $product = Item::findOrFail($id);
        $product->update($request->validate(
            ['title' => 'required']
        ));
        return redirect()->route('index');
    }

    public function task7(Request $request)
    {
        foreach ($request->products as $req) {
            $product = Item::findOrFail($req);
            $product->delete();
        }
        return redirect()->route('index');
    }
}
