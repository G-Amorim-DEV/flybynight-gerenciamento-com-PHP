<?php

// src/produto_crud.php


require_once "../conecta.php";

    function buscarProdutos($conexao) {
        $sql = "SELECT produtos.id, produtos.nome, produtos.quantidade, fornecedores.nome
            FROM produtos
            JOIN fornecedores ON fornecedores.id = produtos.fornecedor_id
            ORDER BY produtos.nome";

        $consulta = $conexao->query($sql);

            return $consulta->fetchAll();
    }
?>