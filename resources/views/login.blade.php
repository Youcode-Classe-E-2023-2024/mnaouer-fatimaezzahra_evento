<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Wiki</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/blog.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="blog-header-logo text-dark" href="index.php?page=home">Wiki</a>
            </div>

            <div class="col-4 text-center">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input name="search" id="search-bar" type="text" class="form-control form-input" placeholder="Search...">
                    </div>
                </div>
            </div>

            <div class="col-4 d-flex justify-content-end align-items-center">

                <?php if (isset($_SESSION['user_id'])) : ?>
                <a class="btn btn-sm btn-dark ms-2" href="index.php?page=editor">Create Article</a>
                <a class="btn btn-sm btn-outline-secondary ms-2" href="index.php?page=profile">Profile</a>
                <?php else : ?>
                <a class="btn btn-sm btn-outline-secondary ms-2" href="index.php?page=login">Sign in</a>
                <?php endif ?>
            </div>

        </div>
    </header>
    <div class=" mt-4 d-flex justify-content-end">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
        <a class="btn btn-sm btn-outline-secondary ms-2" href="index.php?page=admin">Admin</a>
        <?php endif ?>
    </div>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <?php foreach ($categories as $category) : ?>
            <a class="p-2 link-secondary" href="#"><?= ucfirst($category['name']) ?></a>
            <?php endforeach ?>
        </nav>
    </div>
</div>

<main class="container pt-4">
    <div class="row mb-2" id="content">
        <?php foreach ($articles as $article) : ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"><?= $article['name'] ?></strong>
                    <h3 class="mb-0"><?= $article['title'] ?></h3>
                    <div class="mb-1 text-muted"><?= date('M d', strtotime($article['create_at'])) ?></div>
                    <p class="card-text mb-auto"><?= $article['content'] ?></p>
                    <a href="index.php?page=article&id=<?= $article['id'] ?>" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</main>

<footer class="blog-footer">
    <p>Wiki built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a href="#">@mnaouer</a>.</p>
    <p><a href="#">Back to top</a></p>
</footer>
<script src="assets/js/searchbar.js"></script>
</body>
</html>
