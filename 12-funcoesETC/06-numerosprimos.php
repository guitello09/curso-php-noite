<?php

// Função para verificar se o número é primo
function verificarPrimo($num) {
    if ($num <= 1) {
        return false;
    }
    if ($num == 2) {
        return true;
    }
    if ($num % 2 == 0) {
        return false;
    }
    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

// Função para testar uma lista de números fornecidos pelo usuário
function testarListaDePrimos($listaDeNumeros) {
    $resultados = [];
    foreach ($listaDeNumeros as $num) {
        $resultados[$num] = verificarPrimo($num);
    }
    return $resultados;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os números digitados pelo usuário
    $entrada = $_POST['numeros'];
    $numeros = explode(" ", trim($entrada));  // Separa os números em um array

    // Testa se cada número na lista é primo
    $resultados = testarListaDePrimos($numeros);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Números Primos</title>

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
            max-width: 400px;
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

        .resultados {
            margin-top: 30px;
        }

        .resultado {
            font-size: 1.2em;
            margin: 5px 0;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }

    </style>
</head>
<body>

    <div>
        <h1>Calculadora de Números Primos</h1>
        <form method="POST">
            <label for="numeros">Digite os números separados por espaço:</label>
            <input type="text" id="numeros" name="numeros" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        // Exibe os resultados, se houver
        if (isset($resultados)) {
            echo "<div class='resultados'>";
            foreach ($resultados as $num => $isPrimo) {
                echo "<div class='resultado'>";
                echo "O número $num é primo? " . ($isPrimo ? "Sim" : "Não");
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
