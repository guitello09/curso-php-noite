<?php 
    include 'config.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $bairro = $_POST['bairro'];

        // Inserir dados no banco de dados
        $conn->query("INSERT INTO clientes(nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <style>
        /* Plano de fundo com gradiente mais forte de marrom */
        body {
            background: linear-gradient(to bottom, #D6A87D, #8B5E3C); /* Gradiente de marrom mais forte */
            font-family: Arial, sans-serif;
            color: #4A2C2A; /* Cor marrom escuro para o texto */
            margin: 0;
            padding: 0;
            height: 100vh; /* Garante que o corpo ocupe 100% da altura da tela */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Estilo do título */
        h1 {
            font-size: 3em;
            color: #fff; /* Texto branco */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Sombra sutil no texto */
            margin-bottom: 20px;
        }

        /* Estilo do formulário */
        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco com opacidade */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #4A2C2A; /* Cor marrom escuro nos rótulos */
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1em;
            color: #4A2C2A; /* Cor do texto marrom escuro nos campos de entrada */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #D76E5B; /* Cor de botão marrom-avermelhado */
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #FFB79A; /* Efeito ao passar o mouse */
        }
    </style>
</head>
<body>

    <div>
        <h1>Adicionar Novo Cliente</h1>
        <form action="" method="post" onsubmit="return validarFormulario()">
            <label>Nome: 
                <input type="text" name="nome" required>
            </label>

            <label>Email: 
                <input type="email" name="email" required>
            </label>

            <label>Sexo: 
                <select name="sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </label>

            <label>Bairro: 
                <input type="text" name="bairro" required>
            </label>

            <button type="submit">Salvar</button>
        </form>
    </div>

</body>
</html>
