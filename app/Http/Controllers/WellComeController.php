<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WellComeController extends Controller
{
    public function index()
    {
        return view('welcome')->with('posts', Post::orderBy('updated_at', 'desc')->get())->with('main', Post::orderBy('updated_at', 'desc')->limit(1)->get())->with('categories', Category::all());
    }

    public function blog($id)
    {
        $blog = Post::where('id', $id)->firstOrFail();
        return view('posts.single')->with('blog', $blog)->with('posts', Post::where('category_id', $blog->category_id)->orderBy('updated_at', 'desc')->get());
    }
}
