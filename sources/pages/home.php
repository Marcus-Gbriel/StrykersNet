<?php
/*
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_destroy();
}
*/
?>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <h1>STRYKERS</h1>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_01_Wallpaper_3840x2160.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_17_Wallpaper_3840x2160.jpg');"></div>
        </div>
        <div class="carousel-item">
            <div class="parallax-img" style="background-image: url('/public/imgs/starcitizen/SC_25_Wallpaper_3840x2160.jpg');"></div>
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
<div id="mission_contents">
    <div class="mission_overlay"></div>
    <div class="cards_container">
        <div class="card text-center card_primary">
            <div class="card-header">
                Excelência Militar
            </div>
            <div class="card-body">
                <h5 class="card-title">Disciplina, Ordem e Supremacia</h5>
                <img height="80" src="/public/icons/uee.png" alt="star-wars-rebellion-ship" />
                <p class="card-text">Atuamos com excelência em todas as frentes de combate: infantaria, força aérea, marinha espacial, logística, corpo médico e forças especiais. Cada membro é treinado para alcançar o melhor desempenho no universo de Star Citizen.</p>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                Estrutura Hierárquica
            </div>
            <div class="card-body">
                <h5 class="card-title">Crescimento e Evolução</h5>
                <img height="80" src="/public/icons/leon.png" alt="star-wars-rebellion-ship" />
                <p class="card-text">Nossa hierarquia é clara e funcional, valorizando cada membro. Oferecemos caminhos para evolução, treinamentos, missões e campanhas, promovendo crescimento pessoal e coletivo dentro da organização.</p>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                Camaradagem
            </div>
            <div class="card-body">
                <h5 class="card-title">Imersão e Propósito</h5>
                <img height="80" src="/public/icons/missiles.png" alt="star-wars-rebellion-ship" />
                <p class="card-text">Mais do que jogar juntos, buscamos criar laços, identidade e propósito. Na STRYKERS, cada recruta, instrutor ou comandante encontra acolhimento, amizade e oportunidades para crescer no ‘verse.</p>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
<style>
    #carouselExampleAutoplaying {
        position: relative;

        .carousel-item {
            image-rendering: pixelated;
            filter: brightness(0.3);
        }

        h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3.5rem;
            color: white;
            text-align: center;
            z-index: 2;
            width: 100%;
            pointer-events: none;
        }

        .parallax-img {
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: brightness(0.3);
        }
    }

    #mission_contents {
        position: relative;
        height: 85vh;
        width: 100% !important;
        background-image: url('/public/imgs/starcitizen/SC_33_Wallpaper_3840x2160.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 10%;
        overflow: hidden;

        .mission_overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
            pointer-events: none;
        }

        .cards_container {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 30px;

            .card {
                height: 100% !important;
            }
        }
    }
</style>