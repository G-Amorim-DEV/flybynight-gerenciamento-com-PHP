<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <h1>Produtos</h1>
    <a href="../fornecedores/inserir.php">+ Novo Produtos</a>
    <a href="../index.php">← Voltar</a>

    <!-- Estruturando uma tabela HTML para exibir os dados -->

    <table>
        <caption> Relação de produtos</caption>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Fornecedor</th>
            <th>Ações</th>
        </tr>

    
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>
                    <!-- LINK DINÂMICO, ou seja, a url/endereço utiliza parâmetro(s) e valor(es) dinâmico(s) -->
                    <a href="editar.php?">📝Editar</a>
                    <a class="excluir" href="excluir.php">❌Excluir</a>
				</td>
            </tr> 



    </table>

    <script src="../js/confirmar_exclusao.js"></script>
</body>

</html>