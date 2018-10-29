<?php

/**
* Autor: Maycon de Moraes
* Data: 29/10/2018
* Uso: Resolução do desafio do PHP Unicesumar Curitiba
*/

$alunos = []; # cria array alunos
$aprovados = [];
$reprovados = [];
$recuperacao = [];
$maiorNota = -1;
$menorNota = 11;


// preenche automaticamente as notas dos alunos no laço de reptição
for ($i = 0; $i < 10; $i++) {

	$alunos[] = [
					'aluno' => "aluno $i",
					'nota1' => rand(1,10),
					'nota2' => rand(1,10),
				];
}


// faz os calculos
foreach ($alunos as $aluno) {
	# aprovado | reprovado | recuperacao
	if (($aluno['nota1'] + $aluno['nota2']) >= 6) {
		$aprovados[] = $aluno;
	} elseif (($aluno['nota1'] + $aluno['nota2']) < 4) {
		$reprovados[] = $aluno;
	} else {
		$recuperacao[] = $aluno;
	}

	# verifica maior ou menor nota
	$maiorNota = $aluno['nota1'] > $maiorNota ?  $aluno['nota1'] : $maiorNota;
	$maiorNota = $aluno['nota2'] > $maiorNota ?  $aluno['nota2'] : $maiorNota;

	$menorNota = $aluno['nota1'] < $menorNota ?  $aluno['nota1'] : $menorNota;
	$menorNota = $aluno['nota2'] < $menorNota ?  $aluno['nota2'] : $menorNota;


}

echo '<hr>';
echo '<h1>Alunos Criados</h1>';
echo '<pre>';
print_r($alunos);
echo '</pre>';

echo '<hr>';

echo "Maior Nota: $maiorNota";
echo "&nbsp;";
echo "Menor Nota: $menorNota";

echo '<hr>';
echo '<h1>Aprovados</h1>';
echo '<pre>';
print_r($aprovados);
echo '</pre>';


echo '<hr>';
echo '<h1>Recuperacao</h1>';
echo '<pre>';
print_r($recuperacao);
echo '</pre>';


echo '<hr>';
echo '<h1>Reprovados</h1>';
echo '<pre>';
print_r($reprovados);
echo '</pre>';

