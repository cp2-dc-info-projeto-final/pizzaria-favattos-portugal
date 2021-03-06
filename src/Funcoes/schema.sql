drop database if exists favatto;
create database favatto;
use favatto;
drop table if exists usuario;
create table usuario (

    id int AUTO_INCREMENT,
    nome varchar (80),
    data_nasc date,
    email varchar (125),
    telefone varchar (11),
    cpf varchar (11),
    logi varchar (10),
    senha varchar (100),
    Rua varchar (120),
    Municipio varchar (30),
    Complemento varchar (50),
    adm boolean,
    primary key (id)
);

INSERT INTO usuario (nome,data_nasc,email,telefone,cpf,logi,senha,Rua,Municipio,Complemento,adm) VALUES
('Sigismundo','1970/08/29','sigismundo@gmail.com','123456789','49108328900','sigismundo','$2y$10$bPtdRgaMsyNYXOkrwzXI1O3F0vY7PM6kuGcQPjv26yFQnYSWR28.G','Rua dos cara barbaro','Duque de Caxias','casa',true);

INSERT INTO usuario (nome,data_nasc,email,telefone,cpf,logi,senha,Rua,Municipio,Complemento,adm) VALUES
('João Guilherme','2003/01/15','jguilhermepasco@gmail.com','123456789','02253651702','joaoG','$2y$12$qmISoEeHSWCwjCqHPR6I3.mv3i3fLLLLdJ9pnoAJ0oajRbzIVxhZe','Rua dos cara barbaro','Duque de Caxias','casa',false);

drop table if exists categoria;
CREATE TABLE categoria (
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50)
);

INSERT INTO categoria (nome) VALUES
("Pizza"),
("Hamburguer"),
("Combo"),
("Acompanhamento"),
("Bebida"),
("Complemento");

drop table if exists produto;
CREATE TABLE produto(
    id int AUTO_INCREMENT,
    nome varchar(50),
    descricao varchar (300),
    qtdd_vendida int,
    preco_normal float,
    preco_grande float,
    preco_gigante float,
    categoria int,
    imagem varchar(2048),
    estado boolean,
    primary key (id),
    foreign key (categoria) references categoria(id)
);

