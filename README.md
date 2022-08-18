
# INICIE API
Aplicação para consumo da GOREST API. Criação de usuário, postagens e comentários via API com autenticação.

Desenvolvido com Laravel 9 com imagem docker <a href='https://hub.docker.com/r/bitnami/laravel'>Bitinami Laravel </a>.

Desenvolvido para Teste.

### PRÉ-REQUISITOS:
- Git
- Conta Github
- Docker
- Docker-compose
- Composer

** Por ser uma versão de teste, não foi utilizado banco de dados. Os dados são gerados temporariamente na sessão do navegador.

### INSTALAÇÃO:
Para iniciar a aplicação será preciso clonar e conteinerizar sua aplicação. Após executar os comandos abaixo, sua aplicação estará disponível via http://0.0.0.0:8000/

Para iniciar será preciso clonar a aplicação. Em um terminal, navegue até a pasta onde irá baixar a aplicação e execute:

```
git clone https://github.com/cristiancobra/inicie-api.git
```


Entre no diretório e instale as dependências do projeto:

```
composer install
```

Faça uma cópia do arquivo .env.example

```
cp .env.example .env
```

Gere uma nova chave para sua aplicação com o comando

```
php artisan key:generate
```

E então execute:

```
docker compose up -d --build
```

### CONFIGURAÇÃO DA AUTENTICAÇÃO (TOKEN):
Para interagir com a API é necessário utilizar seu próprio token da GO REST API.

1.1. Acesse o site https://gorest.co.in/ crie um usuário, gere um token e copie seu número.

1.2. Utilize seu editor de texto preferido para editar o arquivo .env criado acima. Cole o número do seu token no item GOREST_TOKEN, como no exemplo:

***
GOREST_TOKEN=6fcceb6ad0f9860c1f1a0fd6151f653e76eecb2e25830346e0f8d5jd73jd73jd
***


### USO:

---

**1. CRIAR UM NOVO USUÁRIO NO SISTEMA:**

1.1. Acesse no navegador: http://0.0.0.0:8000 para ser direcionado para a página 'CRIAR NOVO USUÁRIO'.

1.2. Preencha os campos de nome e email (não utilize dados reais).

1.3. Você será direcionado para a tela de 'detalhes' onde poderá ver seu ID e demais dados. Seu ID e NOME de login ficaram disponíveis no menu superior ao lado direito.

---

**2. LISTAR TODOS USUÁRIOS DA API E O USUÁRIO CRIADO:**

2.1. No menu superior clique em USUÁRIOS e VER USUÁRIOS. Seu usuário recém criado estará destacado em amarelo.

2.2. Clique no usuário desejado para acessar página com DETALHES DO USUÁRIO.

---

**3. CRIAR POSTAGEM PARA O USUÁRIO CRIADO:**

3.1. No menu superior clique em POSTAGENS e CRIAR POSTAGEM.

3.2. Adicione um TÍTULO (máximo 200 caracteres) e o TEXTO para sua postagem (máximo 500 caracteres).

3.3. Clique no botão CRIAR.

---

**4. CRIAR NOVO COMENTÁRIO DENTRO DA POSTAGEM CRIADA:**

4.1. Você criou uma postagema e foi redirecionado a página POSTAGEM. Clique no botão COMENTAR.

4.2. Na tela NOVO COMENTÁRIO basta inserir seu comentário e clicar em CRIAR.

---

**5. CRIAR COMENTÁRIO EM POSTAGEM DA LISTA PÚBLICA**

5.1. No menu superior clique em POSTAGENS e VER POSTAGENS.

5.2. Em LISTA DE POSTAGENS clique em uma postagem feita por outro autor.

5.3. Você foi redirecionado para a página da POSTAGEM. Clique no botão COMENTAR.

---

**6. APAGAR O COMENTÁRIO CRIADO**

6.1. No menu superior clique em COMENTÁRIOS e VER COMENTÁRIOS.

6.2. Em LISTA DE COMENTÁRIOS clique em um comentário.

6.3. Você foi redirecionado para a página da DETALHES DO COMENTÁRIO. Clique no botão APAGAR.

*Se você estiver dentro da página da POSTAGEM, você também poderá clicar no botão APAGAR ao lado do comentário para apagá-lo.*

---
