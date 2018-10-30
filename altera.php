<?php
# VARIAVEIS DE CONEXÃO DO BANCO DE DADOS
$servername = "localhost"; # endereço do servidor
$username   = "root";  # usuário do banco de dados
$password   = "";  # senha do banco de dados
$dbname     = "unicesumar"; # nome do banco criado


if (!isset($_GET['altera'])) {

    # Função que cria a comunicação com a base de dados passando o banco criado
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    # seleciona todos os alunos
    $id =  $_GET['id'];
    $sql = "SELECT * FROM aluno WHERE id = $id";
    # executa a query e retorna um array
    $result = $conn->query($sql);
    # transforma em array
    $row = $result->fetch_assoc();

    # exibe na tela
    echo '<p>Altera Aluno!</p>';
    echo '<form action="./altera.php?altera=true" method="POST">';
    echo 'ID:<br><input type="text" name="id" value="'.$row['id'].'" readonly><br>';
    echo 'Nome:<br><input type="text" name="nome" value="'.$row['nome'].'"><br>';
    echo 'Curso:<br><input type="text" name="curso" value="'.$row['curso'].'"><br>';
    echo 'Email:<br><input type="email" name="email" value="'.$row['email'].'"><br><br>';
    echo '<input type="submit" value="Alterar">  ';
    echo '</form> ';
}else {

    # Função que cria a comunicação com a base de dados passando o banco criado
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $id    = $_POST['id'];
    $nome  = $_POST['nome'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];

    # altera um aluno na tabela
    $sql = "UPDATE aluno SET nome='$nome', curso='$curso', email='$email' WHERE id=$id";        

    # Verifica se o registro foi alterado com sucesso
    if ($conn->query($sql) === TRUE) {
        $conn->close(); # fecha a conexão com o banco de dados
        header('Location: ./lista.php');
    } else {
        echo "Erro ao alterar um registro na tabela: " . $conn->error . "<br>";
    }
}



