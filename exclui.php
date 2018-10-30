<?php

# VARIAVEIS DE CONEXÃO DO BANCO DE DADOS
$servername = "localhost"; # endereço do servidor
$username   = "root";  # usuário do banco de dados
$password   = "";  # senha do banco de dados
$dbname     = "unicesumar"; # nome do banco criado

# Função que cria a comunicação com a base de dados passando o banco criado
$conn = mysqli_connect($servername, $username, $password, $dbname);

$id = $_GET['id'];

# seleciona todos os alunos
$sql = "DELETE FROM aluno WHERE id = $id";
# executa a query e retorna um array
$result = $conn->query($sql);

# Valida se o comando de excluir registro
if ($conn->query($sql) === TRUE) {
    $conn->close(); # fecha a conexão com o banco de dados
    header('Location: ./lista.php');
} else {
    echo "Erro:" . $conn->error . "<br>";
}

