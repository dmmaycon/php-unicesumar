<?php
/**
 * Autor: Maycon de Moraes
 * Exemplo de integração de PHP com Banco de Dados para a semana do PHP
 */

# VARIAVEIS DE CONEXÃO DO BANCO DE DADOS
$servername = "localhost"; # endereço do servidor
$username   = "root";  # usuário do banco de dados
$password   = "";  # senha do banco de dados
$dbname     = "unicesumar"; # nome do banco criado

# Função que cria a comunicação com a base de dados
$conn = mysqli_connect($servername, $username, $password);

# Verifica se houve erro ao conectar com o banco de dados
if (!$conn) {
    die("Conexão com o banco de dados não funcionou! <br>" . mysqli_connect_error());
}
echo "Conexão realizada com sucesso! <br>";



# Cria a base de dados unicesumar
$sql = "CREATE DATABASE IF NOT EXISTS unicesumar;"; 

# Valida se o banco foi criado
if ($conn->query($sql) === TRUE) {
    echo "Banco dados Unicesumar criado!<br>";
} else {
    echo "Erro ao criar o banco unicesumar: " . $conn->error . "<br>";
}

$conn->close(); # fecha a conexão com o banco de dados


# Função que cria a comunicação com a base de dados passando o banco criado
$conn = mysqli_connect($servername, $username, $password, $dbname);


# SQL para criar a tabela aluno
$sql = "CREATE TABLE IF NOT EXISTS aluno (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(50) NOT NULL,
    curso VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
)";        
    
# Valida se o comando de criar a tabela foi executado
if ($conn->query($sql) === TRUE) {
    echo "Tabela aluno foi criada <br>";
} else {
    echo "Erro ao criar a tabela aluno: " . $conn->error . "<br>";
}    


# Insere um aluno na tabela
$sql = "INSERT INTO aluno (nome, curso, email)
        VALUES ('Maria do Rosario', 'Analise de Sistema', 'mr@email.com');";

# Verifica se o registro foi inserido com sucesso
if ($conn->query($sql) === TRUE) {
    echo "Registro inserido <br>";
} else {
    echo "Erro ao inserir um registro na tabela: " . $conn->error . "<br>";
} 

$conn->close(); # fecha a conexão com o banco de dados

echo '<a href="./lista.php" >Ir para o CRUD</a>';