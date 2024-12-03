<?php
// Definindo o salário inicial
$salario = 2000.00; // Você pode mudar este valor conforme necessário

// Exibindo o salário inicial
echo "Salário inicial: R$ " . number_format($salario, 2, ',', '.') . "<br>";

// Aplicando um aumento de 10%
$salario += $salario * 0.10;
echo "Após aumento de 10%: R$ " . number_format($salario, 2, ',', '.') . "<br>";

// Aplicando um desconto de 15%
$salario -= $salario * 0.15;
echo "Após desconto de 15%: R$ " . number_format($salario, 2, ',', '.') . "<br>";

// Aplicando outro aumento de 40%
$salario += $salario * 0.40;
echo "Após aumento de 40%: R$ " . number_format($salario, 2, ',', '.') . "<br>";

// Exibindo o valor final
echo "Valor final do salário: R$ " . number_format($salario, 2, ',', '.');
?>