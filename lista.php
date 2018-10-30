<?php

# VARIAVEIS DE CONEXÃO DO BANCO DE DADOS
$servername = "localhost"; # endereço do servidor
$username   = "root";  # usuário do banco de dados
$password   = "";  # senha do banco de dados
$dbname     = "unicesumar"; # nome do banco criado

# Função que cria a comunicação com a base de dados passando o banco criado
$conn = mysqli_connect($servername, $username, $password, $dbname);

# seleciona todos os alunos
$sql = "SELECT * FROM aluno";
# executa a query e retorna um array
$result = $conn->query($sql);

# verifica se o array possiu dados
if ($result->num_rows > 0) {
    
    echo '<a href="./cadastra.html">Cadastrar</a>';
    echo '<table border="1"';
    echo '  <tr>';
    echo '      <th>ID</th>';
    echo '      <th>Nome</th>';
    echo '      <th>Curso</th>';
    echo '      <th>Email</th>';
    echo '      <th>Ações</th>';
    echo '  </tr>';
    # intera nos dados
    while($row = $result->fetch_assoc()) {
        
        echo '  <tr>';
        echo '      <td>'. $row["id"] .'</td>';
        echo '      <td>'. $row["nome"] .'</td>';
        echo '      <td>'. $row["curso"] .'</td>';
        echo '      <td>'. $row["email"] .'</td>';
        echo '      <td><a href="./altera.php?id='. $row["id"] .'">Alterar</a> | <a href="./exclui.php?id='. $row["id"] .'">Excluir</a> </td>';
        echo '  </tr>';

    }
    
    echo '</table>';
} else {
    echo "0 Alunos Cadastrado";
}
$conn->close();

