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
            height: 90vh;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: brightness(0.3);
        }
    }
</style>