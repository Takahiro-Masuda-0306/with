<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Comment;

use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        
        if($user) {
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(20);
        
            $data = [
                'user' => $user,
                'posts' => $posts,
                ];
        
            $data += $this->user_counts($user);
            
            return view('users.show', $data);
        }
        else {
            return redirect('/')->with('danger', 'ユーザーが見つかりませんでした');
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
        
        $this->validate($request, [
            'image' => 'required',
            'description' => 'required|max:300',
        ]);
        
        $data = [
          'user' => $user,
          'posts' => $posts,
        ];
        
        $data += $this->user_counts($user);
        
        $image = $request->image;
        $path = Storage::disk('s3')->putFile('' , $image, 'public');
        
        if($user && (\Auth::id() === $user->id)) {
            $request->user()->update([
                'image' => Storage::disk('s3')->url($path),
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
                'description' => $request->description
            ]);
            
            return redirect()->route('users.show', $data)->with('success', '正常に更新されました。');
        }
        else {
            return redirect('/')->with('danger', '更新に失敗しました。');
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
