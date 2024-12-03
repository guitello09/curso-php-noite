<?php
include 'config.php';

// Realiza a consulta para pegar todos os clientes
$result = $conn->query("SELECT * FROM clientes");

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Clientes - Padaria Toque de Arte</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Definindo o plano de fundo com uma imagem */
    body {
      background-image: url('https://png.pngtree.com/background/20220729/original/pngtree-seamless-pattern-of-hand-drawn-line-art-bakery-background-vector-illustration-picture-image_1853053.jpg'); /* Link para a imagem de fundo */
      background-size: cover; /* A imagem cobrirá toda a tela */
      background-position: center; /* Centraliza a imagem */
      background-repeat: no-repeat; /* Não repete a imagem */
      font-family: Arial, sans-serif;
      color: #4A2C2A; /* Cor de texto marrom escuro */
      margin: 0;
      padding: 0;
      height: 100vh; /* Garante que o corpo ocupe toda a altura da tela */
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    /* Estilo do título */
    h1 {
      font-size: 2.5em;
      color: #fff; /* Cor branca para o título */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra no título */
      margin-bottom: 20px;
    }

    /* Estilo da tabela */
    table {
      width: 80%;
      max-width: 1000px;
      border-collapse: collapse;
      margin: 20px auto;
      background-color: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente para a tabela */
    }

    th, td {
      padding: 12px 20px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #D76E5B; /* Cor do fundo das cabeçalhos */
      color: #fff; /* Cor do texto das cabeçalhos */
    }

    tr:nth-child(even) {
      background-color: #f2f2f2; /* Cor alternada nas linhas */
    }

    tr:hover {
      background-color: #FFB79A; /* Cor de fundo ao passar o mouse em uma linha */
    }

    /* Estilo dos links de ações */
    td a {
      color: #D76E5B;
      text-decoration: none;
      margin-right: 10px;
    }

    td a:hover {
      color: #FFB79A;
    }

    /* Alinhamento das células da tabela para ficarem centralizadas */
    td, th {
      text-align: center;
    }

  </style>
</head>
<body>

  <div>
    <h1>Lista de Clientes - Toque de Arte :)</h1>
    <a href="add.php">Criar Cliente</a>
    <table>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Sexo</th>
        <th>Bairro</th>
        <th>Ações</th>
      </tr>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td> <?= htmlspecialchars($row['nome']); ?> </td>
          <td> <?= htmlspecialchars($row['email']); ?> </td>
          <td> <?= htmlspecialchars($row['sexo']); ?> </td>
          <td> <?= htmlspecialchars($row['bairro']); ?> </td>
          <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Editar</a>
            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar este cliente?')">Deletar</a>
          </td>
        </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5">Nenhum cliente encontrado.</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>

</body>
</html>
