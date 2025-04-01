## Instalação 
Requisitos
PHP: 8.3
Composer: Última versão recomendada
MySQL ou outro banco de dados compatível com Laravel
Git: Para clonar o repositório

- Sevidor NGINX ou Apache da sua escolha
- Recomendo fortemente baixar o HERB => https://herd.laravel.com/windows
  Herd é um ambiente de desenvolvimento nativo e rápido para Laravel e PHP para Windows. 
  Ele inclui tudo o que você precisa para começar a desenvolver com Laravel, incluindo PHP e nginx.
- Depois de instalar o Herd, você está pronto para começar a desenvolver com Laravel.
- No Herb escolha versão do PHP 8.3 e pronto. 
- Eu acho melhor que o XAMPP ou WAMP SERVER.

1. Clone o projeto do GitHub para sua máquina local:
git clone 

2. Navega até a pasta do projeto 
cd app-manager

3. Instalar Dependências PHP
Instale as dependências do Composer listadas no composer.json:
```bash 
composer install
```
4. Configurar o Ambiente
```bash 
cp .env.example .env
```
5. Edite o arquivo .env com as configurações do seu banco de dados, por exemplo:
```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
6. Gere a chave da aplicação:
```bash 
php artisan key:generate
```
7. Configurar o Banco de Dados
Execute as migrações para criar as tabelas no banco de dados:
```bash 
php artisan migrate
```
8. Executar o Projeto
Inicie o servidor Laravel:
```bash 
php artisan serve
```
Acesse o projeto em http://127.0.0.1:8000. O painel de administração estará disponível em http://127.0.0.1:8000/admin.
Eu habilitei o campo de registrar usuário na tela de login, registre seu usuário e você será logado o painel você encontrará a aba Produtos.
