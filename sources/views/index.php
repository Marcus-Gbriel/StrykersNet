<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/public/css/template.css">
    <title>Strykers Network - Dashboard</title>
</head>

<body>
    <div class="header_system">
        <div class="perfil_system">
            <img src="/public/IMG_20210922_224101_626.jpg">
            <div class="perfil_info">
                <div class="nickname">[REC]MARCKTEC</div>
                <div class="cargo">@DESENVOLVEDOR</div>
            </div>
        </div>
        <h3>Strykers Network</h3>
    </div>
    <div class="sidebar_system closed">
        <div class="sidebar_content">
            <div class="sidebar_subcontent">
                <span>bem vindo a side bar</span>
                <span>tomeeeee</span>
            </div>
        </div>
    </div>
    <div class="content_system">

    </div>
    <style>
        body {
            background-color: #011e29;
            background-image: url('/public/background-account.svg');
            background-size: cover;

            .sidebar_system {
                width: 100vw;
                height: 100vh;
                position: fixed;
                z-index: 1;
                background-color: rgba(0, 0, 0, 0.3);
                transition: width 0.5s ease-in-out, opacity 0.5s ease-in-out;

                .sidebar_content {
                    width: 300px;
                    height: 100%;
                    background-color: #003b4f;
                    padding: calc(70px + 10px) 10px;
                    transition: width 1s ease-in-out, opacity 1s ease-in-out;

                    .sidebar_subcontent {
                        transition: opacity 0.5s ease-in-out;
                        width: 100%;
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        opacity: 0;
                    }
                }

                &.closed {
                    width: 0;
                    opacity: 0;

                    .sidebar_content {
                        width: 0;
                        opacity: 0;
                    }
                }

                &.open {
                    width: 100dvw;
                    opacity: 1;

                    .sidebar_content {
                        width: 300px;
                        opacity: 1;
                    }
                }
            }

            .content_system {
                width: 100%;
                height: 100vh;
            }

            .header_system {
                width: 100%;
                height: 70px;
                background-color: #00304d;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 0px 10px;
                position: fixed;
                box-shadow: #000000 0px 0px 5px;
                z-index: 999;

                .perfil_system {
                    display: flex;
                    flex-direction: row;
                    align-items: start;
                    gap: 8px;

                    img {
                        width: 50px;
                        height: 50px;
                        margin: 1px;
                        border-radius: 5px;
                        border: 2px solid #00aff7;
                    }

                    .perfil_info {
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        height: 100%;
                        gap: 0px;

                        .nickname {
                            font-size: 20px;
                            color: #00aff7;
                            font-weight: bold;
                            margin-top: 1px;
                        }

                        .cargo {
                            font-size: 14px;
                            color: #cccccc;
                            margin-top: -5px;
                        }
                    }
                }
            }
        }
    </style>
    <script>
        class sidebar {
            constructor() {
                this.sidebar = $('.sidebar_system');
                this.sidebarContent = $('.sidebar_content');
                this.sidebarSubcontent = $('.sidebar_subcontent');

                this.init();

            }

            init() {
                this.sidebarContent.on('mouseenter', () => {
                    this.open();
                });

                this.sidebarContent.on('mouseleave', () => {
                    this.close();
                });
            }

            open() {
                this.sidebar.removeClass('closed').addClass('open');
                setTimeout(() => {
                    this.sidebarSubcontent.css('opacity', '1');
                }, 500);
            }

            close() {
                this.sidebar.removeClass('open').addClass('closed');
                setTimeout(() => {
                    this.sidebarSubcontent.css('opacity', '0');
                }, 500);
            }
        }




        new sidebar();
    </script>
</body>

</html>