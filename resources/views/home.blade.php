@extends('layout.app')

@push('css')
@endpush

@section('content')
    <main class="container pt-4">
        <div class="row mb-2" id="content">
            @foreach($events as $event)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">{{ $event->category->name }}</strong>
                            <h3 class="mb-0">{{ $event->title }}</h3>
                            <div class="mb-1 text-muted">{{ $event->started_at }}</div>
                            <p class="card-text mb-auto text-muted">{{ ucfirst($event->location) }}</p>
                            <a href="{{ route('event.show', $event->id) }}" class="stretched-link">Details</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{ $event->picture }}" alt="cover" class="bd-placeholder-img" width="300"
                                 height="250">
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-3">
            {{ $events->links() }}
            </div>
        </div>
    </main>
@endsection

@push('js')
@endpush
