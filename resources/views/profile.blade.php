@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="row">
{{--                    foreach--}}
                    <div class="col-md-4">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">name</strong>
                                <h3 class="mb-0">title</h3>
                                <div class="mb-1 text-muted"><?= date('M d', strtotime('05/06/2024')) ?></div>
                                <p class="card-text mb-auto">content</p>
                                <a href="index.php?page=article&id=<?= 'id' ?>" class="stretched-link">Continue reading</a>
                            </div>
                        </div>
                    </div>
{{--                    endforeach--}}
                </div>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 bg-light rounded">
                        <small>role</small>
                        <h5>firstname lastname</h5>
                        <p>example@gmail.com</p>
                        <form action="index.php?page=login" method="POST">
                            <button type="submit" name="logout" class="btn btn-sm btn-outline-secondary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
