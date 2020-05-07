<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Request $request, $id) {
        \Auth::user()->approve($id);
        return back();
    }
    
    public function destroy($id) {
        \Auth::user()->disapprove($id);
        return back();
    }
}
