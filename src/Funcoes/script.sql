create database favatto;
use favatto;
create table cliente (

    id int AUTO_INCREMENT,
    nome varchar (80),
    data_nasc date,
    email varchar (125),
    telefone varchar (11),
    cpf varchar (11),
    logi varchar (10),
    senha varchar (100),
    sexo varchar (10),
    Rua varchar (120),
    Municipio varchar (30),
    Complemento varchar (50),
    primary key (id)
);

CREATE TABLE produto(
    id int AUTO_INCREMENT,
    nome varchar(50),
    descricao varchar (300),
    qtdd_vendida int,
    preco float,
    primary key (id)
);

--Hamburguers

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Veneza', 'Pão, carne, cheddar, presunto, calabresa, bacon, alface, tomate, cebola roxa', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Veneza duplo', 'Pão, duas carnes, dois cheddar, dois presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '12.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Veneza triplo', 'Pão, três carnes, três cheddar, três presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '17.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Viana', 'Pão, carne, dois cheddar, bacon, calabresa', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Viana duplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '11.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Viana triplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '15.99');

--Combos

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Combo Veneza 1', 'Veneza + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho', 0, '10.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Combo Veneza 2', 'Veneza duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '15.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Combo Veneza 3', '2 Veneza Duplo + Batata frita (porção) + 2 Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Combo Viana 1', 'Viana + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho', 0, '10.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Combo Viana 2', 'Viana duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '15.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Combo Viana 3', '2 Viana duplo + Batata frita (porção) + 2 Rfefrigerante 350ml (Coca + 0.50 C) + 2 sachês de olho', 0, '38.99');

--Pizzas

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza CPizza alabresa grande', 'Muçarela, orégano, calabresa, cebola', 0, '28.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Calabresa gigante', 'Muçarela, orégano, calabresa, cebola', 0, '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Presunto grande', 'Muçarela, orégano, presunto, cebola', 0, '28.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Presunto gigante', 'Muçarela, orégano, presunto, cebola', 0, '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Muçarela grande', 'Muçarela, orégano', 0, '27.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Muçarela gigante', 'Muçarela, orégano', 0, '37.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Mista grande', 'Muçarela, orégano, calabresa, presunto, bacon, ovo, tomate, cebola', 0, '29.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Mista gigante', 'Muçarela, orégano, calabresa, presunto, bacon, ovo, tomate, cebola', 0, '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Bacon c/ ovos grande', 'Muçarela, orégano, bacon, ovo', 0, '30.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Bacon c/ ovos gigante', 'Muçarela, orégano, bacon, ovo', 0, '40.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Favatto`s Portugal grande', 'Muçarela, orégano, calabresa, presunto, ovo, azeitona, cebola', 0, '29.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Favatto`s Portugal gigante', 'Muçarela, orégano, calabresa, presunto, ovo, azeitona, cebola', 0, '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Salame grande', 'Muçarela, orégano, manjericão, queijo prato, queijo parmesão, salame', 0, '34.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Salame gigante', 'Muçarela, orégano,Pizza  manjericão, queijo prato, queijo parmesão, salame', 0, '44.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Frango c/ catupiry grande', 'Muçarela, orégano, frango, catupiry', 0, '29.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Frango c/ catupiry gigante', 'Muçarela, orégano, frango, catupiry', 0, '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Hot dog grande', 'Muçarela, orégano, molho, salsicha, batata palha, azeitona', 0, '29.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Hot dog gigante', 'Muçarela, orégano, molho, salsicha, batata palha, azeitona', 0, '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Portuguesa grande', 'Muçarela, orégano, presunto, calabresa, cebola, ovo, azeitona', 0, '31.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Portuguesa gigante', 'Muçarela, orégano, presunto, calabresa, cebola, ovo, azeitona', 0, '41.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Marguerita grande', 'Muçarela, orégano, tomate, manjericão', 0, '28.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Marguerita gigante', 'Muçarela, orégano, tomate, manjericão', 0, '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Banana c/ canela grande', 'Muçarela, banana, canela', 0, '26.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Pizza Banana c/ canela gigante', 'Muçarela, banana, canela', 0, '36.99');

--Bordas

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Borda grande de Cheddar', '', 0, '3.00');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Borda gigante de Cheddar', '', 0, '4.00');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Borda grande de Catupiry', '', 0, '3.00');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Borda gigante de Catupiry', '', 0, '4.00');

--Batatas

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata frita P', ' ', 0, '3.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata frita M', ' ', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata frita G', ' ', 0, '9.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata frita GG', ' ', 0, '14.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata maluca M', ' ', 0, '12.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata maluca G', ' ', 0, '14.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Batata maluca GG', ' ', 0, '19.99');

--Bebidas

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Água s/gás', ' ', 0, '1.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Guaracamp 285ml', ' ', 0, '1.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Refrigerante 350ml', '(Conferir opções, exceto coca-cola) ', 0, '3.50');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Coca-cola 350ml', ' ', 0, '3.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Refrigerante 2L', '(Conferir opções, exceto coca-cola)', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES 
('Coca-cola 2L', ' ', 0, '8.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Del Valle', '(Conferir opções de sabores)', 0, '4.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco) VALUES
('Guaraviton 500ml', ' ', 0, '3.99');

