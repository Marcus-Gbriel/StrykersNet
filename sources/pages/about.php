
<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

    body {
      margin: 0;
      font-family: 'Orbitron', sans-serif;
      background: url('https://images.unsplash.com/photo-1581090700227-1e8a53f3c324?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
      background-size: cover;
      color: #fff;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 80px 20px;
      text-align: center;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }

    .subtitulo {
      color: #ccc;
      margin-bottom: 30px;
    }

    .descricao {
      max-width: 900px;
      margin: 0 auto 40px auto;
      background-color: rgba(30, 30, 30, 0.85);
      padding: 30px;
      border-radius: 10px;
      text-align: left;
      font-size: 1rem;
      line-height: 1.6;
    }

    .descricao ul {
      list-style: none;
      padding: 0;
      margin-top: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 10px;
    }

    .descricao li::before {
      content: "✔️";
      margin-right: 10px;
      color: #0f0;
    }

    .cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin: 40px 0;
    }

    .card {
      background-color: rgba(20, 20, 20, 0.85);
      border-radius: 10px;
      padding: 30px;
      width: 300px;
      text-align: center;
      border: 1px solid #444;
    }

    .card h2 {
      font-size: 1.2rem;
      margin-top: 10px;
      margin-bottom: 15px;
    }

    .card p {
      font-size: 0.95rem;
      color: #ccc;
    }

    .card .emoji {
      font-size: 2rem;
    }

    .botao {
      background-color: #00c67c;
      color: #fff;
      padding: 12px 25px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    .botao:hover {
      background-color: #00a86b;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 1.8rem;
      }
    }
</style>
</head>
<body>

  <div class="overlay">
    <h1>Sobre a Corporação</h1>
    <p class="subtitulo">Conheça os princípios e a estrutura da STRYKERS</p>

    <div class="descricao">
      <p>
        A STRYKERS é uma organização paramilitar de elite com foco em <strong>Bounty Hunter</strong> e operações militares de alta precisão no universo de Star Citizen. Seguimos um rigoroso padrão militar e cumprimento legal, atuando com excelência em missões de combate, defesa e logística.
      </p>
      <ul>
        <li>Treinamento aéreo e terrestre especializado</li>
        <li>Incursões em território hostil e salvaguarda de locais</li>
        <li>Proteção e escolta de mercadorias e VIPs</li>
        <li>Domínio aéreo e manobras com veículos pesados</li>
      </ul>
    </div>

    <div class="cards">
      <div class="card">
        <div class="emoji">🗡</div>
        <h2>Excelência Militar</h2>
        <p>Formados com disciplina e treinamento de elite para executar missões com precisão e eficiência.</p>
      </div>
      <div class="card">
        <div class="emoji">🛡</div>
        <h2>Estrutura Hierárquica</h2>
        <p>Organização militar com patentes, divisões e cadeia de comando clara.</p>
      </div>
      <div class="card">
        <div class="emoji">🤝</div>
        <h2>Camaradagem</h2>
        <p>Unidos por lealdade e compromisso com a defesa mútua em qualquer situação.</p>
      </div>
    </div>

    <button class="botao" move-to="divisions">Conhecer Divisões</button>
  </div>

</body>
</html>