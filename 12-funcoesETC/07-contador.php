<?php

// Função para contar as palavras únicas
function contarPalavrasUnicas($texto) {
    // Converte o texto para minúsculas
    $texto = strtolower($texto);
    // Substitui todos os caracteres não alfabéticos e não espaços por nada
    $texto = preg_replace("/[^a-záéíóúãõâêîôûàèìòùç ]/", "", $texto);
    // Separa as palavras
    $palavras = explode(" ", $texto);
    // Remove espaços extras e filtra palavras vazias
    $palavras = array_filter($palavras, function($palavra) {
        return !empty($palavra);
    });
    // Conta as palavras únicas
    $palavrasUnicas = array_unique($palavras);
    return count($palavrasUnicas);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o texto digitado pelo usuário
    $entrada = $_POST['texto'];
    // Conta as palavras únicas
    $quantidade = contarPalavrasUnicas($entrada);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palavras Únicas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #2980b9, #8e44ad); /* Degradê de azul para roxo */
            color: white;
            text-align: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            font-size: 1.2em;
        }

        textarea {
            padding: 10px;
            font-size: 1.2em;
            width: 100%;
            margin: 15px 0;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
            height: 150px;
        }

        button {
            padding: 12px 20px;
            font-size: 1.2em;
            background-color: #2ecc71;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #27ae60;
        }

        .resultado {
            margin-top: 30px;
            font-size: 1.5em;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <div>
        <h1>Contador de Palavras Únicas</h1>
        <form method="POST">
            <label for="texto">Digite o texto:</label>
            <textarea id="texto" name="texto" required></textarea>
            <button type="submit">Contar Palavras</button>
        </form>

        <?php
        // Exibe o resultado se o texto for enviado
        if (isset($quantidade)) {
            echo "<div class='resultado'>Este texto contém <strong>$quantidade</strong> palavras únicas.</div>";
        }
        ?>

    </div>

</body>
</html>
