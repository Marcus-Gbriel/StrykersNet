<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/imgs/logo.png" type="image/x-icon">
    <title id="title_system">Strykes - StarCitizen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/public/css/pages.css">
    <link rel="stylesheet" href="/public/css/template.css">
    <script src="/public/js/functions.js"></script>
    <script>
        const router_class = new router();
    </script>
</head>

<body id="body_system">
    <header class="p-3">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a move-to="home" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="/public/imgs/logo.png" alt="" class="bi me-2" width="48" height="48" role="img" aria-label="Bootstrap">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a move-to="home" id="home" class="nav-link px-2 link-body-emphasis btnH">Início</a></li>
                    <li><a move-to="about" id="about" class="nav-link px-2 link-body-emphasis btnH">Sobre</a></li>
                    <!--<li><a move-to="about" class="nav-link px-2 link-secondary">Sobre</a></li>-->
                    <li><a move-to="contact" id="contact" class="nav-link px-2 link-body-emphasis btnH">Contato</a></li>
                </ul>
                <!--
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                -->
                <div class="dropdown text-end">
                    <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://cdn.discordapp.com/avatars/347405990733545483/a_4ac8d5251bf07db8b94722eb1b579c6f" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item">New project...</a></li>
                        <li><a class="dropdown-item">Settings</a></li>
                        <li><a class="dropdown-item">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="container_system">
        <script>
            function verify_page() {
                let page = window.location.pathname;

                $('.btnH').removeClass('link-secondary');
                $('.btnH').addClass('link-body-emphasis');

                if (page == "/") {
                    $('#home').removeClass('link-body-emphasis');
                    $('#home').addClass('link-secondary');
                } else if (page == "/about") {
                    $('#about').removeClass('link-body-emphasis');
                    $('#about').addClass('link-secondary');
                } else if (page == "/contact") {
                    $('#contact').removeClass('link-body-emphasis');
                    $('#contact').addClass('link-secondary');
                }
            }

            // #008000

            $('.btnH').click(function() {
                setTimeout(() => {
                    verify_page();
                }, 100);
            })

            verify_page();
        </script>

        <style>
            .htn {
                &:hover {
                    transform: scale(1.20)!important;
                    background-color: #008000 !important;
                    font-weight: 600 !important;
                    border-radius: 64px !important;
                    margin-left: 15px !important ;
                    margin-right: 15px !important;
                }
            }
        </style>