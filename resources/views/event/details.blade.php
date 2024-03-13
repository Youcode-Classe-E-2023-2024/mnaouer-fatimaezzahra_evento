@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="mb-4 border-bottom">
                    <img src="{{ $event->picture }}" alt="cover" class="rounded img-fluid">
                    <div class="py-2">
                        <h5><a class="btn btn-outline-primary" href="#">{{ $event->category->name }}</a></h5>
                    </div>
                </div>

                <article class="blog-post">
                    <h2 class="blog-post-title">{{ $event->title }}</h2>
                    <p class="blog-post-meta">{{ $event->created_at }} by <a href="#">{{ $event->user->name }}</a></p>

                    <p>{!! nl2br($event->description) !!}</p>
                </article>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="pb-3">
                        <form action="index.php?page=moderation" method="POST">
                            @auth
                            @if(auth()->user()->id == $event->created_by)
                                <a class="btn btn-sm btn-secondary" href="{{ route('event.edit', $event->id) }}">Edit</a>
                                <a onclick="deleteModal.showModal();" class="btn btn-sm btn-outline-danger">Delete</a>
                            @endif
                            @endauth
                        </form>
                    </div>

                    <div class="p-4 bg-light card">
                        <h4 class="fst-italic">Make Reservation</h4>

                        <form action="" method="POST">
                            <label for="date">Start at</label>
                            <div class="input-group mb-2">
                                <input type="date" id="date" name="date" class="form-control" value="{{ $event->started_at }}" disabled />
                            </div>

                            <label for="price">Price</label>
                            <div class="input-group mb-2">
                                <input type="number" id="price" name="price" class="form-control" placeholder="Recipient's username" value="{{ $event->price }}" aria-describedby="basic-addon2" disabled />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Dh</span>
                                </div>
                            </div>

                            <label for="available">Place Available</label>
                            <div class="form-group mb-2">
                                <input class="form-control" id="available" type="number" value="{{ $event->tickets_available }}" disabled>
                            </div>

                            <button name="login" class="btn btn-lg btn-secondary" type="submit">Reserve</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <dialog id="deleteModal">
        <p>Are you sure ?</p>
        <form action="{{ route('event.destroy') }}" method="POST">
            @csrf
            <button name="delete" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            <input type="hidden" name="id" value="{{ $event->id }}">
            <a onclick="deleteModal.close()" class="btn btn-sm btn-secondary">Cancel</a>
        </form>
    </dialog>
@endsection
