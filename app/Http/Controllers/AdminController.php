<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Core\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index')->with('page','admin')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create')->with('page','create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|min:8',
            'description'=>'required',
            'image'=>'required|image'
        ],[
            'title.required'=>'آرامش جانم هر شب نکرانم',
            'description.required'=>'آرامش جانم هر شب نکرانم'
        ]);
        $image_new_name= '';
        if($request->has('image')){
            $image = $request->image;
            $image_new_name= time().$image->getClientOriginalName();
            $image->move('upload',$image_new_name);
        }

        Post::create(['title'=>$request->title,'description'=>$request->description,'image'=>$image_new_name,'slug'=>Str::slug($request->title)]);

        session()->flash('success','your post is successfully Create :)');
        
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $admin)
    {
        
        return view('admin.update')->with('page','admin')->with('posts',$admin) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $admin)
    {
        
        if($request->has('image')){
            unlink('upload/'.$admin->image);
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('upload',$image_new_name);
            $admin->image= $image_new_name;
            $admin->save();
        }
         
        
        $admin->title = $request->title;
        $admin->description = $request->description;
        $admin->slug= Str::slug($request->title);

        $admin->save();

        session()->flash('success','your post is successfully updated :)');
        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink('upload/'.$post->image);
        $post->delete();

        return redirect()->back();
    }
}
