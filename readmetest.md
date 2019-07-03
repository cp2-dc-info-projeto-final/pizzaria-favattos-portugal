# PROJETO: Favatto's Portugal
## Projeto Final do Curso Técnico em Desenvolvimento de Sistemas do Colégio Pedro II – Campus Duque de Caxias – 2019

## Integrantes:

  - Caio dos Santos Nunes Sena Castro
  - Eric Cabral de Oliveira
  - João Guilherme de Souza Pasco
  - Verônica Cristina Pereira Alvarenga de Souza

## Sumário

1. [Proposta](proposta.md)
2. [Requisitos](requisitos.md)<br  />
 a. [Entrevista - áudio](entrevista.mp3)<br  />
 b. [Entrevista - documento](entrevista.md)
3. [Casos de Uso](casosDeUso.md)
4. [Modelagem](CasosDeUso.png)
5. [Manual]()

# Proposta de TCC - Trabalho de Conclusão de Curso

## Proposta

### Descrição da Proposta
O projeto consiste em sistematizar o atendimento da pizzaria Favatto's Portugal, buscando agilizar e facilitar o trabalho no estabelecimento.

### Stakeholder(s)
- Nome: Anderson dos Santos Favatto Portugal;
- Profissão: Gerente;
- Cargo: Gerente da Favatto's Portugal;

### Objetivos
- Otimização do tempo ao facilitar o trabalho dos funcionários através de uma maior acessibilidade e praticidade; 
- Facilitar a organização econômica e dos pedidos do estabelecimento.

### Funcionalidades
Organização dos produtos e seus preços e armazenamento dos pedidos ao longo do expediente, para por fim gerar o total obtido naquele dia, e incluir dia após dia um somatório para que o admin veja o total gerado na semana ou num mês, mostrando ao admin qual semana e/ou mês foi mais ou menos efetiva; Cadastro pelo site ou opção de entrar pelo facebook; O sistema registrará informações referentes a clientes, funcionários, produtos, vendas, compras e pagamentos, e com base nessas informações, o sistema deve gerar informações estatísticas como o produto mais vendido, clientes mais féis, dia/horário de maior venda, % de lucro ( o admin entrará com o total gastos em produto e adicionará o total obtido gerado), sugerir promoções com base nas estatísticas ( como um alerta de baixo rendimento em determinado produto, horário ou dia), haverá um chat de comunicação entre funcionário e cliente, um limite de localidade e um sistema de avaliação de até 5 estrelas e caso o cliente queira, adicionar um comentário.

## Requisitos

## Requisitos do Sistema

### Sumário

