### Gerenciamneto de Usuário

<h3>Descrição Sistema</h3>
Sistema para gerenciar usuários. Usuários Admin ao acessar podem cadastrar, alterar, deletar e visualizar os usuários que constam no banco de dados.
Ao cadastrar um usuário, é enviado por email a mensagem que usuário foi cadastrado.
Ao Editar a senha de um usuário, o mesmo é notificado sobre a alteração. 

<h3>Tecnologias Usadas</h3>
<ul>
    <li>PHP</li>
    <li>Laravel</li>
    <li>Laravel-Mix</li>
    <li>Notificação Push</li>
    <li>Notificações Usando FCM</li>
    <li>Canais e Filas</li>
    <li>Relacionamento usando Models e Pivots</li>
    <li>Bootstrap</li>
    <li>Blade</li>
    <li>MySQL</li>
    <li>ORM: Eloquent</li>
    <li>Mailgun é um serviço de entrega de e-mail para enviar, receber e rastrear e-mails.</li>    
</ul>

<hr>

<h3>Passos para rodar o Sistema:</h3>

### 1 - Baixar os arquivos:
```
composer install e composer update
```

### 2 - Configurar Arquivo ENV:

Nome do Banco e Senha do Banco

### 3 - Rodar as Migrations:
```
php artisan migrate
```

### 4 - Rodar a Seeder:
```
php artisan db:seed
```

### 5 - Acionar a Função para Disparo de E-mail:
```
php artisan queue:listen
``` 

### 6 - Acessar Login:
<p style="font-size:12px">Login</p>

```
http://127.0.0.1:8000/login
```

### 7 - Acessar Tela Principal:
<p style="font-size:12px">Tela Principal</p>

```
http://127.0.0.1:8000/principal
```

### 8 - Acessar Tela Cadastrar:
<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/usuarios/cadastrar
```

### 9 - Acessar Tela Editar:
<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/usuarios/editar/{userId}
```

### 10 - Acessar Tela Deletar:
<p style="font-size:12px">Cadastrar</p>

```
http://127.0.0.1:8000/usuarios/{userId}
```