/*Hamburguers*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, categoria, imagem) VALUES
('Veneza', 'Pão, carne, cheddar, presunto, calabresa, bacon, alface, tomate, cebola roxa', 0, '7.99', 2,'../Imagens/veneza1.jpg'),
('Veneza duplo', 'Pão, duas carnes, dois cheddar, dois presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '12.99', 2,'../Imagens/veneza2.jpg'),
('Veneza triplo', 'Pão, três carnes, três cheddar, três presuntos, calabresa, bacon, alface, tomate, cebola roxa', 0, '17.99', 2,'../Imagens/veneza3.jpg'),
('Viana', 'Pão, carne, dois cheddar, bacon, calabresa', 0, '7.99', 2,'../Imagens/viana1.jpg'),
('Viana duplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '11.99', 2,'../Imagens/viana2.jpg'),
('Viana triplo', 'Pão, carne, duplo cheddar, carne, duplo cheddar, carne, duplo cheddar, bacon, calabresa', 0, '15.99', 2,'../Imagens/viana3.jpg');

/*Combos*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, categoria, imagem) VALUES
('Combo Veneza 1', 'Veneza + Batata frita 50g + Refrigerante 350ml + 1 sachê de molho', 0, '10.99', 3,'../Imagens/combos.jpg'),
('Combo Veneza 2', 'Veneza duplo + Batata frita 50g + Refrigerante 350ml + 2 sachês de molho', 0, '15.99', 3,'../Imagens/combod.jpg'), 
('Combo Veneza 3', '2 Veneza Duplo + Batata frita (porção) + 2 Refrigerante 350ml + 2 sachês de molho', 0, '38.99', 3,'../Imagens/combot.jpg'),
('Combo Viana 1', 'Viana + Batata frita 50g + Refrigerante 350ml + 1 sachê de molho', 0, '10.99', 3,'../Imagens/combov1.jpg'), 
('Combo Viana 2', 'Viana duplo + Batata frita 50g + Refrigerante 350ml + 2 sachês de molho', 0, '15.99', 3,'../Imagens/combov2.jpg'),
('Combo Viana 3', '2 Viana duplo + Batata frita (porção) + 2 Rfefrigerante 350ml + 2 sachês de molho', 0, '38.99', 3,'../Imagens/combov3.png');

/*Pizzas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_grande, preco_gigante, categoria, imagem) VALUES 
('Pizza Calabresa', 'Muçarela, orégano, calabresa, cebola', 3, '28.99', '38.99', 1, '../Imagens/calabresa.jpg'),
('Pizza Presunto', 'Muçarela, orégano, presunto, cebola', 0, '28.99', '38.99', 1, '../Imagens/presunto.jpg'),
('Pizza Muçarela', 'Muçarela, orégano', 0, '27.99', '37.99', 1, '../Imagens/mucarela.png'),
('Pizza Mista', 'Muçarela, orégano, calabresa, presunto, bacon, ovo, tomate, cebola', 0, '29.99', '39.99', 1, '../Imagens/mista.jpg'),
('Pizza Bacon com ovos', 'Muçarela, orégano, bacon, ovo', 2, '30.99', '40.99', 1, '../Imagens/baconovo.jpg'),
('Pizza Favatto`s Portugal', 'Muçarela, orégano, calabresa, presunto, ovo, azeitona, cebola', 0, '29.99', '39.99', 1, '../Imagens/pizzafav.jpg'),
('Pizza Salame', 'Muçarela, orégano, manjericão, queijo prato, queijo parmesão, salame', 0, '34.99', '44.99', 1,'../Imagens/salame.jpg'),
('Pizza Frango c/ catupiry', 'Muçarela, orégano, frango, catupiry', 0, '29.99', '39.99', 1,'../Imagens/francatupiry.jpg'),
('Pizza Hot dog', 'Muçarela, orégano, molho, salsicha, batata palha, azeitona', 0, '29.99', '39.99', 1,'../Imagens/hotdog.jpg'),
('Pizza Portuguesa', 'Muçarela, orégano, presunto, calabresa, cebola, ovo, azeitona', 1, '31.99', '41.99', 1,'../Imagens/portuguesa.jpg'),
('Pizza Marguerita', 'Muçarela, orégano, tomate, manjericão', 0, '28.99', '38.99', 1,'../Imagens/marguerita.jpg'),
('Pizza Banana com canela', 'Muçarela, banana, canela', 0, '26.99', '36.99', 1,'../Imagens/bananela.jpg');

/*Bordas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_grande, preco_gigante, categoria, imagem) VALUES 
('Borda de Cheddar', '', 0, '3.00', '4.00', 6,'../Imagens/imgfundo.jpg'),
('Borda de Catupiry', '', 0, '3.00', '4.00', 6,'../Imagens/imgfundo.jpg');

/*Batatas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_grande, preco_gigante, categoria, imagem) VALUES
('Batata frita', ' ', 0,'9.99', '14.99', 4,'../Imagens/batataf.jpg'),
('Batata maluca', ' ', 0, '14.99', '19.99', 4,'../Imagens/batatam.jpg');

/*Bebidas*/

INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, categoria, imagem) VALUES 
('Água sem gás', ' ', 0, '1.99', 5,'../Imagens/agua.jpg'),
('Guaracamp 285ml', ' ', 0, '1.99', 5,'../Imagens/guaracamp.jpg'),
('Coca-cola 350ml', ' ', 0, '3.99', 5,'../Imagens/coca.jpg'),
('Coca-cola 2L', ' ', 0, '8.99', 5,'../Imagens/coca2.jpg'),
('Guaraviton 500ml', ' ', 0, '3.99', 5,'../Imagens/guaraviton.jpg');


drop table if exists pedido;
CREATE TABLE pedido(
    id int AUTO_INCREMENT,
    comentario varchar (100),
    formaPag varchar(30),
    precototal float,
    diahora varchar(60),
    estado boolean,
    usuarioId int,
    primary key (id),
    foreign key (usuarioId) references usuario(id)
);

drop table if exists produtopedido;
CREATE TABLE produtopedido(
    idPedido int,
    idProduto int,
    tamanho varchar(30),
    qtd int,
    primary key (idPedido, idProduto, tamanho),
    foreign key (idPedido) references pedido(id),
    foreign key (idProduto) references produto(id)
);

INSERT INTO `pedido` (`id`, `comentario`, `formaPag`, `precototal`, `diahora`, `estado`, `usuarioId`) VALUES 
(NULL, 'nada a dizer', 'dinheiro', '35.98', '26-11-2019 20:42:53', '0', '3'),
(NULL, 'nada a dizer', 'dinheiro', '137.96‬', '26-11-2019 20:58:53', '0', '3'),
(NULL, 'tudo a dizer', 'cartao', '54.98', '26-11-2019 21:38:53', '0', '3');

INSERT INTO `produtopedido` (`idPedido`, `idProduto`, `tamanho`, `qtd`) VALUES 
('1', '3', '', '2'),
('2', '13', 'gigante', '1'),
('2', '16', 'grande', '2'),
('3', '6', '', '1'),
('3', '13', 'gigante', '1');

