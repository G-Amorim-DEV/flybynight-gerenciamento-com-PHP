<?php
require_once "../src/loja_crud.php";

$id = $_GET['id'];
excluir_loja($conexao, $id);
header("location:listar.php");
exit;
?>