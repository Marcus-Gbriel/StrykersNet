<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <h1>Contato</h1>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_02_Wallpaper_3840x2160.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_08_Wallpaper_3840x2160.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_14_Wallpaper_3840x2160.jpg');"></div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div id="contact_contents">
    <div class="mission_overlay"></div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-dark border-success">
                    <div class="card-header bg-success text-dark">
                        <h3 class="mb-0"><i class="fas fa-envelope me-2"></i>Entre em Contato Conosco</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">
                            Interessado em se juntar à STRYKERS ou tem alguma dúvida sobre nossa organização? 
                            Entre em contato através dos canais abaixo ou preencha o formulário.
                        </p>
                        
                        <form id="contactForm" class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="handle" class="form-label">Handle Star Citizen</label>
                                    <input type="text" class="form-control" id="handle" name="handle" placeholder="ex: STRYKER_001">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="discord" class="form-label">Discord (opcional)</label>
                                    <input type="text" class="form-control" id="discord" name="discord" placeholder="ex: usuario#1234">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="assunto" class="form-label">Assunto</label>
                                <select class="form-select" id="assunto" name="assunto" required>
                                    <option value="">Selecione um assunto...</option>
                                    <option value="recrutamento">Interesse em Recrutamento</option>
                                    <option value="alianca">Proposta de Aliança</option>
                                    <option value="parceria">Parceria Comercial</option>
                                    <option value="suporte">Suporte Técnico</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required 
                                    placeholder="Descreva sua solicitação ou dúvida detalhadamente..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-4 mb-4">
                <div class="card bg-dark border-success h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fab fa-discord fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Discord Oficial</h5>
                        <p class="card-text">Junte-se ao nosso servidor Discord para comunicação direta com a liderança.</p>
                        <a href="https://discord.gg/strykers" class="btn btn-outline-success" target="_blank">
                            Entrar no Discord
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card bg-dark border-success h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-gamepad fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Star Citizen</h5>
                        <p class="card-text">Encontre-nos no universo de Star Citizen para missões e operações conjuntas.</p>
                        <a href="https://robertsspaceindustries.com/orgs/STRYKERS" class="btn btn-outline-success" target="_blank">
                            Ver Organização
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card bg-dark border-success h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-envelope fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">E-mail Oficial</h5>
                        <p class="card-text">Para assuntos formais e propostas de parceria, utilize nosso e-mail oficial.</p>
                        <a href="mailto:contato@strykers.org" class="btn btn-outline-success">
                            Enviar E-mail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark border-success">
                    <div class="card-header bg-success text-dark">
                        <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informações de Recrutamento</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-success">Requisitos Básicos:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Idade mínima: 18 anos</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Conta ativa no Star Citizen</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Discord obrigatório</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Disponibilidade para treinamentos</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-success">Processo de Seleção:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-arrow-right text-success me-2"></i>Entrevista inicial</li>
                                    <li><i class="fas fa-arrow-right text-success me-2"></i>Período de teste (2 semanas)</li>
                                    <li><i class="fas fa-arrow-right text-success me-2"></i>Treinamento básico</li>
                                    <li><i class="fas fa-arrow-right text-success me-2"></i>Integração à divisão</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #contact_contents {
        background-color: rgba(0, 0, 0, 0.85);
        color: #fff;
        min-height: 60vh;
        position: relative;
    }
    
    .mission_overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0, 128, 0, 0.1) 0%, rgba(0, 0, 0, 0.8) 100%);
        pointer-events: none;
    }
    
    #contact_contents .container {
        position: relative;
        z-index: 2;
    }
    
    .card {
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 128, 0, 0.1);
    }
    
    .card-header.bg-success {
        background-color: #008000 !important;
        font-weight: bold;
    }
    
    .form-control {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid #008000;
        color: #fff;
    }
    
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.15);
        border-color: #00ff00;
        box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.25);
        color: #fff;
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    
    .form-select {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid #008000;
        color: #fff;
    }
    
    .form-select:focus {
        background-color: rgba(255, 255, 255, 0.15);
        border-color: #00ff00;
        box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.25);
        color: #fff;
    }
    
    .btn-outline-success {
        border-color: #008000;
        color: #008000;
    }
    
    .btn-outline-success:hover {
        background-color: #008000;
        border-color: #008000;
        color: #fff;
    }
    
    .parallax-img {
        height: 60vh;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    .carousel h1 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 4rem;
        font-weight: 900;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        z-index: 10;
        font-family: 'Orbitron', sans-serif;
    }
</style>

<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Aqui você pode adicionar a lógica para enviar o formulário
    // Por exemplo, usando fetch() para enviar para um endpoint
    
    alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
    this.reset();
});
</script>