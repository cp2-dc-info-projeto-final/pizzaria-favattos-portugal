# PROJETO: Favatto's Portugal
## Projeto Final do Curso Técnico em Desenvolvimento de Sistemas do Colégio Pedro II – Campus Duque de Caxias – 2019

## Integrantes:

  - Caio dos Santos Nunes Sena Castro
  - Eric Cabral de Oliveira
  - João Guilherme de Souza Pasco
  - Verônica Cristina Pereira Alvarenga de Souza

## Sumário

- [Proposta](proposta.md)
- [Casos de Uso](casosDeUso.md)
- [Modelagem](CasosDeUso.png)
- [Manual]()

## Proposta de TCC - Trabalho de Conclusão de Curso

#### Descrição da Proposta
O projeto consiste em sistematizar o atendimento da pizzaria Favatto's Portugal, buscando agilizar e facilitar o trabalho no estabelecimento.

#### Stakeholder(s)
- Nome: Anderson dos Santos Favatto Portugal;
- Profissão: Gerente;
- Cargo: Gerente da Favatto's Portugal;

#### Requisitos
[Especificação de Requisitos](https://github.com/cp2-dc-info-projeto-final/pizzaria-favattos-portugal/blob/master/requisitos.md)

#### Objetivos
- Otimização do tempo ao facilitar o trabalho dos funcionários através de uma maior acessibilidade e praticidade; 
- Facilitar a organização econômica e dos pedidos do estabelecimento.

#### Funcionalidades
Organização dos produtos e seus preços e armazenamento dos pedidos ao longo do expediente, para por fim gerar o total obtido naquele dia, e incluir dia após dia um somatório para que o admin veja o total gerado na semana ou num mês, mostrando ao admin qual semana e/ou mês foi mais ou menos efetiva; Cadastro pelo site ou opção de entrar pelo facebook; O sistema registrará informações referentes a clientes, funcionários, produtos, vendas, compras e pagamentos, e com base nessas informações, o sistema deve gerar informações estatísticas como o produto mais vendido, clientes mais féis, dia/horário de maior venda, % de lucro ( o admin entrará com o total gastos em produto e adicionará o total obtido gerado), sugerir promoções com base nas estatísticas ( como um alerta de baixo rendimento em determinado produto, horário ou dia), haverá um chat de comunicação entre funcionário e cliente, um limite de localidade e um sistema de avaliação de até 5 estrelas e caso o cliente queira, adicionar um comentário.

### Requisitos

#### Requisitos do Sistema

##### Sumário

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

#### Requisitos Funcionais 

##### RF 01

O software deve ser capaz de cadastrar usuários, a partir de dados como: nome completo, CPF, endereço, e-mail e nome de usuário.

##### RF 02

O software deverá gerar estatísticas que devem mostrar o lucro, produto mais vendido, produto menos vendido e sugerir promoções.

##### RF 03

O software conterá um menu, que funcionará como um cardápio para os clientes. Sendo assim, o programa irá anotar pedidos,incluindo o preço, e enviar para o administrador, criando uma comanda virtual.

##### RF 04

As contas de administrador deverão ter acessos privados, para alteração de produtos, preços, visualizar pedidos e etc.

##### RF 05

Os dados contidos no software, como produtos, usuários e pedidos deverão ser armazenados no banco de dados.

##### RF 06

O software deverá conter um controle de estoque, que apontará os gastos de um determinado período de tempo.

##### RF 07

O software deverá utilizar um sistema de mapa (como o Google) e mostrar rotas até os endereços selecionados.

#### Requisitos Não Funcionais

##### RNF 01  

Os dados dos usuários devem ser privados, em relação aos outros usuários. Somente o administrador terá acesso a todas as informações.

##### RNF 02

O software deverá ter capacidade de aguentar vários acessos simultâneos.

##### RNF 03

O software deverá ter capacidade de aguentar vários cadastros simultâneos.

##### RNF 04

Em caso de falhas inesperadas ou erros fatais, o software deve ser desligado e reiniciado.

##### RNF 05

O Sistema web terá portabilidade para celular, se adaptando nos diferentes dispositivos.

##### RNF 06

O Sistema deverá mostrar mensagens, em casos de erro em login ou cadastros.

##### RNF 07

Com uma semana de treinamento, o administrador deveu ser capaz de utilizar todo o software. E no caso de usuários normais, o sistema será intuitivo para que em uma hora já se saiba como utilizar as principais funções.

##### RNF 08

O software deverá efetuar logins, cadastros e outros processos em menos de 5 segundos.

##### RNF 09

Para o administrador, o sistema deve ficar acessível a qualquer hora do dia.



