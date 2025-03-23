<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() 
    {   
        if (!Auth::user()) {
    
            return redirect()->route('login')->with('error', 'Bạn cần phải đăng nhập.');
        }
    
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
