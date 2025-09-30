# Referências de Comandos SQL para Modelagem Física

## Projeto: Fly By Night - Gerenciamento de Estoque

``` SQL
-- Criação do banco de dados usando UTF8
CREATE DATABASE flybynight_amorim CHARACTER SET utf8mb4;
```

``` SQL
-- Criação da tabela de Forcencedores
CREATE TABLE fornecedores(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```

``` SQL
-- Criação da tabela de produtos 
CREATE TABLE produtos(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_produto VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco_de_venda DECIMAL(10, 2) NOT NULL,
    descricao TEXT,

    -- Aqui criamos fornecedor_id como uma coluna/campo comum
    fornecedor_id INT NOT NULL,
    -- E aqui, tranformamos fornecedor_id em uma CHAVE ESTRANGEIRA
    -- que faz referêcia à CHAVE PRIMÁRIA (id) de outra tabela
    -- (fornecedores)
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);
```

``` SQL
-- Criação da tabela de lojas_produtos 
CREATE TABLE lojas_produtos(
    estoque INT NOT NULL,
    produto_id INT NOT NULL,
    loja_id INT NOT NULL, 
    -- Ao tentar excluir um produto, se este produto está sendo
    -- usado em algum registro de estoque, Não PODEMOS PERMITIR
    -- a exclusão [isso ja é padrão]
    -- Criando uma CHAVE PRIMÁRIA COMPOSTA, ou seja,
    -- baseada em mais de uma coluna/campo

    PRIMARY KEY (produto_id, loja_id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE RESTRICT,

    -- Se na tabela de loja uma loja for excluida,
    -- aqui na tabela loja_produtos TODOS os REGISTROS de estoque
    -- desta loja excluida TAMBÉM SERÃO EXCLUIDOS
     
    FOREIGN KEY (loja_id) REFERENCES lojas(id) ON DELETE CASCADE
);
```


``` SQL
-- Criação da tabela de loja
CREATE TABLE lojas(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome_loja VARCHAR(100) NOT NULL
);
```
