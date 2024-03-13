@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Events
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->events->count() }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Reservation
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->events->sum('reservation_count') }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-regular fa-rectangle-list"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
