<?php

/* Neste arquivo teremos todas as funções que serão usadas para a manipulação (CRUD) de Fornecedores em nosso sistema e banco de dados. */

// Acessando o script de conexão ao BD
require_once "..//conecta.php";

/* Retornará um array associativo com os fornecedores */
function buscar_fornecedores($conexao){
    // Montamos o comando SQL para consulta
    $sql = "SELECT * FROM fornecedores ORDER BY nome";

    // Execultamos o comando e guardamos o resultado da consulta
    $consulta = $conexao->query($sql);

    //Retornamos o resultado em formato de array associativo
    return $consulta->fetchAll();
}


// Recebendo o nome de um novo fornecedor e insedir no BD
function inserir_fornecedor($conexao, $nome){
    /* Montando o comando SQL de INSERT e aplicando um "named parameter (parâmetro nomeado)*. Um parâmetro nomeado nada mais pe do que reservar um espaço para atribuir um valor ao comando.*/
    $sql = "INSERT INTO fornecedores (nome) VALUES(:nome)";

    // Prepare o camando acima ANTES de executar no BD
    $consulta = $conexao->prepare($sql);

    // Anexar/atrelar/ colocar um valor
    $consulta->bindValue(":nome", $nome);

    // Executamos a consulta com o comando e o valor
    $consulta->execute();
}


// Recebendo o Id do fornecedor a ser carregado (e depois atualizado)
function buscar_fornecedor_por_id($conexao, $id){

    $sql = " SELECT * FROM fornecedores WHERE id = :id ";

    $consulta = $conexao->prepare($sql); // prepare: coloca o comando sql em memoria

    $consulta->bindValue(":id", $id); // bindValue: liga o valor ao parâmetro (:id)

    $consulta->execute(); // roda a consulta a query/consulta no banco

    return $consulta->fetch(); // retorna o resultado da consulta como um array (vetor)
}

?>
