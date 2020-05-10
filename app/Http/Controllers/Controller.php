<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function user_counts($user) {
        $count_posts = $user->posts()->count();
        $count_approvings = $user->approvings()->count();
        $count_comments = $user->comments()->count();
        
        return [
            'count_posts' => $count_posts,
            'count_approvings' => $count_approvings,
            'count_comments' => $count_comments,
        ];
    }
}
