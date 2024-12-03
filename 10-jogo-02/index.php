<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de Adivinhação</title>
    <style>
        /* Estilo do corpo da página com degradê vibrante em tons de azul e roxo */
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Degradê de roxo e azul */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Container central para o conteúdo */
        .game-container {
            background: rgba(255, 255, 255, 0.9); /* Fundo branco semi-transparente */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 80%;
            max-width: 500px;
        }

        /* Título do jogo */
        h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Estilo do input e botão */
        input[type="number"] {
            padding: 10px;
            font-size: 1.2em;
            border-radius: 5px;
            border: 2px solid #2575fc;
            width: 60%;
            margin-right: 10px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #2575fc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #6a11cb; /* Efeito de cor ao passar o mouse */
        }

        /* Estilo da mensagem de resultado */
        .message {
            margin-top: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }

        .correct {
            color: green;
        }

        .wrong {
            color: red;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            input[type="number"] {
                width: 80%;
            }

            button {
                width: 100%;
                margin-top: 10px;
            }
        }

    </style>
</head>
<body>

    <div class="game-container">
        <h1>Jogo de Adivinhação!</h1>
        <p>Advinhe o número que estou pensando (de 1 a 100):</p>
        <input type="number" id="guess" placeholder="Digite seu palpite" min="1" max="100">
        <button onclick="checkGuess()">Adivinhar</button>
        <p class="message" id="message"></p>
    </div>

    <script>
        // Gerar um número aleatório entre 1 e 100
        const secretNumber = Math.floor(Math.random() * 100) + 1;
        let attempts = 0;

        // Função para verificar a adivinhação
        function checkGuess() {
            const userGuess = document.getElementById('guess').value;
            const message = document.getElementById('message');
            attempts++;

            if (userGuess == secretNumber) {
                message.textContent = `Parabéns! Você acertou o número ${secretNumber} em ${attempts} tentativas.`;
                message.classList.add('correct');
                message.classList.remove('wrong');
            } else if (userGuess > secretNumber) {
                message.textContent = "O número é menor, tente novamente!";
                message.classList.add('wrong');
                message.classList.remove('correct');
            } else if (userGuess < secretNumber) {
                message.textContent = "O número é maior, tente novamente!";
                message.classList.add('wrong');
                message.classList.remove('correct');
            } else {
                message.textContent = "Por favor, insira um número válido.";
                message.classList.remove('correct', 'wrong');
            }

            // Limpar o campo de entrada após a tentativa
            document.getElementById('guess').value = '';
            document.getElementById('guess').focus();
        }
    </script>

</body>
</html>
