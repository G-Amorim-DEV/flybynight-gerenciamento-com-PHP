<?php
require_once "../src/lojas_produtos_crud.php";

// Buscar as lojas e produtos
$sqlLojas = "SELECT * FROM lojas ORDER BY nome";
$lojas = $conexao->query($sqlLojas)->fetchAll();

$sqlProdutos = "SELECT * FROM produtos ORDER BY nome_produto";
$produtos = $conexao->query($sqlProdutos)->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loja_id = $_POST['loja_id'];
    $produto_id = $_POST['produto_id'];
    $estoque = $_POST['estoque'];

    inserir_loja_produto($conexao, $loja_id, $produto_id, $estoque);

    header("location:listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto à Loja</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <h1 class="titulo">Adicionar Produto à Loja</h1>

    <form action="" method="post" class="form-editar">

        <div class="form-grupo">
            <label for="loja_id" class="form-label">Loja:</label>
            <select name="loja_id" id="loja_id" class="form-input" required>
                <option value="">Selecione a loja</option>
                <?php foreach ($lojas as $loja): ?>
                    <option value="<?= $loja['id'] ?>">
                        <?= htmlspecialchars($loja['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-grupo">
            <label for="produto_id" class="form-label">Produto:</label>
            <select name="produto_id" id="produto_id" class="form-input" required>
                <option value="">Selecione o produto</option>
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?= $produto['id'] ?>">
                        <?= htmlspecialchars($produto['nome_produto']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-grupo">
            <label for="estoque" class="form-label">Estoque:</label>
            <input type="number" name="estoque" id="estoque" class="form-input" min="0" required>
        </div>

        <button type="submit" class="btn btn-primario">Salvar</button>
    </form>

    <a href="listar.php" class="link-voltar"><button>← Voltar</button></a>

</body>
</html>
