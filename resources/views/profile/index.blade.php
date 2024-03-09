@extends('layout.admin')

@push('css')
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold">{{ $user->name }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">{{ $user->email }}</p>
            </td>
            <form action="{{ route('profile.role') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $user->id }}">
                <td>
                    <select id="role" name="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="user" @if($user->getRoleNames()[0] == 'user') selected @endif>User</option>
                        <option value="organizer" @if($user->getRoleNames()[0] == 'organizer') selected @endif>Organizer</option>
                        <option value="admin" @if($user->getRoleNames()[0] == 'admin') selected @endif>Admin</option>
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-link btn-sm btn-rounded">Assign</button>
                </td>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
@endpush
