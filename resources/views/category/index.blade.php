@extends('layout.admin')

@push('css')
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>

        <form action="{{ route('category.store') }}" method="POST" class="d-flex">
            @csrf
            <input name="name" type="text" class="form-control" aria-label="category-new" placeholder="Enter new category name">
            <button type="submit" class="btn btn-sm btn-primary shadow-sm">Create</button>
        </form>

    </div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Affiliated</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($cats as $cat)
            <tr>
                <form action="{{ route('category.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $cat->id }}">
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <input name="name" class="fw-bold form-control" value="{{ $cat->name }}" aria-label="category-name" />
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal">{{ $cat->events_count }}</p>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-link btn-sm btn-rounded">Edit</button>
                        <a onclick="deleteModal{{ $cat->id }}.showModal();" class="text-danger">Delete</a>
                    </td>
                </form>

                <dialog id="deleteModal{{ $cat->id }}">
                    <p>Are you sure ?</p>
                    <form action="{{ route('category.destroy') }}" method="POST">
                        @csrf
                        <button name="delete" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        <input type="hidden" name="id" value="{{ $cat->id }}">
                        <a onclick="deleteModal{{ $cat->id }}.close()" class="btn btn-sm btn-secondary">Cancel</a>
                    </form>
                </dialog>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

@push('js')
@endpush
