<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clientes WHERE id=$id");
$cliente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    $conn->query("UPDATE clientes SET nome='$nome', email='$email', sexo='$sexo', bairro='$bairro' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="post">
        <label>Nome: 
            <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']); ?>" required>
        </label><br>
        
        <label>Email: 
            <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']); ?>" required>
        </label><br>
        
        <label>Sexo: 
            <select name="sexo" required>
                <option value="Masculino" <?= $cliente['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                <option value="Feminino" <?= $cliente['sexo'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
            </select>
        </label><br>
        
        <label>Bairro: 
            <input type="text" name="bairro" value="<?= htmlspecialchars($cliente['bairro']); ?>" required>
        </label><br>
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>