<?php


/* Verifica se $_GET['nome'] existe e não está vazio */
if (isset($_GET['nome']) &&
    !empty($_GET['nome'])
) {
    // Cria as variáveis
    $nome = $_GET['nome'];
    $telefone = $_GET['telefone'];
    $email = $_GET['email'];

    // Mostra os dados na tela
    echo $nome . '<br>';
    echo $telefone . '<br>';
    echo $email . '<br>';
}


?>