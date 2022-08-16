<x-layout-default>

	<x-slot:title>
		CRIAR NOVO USUÁRIO
		</x-slot>

		@if( $errors->any() )
		<div class="alert alert-danger" role="alert">
			{{ $errors->first() }}
		</div>
		@endif

		@if( !session('user.id') )
		<div class="alert alert-danger" role="alert">
			Crie um usuário para iniciar.
		</div>
		@else
		<div class="alert alert-warning" role="alert">
			Você está logado. Criar um novo usuário irá automaticamente logar com ele.
		</div>
		@endif
		
		<form action="{{ route('user.store') }}" method="post">
			@csrf

			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formUserName">
						Nome
					</label>
				</div>
				<div class="col-4">
					<div class="form-outline">
						<input class="form-control" id="formUserName" name='name' type="text" value="{{ old('name') }}">
					</div>
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formUserEmail">
						Email
					</label>
				</div>
				<div class="col-4">
					<div class="form-outline">
						<input class="form-control" id="formUserEmail" name='email' type="text" value="{{ old('email') }}">
					</div>
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formUserGender">
						Sexo
					</label>
				</div>
				<div class="col-4">
					<select class="form-select" id="formUserGender" aria-label="default select" name='gender'>
						<option value="female">
							homem
						</option>
						<option value="male">
							mulher
						</option>
					</select>
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formUserGender">
						Situação
					</label>
				</div>
				<div class="col-4">
					<select class="form-select" aria-label="default select" name='status'>
						<option value="active">
							ativo
						</option>
						<option value="inactive">
							inativo
						</option>
					</select>
				</div>
			</div>

			<div class="row pb-3">
				<div class="col-5">
					<p class="text-end">
						<button class="btn btn-primary" type="submit">
							CRIAR
						</button>
					</p>
				</div>
			</div>

		</form>
</x-layout-default>
