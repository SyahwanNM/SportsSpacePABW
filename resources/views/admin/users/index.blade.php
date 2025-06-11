@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6">User Data</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">City</th>
                <th class="py-2 px-4 border-b">Gender</th>
                <th class="py-2 px-4 border-b">Date of Birth</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user->username }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $user->kota }}</td>
                <td class="py-2 px-4 border-b">{{ $user->gender }}</td>
                <td class="py-2 px-4 border-b">{{ $user->tanggal_lahir }}</td>
                <td class="py-2 px-4 border-b">
                    <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 