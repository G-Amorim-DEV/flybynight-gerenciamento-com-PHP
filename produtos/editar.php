<?php

require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

$id = $_GET['id'];

$produto = buscar_produto_por_id($conexao, $id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco']; 
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];

    atualizar_produto($conexao, $nome, $descricao, $preco, $quantidade, $fornecedor, $id);

      header("location:listar.php");

    exit;
};


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
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        </div>

        <div class="form-grupo">
            <label for="nome" class="form-label">Nome:</label>
            <input value="<?= $produto['nome_produto'] ?>" type="text" name="nome" id="nome" class="form-input" required>
        </div>

        <!-- Não de enter/identação ou espaço dentro da tag textarea, pois os espaços vão aparecer se fixer isso, deixe tudo na mesma linha -->
        <div class="form-grupo">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea  name="descricao" id="descricao" rows="4" class="form-input"><?=$produto['descricao']?></textarea>
        </div>

        <div class="form-grupo">
            <label for="preco" class="form-label">Preço:</label>
            <input value="<?= $produto['preco'] ?>" type="number" name="preco" id="preco" required min="0" step="0.01" class="form-input">
        </div>

        <div class="form-grupo">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input value="<?= $produto['quantidade'] ?>" type="number" name="quantidade" id="quantidade" required min="0" class="form-input">
        </div>

        <div class="form-grupo">
    <label for="fornecedor" class="form-label">Fornecedor</label>
    <select name="fornecedor" id="fornecedor" class="form-input">
        
        <option value=""></option>
        
        <?php foreach ($fornecedores as $fornecedor): ?>
            <!-- Lógica da condicional abaixo é:
             Se o ID do fornecedor aqui da lista de opções for IGUAL fornecedor do produto que escolhemos editar, então faça com que fique selecionado. Caso contrário, não faça nada. -->

            <?php 
                $fornecedor_id_atual = $fornecedor['id'];
                $id_selecionado = $produto['fornecedor_id']; 
                $selecionado = ($fornecedor_id_atual == $id_selecionado) ? 'selected' : '';
            ?>
            
            <option value="<?= $fornecedor['id'] ?>" <?= $selecionado ?>>
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