<?php

// Função para gerar senha forte
function gerarSenha($comprimento) {
    // Caracteres permitidos para a senha
    $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz';
    $letrasMaiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeros = '0123456789';
    $caracteresEspeciais = '!@#$%^&*()-_=+[]{}|;:,.<>?';

    // Junta todos os caracteres permitidos
    $todosCaracteres = $letrasMinusculas . $letrasMaiusculas . $numeros . $caracteresEspeciais;

    // Gera a senha aleatória
    $senha = '';
    for ($i = 0; $i < $comprimento; $i++) {
        $senha .= $todosCaracteres[rand(0, strlen($todosCaracteres) - 1)];
    }

    return $senha;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comprimento = intval($_POST['comprimento']); // Obtém o comprimento da senha
    $senhaGerada = gerarSenha($comprimento); // Gera a senha
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas Fortes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #2c3e50, #8e44ad); /* Degradê de azul para roxo */
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
        <h1>Gerador de Senhas Fortes</h1>
        <form method="POST">
            <label for="comprimento">Digite o comprimento da senha:</label>
            <input type="number" id="comprimento" name="comprimento" required min="6" max="20">
            
            <button type="submit">Gerar Senha</button>
        </form>

        <?php
        // Exibe a senha gerada se o formulário for submetido
        if (isset($senhaGerada)) {
            echo "<div class='resultado'>";
            echo "Sua senha gerada é: <strong>$senhaGerada</strong>";
            echo "</div>";
        }
        ?>

    </div>

</body>
</html>
