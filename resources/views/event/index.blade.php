@extends('layout.admin')

@push('css')
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Events</h1>
    </div>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($events as $event)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold">{{ $event->title }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal">{{ $event->description }}</p>
            </td>
            <form action="{{ route('event.status') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $event->id }}">
                <td>
                    <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="pending" @if($event->status == 'pending') selected @endif>Pending</option>
                        <option value="accepted" @if($event->status == 'accepted') selected @endif>Accepted</option>
                        <option value="rejected" @if($event->status == 'rejected') selected @endif>Rejected</option>
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-link btn-sm btn-rounded">Save</button>
                    <a class="btn btn-link btn-sm text-secondary" href="{{ route('event.show', $event->id) }}">Details</a>
                </td>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
@endpush
