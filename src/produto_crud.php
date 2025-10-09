<?php

// src/produto_crud.php


require_once "../conecta.php";

    function buscar_produtos($conexao) {
    $sql = "SELECT produtos.id, produtos.nome_produto, produtos.quantidade, produtos.preco, fornecedores.nome  
    FROM produtos 
    JOIN fornecedores ON fornecedores.id = produtos.fornecedor_id
    ORDER BY produtos.nome_produto"; 

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

?>