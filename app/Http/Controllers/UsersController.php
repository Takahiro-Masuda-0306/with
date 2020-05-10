<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Comment;

class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $posts = $user->posts()->paginate(20);
        
        $data = [
          'user' => $user,
          'posts' => $posts,
        ];
        
        $data += $this->user_counts($user);
        
        if($user) {
           return view('users.show', $data);
        }
        else {
            return redirect('/');
        }
    }
    
    public function edit($id) {
        $user = User::find($id);
        
        if($user && (\Auth::id() === $user->id)) {
            return view('users.edit', [
              'user' => $user,  
            ]);
        }
        else {
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id) {
        $user = User::find($id);
        $posts = $user->posts()->paginate(20);
        
        $data = [
          'user' => $user,
          'posts' => $posts,
        ];
        
        $data += $this->user_counts($user);
        
        if($request->image) {
            $path = $request->image->store('public');
        } else {
            $path = '';
        }
        
        if($user && (\Auth::id() === $user->id)) {
            $request->user()->update([
                'image' => basename($path),
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'description' => $request->description
            ]);
            
            return view('users.show', $data)->with('success', '正常に更新されました。');
        }
        else {
            return redirect('/');
        }
    }
    
    public function approvings($id) {
        $user = User::find($id);
        $approvings = $user->approvings()->paginate(10);
        
        $data = [
            'user' => $user,
            'approvings' => $approvings,
        ];
        
        $data += $this->user_counts($user);
        
        return view('users.approvings', $data);
    }
    
    public function commentings($id) {
        $user = User::find($id);
        $comments = Comment::where('user_id', $id)->paginate(10);
        
        $data = [
          'user' => $user,
          'comments' => $comments
        ];
        
        $data += $this->user_counts($user);
        
        return view('users.commentings', $data);
    }
    
}
