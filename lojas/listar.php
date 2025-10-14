<?php 

require_once "../src/loja_crud.php"; 

$lojas = buscar_lojas($conexao);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Lojas</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <h1>Produtos</h1>
    <a href="../produtos/inserir.php">+ Nova Loja</a>
    <a href="../index.php">← Voltar</a>


    <table>
        <caption> Relação de Lojas</caption>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lojas as $loja) { 
        
        ?>

            <tr>
    
                <td> <?= $loja["nome"]; ?> </td>
            
                <td>
                    <a href="editar.php?id=<?=$loja['id']?>">📝Editar</a>
                    
                    <a class="excluir" href="excluir.php?id=<?=$loja['id']?>">❌Excluir</a>
                </td>
            </tr> 

            <?php } ?>

    </table>

    <script src="../js/confirmar_exclusao.js"></script>
</body>

</html>