<?php
 
require_once "../src/loja_crud.php"; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nome = $_POST['nome'];

    inserir_lojas($conexao, $nome);

    header("location:listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir produto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h1 class="titulo">Adicionando um novo produto</h1> 
    
    <form action="" method="post" class="form-editar"> 

        <div class="form-grupo"> 
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-input" required>
        </div>

        <button type="submit" class="btn btn-primario">Salvar</button>

    </form>

    <a href="listar.php" class="link-voltar">← Voltar</a> </body>
</html>