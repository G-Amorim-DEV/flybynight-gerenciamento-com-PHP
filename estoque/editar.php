<?php
require_once "../src/lojas_produtos_crud.php";

$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

$loja_produto = buscar_loja_produto_por_ids($conexao, $loja_id, $produto_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estoque = $_POST['estoque'];

    atualizar_loja_produto($conexao, $estoque, $loja_id, $produto_id);
    header("location:listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estoque</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <h1 class="titulo">Editar Estoque</h1>

    <form action="" method="post" class="form-editar">

        <input type="hidden" name="loja_id" value="<?= $loja_id ?>">
        <input type="hidden" name="produto_id" value="<?= $produto_id ?>">

        <div class="form-grupo">
            <label for="estoque" class="form-label">Estoque:</label>
            <input 
                type="number" 
                name="estoque" 
                id="estoque" 
                class="form-input" 
                value="<?= htmlspecialchars($loja_produto['estoque']) ?>" 
                required 
                min="0">
        </div>

        <button type="submit" class="btn btn-primario">Atualizar</button>
    </form>

    <a href="listar.php" class="link-voltar"><button>← Voltar</button></a>

</body>
</html>
