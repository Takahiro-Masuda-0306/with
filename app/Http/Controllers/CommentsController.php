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
        
        \Auth::user()->comment($id, $content);
        
        return back();
        
    }
    
    public function destroy($id) {
        \Auth::user()->uncomment($id);
        
        return back();
    }
}
