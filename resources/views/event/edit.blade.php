@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-dark text-center">Event Creation</h2>

                @if($errors->count())
                    <div class="col-md-12">
                        <div class="alert alert-danger text-center">
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('event.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--<div class="form-group mb-2">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}" @if($event->category->name == $cat->name) selected @endif>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>--}}

                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input value="{{ $event->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title event"
                               required>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="desc">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc" placeholder="Description event" required>{{ $event->description }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="date">Start date</label>
                        <input value="{{ $event->started_at }}" type="date" name="started_at"
                               class="form-control @error('started_at') is-invalid @enderror" id="date" required/>

                        @error('started_at')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control @error('location') is-invalid @enderror" required>
                            <option value="" selected disabled>Select Location</option>
                            <option value="casablanca" @if($event->location == 'casablanca') selected @endif>Casablanca</option>
                            <option value="rabat" @if($event->location == 'rabat') selected @endif>Rabat</option>
                            <option value="marrakech" @if($event->location == 'marrakech') selected @endif>Marrakech</option>
                            <option value="agadir" @if($event->location == 'agadir') selected @endif>Agadir</option>
                            <option value="tanger" @if($event->location == 'tanger') selected @endif>Tanger</option>
                            <option value="safi" @if($event->location == 'safi') selected @endif>Safi</option>
                        </select>

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="available">Ticket Available</label>
                        <input value="{{ $event->tickets_available }}" type="number" name="tickets_available" placeholder="Number of tickets available"
                               class="form-control @error('tickets_available') is-invalid @enderror" id="available"
                               required/>

                        @error('tickets_available')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input name="id" type="hidden" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-secondary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
