<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post.index')->with('page','post')->with('posts',Post::paginate(2));
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->first();
        return view('post.show')->with('page','post')->with('posts',$post);
    }
}
