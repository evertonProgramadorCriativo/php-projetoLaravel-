# Sistema de Gestão de Vendas Laravel , MySQLi , JavaScript
 


 
 

Um projeto **full-stack** de e-commerce desenvolvido com **Laravel**, **Mysql** e frontend em **JavaScript puro**.  

 ```bash
 Este projeto está em construção e tem como objetivo desenvolver um sistema de gestão de vendas completo. Está sendo desenvolvido com as seguintes tecnologias:
Laravel (framework PHP para o back-end)
MySQLi (banco de dados relacional)
JavaScript (para interações dinâmicas no front-end)

 
```

## Como Executar o Projeto

```bash
# Instalar as dependências do Laravel

composer install

# .env
 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestao_vendas
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

#Gerar a chave da aplicação

php artisan key:generate

#Criar o banco de dados no MySQL

CREATE DATABASE nome_do_banco;

#Rodar as migrações (criar tabelas no banco)

php artisan migrate

#Iniciar o servidor

php artisan serve

#http://127.0.0.1:8000
```

## Funcionalidades de Autenticação
```bash

Login e Registro de Usuários
Sistema de autenticação seguro com controle de sessões.
Cadastro de novos usuários com validações.
Controle de Acesso
Permissões separadas por tipo de usuário:
Admin: acesso total ao sistema.
Vendedor: acesso restrito apenas às funções relacionadas às vendas e clientes

```
![Projeto](https://i.ibb.co/JRp0Q4kj/projeto-laravel.png) 
