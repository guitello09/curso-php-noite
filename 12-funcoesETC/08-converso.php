<?php

// Função para converter o número decimal para a base escolhida
function converterBase($numero, $base) {
    switch($base) {
        case 'binario':
            return decbin($numero);
        case 'octal':
            return decoct($numero);
        case 'hexadecimal':
            return dechex($numero);
        default:
            return "Base inválida";
    }
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']); // Obtém o número decimal
    $base = $_POST['base']; // Obtém a base escolhida

    // Converte o número para a base escolhida
    $resultado = converterBase($numero, $base);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Base Numérica</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #3498db, #8e44ad); /* Degradê de azul para roxo */
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

        input[type="number"] {
            padding: 10px;
            font-size: 1.2em;
            width: 100%;
            margin: 15px 0;
            border: none;
            border-radius: 5px;
            background-color: #ecf0f1;
        }

        select {
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
        <h1>Conversor de Base Numérica</h1>
        <form method="POST">
            <label for="numero">Digite o número decimal:</label>
            <input type="number" id="numero" name="numero" required>
            
            <label for="base">Escolha a base de conversão:</label>
            <select id="base" name="base" required>
                <option value="binario">Binário</option>
                <option value="octal">Octal</option>
                <option value="hexadecimal">Hexadecimal</option>
            </select>
            
            <button type="submit">Converter</button>
        </form>

        <?php
        // Exibe o resultado se o formulário for submetido
        if (isset($resultado)) {
            echo "<div class='resultado'>";
            echo "O número " . $numero . " em base " . ucfirst($base) . " é: <strong>$resultado</strong>";
            echo "</div>";
        }
        ?>

    </div>

</body>
</html>
