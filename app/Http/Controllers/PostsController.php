<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    
    public function show($id) {
        $post = Post::find($id);
        
        return view('posts.show', [
           'post' => $post 
        ]);
    }
    
    public function create() {
        $post = new Post;
        
        return view('posts.create', [
            'post' => $post
        ]);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'required|max:300',
            'image' => 'required|image'
        ]);
        
        $path = $request->image->store('public');
        
        $request->user()->posts()->create([
            'image' => $path,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
        return view('users.show', [
           'user' => $request->user() 
        ]);
    }
    
    public function destroy($id) {
        $post = Post::find($id);
        
        if($post && (\Auth::id() === $post->user_id)) {
            $post->delete();
            return back();
        } else {
            return redirect('/');
        }
    }
    
    public function approvers($id) {
        $user = User::find($id);
        $approvers = $user->approvers()->paginate(10);
        
        return view('posts.approvers', [
            'user' => $user,
            'approvers' => $approvers
        ]);
    }
}
