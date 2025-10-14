<?php

require_once "../src/fornecedor_crud.php";

$fornecedores = buscar_fornecedores($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h1 class="titulo">Editar produto </h1>

    <form action="" method="post" class="form-editar">

        <div class="form-grupo">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-input" required>
        </div>

        <div class="form-grupo">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="4" class="form-input"></textarea>
        </div>

        <div class="form-grupo">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" name="preco" id="preco" required min="0" step="0.01" class="form-input">
        </div>

        <div class="form-grupo">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" required min="0" class="form-input">
        </div>

        <div class="form-grupo">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <select name="fornecedor" id="fornecedor" class="form-input">
                <option value=""></option>
                <!-- Sempre mantenha um option vazio.
                    É o usuario que deve vir aqui escolher -->
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?= $fornecedor['id'] ?>">
                        <?= $fornecedor['nome'] ?>
                    </option>
                <?php endforeach ?>

            </select>
        </div>

        <button type="submit" class="btn btn-primario">Atualizar</button>

    </form>

    <a href="listar.php" class="link-voltar">← Voltar</a>

</body>

</html>