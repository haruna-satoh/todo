<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $todos = Todo::with('category')->get();

        return view('index', compact('categories', 'todos'));
    }
}