- [Requisistos Funcionais](#requisitos-funcionais)

    * [RF 01](#rf-01)
    * [RF 02](#rf-02)
    * [RF 03](#rf-03)
    * [RF 04](#rf-04)
    * [RF 05](#rf-05)
    * [RF 06](#rf-06)
    * [RF 07](#rf-07)

- [Requisitos Não Funcionais](#requisitos-não-funcionais)

    * [RNF 01](#rnf-01)
    * [RNF 02](#rnf-02)
    * [RNF 02](#rnf-02)
    * [RNF 03](#rnf-03)
    * [RNF 04](#rnf-04)
    * [RNF 05](#rnf-05)
    * [RNF 06](#rnf-06)
    * [RNF 07](#rnf-07)
    * [RNF 08](#rnf-08)
    * [RNF 09](#rnf-09)

## Requisitos Funcionais 

### RF 01

O software deve ser capaz de cadastrar usuários, a partir de dados como: nome completo, CPF, endereço, e-mail e nome de usuário.

### RF 02

O software deverá gerar estatísticas que devem mostrar o lucro, produto mais vendido, produto menos vendido e sugerir promoções.

### RF 03

O software conterá um menu, que funcionará como um cardápio para os clientes. Sendo assim, o programa irá anotar pedidos,incluindo o preço, e enviar para o administrador, criando uma comanda virtual.

### RF 04

As contas de administrador deverão ter acessos privados, para alteração de produtos, preços, visualizar pedidos e etc.

### RF 05

Os dados contidos no software, como produtos, usuários e pedidos deverão ser armazenados no banco de dados.

### RF 06

O software deverá conter um controle de estoque, que apontará os gastos de um determinado período de tempo.

### RF 07

O software deverá utilizar um sistema de mapa (como o Google) e mostrar rotas até os endereços selecionados.

## Requisitos Não Funcionais

### RNF 01  

Os dados dos usuários devem ser privados, em relação aos outros usuários. Somente o administrador terá acesso a todas as informações.

### RNF 02

O software deverá ter capacidade de aguentar vários acessos simultâneos.

### RNF 03

O software deverá ter capacidade de aguentar vários cadastros simultâneos.

### RNF 04

Em caso de falhas inesperadas ou erros fatais, o software deve ser desligado e reiniciado.

### RNF 05

O Sistema web terá portabilidade para celular, se adaptando nos diferentes dispositivos.

### RNF 06

O Sistema deverá mostrar mensagens, em casos de erro em login ou cadastros.

### RNF 07

Com uma semana de treinamento, o administrador deveu ser capaz de utilizar todo o software. E no caso de usuários normais, o sistema será intuitivo para que em uma hora já se saiba como utilizar as principais funções.

### RNF 08

O software deverá efetuar logins, cadastros e outros processos em menos de 5 segundos.

### RNF 09

Para o administrador, o sistema deve ficar acessível a qualquer hora do dia.

## Casos de Uso

## Sumário
- [CDU 01 - Cadastro de usuários](#cdu-01---cadastro-de-usuários)
- [CDU 02 - Login](#cdu-02---login)
- [CDU 03 - Gerenciamento de cadastro](#cdu-03---gerenciamento-de-cadastro)
- [CDU 04 - Listagem dos Alimentos](#cdu-04---listagem-dos-alimentos)
- [CDU 05 - Situação do pedido](#cdu-05---situação-do-pedido)
- [CDU 06 - Gerenciamento do preço dos produtos](#cdu-06---gerenciamento-do-preço-dos-produtos)
- [CDU 07 - Gerenciamento da venda dos produtos](#cdu-07---gerenciamento-da-venda-dos-produtos)
- [CDU 08 - Avaliação da loja](#cdu-08---avaliação-da-loja)
- [CDU 09 - Dados pessoais](#cdu-09---dados-pessoais)
- [CDU 10 - Acesso ao histórico de vendas](#cdu-10---acesso-ao-histórico-de-vendas)

## Descrição
### CDU 01 - Cadastro de usuários
**Atores:** Clientes e Funcionários

**Fluxo Principal:**

1. Usuário informa o nome, telefone, e-mail, qual será o login utilizado e a senha.

2. O Sistema fará a verificação dos dados fornecidos  e  cadastrará um novo cliente normal. Os funcionários criarão a conta como clientes normais porém receberão permissão de admin. 

**Fluxo Alternativo:**

1. Usuário informa o nome, telefone, e-mail, qual será o login utilizado e a senha.

2. Após a verificação do sistema, caso os dados fornecidos não corresponderem ao campo preenchido ou  e-mail já cadastrado, uma mensagem de erro será exibida na tela ou abaixo do campo errado.

### CDU 02 - Login 

**Atores:** Clientes e Funcionários 

**Fluxo Principal:**

1. O cliente informa ou o e-mail e a senha, ou o login e a senha. Caso os dados sejam confirmados como cadastrados, o cliente poderá começar a navegar. 

2. O cliente será levado para a pagina inicial do software. No caso do funcionário, ele será redirecionado à uma página diferente da do cliente, caso tenha permissão de admin confirmada pelo sistema. 

**Fluxo Alternativo:**
1. No caso de o usuário esquecer sua senha, haverá um botão "esqueceu a senha?". 

2. O usuário será levado para uma página de recuperação através do e-mail cadastrado.

### CDU 03 - Gerenciamento de cadastro 

**Atores:** Funcionários
 
**Fluxo Principal:** 
1. O sistema disponibiliza as informações dos clientes (com exceção da senha) para visualização. 

2. Um funcionário ( conta com permissão de admin) poderá dar permissão de admin a outros funcionários. O funcionário poderá alterar a situação da venda.

### CDU 04 - Listagem dos Alimentos 

**Atores:** Clientes e Funcionários 

**Fluxo principal:** 

1. No caso dos clientes, ao clicar na aba Alimentos, os clientes serão direcionados à uma página com os alimentos e seus preços, e também farão seu pedido por essa página. 

2. No caso do funcionário, será direcionado à mesma página porém com possibilidade de alteração/inclusão/exclusão dos alimentos e preços.

### CDU 05 - Situação do pedido 

**Atores:** Clientes e Funcionários 

**Fluxo Principal:** 
1. No caso dos clientes, após fazer o pedido, haverá uma página de atualização sobre a situação do pedido: se foi confirmado pela pizzaria, se já está sendo feito e se já saiu para entrega. 

2. No caso do funcionário, ele será o responsável por alterar a situação do pedido.

### CDU 06 - Gerenciamento do preço dos produtos 

**Atores:** Funcionários 

**Fluxo Principal:**

1. O sistema disponibilizará uma permissão exclusiva para os admins para poderem alterar produtos. 

2. Os funcionários serão responsáveis pela publicação dos produtos disponíveis e seus respectivos preços, e terão a possibilidade de alterar, incluir ou excluir produtos e preços, e divulgação de promoções.

### CDU 07 - Gerenciamento da venda dos produtos 

**Atores:** Funcionários 

**Fluxo Principal:**

1. O sistema disponibilizará uma permissão exclusiva para os admins para poderem alterar os produtos. 


2. Os funcionários receberão dados sobre os produtos vendidos e a soma de dinheiro total obtido na venda destes produtos diariamente, semanalmente serão somados os produtos e o dinheiro obtido naquela semana, e também mensalmente.

### CDU 08 - Avaliação da loja

**Atores:** Clientes 

**Fluxo Principal:** 

1. O sistema disponibilizará uma parte de avaliação (rating) da loja após o produto ser entregue

2. O cliente avaliará a loja através da parte de avaliação disponibilizada pelo sistema

### CDU 09 - Dados pessoais

**Atores:** Clientes

**Fluxo Principal:** 

1. O Sistema disponibilizará uma página para alteração de dados pessoais, na qual o cliente precisará disponibilizar os antigos e os novos dados que deseja.

### CDU 10 - Acesso ao histórico de vendas

**Atores:** Funcionários e Clientes

**Fluxo Principal:** 

1. Os funcionários poderão acessar o histórico de vendas realizadas.

2. Os clientes poderão acessar cada um o seu histórico de compras.

## Entrevista com Stakeholder

- [Áudio da entrevista](entrevista.mp3)
- [Transcrição da entrevista](entrevista.md)

*Arquivo schema.sql contendo o script SQL para criação do banco de dados
Arquivo slides.pdf contendo os Slides da apresentação
Arquivo LICENSE contendo licenciamento MIT*

## Diagrama de Casos de Uso

![Diagrama dos Casos de Uso](https://raw.githubusercontent.com/cp2-dc-info-projeto-final/pizzaria-favattos-portugal/master/CasosDeUso.png)
