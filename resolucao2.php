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


echo '<form action="" method="POST">';
echo '	Aluno: <input type="text" name="aluno"> <br>';
echo '	Nota 1: <input type="text" name="nota1"> <br>';
echo '	Nota 2: <input type="text" name="nota2"> <br>';
echo '	<input type="submit" value="Adcionar">';
echo '</form>';

if (isset($_POST['aluno'])	) {
	$aluno = [
				'aluno' => $_POST['aluno'],
				'nota1' => $_POST['nota1'],
				'nota2' => $_POST['nota2'],
			 ];

	# grava no arquivo			 
	file_put_contents('alunos.txt', json_encode($aluno) . PHP_EOL, FILE_APPEND);

	# mostra os dados dos arquivos
	if (file_exists('alunos.txt')) {
		echo '<pre>' . file_get_contents('alunos.txt') . '</pre>';	

		$arrFile = explode(PHP_EOL, file_get_contents('alunos.txt'));
		print_r($arrFile);
		echo '<hr>';
		foreach ($arrFile as $key => $value) {
			$alunos[] = json_decode($value, true);
		}
	}
}

// faz os calculos
foreach ($alunos as $aluno) {
	# aprovado | reprovado | recuperacao
	if ((($aluno['nota1'] + $aluno['nota2']) / 2) >= 6 ) {
		$aprovados[] = $aluno;
	} elseif ((($aluno['nota1'] + $aluno['nota2']) / 2) < 4) {
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

