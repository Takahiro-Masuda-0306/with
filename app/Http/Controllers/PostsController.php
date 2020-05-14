<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

class PostsController extends Controller
{
    
    public function show($id) {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->paginate(20);
        
        if($post) {
            return view('posts.show', [
                'post' => $post,
                'comments' => $comments
            ]);
        }
        else {
            return redirect('/')->with('danger', '投稿が見つかりませんでした。');
        }
        
    }
    
    public function create() {
        $post = new Post;
        
        return view('posts.create', [
            'post' => $post
        ]);
    }
    
    public function store(Request $request) {
        $posts = $request->user()->posts()->paginate(20);
        
        $this->validate($request, [
            'title' => 'required|max:30',
            'description' => 'required|max:300',
            'image' => 'required|image'
        ]);
        
        $path = $request->image->store('public');
        
        $request->user()->posts()->create([
            'image' => basename($path),
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
        $data = [
            'user' => $request->user(),
            'posts' => $posts
        ];
        
        return redirect()->route('users.show', $data)->with('success', '投稿しました。');
    }
    
    public function destroy($id) {
        $post = Post::find($id);
        
        if($post && (\Auth::id() === $post->user_id)) {
            $user = \Auth::user();
            $posts = $user->posts()->paginate(20);
        
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            
            $post->delete();
            return redirect()->route('users.show', $data)->with('success', '投稿を削除しました。');
        } else {
            return redirect('/')->with('danger', '投稿の削除に失敗しました。');
        }
    }
    
}
