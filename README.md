# Inicie API
Aplicação para consumo da GOREST API. Criação de usuário, postagens e comentários via API com autenticação.

Dsenenvolvido ara Teste de Seleção da INICIE.

### PRÉ-REQUISITOS:
- Git
- Docker
- Docker-compose

** Por ser uma versão de teste, não foi utilizado banco de dados. Os dados são gerados temporariamente na sessão do navegador.

### INSTALAÇÃO:
Para iniciar a aplicação será preciso clonar e conteinerizar sua aplicação. Após executar os comandos abaixo, sua aplicação estará disponível via http://localhost:8000/

***
git clone https://github.com/cristiancobra/api-inicie.git
cd api-inicie
docker-compose up -d --build
docker-compose run composer install
***


### USO:
1. CRIAR UM NOVO USUÁRIO NO SISTEMA:

1.1. Acesse no navegador: http://localhost:8000 para ser direcionado para a página 'CRIAR NOVO USUÁRIO'.

1.2. Preencha os campos de nome e email (não utilize dados reais).

1.3. Você será direcionado para a tela de 'detalhes' onde poderá ver seu ID e demais dados. Seu ID e NOME de login ficaram disponíveis no menu superior ao lado direito.


2. LISTAR TODOS USUÁRIOS DA API E O USUÁRIO CRIADO:

2.1. No menu superior clique em USUÁRIOS e VER USUÁRIOS. Seu usuário recém criado estará destacado em amarelo.

2.2. Clique no usuário desejado para acessar página com DETALHES DO USUÁRIO.


3. CRIAR POST PARA O USUÁRIO CRIADO:

3.1. No menu superior clique em POSTAGENS e CRIAR POST.

3.2. Adicione um TÍTULO (máximo 200 caracteres) e o TEXTO para seu post (máximo 500 caracteres).

3.3. Clique no botão CRIAR.


4. CRIAR NOVO COMENTÁRIO DENTRO DO POST CRIADO:

4.1. Você criou uma postagema e foi redirecionado a página POSTAGEM. Clique no botão COMENTAR.

4.2. Na tela NOVO COMENTÁRIO basta inserir seu comentário e clicar em CRIAR.


5. CRIAR COMENTÁRIO EM POST DA LISTA PÚBLICA

5.1. No menu superior clique em POSTAGENS e VER POSTS.

5.2. Em LISTA DE POSTS clique em uma postagem feita por outro autor.

5.3. Você foi redirecionado para a página da POSTAGEM. Clique no botão COMENTAR.


6. APAGAR O COMENTÁRIO CRIADO

    • Apagar o comentário criado no requisito acima;
