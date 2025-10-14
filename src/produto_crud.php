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



function inserir_produto($conexao, $nome, $descricao, $preco, $quantidade, $fornecedor){
    
    $sql = "INSERT INTO produtos (nome_produto, descricao, preco, quantidade, fornecedor_id) 
            VALUES(:nome, :descricao, :preco, :quantidade, :fornecedor)";
    
    $consulta = $conexao->prepare($sql);


    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":descricao", $descricao);
    $consulta->bindValue(":preco", $preco);
    $consulta->bindValue(":quantidade", $quantidade);
    $consulta->bindValue(":fornecedor", $fornecedor); 
    
    $consulta->execute();
}
?>

<?php

function buscar_produto_por_id($conexao, $id){

    $sql = " SELECT * FROM produtos WHERE id = :id ";

    $consulta = $conexao->prepare($sql); 

    $consulta->bindValue(":id", $id); 
    $consulta->execute(); 

    return $consulta->fetch(); 
}

function atualizar_produto($conexao, $nome, $descricao, $preco, $quantidade, $fornecedor_id, $id){

    $sql = "UPDATE produtos SET 
            nome_produto = :nome, 
            descricao = :descricao, 
            preco = :preco, 
            quantidade = :quantidade,
            fornecedor_id = :fornecedor_id
            WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":nome", $nome); 
    $consulta->bindValue(":descricao", $descricao); 
    $consulta->bindValue(":preco", $preco); 
    $consulta->bindValue(":quantidade", $quantidade); 
    $consulta->bindValue(":fornecedor_id", $fornecedor_id); 
    $consulta->bindValue(":id", $id); 
    
    $consulta->execute();
}