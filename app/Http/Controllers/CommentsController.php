<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $id) {
        $this->validate($request, [
           'content' => 'required|max:300' 
        ]);
        
        $content = $request->content;
        
        if(\Auth::user()->comment($id, $content)) {
            return redirect()->back()->with('success', 'コメントを投稿しました。');
        }
        else {
            return redirect()->back()->with('danger', 'コメントの投稿は各投稿で1件までできます。');
        }
        ;
        
        
        
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
           'content' => 'required|max:300' 
        ]);
        
        $content = $request->content;
        
        \Auth::user()->update_comment($id, $content);
        
        return redirect()->back()->with('success', 'コメントを更新しました。');
    }
    
    public function destroy($id) {
        $comment = Comment::find($id);
        
        if($comment) {
            if(\Auth::id() === $comment->user_id) {
                $comment->delete();
                return redirect()->back()->with('success', 'コメントを削除しました。');
            }
            else {
                return redirect('/')->with('danger', 'コメントの削除に失敗しました。');
            }
        } 
        else {
            return redirect('/')->with('danger', 'コメントが見つかりませんでした。');
        }
        
    }
}
