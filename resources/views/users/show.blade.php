@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thông Tin Người Dùng</h2>

        <table>
            <tr>
                <th>Username:</th>
                <td><?= htmlspecialchars($user->Username) ?></td>
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
        {{-- @can('update', $post)
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        @endcan --}}

    </div>
@endsection
