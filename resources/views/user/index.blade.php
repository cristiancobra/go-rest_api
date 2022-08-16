<x-layout-default>

	<x-slot:title>
		LISTA DE USUÁRIOS
		<i class="fa-solid fa-user-plus"></i>
		</x-slot>

		<!-- table header -->
		<div class="row list">
			<div class="col-4">
				<h3>
					Nome
				</h3>
			</div>
			<div class="col-4">
				<h3>
					Email
				</h3>
			</div>
			<div class="col-2">
				<h3>
					Sexo
				</h3>
			</div>
			<div class="col-2">
				<h3>
					Situação
				</h3>
			</div>
		</div>

		<!-- table lines -->
		@foreach($users as $user)
		<div class="row list position-relative {{ ($user['id'] === session('user.id')) ? 'alert alert-warning' : null }}">
			<a class='stretched-link' href='{{ route('user.show', ['user' => $user['id']]) }}'>
			</a>
			<div id="user-name" class="col-4">
				<h3 class="text-start">
					{{ $user['name'] }}
				</h3>
			</div>
			<div class="col-4">
				<p class="text-center">
					{{ $user['email'] }}
				<p>
			</div>
			<div class="col-2">
				<p class="text-center">
					{{ $user['gender'] }}
				<p>
			</div>
			<div class="col-2">
				@if( $user['status'] == 'active')
				<div class="alert alert-success ms-5 me-5 p-1 text-center" role="alert">
					ativo
				</div>
				@elseif( $user['status'] == 'inactive')
				<div class="alert alert-light ms-5 me-5 p-1 text-center" role="alert">
					inativo
				</div>
				@endif
			</div>
		</div>
		@endforeach

</x-layout-default>
