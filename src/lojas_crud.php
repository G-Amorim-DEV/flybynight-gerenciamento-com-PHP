<?php

require_once "../conecta.php";

function buscar_lojas($conexao){
    $sql = "SELECT * FROM lojas ORDER BY nome";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

function inserir_lojas($conexao, $nome){

    $sql = "INSERT INTO lojas (nome) VALUES(:nome)";

    $consulta = $conexao -> prepare($sql);

    $consulta -> bindValue(":nome", $nome);

    $consulta -> execute();

}

function buscar_loja_por_id($conexao, $id){
  $sql = "SELECT * FROM lojas WHERE id = :id";

  $consulta = $conexao -> prepare($sql);

  $consulta -> bindValue(":id", $id);

  $consulta -> execute();

  return $consulta -> fetch();

}

function atualizar_loja($conexao, $nome, $id){

    $sql = "UPDATE lojas SET nome = :nome WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":nome", $nome); 
    $consulta->bindValue(":id", $id); 
    
    $consulta->execute();
}

function excluir_loja($conexao, $id){

    $sql = "DELETE FROM lojas WHERE id = :id";

    $consulta = $conexao->prepare($sql); 

    $consulta->bindValue(":id", $id); 

    $consulta->execute();
}

?>