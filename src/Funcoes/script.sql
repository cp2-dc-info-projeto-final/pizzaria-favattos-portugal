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
    preco_normal float,
    preco_medio float,
    preco_gigante float,
    preco_gg float,
    primary key (id)
);

/*Hamburguers*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Veneza', 'Pão, carne, cheddar, presunto, calabresa, bacon, alface, tomate, cebola roxa', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Veneza duplo', 'Pão, duas carnes, dois cheddar, dois presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '12.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Veneza triplo', 'Pão, três carnes, três cheddar, três presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '17.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Viana', 'Pão, carne, dois cheddar, bacon, calabresa', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Viana duplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '11.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Viana triplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '15.99');

/*Combos*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Combo Veneza 1', 'Veneza + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho', 0, '10.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Combo Veneza 2', 'Veneza duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '15.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Combo Veneza 3', '2 Veneza Duplo + Batata frita (porção) + 2 Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Combo Viana 1', 'Viana + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho', 0, '10.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Combo Viana 2', 'Viana duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '15.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Combo Viana 3', '2 Viana duplo + Batata frita (porção) + 2 Rfefrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho', 0, '38.99');

/*Pizzas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Calabresa', 'Muçarela, orégano, calabresa, cebola', 0, '28.99', '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Presunto', 'Muçarela, orégano, presunto, cebola', 0, '28.99', '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Muçarela', 'Muçarela, orégano', 0, '27.99', '37.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Mista', 'Muçarela, orégano, calabresa, presunto, bacon, ovo, tomate, cebola', 0, '29.99', '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Bacon com ovos', 'Muçarela, orégano, bacon, ovo', 0, '30.99', '40.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Favatto`s Portugal', 'Muçarela, orégano, calabresa, presunto, ovo, azeitona, cebola', 0, '29.99', '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Salame', 'Muçarela, orégano, manjericão, queijo prato, queijo parmesão, salame', 0, '34.99', '44.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Frango c/ catupiry', 'Muçarela, orégano, frango, catupiry', 0, '29.99', '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Hot dog', 'Muçarela, orégano, molho, salsicha, batata palha, azeitona', 0, '29.99', '39.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Portuguesa', 'Muçarela, orégano, presunto, calabresa, cebola, ovo, azeitona', 0, '31.99', '41.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Marguerita', 'Muçarela, orégano, tomate, manjericão', 0, '28.99', '38.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Pizza Banana com canela', 'Muçarela, banana, canela', 0, '26.99', '36.99');

/*Bordas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Borda de Cheddar', '', 0, '3.00', '4.00');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_gigante) VALUES 
('Borda de Catupiry', '', 0, '3.00', '4.00');

/*Batatas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_medio, preco_gigante, preco_gg) VALUES
('Batata frita', ' ', 0, '3.99', '7.99', '9.99', '14.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_medio, preco_gigante, preco_gg) VALUES
('Batata maluca', ' ', 0, '12.99', '14.99', '19.99');

/*Bebidas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Água sem gás', ' ', 0, '1.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Guaracamp 285ml', ' ', 0, '1.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Refrigerante 350ml', '(Conferir opções, exceto coca-cola) ', 0, '3.50');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Coca-cola 350ml', ' ', 0, '3.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Refrigerante 2L', '(Conferir opções, exceto coca-cola)', 0, '7.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES 
('Coca-cola 2L', ' ', 0, '8.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Del Valle', '(Conferir opções de sabores)', 0, '4.99');

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal) VALUES
('Guaraviton 500ml', ' ', 0, '3.99');

