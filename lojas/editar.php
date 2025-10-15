<?php

require_once "../src/lojas_crud.php";

$id = $_GET['id'];

$lojas = buscar_loja_por_id($conexao, $id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    
    atualizar_loja($conexao,$nome,$id);

      header("location:listar.php");

    exit;
};

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar lojas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

    <h1 class="titulo">Editar loja </h1>

    <form action="" method="post" class="form-editar">
        <div class="form-grupo">
            <input type="hidden" name="id" value="<?= $lojas['id'] ?>">
        </div>

        <div class="form-grupo">
            <label for="nome" class="form-label">Nome:</label>
            <input value="<?= $lojas['nome'] ?>" type="text" name="nome" id="nome" class="form-input" required>
        </div>

        <button type="submit" class="btn btn-primario">Atualizar</button>

    </form>

    <a href="listar.php" class="link-voltar"><button>← Voltar</button></a>

</body>

</html>