@extends('layout.app')

@push('css')
@endpush

@section('content')
<main class="container pt-4">
    <div class="row mb-2" id="content">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                @foreach($events as $event)
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">category</strong>
                    <h3 class="mb-0">{{ $event->title }}</h3>
                    <div class="mb-1 text-muted">date</div>
                    <p class="card-text mb-auto">description</p>
                    <a href="{{ route('event.show', '1') }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
@endpush
