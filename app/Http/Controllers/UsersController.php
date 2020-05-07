<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class UsersController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        
        if($user) {
           return view('users.show', [
           'user' => $user, 
        ]);
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
        
        if($user && (\Auth::id() === $user->id)) {
            $request->user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age,
            ]);
            
            return back();
        }
        else {
            return redirect('/');
        }
    }
    
    public function approvings($id) {
        $user = User::find($id);
        $approvings = $user->approvings()->paginate(10);
        
        return view('users.approvings', [
            'user' => $user,
            'approvings' => $approvings
        ]);
    }
    
    
}
