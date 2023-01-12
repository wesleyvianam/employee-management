# Dzenvolve - Gestão de pessoas

## Sobre o projeto:
Back-end
* PHP 8.1.2
* Composer 2.4.4
* vlucas/phpdotenv 5.5 - [Documentação](https://github.com/vlucas/phpdotenv)

Front-end
* HTML 5
* CSS 3
* Framework CSS Bootstrap 5.2.3 - [Documentação](https://getbootstrap.com/docs/5.2/getting-started/introduction/)
* Biblioteca de Icones Bootstrap Icons 1.10.3 - [Documentação](https://icons.getbootstrap.com/)

## Configuração do Projeto:
1 - Confirme se sua versão do PHP é pelo menos a 8.1, pois utilizei novos recursos do PHP, caso contrário pode dar algum erro.

2 - Clone o projeto em sua maquina.

3 - Rode o comando "composer install" para instalar a dependência "phpdotenv" e criar o arquivo "autoload".
      
      composer install

4 - Configurando Banco de Dados: Criar arquivo ".env" na raiz do projeto e declarar as credenciais fornecidas do banco do teste técnico. exemplo:

      DB_SERVERNAME="nome_do_servidor"
      DB_USERNAME="username"
      DB_PASSWORD="password"
      DATABASE_NAME="nome_do_database"

Eu deixei um arquivo ".env.exemplo" de exemplo. (configurar esse aquivo não substitui a criação do .env)
      
5 - Subir o servidor interno do PHP:

      php -S localhost:8000 -t public

## Sobre o desenvolvimento:
Criei esse wireframe como base para o front-end.
* Front-end: [figma](https://www.figma.com/file/d9SsYte6gR4ouYbCnL1bNP/Untitled?node-id=0%3A1&t=MegYi36yTppSU5Ao-1)

Utilizei a metodologia ágil kanban para maior controle e agilidade no desenvolvimento do projeto.
* Kanban: [trello](https://trello.com/invite/b/XGuDb7pO/ATTI4964d167d6d65cca704131675794b7011EED81D6/technical-test-dzenvolve)

