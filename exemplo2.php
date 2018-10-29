<?php

/**
 * Exemplo 2
 * Sintaxe basica
 */

# DECLARAÇÃO DE VARIVEIS

$numInt = 1;
$numFlat = 1.1;
$nome = 'PHP Curitiba';
$myArry = [1,2, 'João', 1.4, $numInt ]; // no php os arrays aceitam todo tipo de dado


# condicionais

if ($nome == 'PHP Curitiba') {
    echo '<hr>'; // linha horizonta no html
    echo '<b>Aqui foi escrito no IF</b>';
    echo '<h1>  PHP para os alunos da Unicesumar Curitiba!  </h1>'; #h1 é o titulo principal no html
    echo '<hr>';
} else {
    echo 'Caso a condição acima for falsa!';
}


switch ($numInt) {
    case 1:
        echo '<h1>A variavel $numInt é igual a 1</h1>';    
    break;
    default:
        echo 'No switch case o valor verificado caiu no padrão!';
    break;
}

# laços de reptição

echo '<hr>';
for ($i = 0; $i <= 100; $i++) {
    echo "Valor: $i &nbsp"; # no php aspas duplas são interpretadas então variaveis dentro da string são impressas!
}
echo '<hr>';


$i = 100;
while($i > 0 ) {
    echo 'Valor: ' . $i . '&nbsp';
    $i--; # no php podemos incrementar e decrementar dessa maneira $var++ | $var--  | ++$var | --$var
}
echo '<hr>';


# acessando arrays 
echo $myArry[2];





// veja mais sobre a linguagem no seu manual
// a documentação é completa e de facil entendimento!
// https://secure.php.net/docs.php