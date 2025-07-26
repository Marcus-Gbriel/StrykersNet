<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/template.css">
    <link rel="shortcut icon" href="/public/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/pages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/functions.js"></script>
    <script>
        const router_class = new router();
    </script>
    <title id="title_system">Document</title>
    <style>
        .form-control.bg-dark::placeholder {
            color: #ccc !important;
            opacity: 1;
        }
    </style>
</head>

<body id="body_system">
    <header class="p-3" style="position: fixed; top: 0; left: 0; right: 0; ">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a move-to="home" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="/public/imgs/logo.png" alt="" class="bi me-2" width="48" height="48" role="img" aria-label="Bootstrap">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a move-to="about" class="nav-link px-2 link-secondary">Sobre</a></li>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">Inventory</a></li>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search" class="form-control" placeholder="Search..." aria-label="Search"> </form>
                <div class="dropdown text-end"> <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="container_system">