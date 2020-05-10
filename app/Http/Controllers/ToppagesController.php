<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class ToppagesController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        
        $data = [
          'posts' => $posts,  
        ];
        
        return view('welcome', $data);
    }
}
