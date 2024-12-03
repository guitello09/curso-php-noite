<?php

// Criando um array com 20 elementos (nomes de cidades)
$cities = [
    "São Paulo", "Rio de Janeiro", "Belo Horizonte", "Brasília", "Curitiba",
    "Salvador", "Fortaleza", "Porto Alegre", "Manaus", "Recife",
    "Belém", "Florianópolis", "Goiânia", "Campo Grande", "Natal",
    "João Pessoa", "Maceió", "Aracaju", "Vitória", "Cuiabá"
];

// Percorrendo o array e exibindo o índice e o valor de cada elemento
foreach ($cities as $index => $city) {
    if ( strpos($city, "V") === 0  )

    echo "$city<br>";
    }
