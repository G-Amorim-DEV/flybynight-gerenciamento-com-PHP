<?php
require_once "../src/lojas_crud.php";

$id = $_GET['id'];
excluir_loja($conexao, $id);
header("location:listar.php");
exit;
?>