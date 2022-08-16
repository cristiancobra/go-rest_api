<x-layout-default>

	<x-slot:title>
		DETALHES DO USUÁRIO
		</x-slot>

		@if(isset($message))
		<div class="alert alert-success" role="alert">
			{{ $message }}
		</div>
		@endif

		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					ID
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $user['id'] }}
			</div>
		</div>
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Nome
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $user['name'] }}
			</div>
		</div>
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Email
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $user['email'] }}
			</div>
		</div>
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Sexo
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $user['gender'] }}
			</div>
		</div>
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Situação
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $user['status'] }}
			</div>
		</div>

		</div>
</x-layout-default>