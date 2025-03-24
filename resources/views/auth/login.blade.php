@extends('layouts.app')

@section('content')
@if (session('success'))
<script>
    alert({{ json_encode(session('success')) }});
</script>
@endif

@if (session('error'))
<script>
    alert({{ json_encode(session('error')) }});
</script>
@endif
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

            <label>email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>

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
