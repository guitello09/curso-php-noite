<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Progressões</title>
    <style>
        /* Resetando margens e preenchimentos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilo do corpo */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Degradê roxo e azul */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            overflow: hidden;
        }

        /* Container principal */
        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Fundo branco com leve transparência */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-10px);
        }

        h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase;
        }

        label {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
            display: block;
            text-align: left;
        }

        input[type="number"], select, input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="number"]:focus, select:focus, input[type="submit"]:hover {
            border-color: #6a11cb;
            outline: none;
        }

        input[type="submit"] {
            background-color: #6a11cb; /* Cor roxa */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2575fc; /* Cor azul */
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            border: 1px solid #d0e8d0;
            color: #333;
            font-size: 1.2rem;
            font-family: 'Verdana', sans-serif;
            text-align: left;
        }

        .result-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            font-size: 1.1rem;
        }

        .result h2 {
            color: #6a11cb; /* Cor roxa */
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 0.9rem;
            color: #fff;
            text-align: center;
        }

        .footer a {
            color: #2575fc; /* Cor azul */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Destacar letras "petra" */
        .highlight {
            color: #ff8c00; /* Cor laranja vibrante */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Progressões</h1>
        <form method="POST">
            <label for="numero">Digite o número inicial:</label>
            <input type="number" name="numero" id="numero" required><br>

            <label for="razao">Digite a razão:</label>
            <input type="number" name="razao" id="razao" required><br>

            <input type="submit" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Receber os dados do formulário
            $numero = $_POST['numero'];
            $razao = $_POST['razao'];

            // Funções para calcular a PA e PG
            function progressaoAritmetica($numero, $razao) {
                $termos = [];
                for ($i = 0; $i < 10; $i++) {
                    $termos[] = $numero + $i * $razao;
                }
                return $termos;
            }

            function progressaoGeometrica($numero, $razao) {
                $termos = [];
                for ($i = 0; $i < 10; $i++) {
                    $termos[] = $numero * pow($razao, $i);
                }
                return $termos;
            }

            // Calcular as progressões
            $pa = progressaoAritmetica($numero, $razao);
            $pg = progressaoGeometrica($numero, $razao);

            // Exibir os resultados
            echo "<div class='result'>";
            echo "<h2>Progressão Aritmética (PA):</h2>";
            echo "<p>" . implode(" → ", $pa) . "</p>";
            echo "<h2>Progressão Geométrica (PG):</h2>";
            echo "<p>" . implode(" → ", $pg) . "</p>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="footer">
        <p>Desenvolvido com <span class="highlight">♥</span> por <a href="https://www.linkedin.com/in/seu-perfil/" target="_blank">Seu Nome</a></p>
    </div>
</body>
</html>
