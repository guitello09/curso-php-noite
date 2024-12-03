<?php
function calcularIdade($dn){

    //Criando objeto data e hora:
$dn = new DateTime($dn);

//Criando data e hora atual:
$hoje = new DateTime();

//Calcular diferença entre as datas:
$diferenca = $hoje->diff($dn);

//Retornar anos, meses e dias:
return "Você tem " .$diferenca->y . " anos, " .$diferenca->m . "
meses e " .$diferenca->d . " dias.";
    
}

//Exemplo de uso da função:
$dn  = "2008-09-09";
echo calcularIdade($dn);



?>