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
                <td>{{ ucfirst($user->getRoleNames()[0]) }}</td>
                <td>
                    <a href="index.php?page=user_form&id=3" type="button"
                       class="btn btn-link btn-sm btn-rounded">Edit</a>

                    <a href="actions/user_delete.php?id=3" type="button"
                       class="btn btn-link btn-sm btn-rounded text-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
@endpush
