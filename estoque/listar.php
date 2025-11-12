<?php
// Importando o arquivo de funções CRUD para lojas_produtos
require_once "../src/lojas_produtos_crud.php";

// Chama a função (passando a conexão) e recebe um array associativo com os dados
$lojas_produtos = buscar_lojas_produtos($conexao);

// Teste opcional de depuração
/*
echo "<pre>";
var_dump($lojas_produtos);
echo "</pre>";
*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos por Loja</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <h1>Produtos por Loja</h1>
    <a href="inserir.php"><button>+ Adicionar Produto a uma Loja</button></a>
    <a href="../index.php"><button>← Voltar</button></a>

    <!-- Estruturando uma tabela HTML para exibir os dados -->
    <table>
        <caption>Relação de Produtos em Lojas</caption>
        <tr>
            <th>Loja</th>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <!-- Gerando as linhas dinamicamente -->
        <?php foreach ($lojas_produtos as $lp): ?>
            <tr>
                <td><?= htmlspecialchars($lp["nome_loja"]) ?></td>
                <td><?= htmlspecialchars($lp["nome_produto"]) ?></td>
                <td><?= htmlspecialchars($lp["estoque"]) ?></td>
                <td>
                    <a href="editar.php?loja_id=<?= $lp["loja_id"] ?>&produto_id=<?= $lp["produto_id"] ?>">📝Editar</a>
                    <a class="excluir" 
                       href="excluir.php?loja_id=<?= $lp["loja_id"] ?>&produto_id=<?= $lp["produto_id"] ?>" 
                       onclick="return confirm('Tem certeza que deseja excluir este produto desta loja?');">
                       ❌Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
