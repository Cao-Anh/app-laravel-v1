<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = ['username' => $request->username, 'password' => $request->password];

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
        }

        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất.');
    }
}
