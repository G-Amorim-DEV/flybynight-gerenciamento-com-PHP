# Comandos CRUD para o projeto Fly By Night

#### C -> CREATE -> INSERT (INSERIR/CADASTRAR)
#### R -> READ -> SELECT (SELECIONAR/CONSULTAR/OBTER)
#### U -> UPDATE -> UPDATE -> (ATUALIZAR/MODIFICAR)
#### D -> DELETE -> DELETE -> (DELETAR/EXCLUIR)
#### SET -> Definir
#### VALUES -> Valores


# Inserindo fornecedores
```SQL
INSERT INTO fornecedores (nome) VALUES ('Eletrônicos Tabajara');

INSERT INTO fornecedores (nome) VALUES 
('Games ABCD'),
('Supermercado Tem de Tudo'),
('Livraria Demais da Conta');
```

# Inserindo produtos

```SQL
INSERT INTO produtos(nome_produto, descricao, preco_de_venda, quantidade, fornecedor_id)
VALUES(
    'Smartphone Galaxy S23',
    'Equipamento com sistema Android e câmera Full HD',
    1599.50,
    20,
    1
);
```

``` SQL
INSERT INTO produtos(nome_produto, descricao, preco_de_venda, quantidade, fornecedor_id)
VALUES(
    'TV Led',
    'Tela de 50 polegadas, resolução 4K, 4 entradas HDMI e etc e tal',
    3420,
    12,
    1
);
```

``` SQL
INSERT INTO produtos(nome_produto, descricao, preco_de_venda, quantidade, fornecedor_id)
VALUES(
    'Senhor dos Anéis: As Duas Torres',
    'Volume 2 da série de livros criados pelo autor J.R.R. Tolkien',
    80.99,
    100,
    4
);
```

# Inserindo Lojas

``` SQL
INSERT INTO lojas (nome_loja) VALUES 
('Casas Bahia'),
('Shopping Zona Leste'),
('Bazar das Coisas'),
('Americanas');
```

# Inserindo Estoque para cada loja

``` SQL
INSERT INTO lojas_produtos (produto_id, loja_id, estoque) VALUES
    (2, 4, 7), 
    (3, 4, 35),
    (2, 1, 15),
    (1, 4, 5);
```

# Atualizando registro

```SQL
UPDATE fornecedores SET nome = 'Distribuidora XYZ'
WHERE id = 3;
```

```SQL
UPDATE produtos SET preco_de_venda = 2600.77, quantidade = 15
WHERE id = 1;

UPDATE produtos SET preco_de_venda = 125 WHERE fornecedor_id = 4;

UPDATE lojas_produtos set estoque = 7 
WHERE loja_id = 4 AND produto_id = 1;
```

# Excluindo Registro

```SQL
DELETE FROM produtos WHERE id = 4;
```

# Realizando consultas para visualização de dados
```SQL
-- Contando quantos registros existem na tabela produtos
-- O * representa todas as linhas/registros
SELECT COUNT (*) FROM produtos;

-- Exibir apenas o nome, preço e quantidade dos produtos
SELECT nome_produto, preco_de_venda, quantidade FROM produtos;

-- Exibir apenas o nome, preço e quantidade dos produtos
-- que custem acima de 1000 reais 
SELECT nome_produto, preco_de_venda, quantidade FROM produtos
WHERE preco_de_venda > 1000;


--  Exibir somente o nome e a descrição dos produtos do
-- fornecedor Livraria Demais da Conta

-- Versão 1: só considera a tabela de produtos
SELECT nome_produto, descricao, fornecedor_id FROM produtos
WHERE fornecedor_id = 4;

-- Versão 2: usamos uma JUNÇÃO de tabelas (produtos e fornecedores)
-- O objetivo é conseguir trazer/ebibir TAMBÉM o nome de FORNECEDOR
SELECT 

-- nome das tabelas correspondente precedidos do nome das colunas/campos
    produtos.nome_produto, 
    produtos.descricao, 
    produtos.fornecedor_id,
    fornecedores.nome

-- indicando as tabelas que serão "interligadas/juntadas/combinadas/relacionas"
FROM produtos JOIN fornecedores

-- Regra de junção baseada nas chaves (estrangeira e primária)
ON produtos.fornecedor_id = fornecedores.id

-- condição para consulta (produtos do fornecedor Livraria)
WHERE produtos.fornecedor_id = 4; -- ou fornecedor.id = 4
```