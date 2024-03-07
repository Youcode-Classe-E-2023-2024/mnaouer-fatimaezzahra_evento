@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Name
                </h3>

                <article class="blog-post">
                    <h2 class="blog-post-title">Titre</h2>
                    <p class="blog-post-meta">19/05/2025 by <a href="#">Full Name</a></p>

                    <p><?= nl2br('Content') ?></p>
                </article>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4">
                        <form action="index.php?page=moderation" method="POST">
    {{--                        if admin--}}
                            <button name="archive" class="btn btn-sm btn-outline-dark">Archive</button>
                            <input name="id" type="hidden" value="id">
    {{--                        end if--}}

    {{--                        if owner--}}
                            <a class="btn btn-sm btn-secondary" href="{{ route('event.edit', '1') }}">Edit</a>
                            <a onclick="deleteModal.showModal();" class="btn btn-sm btn-outline-danger">Delete</a>
    {{--                        end if--}}
                        </form>
                    </div>

                    <div class="p-4 bg-light rounded">
                        <h4 class="fst-italic">Tags</h4>
                        <nav aria-label="Pagination">
    {{--                        foreach--}}
                            <a class="btn btn-outline-primary mb-2" href="#">tag</a>
    {{--                        endforeach--}}
                        </nav>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Last Event</h4>
                        <ol class="list-unstyled mb-0">
    {{--                        foreach--}}
                            <li><a href="index.php?page=article&id=id">Titre</a></li>
    {{--                        endforeach--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <dialog id="deleteModal">
        <p>Are you sure ?</p>
        <form action="index.php?page=article" method="POST">
            <button name="delete" type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            <input type="hidden" name="id" value="id">
            <a onclick="deleteModal.close()" class="btn btn-sm btn-secondary">Cancel</a>
        </form>
    </dialog>
@endsection
