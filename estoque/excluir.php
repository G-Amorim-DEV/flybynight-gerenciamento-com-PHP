<?php
require_once "../src/lojas_produtos_crud.php";

// Pegamos os parâmetros da URL
$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

// Chamamos a função de exclusão
excluir_loja_produto($conexao, $loja_id, $produto_id);

// Redirecionamos de volta para a listagem
header("location:listar.php");
exit;
?>
