PDV

A aplicação PDV é um conjunto de módulos que permitem o cadastro e a venda de um produto hipotético.
A codificação é baseada em DAO (Data Access Object) e utiliza o design patter Singleton, de modo a minimizar o acesso múltiplo e otimizar a aplicação.
Foi seguido o padrão MVC, onde as camadas de back-end (Controller, Model) são separadas das camadas de front-end (View). Utilizei um arquivo roteador (router.php) para otimizar a aplicação junto ao Ajax (JQuery) sem a necessidade de utilizar um framework ou manipular diretamente o roteamento.

A aplicação PDV foi feita com base no layout solicitado pelo cliente.
A aplicação permite o cadastro de produtos na aba Vendas, onde:
- Necessário informar o código do produto
- Necessário (não obrigatório) informar a descrição do produto
- Necessário (não obrigatório) informar o preço do produto

No ato do cadastro, a aplicação retorna via Ajax a div atualizada dos itens cadastrados, não necessitando recarregar a página.
Para efeitos de projeto, não foram implementadas formas de remover ou editar o item.
A informação do produto é persistida em banco de dados MySql/MariaDB na tabela Produtos.
Devido ao tempo disponível não foi possível validar os inputs da aplicação.

É possível efetuar a venda dos produtos através do menu Vendas.
Ao informar o código do produto, a aplicação busca via Ajax se o código é válido e está cadastrado na aplicação.
Em caso positivo, retorna nos demais campos as informações do item cadastrado.
Em caso negativo, informa via bootbox que o item não está cadastrado e colore a borda de vermelho.
Devido ao tempo disponível não foi possível persistir a informação na tabela Documentos da aplicação.
