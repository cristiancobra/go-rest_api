<x-layout-default>

	<x-slot:title>
		NOVA POSTAGEM
		</x-slot>

		@if($errors->any())
		<div class="alert alert-danger" role="alert">
			{{$errors->first()}}
		</div>
		@endif

		<form action="{{ route('post.store') }}" method="post">
			@csrf

			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formPostTitle">
						Título
					</label>
				</div>
				<div class="col-11">
					<div class="form-outline">
						<input class="form-control" id="formPostTitle" name='title' type="text" value="{{ old('title') }}">
					</div>
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-1">
					<label class="form-label" for="formPostBody">
						Texto
					</label>
				</div>
				<div class="col-11">
					<textarea class="form-control" id="formPostBody" name="body" rows="4" cols="100">{{ old('body') }}</textarea>
				</div>
			</div>


			<div class="row pb-3">
				<div class="col">
					<p style="text-align: right">
						<button class="btn btn-primary" type="submit">
							CRIAR
						</button>
					</p>
				</div>
			</div>

		</form>
</x-layout-default>
