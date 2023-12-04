# Rodar o sistema

Para rodar o sistema é necessário ter instalado o PHP, um banco de dados e o composer instalados na sua máquina. 
Após isso, fazer a configuração do banco de dados nas variáveis abaixo do arquivo .ENV

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Após configurar a conexão com o banco de dados basta rodar os seguintes comandos, na seguinte ordem, para que o sistema funcione corretamente: 

```bash
composer install
php artisan jwt:secret
php artisan migrate --seed
php artisan serve
```
O primeiro comando instala as dependências do projeto. 
O segundo configura a chave de segurança para gerar os tokens JWT, usados na autenticação. 
O terceiro comando rodas as migrations, gerando as tabelas no banco de dados. Quando passamos a flag --seed, também serão gerados alguns dados aleatórios na tabela de usuários. 
O último comando inicia o servidor do Laravel e faz com que seja possível utilizar o sistema. 
