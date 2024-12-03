<?php
// Conectar ao banco de dados MySQL
$servername = "localhost";
$username = "root"; // ou o seu usuário
$password = ""; // ou a sua senha
$dbname = "calendario_eventos";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para obter eventos de uma data específica
function obterEventos($data) {
    global $conn;
    $sql = "SELECT * FROM eventos WHERE data = '$data'";
    $result = $conn->query($sql);
    
    $eventos = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $eventos[] = $row;
        }
    }
    return $eventos;
}

// Função para gerar o calendário
function gerarCalendario($mes, $ano) {
    $diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // Quantos dias tem o mês
    $primeiroDia = date('N', strtotime("$ano-$mes-01")); // Dia da semana em que o mês começa
    $calendario = "<table class='calendar'>
                    <thead>
                        <tr>
                            <th>Dom</th>
                            <th>Seg</th>
                            <th>Ter</th>
                            <th>Qua</th>
                            <th>Qui</th>
                            <th>Sex</th>
                            <th>Sáb</th>
                        </tr>
                    </thead>
                    <tbody><tr>";

    // Adicionando espaços antes do primeiro dia do mês
    for ($i = 1; $i < $primeiroDia; $i++) {
        $calendario .= "<td></td>";
    }

    // Adicionando os dias do mês
    for ($dia = 1; $dia <= $diasNoMes; $dia++) {
        $data = "$ano-$mes-" . str_pad($dia, 2, '0', STR_PAD_LEFT);
        $eventos = obterEventos($data);
        $eventoDescricao = '';
        if (count($eventos) > 0) {
            $eventoDescricao = "<div class='event-description'>". $eventos[0]['titulo'] ."</div>";
        }
        $calendario .= "<td><span class='day'>$dia</span>$eventoDescricao</td>";

        // Quebra de linha após sábado
        if (($dia + $primeiroDia - 1) % 7 == 0) {
            $calendario .= "</tr><tr>";
        }
    }

    // Preencher os dias restantes da semana
    while (($dia + $primeiroDia - 1) % 7 != 0) {
        $calendario .= "<td></td>";
        $dia++;
    }

    $calendario .= "</tr></tbody></table>";
    return $calendario;
}

// Pegar o mês e o ano atual
$mesAtual = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$anoAtual = isset($_GET['ano']) ? $_GET['ano'] : date('Y');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .calendar {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            padding: 15px;
            text-align: center;
            width: 14%;
        }
        .calendar th {
            background-color: #3e8e41;
            color: white;
        }
        .calendar td {
            background-color: #ffffff;
            border: 1px solid #ddd;
        }
        .calendar .day {
            font-weight: bold;
            font-size: 1.2em;
        }
        .calendar .event-description {
            background-color: #ffdd57;
            color: #333;
            font-size: 0.8em;
            padding: 5px;
            margin-top: 5px;
        }
        .calendar .today {
            background-color: #ffeb3b;
        }
        .calendar a {
            text-decoration: none;
            color: #000;
            font-size: 1.2em;
        }
        .navigation {
            text-align: center;
            margin: 20px 0;
        }
        .navigation a {
            padding: 10px;
            background-color: #3e8e41;
            color: white;
            border-radius: 5px;
            margin: 0 5px;
        }
    </style>
</head>
<body>

    <div class="navigation">
        <a href="?mes=<?php echo $mesAtual - 1; ?>&ano=<?php echo $anoAtual; ?>">Mês Anterior</a>
        <a href="?mes=<?php echo $mesAtual + 1; ?>&ano=<?php echo $anoAtual; ?>">Mês Seguinte</a>
    </div>

    <h1 style="text-align: center;">Calendário de Eventos - <?php echo $mesAtual; ?>/<?php echo $anoAtual; ?></h1>

    <?php
    echo gerarCalendario($mesAtual, $anoAtual);
    ?>

</body>
</html>

<?php
// Fechar a conexão
$conn->close();
?>
