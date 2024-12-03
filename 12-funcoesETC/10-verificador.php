<?php

// Função para verificar se a string é um palíndromo
function verificarPalindromo($frase) {
    // Remove espaços, pontuação e converte para minúsculas
    $fraseLimpa = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($frase));

    // Inverte a frase limpa
    $fraseInvertida = strrev($fraseLimpa);

    // Compara a frase limpa com a invertida
    if ($fraseLimpa == $fraseInvertida) {
        return true; // É um palíndromo
    } else {
        return false; // Não é um palíndromo
    }
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST['frase']; // Obtém a frase inserida pelo usuário
    $resultado = verificarPalindromo($frase); // Verifica se é palíndromo
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f39c12, #d35400); /* Degradê de laranja */
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

        input[type="text"] {
            padding: 10px;
            font-size: 1.2em;
            width: 100%;
            margin: 15px 0;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
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
        <h1>Verificador de Palíndromos</h1>
        <form method="POST">
            <label for="frase">Digite uma palavra ou frase:</label>
            <input type="text" id="frase" name="frase" required>
            
            <button type="submit">Verificar</button>
        </form>

        <?php
        // Exibe o resultado se o formulário for submetido
        if (isset($resultado)) {
            echo "<div class='resultado'>";
            if ($resultado) {
                echo "É um palíndromo!";
            } else {
                echo "Não é um palíndromo.";
            }
            echo "</div>";
        }
        ?>

    </div>

</body>
</html>
