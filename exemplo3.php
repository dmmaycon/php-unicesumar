<?php

/**
 * Exemplo 4 como interagir com o usuário no PHP
 * $_POST e $_GET
 */

echo 'Como interagir como usuario no PHP? <br>';

echo '<h1>Qual o seu nome? [pergunta classica de todo programador ao criar algum algoritomo simples!]</h1>';
echo '&nbsp; Mude sua URL para localhost/exemplo3.php?nome=SeuNome e de um F5 na pagina!';

# Tudo que é passada após ? na url é armazenado na super global  $_GET
if (isset($_GET['nome'])){
    echo '<h1> Olá ' . $_GET['nome'] .'</h1>';
}

# Para casos onde a informção não pode ser mostrada na URL como uma senha utilizamos o $_POST
# um exemplo de uso do $_POST é o um formulario enviar para dados para o servidor
# rode o arquivo exemplo3.html no navegador

echo '<hr>';
if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        echo  $key . ' &nbsp;' . $value . '<br>';
    }
}
