<?php
//Usando variaveis do tipo Boolean(verdadeiro ou falso):
$logado = true;

if ($logado){
    echo "Bem vindo ao Painel de controle.";
} else {
echo "Voce não está logado. Faça login!";
}
//========
echo "<hr>";
//Ponto Flutuante:
$altura=1.84;
echo "altura: $altura m"; //saída; altura: 1.85m
//======
echo "<hr>";
//Integer
$idade = 17;
echo "Idade: $idade";
//======
echo "<hr>";
//Arrary:
$filhos = ["João", "Maria", "Pedro", "Ana"];
echo $filhos[3];
//======
echo "<hr>";
//Objeto:
class Pessoa {
    public $nome;
    public $idade;

    public function __construct($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;

    }
    public function apresentar(){
        return "Olá, meu nome é $this->nome e tenho $this->idade anos.";
    }
}
$pessoa = new Pessoa("Guilherme", 16);
echo $pessoa->apresentar();

?>