<?php
require_once "../src/produto_crud.php";

$id = $_GET['id'];
excluir_produto($conexao, $id);
header("location:listar.php");
exit;
?>