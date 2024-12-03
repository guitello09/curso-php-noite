<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descobrindo PAR ou ÍMPAR!</title>
    <style>
        /* Definindo o fundo com um degradê suave de cores neutras */
        body {
            background: linear-gradient(to bottom, #e0e0e0, #ffffff); /* Degradê de cinza claro para branco */
            font-family: Arial, sans-serif; /* Fonte limpa e moderna */
            margin: 0;
            padding: 0;
            height: 100vh; /* Preenche a tela inteira */
            display: flex;
            justify-content: center; /* Alinha o conteúdo no centro horizontal */
            align-items: center; /* Alinha o conteúdo no centro vertical */
        }

        /* Estilo do título */
        h1 {
            color: #333; /* Cor do texto */
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7); /* Fundo semi-transparente preto */
            color: #fff; /* Cor do texto branco */
            padding: 20px 40px;
            border-radius: 10px; /* Cantos arredondados */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Sombra suave no texto */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Sombra sutil ao redor do título */
        }

        /* Estilo para o conteúdo principal */
        .content {
            background: rgba(255, 255, 255, 0.8); /* Fundo semi-transparente branco */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra para destacar o conteúdo */
            text-align: center;
            max-width: 800px;
            width: 100%;
        }

        /* Estilo de botões */
        .button {
            background-color: #6c757d; /* Cor cinza escuro para os botões */
            color: white;
            font-size: 18px;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #495057; /* Cor mais escura quando passar o mouse */
        }

        /* Responsividade */
        @media (max-width: 600px) {
            h1 {
                font-size: 1.5em;
            }

            .content {
                padding: 20px;
            }

            .button {
                font-size: 16px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="content">
        <h1>Descobrindo se um número é PAR ou ÍMPAR!</h1>
        
        <p>Insira um número para saber se ele é par ou ímpar:</p>
        
        <!-- Formulário para o usuário digitar o número -->
        <input type="number" id="numberInput" placeholder="Digite um número" />
        <button class="button" onclick="checkParity()">Verificar</button>
        
        <p id="result" style="margin-top: 20px; font-size: 20px;"></p>
    </div>

    <script>
        // Função para verificar se o número é PAR ou ÍMPAR
        function checkParity() {
            let number = document.getElementById('numberInput').value;
            let result = document.getElementById('result');
            
            if (number === '') {
                result.textContent = "Por favor, insira um número!";
                result.style.color = "red";
            } else {
                if (number % 2 === 0) {
                    result.textContent = "O número " + number + " é PAR.";
                    result.style.color = "green";
                } else {
                    result.textContent = "O número " + number + " é ÍMPAR.";
                    result.style.color = "blue";
                }
            }
        }
    </script>

</body>
</html>
