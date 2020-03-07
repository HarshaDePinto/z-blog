<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class WellComeController extends Controller
{
    public function index()
    {
        return view('welcome')->with('posts', Post::orderBy('updated_at', 'desc')->get())->with('main', Post::orderBy('updated_at', 'desc')->limit(1)->get())->with('categories', Category::all());
    }
}
