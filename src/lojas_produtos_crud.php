<?php
// Acessando o script de conexão ao BD
require_once "../conecta.php";

/* ============================================================
   FUNÇÕES CRUD PARA A TABELA lojas_produtos
   ============================================================ */

/**
 * Retorna todos os registros da tabela lojas_produtos,
 * com JOIN para mostrar também o nome da loja e do produto.
 */
function buscar_lojas_produtos($conexao) {
    $sql = "
        SELECT lp.*, 
               l.nome AS nome_loja, 
               p.nome_produto AS nome_produto
        FROM lojas_produtos lp
        JOIN lojas l ON lp.loja_id = l.id
        JOIN produtos p ON lp.produto_id = p.id
        ORDER BY l.nome, p.nome_produto
    ";

    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}

/**
 * Insere um novo registro na tabela lojas_produtos
 */
function inserir_loja_produto($conexao, $loja_id, $produto_id, $estoque) {
    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque)
            VALUES (:loja_id, :produto_id, :estoque)";
    
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->bindValue(":estoque", $estoque);
    $consulta->execute();
}

/**
 * Busca um registro específico de lojas_produtos
 * com base em loja_id e produto_id
 */
function buscar_loja_produto_por_ids($conexao, $loja_id, $produto_id) {
    $sql = "SELECT * FROM lojas_produtos 
            WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();

    return $consulta->fetch();
}

/**
 * Atualiza o estoque de um produto em uma loja específica
 */
function atualizar_loja_produto($conexao, $estoque, $loja_id, $produto_id) {
    $sql = "UPDATE lojas_produtos 
            SET estoque = :estoque 
            WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":estoque", $estoque);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();
}

/**
 * Exclui um produto específico de uma loja
 */
function excluir_loja_produto($conexao, $loja_id, $produto_id) {
    $sql = "DELETE FROM lojas_produtos 
            WHERE loja_id = :loja_id AND produto_id = :produto_id";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->execute();
}
?>
