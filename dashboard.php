<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Loja de Maquiagem</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fce3ff, #f3e8ff);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      background-color: #6a1b9a;
      color: white;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .topo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .topo h1 {
      font-size: 24px;
    }

    .logout {
      background-color: #8e24aa;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .logout:hover {
      background-color: #5c1977;
    }

    .welcome {
      margin-top: 10px;
      font-size: 16px;
      text-align: center;
      color: #eee;
    }

    .promo {
      background-color: #ffe4f4;
      color: #a0006e;
      text-align: center;
      padding: 12px;
      font-weight: bold;
      font-size: 15px;
    }

    .container {
      padding: 30px 20px;
      flex: 1;
    }

    .produtos {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .produto {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      width: 280px;
      padding: 15px;
      transition: transform 0.2s ease;
    }

    .produto:hover {
      transform: translateY(-5px);
    }

    .produto img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
    }

    .produto h3,
    .produto p {
      text-align: center;
    }

    .produto h3 {
      font-size: 18px;
      color: #6a1b9a;
      margin: 10px 0 5px;
    }

    .produto p {
      font-size: 14px;
      color: #666;
    }

    .preco {
      margin-top: 10px;
      font-weight: bold;
      color: #8e24aa;
      font-size: 16px;
      text-align: center;
    }

    .botao {
      margin-top: 10px;
      display: inline-block;
      background: #6a1b9a;
      color: white;
      padding: 6px 12px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
      transition: background 0.3s;
    }

    .botao:hover {
      background: #511473;
    }

    footer {
      background: #f5e1ff;
      text-align: center;
      padding: 15px;
      font-size: 13px;
      color: #555;
    }
  </style>
</head>
<body>

  <header>
    <div class="topo">
      <h1>Loja de Maquiagem 💄</h1>
      <a href="logout.php" class="logout">Sair</a>
    </div>
    <div class="welcome">
      Olá, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>!
    </div>
  </header>

  <div class="promo">
    💜 Promoção especial: frete grátis nas compras acima de R$ 100,00! 💜
  </div>

  <div class="container">

    <div class="produtos">
      <div class="produto">
        <img src="assets/base.png" alt="Base Líquida">
        <h3>Base Líquida</h3>
        <p>Acabamento natural, longa duração. Ideal para todos os tipos de pele.</p>
        <div class="preco">R$ 79,90</div>
        <a href="#" class="botao">Ver mais</a>
      </div>

      <div class="produto">
        <img src="assets/batom.png" alt="Batom Matte">
        <h3>Batom Matte</h3>
        <p>Pigmentação intensa com textura suave e elegante.</p>
        <div class="preco">R$ 49,90</div>
        <a href="#" class="botao">Ver mais</a>
      </div>

      <div class="produto">
        <img src="assets/rimel.png" alt="Máscara de Cílios">
        <h3>Máscara de Cílios</h3>
        <p>Volume intenso com definição precisa. Fácil de remover.</p>
        <div class="preco">R$ 29,90</div>
        <a href="#" class="botao">Ver mais</a>
      </div>

      <div class="produto">
        <img src="assets/blush.png" alt="Blush Cremoso">
        <h3>Blush Cremoso</h3>
        <p>Cor natural que valoriza o rosto com toque aveludado.</p>
        <div class="preco">R$ 35,90</div>
        <a href="#" class="botao">Ver mais</a>
      </div>
    </div>
  </div>

  <footer>
    &copy; <?php echo date('Y'); ?> Loja de Maquiagem - Desenvolvido com 💜 por você
  </footer>

</body>
</html>
