<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Aprovação Escolar</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Estilo do formulário */
        input[type="text"] {
            padding: 10px;
            width: 80%;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1.1em;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Estilo da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Cores para as notas */
        .nota-baixa {
            background-color: red;
            color: white;
        }

        .nota-alta {
            background-color: blue;
            color: white;
        }

        .nota-media {
            background-color: #f39c12;
            color: white;
        }

        /* Estilo da mensagem de aprovação */
        #resultado {
            margin-top: 20px;
            font-size: 1.2em;
            padding: 10px;
            border-radius: 5px;
        }

        .aprovado {
            background-color: #28a745;
            color: white;
        }

        .reprovado {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Sistema de Aprovação Escolar</h1>
        
        <!-- Formulário para inserir o nome do aluno -->
        <input type="text" id="nome" placeholder="Digite o nome do aluno" required>
        <br>
        <button onclick="adicionarNotas()">Adicionar Notas</button>

        <!-- Tabela de notas -->
        <table id="tabelaNotas" style="display:none;">
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <!-- As linhas serão inseridas dinamicamente -->
            </tbody>
        </table>

        <!-- Mensagem de status -->
        <div id="mensagem"></div>

        <!-- Resultado de aprovação -->
        <div id="resultado"></div>
    </div>

    <script>
        let notas = []; // Array para armazenar as notas

        // Função para adicionar notas e mostrar a tabela
        function adicionarNotas() {
            const nomeAluno = document.getElementById('nome').value;
            
            if (nomeAluno === "") {
                alert("Por favor, insira o nome do aluno.");
                return;
            }

            document.getElementById('mensagem').textContent = `Bem-vindo, ${nomeAluno}! Preencha as notas abaixo.`;
            document.getElementById('tabelaNotas').style.display = "table"; // Exibir tabela

            // Adicionar disciplinas e criar campos para as notas
            adicionarLinha("Matemática");
            adicionarLinha("Português");
            adicionarLinha("Ciências");
            adicionarLinha("História");
            adicionarLinha("Geografia");
        }

        // Função para adicionar uma linha para uma disciplina
        function adicionarLinha(disciplina) {
            const tabela = document.getElementById('tabelaNotas').getElementsByTagName('tbody')[0];
            const row = tabela.insertRow();

            const cellDisciplina = row.insertCell(0);
            const cellNota = row.insertCell(1);

            cellDisciplina.textContent = disciplina;

            // Criar campo de entrada para a nota
            const inputNota = document.createElement('input');
            inputNota.type = "number";
            inputNota.min = 0;
            inputNota.max = 10;
            inputNota.placeholder = "Nota";
            inputNota.addEventListener('blur', function() {
                verificarNota(inputNota);
                calcularMedia(); // Recalcula a média sempre que uma nota for inserida
            });

            cellNota.appendChild(inputNota);
        }

        // Função para verificar a nota e aplicar a cor
        function verificarNota(input) {
            const nota = parseFloat(input.value);

            if (nota < 5) {
                input.className = "nota-baixa"; // Nota vermelha
            } else if (nota >= 6) {
                input.className = "nota-alta"; // Nota azul
            } else {
                input.className = "nota-media"; // Nota média (laranja)
            }
        }

        // Função para calcular a média
        function calcularMedia() {
            const inputs = document.querySelectorAll("input[type='number']");
            notas = [];
            
            inputs.forEach(input => {
                if (input.value) {
                    notas.push(parseFloat(input.value));
                }
            });

            if (notas.length === 5) { // Verifica se todas as notas foram inseridas
                const soma = notas.reduce((acc, nota) => acc + nota, 0);
                const media = soma / notas.length;

                // Exibir o resultado de aprovação
                exibirResultado(media);
            }
        }

        // Função para exibir o resultado de aprovação
        function exibirResultado(media) {
            const resultadoDiv = document.getElementById('resultado');
            
            if (media >= 6) {
                resultadoDiv.textContent = `Aprovado! Sua média foi: ${media.toFixed(2)}`;
                resultadoDiv.className = "aprovado"; // Apresenta em verde
            } else {
                resultadoDiv.textContent = `Reprovado! Sua média foi: ${media.toFixed(2)}`;
                resultadoDiv.className = "reprovado"; // Apresenta em vermelho
            }
        }

    </script>

</body>
</html>
