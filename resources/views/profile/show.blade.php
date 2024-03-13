@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="row">
                @foreach($user->events as $event)
                    <div class="col-md-4">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">{{ $event->category->name }}</strong>
                                <h3 class="mb-0">{{ $event->title }}</h3>
                                <div class="mb-1 text-muted">{{ date('M d', strtotime($event->started_at)) }}</div>
                                <p class="card-text mb-auto text-muted">{{ ucfirst($event->location) }}</p>
                                <a href="{{ route('event.show', $event->id) }}" class="stretched-link">Continue reading</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 bg-light rounded">
                        <small>{{ ucfirst($user->roles[0]->name) }}</small>
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                        <a href="{{ route('logout') }}">
                            <span type="submit" class="btn btn-sm btn-outline-secondary">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
