<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function isAuth($id)
    {
        $isAuth = Auth::user()->role == "admin"|| Auth::user()->id== $id;
        return $isAuth;
    }
    public function index()
    {
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
        if(!$this->isAuth($id)){
            return back()->with('error','Bạn không thể chỉnh sửa người dùng này.');
        }
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required|string|min:3|max:8',
            'email' => 'required|email|unique:users,email,' . $id,
            'description'=>'nullable|string'
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'username'=> $request->username,
            'email'=> $request->email,
            'description'=> $request->description,
        ]);
        return redirect()->route('users.show',$id)->with('success', 'Cập nhật thành công.');

    }

    public function destroy(Request $request, $id)
    {   
        if(!$this->isAuth($id)){
            return back()->with('error','Bạn không thể xóa người dùng này.');
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa thành công.');
    }
}
