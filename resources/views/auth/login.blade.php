@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-box">
        <h2>Màn hình đăng nhập</h2>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label>Username:</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required>

            <label>Mật khẩu:</label>
            <input type="password" name="password" required>

            <div class="remember">
                <input type="checkbox" name="remember">
                <label>Ghi nhớ đăng nhập</label>
            </div>

            <div class="button-container">
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
@endsection
