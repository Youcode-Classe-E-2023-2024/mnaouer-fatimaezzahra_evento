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

        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/1.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold">Fatima</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">fatimaezzahra.mnaouer@gmail.com</p>
            </td>
            <td>Admin</td>
            <td>
                <a href="index.php?page=user_form&id=3" type="button"
                   class="btn btn-link btn-sm btn-rounded">Edit</a>

                <a href="actions/user_delete.php?id=3" type="button"
                   class="btn btn-link btn-sm btn-rounded text-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/1.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold">Mahdi</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">mahdi@gmail.com</p>
            </td>
            <td>User</td>
            <td>
                <a href="index.php?page=user_form&id=8" type="button"
                   class="btn btn-link btn-sm btn-rounded">Edit</a>

                <a href="actions/user_delete.php?id=8" type="button"
                   class="btn btn-link btn-sm btn-rounded text-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/1.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold">Gyvivisyhy</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">xubabobaw@mailinator.com</p>
            </td>
            <td>User</td>
            <td>
                <a href="index.php?page=user_form&id=9" type="button"
                   class="btn btn-link btn-sm btn-rounded">Edit</a>

                <a href="actions/user_delete.php?id=9" type="button"
                   class="btn btn-link btn-sm btn-rounded text-danger">Delete</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/1.jpg"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                    />
                    <div class="ms-3">
                        <p class="fw-bold">Sanaa</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">sana@gmail.com</p>
            </td>
            <td>Admin</td>
            <td>
                <a href="index.php?page=user_form&id=10" type="button"
                   class="btn btn-link btn-sm btn-rounded">Edit</a>

                <a href="actions/user_delete.php?id=10" type="button"
                   class="btn btn-link btn-sm btn-rounded text-danger">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

@push('js')
@endpush
