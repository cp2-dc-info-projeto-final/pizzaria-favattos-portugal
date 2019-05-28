# Especificação de Casos de Uso

# Sumário
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

# Descrição
## CDU 01 - Cadastro de usuários
**Atores:** Clientes e Funcionários

**Fluxo Principal:**

1. Usuário informa o nome, telefone, e-mail, qual será o login utilizado e a senha.

2. O Sistema fará a verificação dos dados fornecidos  e  cadastrará um novo cliente normal. Os funcionários criarão a conta como clientes normais porém receberão permissão de admin. 

**Fluxo Alternativo:**

1. Usuário informa o nome, telefone, e-mail, qual será o login utilizado e a senha.

2. Após a verificação do sistema, caso os dados fornecidos não corresponderem ao campo preenchido ou  e-mail já cadastrado, uma mensagem de erro será exibida na tela ou abaixo do campo errado.

## CDU 02 - Login 

**Atores:** Clientes e Funcionários 

**Fluxo Principal:**

1. O cliente informa ou o e-mail e a senha, ou o login e a senha. Caso os dados sejam confirmados como cadastrados, o cliente poderá começar a navegar. 

2. O cliente será levado para a pagina inicial do software. No caso do funcionário, ele será redirecionado à uma página diferente da do cliente, caso tenha permissão de admin confirmada pelo sistema. 

**Fluxo Alternativo:**
1. No caso de o usuário esquecer sua senha, haverá um botão "esqueceu a senha?". 

2. O usuário será levado para uma página de recuperação através do e-mail cadastrado.

## CDU 03 - Gerenciamento de cadastro 

**Atores:** Funcionários
 
**Fluxo Principal:** 
1. O sistema disponibiliza as informações dos clientes (com exceção da senha) para visualização. 

2. Um funcionário ( conta com permissão de admin) poderá dar permissão de admin a outros funcionários. O funcionário poderá alterar a situação da venda.

## CDU 04 - Listagem dos Alimentos 

**Atores:** Clientes e Funcionários 

**Fluxo principal:** 

1. No caso dos clientes, ao clicar na aba Alimentos, os clientes serão direcionados à uma página com os alimentos e seus preços, e também farão seu pedido por essa página. 

2. No caso do funcionário, será direcionado à mesma página porém com possibilidade de alteração/inclusão/exclusão dos alimentos e preços.

## CDU 05 - Situação do pedido 

**Atores:** Clientes e Funcionários 

**Fluxo Principal:** 
1. No caso dos clientes, após fazer o pedido, haverá uma página de atualização sobre a situação do pedido: se foi confirmado pela pizzaria, se já está sendo feito e se já saiu para entrega. 

2. No caso do funcionário, ele será o responsável por alterar a situação do pedido.

## CDU 06 - Gerenciamento do preço dos produtos 

**Atores:** Funcionários 

**Fluxo Principal:**

1. O sistema disponibilizará uma permissão exclusiva para os admins para poderem alterar produtos. 

2. Os funcionários serão responsáveis pela publicação dos produtos disponíveis e seus respectivos preços, e terão a possibilidade de alterar, incluir ou excluir produtos e preços, e divulgação de promoções.

## CDU 07 - Gerenciamento da venda dos produtos 

**Atores:** Funcionários 

**Fluxo Principal:**

1. O sistema disponibilizará uma permissão exclusiva para os admins para poderem alterar os produtos. 


2. Os funcionários receberão dados sobre os produtos vendidos e a soma de dinheiro total obtido na venda destes produtos diariamente, semanalmente serão somados os produtos e o dinheiro obtido naquela semana, e também mensalmente.

## CDU 08 - Avaliação da loja

**Atores:** Clientes 

**Fluxo Principal:** 

1. O sistema disponibilizará uma parte de avaliação (rating) da loja após o produto ser entregue

2. O cliente avaliará a loja através da parte de avaliação disponibilizada pelo sistema

## CDU 09 - Dados pessoais

**Atores:** Clientes

**Fluxo Principal:** 

1. O Sistema disponibilizará uma página para alteração de dados pessoais, na qual o cliente precisará disponibilizar os antigos e os novos dados que deseja.

## CDU 10 - Acesso ao histórico de vendas

**Atores:** Funcionários e Clientes

**Fluxo Principal:** 

1. Os funcionários poderão acessar o histórico de vendas realizadas.

2. Os clientes poderão acessar cada um o seu histórico de compras.