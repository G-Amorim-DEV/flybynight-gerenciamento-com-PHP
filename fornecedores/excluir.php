<?php
require_once "../src/fornecedor_crud.php";

$id = $_GET['id'];
excluir_fornecedor($conexao, $id);
header("location:listar.php");
exit;
?>