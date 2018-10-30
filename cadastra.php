<?php

# se não foi enviado nada no post
if (!isset($_POST)) {
    die('Não foi recebidos dados para cadastrar!');
}

# VARIAVEIS DE CONEXÃO DO BANCO DE DADOS
$servername = "localhost"; # endereço do servidor
$username   = "root";  # usuário do banco de dados
$password   = "";  # senha do banco de dados
$dbname     = "unicesumar"; # nome do banco criado

# Função que cria a comunicação com a base de dados passando o banco criado
$conn = mysqli_connect($servername, $username, $password, $dbname);

$nome  = $_POST['nome'];
$curso = $_POST['curso'];
$email = $_POST['email'];

# Insere um aluno na tabela
$sql = "INSERT INTO aluno (nome, curso, email)
        VALUES ('$nome', '$curso', '$email');";

# Verifica se o registro foi inserido com sucesso
if ($conn->query($sql) === TRUE) {
    $conn->close(); # fecha a conexão com o banco de dados
    header('Location: ./lista.php');
} else {
    echo "Erro ao inserir um registro na tabela: " . $conn->error . "<br>";
}

