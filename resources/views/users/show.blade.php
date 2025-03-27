@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thông Tin Người Dùng</h2>

        <table>
            <tr>
                <th>Username:</th>
                <td><?= htmlspecialchars($user->username) ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= htmlspecialchars($user->email) ?></td>
            </tr>
            <tr>
                <th>Mô tả:</th>
                <td><?= htmlspecialchars($user->description ?? '') ?></td>
            </tr>
        </table>
        @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->id == $user->id))
        <button onclick="window.location.href='{{ route('users.edit', $user->id) }}'">Chỉnh sửa</button>
        @endif

    </div>
@endsection
