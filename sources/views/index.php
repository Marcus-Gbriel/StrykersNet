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
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Toggle Sidebar Button -->
        <button class="sidebar-toggle" id="sidebar-toggle">
            <i class="bi bi-list"></i>
        </button>
        
        <!-- Mini Profile Section (visible when collapsed) -->
        <div class="sidebar-profile-mini">
            <div class="profile-avatar-mini">
                <img src="/public/imgs/logo.png" alt="Avatar" class="avatar-img">
            </div>
        </div>
        
        <!-- User Profile Section (visible when expanded) -->
        <div class="sidebar-profile">
            <div class="profile-avatar">
                <img src="/public/imgs/logo.png" alt="Avatar" class="avatar-img">
            </div>
            <div class="profile-info">
                <h4 class="username">Stryker</h4>
                <p class="user-handle">@stryker</p>
            </div>
        </div>

        <!-- Credits Section -->
        <div class="sidebar-credits">
            <h5 class="credits-title">CRÉDITOS</h5>
            <div class="credit-item">
                <span class="credit-type">STORE CREDIT</span>
                <span class="credit-value">$0.00 USD</span>
            </div>
            <div class="credit-item">
                <span class="credit-type">UEC</span>
                <span class="credit-value">0.0 UEC</span>
            </div>
            <div class="credit-item">
                <span class="credit-type">REC</span>
                <span class="credit-value">0.0 REC</span>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="sidebar-menu">
            <h5 class="menu-title">GERENCIAMENTO DE CONTA</h5>
            <p class="menu-subtitle">Gerencie seu perfil, verifique seus detalhes de cobrança e acesse seu Hangar</p>
            
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="#" class="menu-link" data-toggle="submenu">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard da Conta</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-person-circle"></i>
                                <span>Perfil Pessoal</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-shield-check"></i>
                                <span>Segurança</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-credit-card"></i>
                                <span>Pagamentos</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-gear"></i>
                                <span>Configurações</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link" data-toggle="submenu">
                        <i class="bi bi-building"></i>
                        <span>Meu Hangar</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-airplane"></i>
                                <span>Naves</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-tools"></i>
                                <span>Equipamentos</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-box-seam"></i>
                                <span>Inventário</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-trophy"></i>
                                <span>Conquistas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link" data-toggle="submenu">
                        <i class="bi bi-people"></i>
                        <span>Organizações</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-search"></i>
                                <span>Buscar Organizações</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-plus-circle"></i>
                                <span>Criar Organização</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-person-plus"></i>
                                <span>Convites</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-graph-up"></i>
                                <span>Ranking</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link" data-toggle="submenu">
                        <i class="bi bi-gift"></i>
                        <span>Resgatar um código</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-ticket-perforated"></i>
                                <span>Código de Presente</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-star"></i>
                                <span>Código Promocional</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-calendar-event"></i>
                                <span>Códigos de Evento</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">
                                <i class="bi bi-clock-history"></i>
                                <span>Histórico</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Referral Section -->
        <div class="sidebar-referral">
            <h5 class="referral-title">INDICAR UM AMIGO</h5>
            <div class="referral-code">
                <span class="code-label">STAR-WD3P-956K</span>
                <button class="btn btn-sm btn-outline-primary copy-btn">
                    <i class="bi bi-clipboard"></i> Copiar Link
                </button>
            </div>
            <a href="#" class="referral-link">Saiba mais sobre nosso Programa de Indicação</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">        
        <!-- Your main content goes here -->
        <div class="container-fluid">
            <h1>Bem-vindo aos Strykers</h1>
            <p>Conteúdo principal da aplicação...</p>
        </div>
    </div>

    <script>
        // Sidebar toggle functionality
        $(document).ready(function() {
            // Toggle sidebar
            $('#sidebar-toggle').click(function() {
                $('#sidebar').toggleClass('active');
            });

            // Close sidebar when clicking outside (only on mobile)
            $(document).click(function(event) {
                if ($(window).width() <= 768) {
                    if (!$(event.target).closest('#sidebar').length) {
                        $('#sidebar').removeClass('active');
                    }
                }
            });

            // Submenu toggle functionality (only works when sidebar is expanded)
            $('[data-toggle="submenu"]').click(function(e) {
                e.preventDefault();
                
                // Only allow submenu toggle when sidebar is active
                if ($('#sidebar').hasClass('active')) {
                    const menuItem = $(this).parent();
                    const submenu = menuItem.find('.submenu');
                    
                    // Close other submenus
                    $('.menu-item').not(menuItem).removeClass('expanded');
                    $('.submenu').not(submenu).removeClass('active');
                    
                    // Toggle current submenu
                    menuItem.toggleClass('expanded');
                    submenu.toggleClass('active');
                } else {
                    // If sidebar is collapsed, expand it first
                    $('#sidebar').addClass('active');
                }
            });

            // Copy referral code functionality
            $('.copy-btn').click(function() {
                const code = 'STAR-WD3P-956K';
                navigator.clipboard.writeText(code).then(function() {
                    const btn = $('.copy-btn');
                    const originalText = btn.html();
                    btn.html('<i class="bi bi-check"></i> Copiado!');
                    btn.removeClass('btn-outline-primary').addClass('btn-success');
                    
                    setTimeout(function() {
                        btn.html(originalText);
                        btn.removeClass('btn-success').addClass('btn-outline-primary');
                    }, 2000);
                });
            });

            // Submenu item click handler
            $('.submenu-link').click(function(e) {
                e.preventDefault();
                
                // Remove active class from all submenu links
                $('.submenu-link').removeClass('active');
                
                // Add active class to clicked link
                $(this).addClass('active');
                
                // Here you can add navigation logic
                const itemName = $(this).find('span').text();
                console.log('Navegando para:', itemName);
                
                // Example: You could update the main content here
                $('#main-content .container-fluid h1').text('Você está em: ' + itemName);
            });

            // Handle window resize to adjust sidebar behavior
            $(window).resize(function() {
                if ($(window).width() > 768) {
                    // On desktop, ensure sidebar behavior is correct
                    $('#sidebar').removeClass('mobile-active');
                } else {
                    // On mobile, collapse sidebar
                    $('#sidebar').removeClass('active');
                }
            });
        });
    </script>
</body>

</html>