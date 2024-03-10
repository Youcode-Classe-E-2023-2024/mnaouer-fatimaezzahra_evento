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

                <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                            @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title event"
                               required>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="desc">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="desc" placeholder="Description event" required></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="price">Price</label>
                    <div class="input-group mb-3">
                        <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price event" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Dh</span>
                        </div>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="date">Start date</label>
                        <input type="date" name="started_at"
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
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="agadir">Agadir</option>
                            <option value="tanger">Tanger</option>
                            <option value="safi">Safi</option>
                        </select>

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="available">Ticket Available</label>
                        <input type="number" name="tickets_available" placeholder="Number of tickets available"
                               class="form-control @error('tickets_available') is-invalid @enderror" id="available"
                               required/>

                        @error('tickets_available')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="picture">Cover</label>
                        <input type="file" accept="image/*" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture" required/>

                        @error('picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-secondary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection
