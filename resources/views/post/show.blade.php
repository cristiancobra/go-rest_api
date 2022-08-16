<x-layout-default>

	<x-slot:title>
		POSTAGEM
		</x-slot>

		@isset($message)
		<div class="alert alert-success" role="alert">
			{{ $message }}
		</div>
		@endisset

		<!--posts fields-->
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Autor
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $post['name'] }}
			</div>
		</div>
		<div class="row pb-3">
			<div class="col-1">
				<label class="form-label">
					Título
				</label>
			</div>
			<div class="col-11 pt-2">
				{{ $post['title'] }}
			</div>
		</div>
		<div class="row container-show ">
			<div class="col-1">
				<label class="form-label">
					Texto
				</label>
			</div>
			<div class="col-11">
				{{ $post['body'] }}
			</div>
		</div>

		<!--add comment-->
		<div class="row pt-4">
			<div class="col text-end">
				<a href="{{ route('comment.create', ['post_id' => $post['id']]) }}">
					<button class="btn btn-primary" type="submit">
						COMENTAR
					</button>
				</a>
			</div>
		</div>


		<!-- table lines -->
		@if( !isset( $post['comments'] ))

		<div class="row p-3 text-center">
			<div class="col container-show">
				Postagem ainda não possui comentários.
			</div>
		</div>

		@else


		<!--list comments-->
		<div class="row pb-4 pt-3">
			<div class="col">
				<h2>
					COMENTÁRIOS
				</h2>
			</div>
		</div>

		@foreach( $post['comments'] as $comment )

		<div class="row pb-3">
			<div class="col-3">
				<h3 class='text-start'>
					{{ $comment['name'] }}
				</h3>
				<p>
					{{ $comment['email'] }}
				</p>
			</div>
			<div class="col-8 container-show">
				{{ $comment['body'] }}
			</div>
		</div>

		@endforeach

		@endif
</x-layout-default>