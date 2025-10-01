<?php

require_once "../src/fornecedor_crud.php";

// Estamos pegando da URL o valor do parâmetro chamado id
$id = $_GET['id'];

//Chamamos a função, passando dados de conexão e o id do fornecedor a ser buscado
$fornecedor = buscar_fornecedor_por_id($conexao, $id);

/* echo "<pre>";
var_dump($fornecedor);
echo "</pre>";  */

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Então vamos pegar o valor do campo chamado nome (via atributo NAME)
    $nome = $_POST['nome'];

    // Chamamos a função, passamos os dados de conexão e o valor do nome digitado

   atualizar_fornecedor($conexao, $nome, $id);

    // Redirecionamos para a página listar.php
    header("location:listar.php");

    // sempre encerre/interrompe o script (evitando erros/execuções adicionais)
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h1 class="titulo">Editar fornecedor </h1>

    <form action="" method="post" class="form-editar">

        <!-- Sempre coloque o código/id do registro de forma oculta no formulário -->
        <input type="hidden" name="id" value="<?= $fornecedor['nome']?>">

       <div class="form-grupo">
            <label for="nome" class="form-label">Nome:</label>
            <input value="<?= $fornecedor['nome']?>" name="nome" id="nome" class="form-input" required>
       </div>

       <button type="submit" class="btn btn-primario">Atualizar</button>

    </form>

    <a href="listar.php" class="link-voltar">← Voltar</a>

</body>
</html>
