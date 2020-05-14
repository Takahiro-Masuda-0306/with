<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store($id) {
        \Auth::user()->approve($id);
        return redirect()->back()->with('success', 'いいねしました。');
    }
    
    public function destroy($id) {
        \Auth::user()->disapprove($id);
        return redirect()->back()->with('success', 'いいねを解除しました。');
    }
}
