<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/340c24fbce.js" crossorigin="anonymous"></script>

        <title>
			INICIE API
		</title>

		<style>
			body {
				font-family: 'Nunito', sans-serif;
			}
			h1 {
				text-align: left;
				font-weight: 900;
				font-size: 28px;
				padding-top: 60px;
			}
			h2 {
				text-align: center;
				font-weight: 600;
				font-size: 22px;
				padding-top: 40px;
			}
			h3 {
				text-align: center;
				font-weight: 900;
				font-size: 16px;
			}
			p {
				text-align: left;
				font-weight: 100;
				font-size: 16px;
			}
			.list {
				padding-top: 10px;
				border-bottom-style: solid;
				border-bottom-color: lightgrey;
				border-bottom-width: 1px;
			}
			.list:hover {
				background-color: lightgrey;
			}
			.user-area {
				border-color: gray;
				border-style: solid;
				border-radius: 30%;
				padding: 10px;
				text-align: center;
				font-size: 12px;
			}
			.form-label {
				padding-top: 6px;
				text-align: left;
				font-weight: 900;
				font-size: 16px;
			}
			.container-show {
				background-color: #e9e9e9;
				border-style: solid;
				border-color: gray;
				border-width: 1px;
				border-radius: 10px;
				padding: 10px;
			}
			
		</style>

    </head>

    <body>
		<div class="container">
			<nav class="navbar navbar-expand-lg bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<image src=" {{ asset('storage/inicie_logo.png') }}">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">

							<!-- dropdown USUÁRIOS -->
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Usuários
								</a>
								<ul class="dropdown-menu">
									<li>
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            Ver usuários
                                        </a>
                                    </li>
									<li>
                                        <a class="dropdown-item" href="{{ route('user.create') }}">
                                            Criar usuário
                                        </a>
                                    </li>
								</ul>
							</li>

							<!-- dropdown POSTAGENS -->
                            <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Postagens
								</a>
								<ul class="dropdown-menu">
									<li>
                                        <a class="dropdown-item" href="{{ route('post.index') }}">
                                            Ver postagens
                                        </a>
                                    </li>
									<li>
                                        <a class="dropdown-item" href="{{ route('post.create') }}">
                                            Criar postagem
                                        </a>
                                    </li>
								</ul>
							</li>
							
							<!-- dropdown COMENTÁRIOS -->
                            <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Comentários
								</a>
								<ul class="dropdown-menu">
									<li>
                                        <a class="dropdown-item" href="{{ route('comment.index') }}">
                                            Ver comentários
                                        </a>
                                    </li>
									<li>
                                        <a class="dropdown-item" href="{{ route('comment.create') }}">
                                            Criar comnetário
                                        </a>
                                    </li>
								</ul>
							</li>

						</ul>

					</div>
						<!-- perfil Usuário -->
						@if (session()->has('user'))
						<div class="d-flex user-area">
							{{ session('user.id') }}
							<br>
							{{ session('user.name') }}
						</div>
						<div class="d-flex p-3 pt-4">
							<a style="text-decoration:none" href="{{ route('logout') }} ">
								<button id="logout-button" type="button" class="btn btn-outline-danger">
									SAIR
								</button>
							</a>
						</div>
						@endif

				</div>
			</nav>
		</div>

		<div class="container">
			<div class="row pb-4">
				<div class="col">
					<h2>
                        {{ $title }}
					</h2>
				</div>
			</div>

            {{ $slot }}

		</div>
    </body>
</html>
