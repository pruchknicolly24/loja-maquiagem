<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'login';

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados["Sendlogin"])) {
    $query_usuario = "SELECT id, senha FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $dados["usuario"]);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $row_usuario = $resultado->fetch_assoc();
        if (md5($dados["senha_usuario"]) === $row_usuario['senha']) {
            session_start();
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $dados["usuario"];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color: red; text-align:center;'>Erro: Senha incorreta!</p>";
        }
    } else {
        echo "<p style='color: red; text-align:center;'>Erro: Usuário não encontrado!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Login - Loja de Maquiagem</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #e6ccf5, #f3e8ff);
      color: #4b0d5e;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: #6a1b9a;
      color: white;
      padding: 30px 0;
      text-align: center;
      font-size: 28px;
      font-weight: 700;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      flex-shrink: 0;
    }

    main {
      flex: 1 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px 20px;
      gap: 30px;
    }

    .intro {
      max-width: 460px;
      text-align: center;
      font-size: 16px;
      font-style: italic;
      line-height: 1.5;
      color: #5a2a7e;
      margin-top: 10px;
    }

    form {
      background: white;
      padding: 30px 35px;
      border-radius: 10px;
      box-shadow: 0 2px 12px rgba(106, 27, 154, 0.3);
      width: 380px;
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    label {
      font-weight: 600;
      font-size: 14px;
      color: #4b0d5e;
    }

    input[type="text"],
    input[type="password"] {
      padding: 12px;
      border: 1px solid #b7a1d3;
      border-radius: 6px;
      font-size: 15px;
      color: #333;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #6a1b9a;
      outline: none;
    }

    input[type="submit"] {
      margin-top: 10px;
      background-color: #6a1b9a;
      color: white;
      font-weight: 700;
      padding: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #511473;
    }

    p {
      margin-top: 10px;
      font-weight: 600;
    }

    footer {
      background: #f5e1ff;
      text-align: center;
      padding: 15px;
      font-size: 13px;
      color: #555;
      flex-shrink: 0;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.05);
    }
  </style>
</head>
<body>

  <header>
    Bem-vinda à Loja de Maquiagem 💄
  </header>

  <main>
    <div class="intro">
      Aqui você encontra os melhores produtos para realçar sua beleza natural. Entre e descubra novidades e promoções incríveis! Esperamos por você. 💜
    </div>

    <form method="POST" action="">
      <label for="usuario">Usuário:</label>
      <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>

      <label for="senha_usuario">Senha:</label>
      <input type="password" id="senha_usuario" name="senha_usuario" placeholder="Digite sua senha" required>

      <input type="submit" name="Sendlogin" value="Acessar">
    </form>
  </main>

  <footer>
    &copy; <?php echo date('Y'); ?> Loja de Maquiagem - Desenvolvido com 💜 por você
  </footer>

</body>
</html>
