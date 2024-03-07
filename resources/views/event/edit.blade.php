@extends('layout.app')

@section('content')
    <main class="container pt-4">
        <div class="mb-4">
            <h2 class="text-dark text-center">Text Editor</h2>
            <form action="index.php?page=editor" method="POST">
                <div class="form-group mb-2">
                    <label for="inputCategory">Category</label>
                    <select name="category" id="inputCategory" class="form-control" required>
                        {{--                        foreach--}}
                        <option value="id">name</option>
                        {{--                        endforeach--}}
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="title">Title:</label>
                    <input name="title" class="form-control" id="title" required>
                </div>

                <div class="form-group mb-2">
                    <label for="editor">Editor:</label>
                    <textarea name="content" class="form-control" id="editor" required></textarea>
                </div>

                <button name="create" type="submit" class="btn btn-secondary mb-2">Submit</button>
            </form>
        </div>
    </main>
@endsection
