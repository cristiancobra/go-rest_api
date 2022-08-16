<x-layout-default>

	<x-slot:title>
		LISTA DE COMENTÁRIOS
		<i class="fa-solid fa-user-plus"></i>
		</x-slot>

		<!-- table header -->
		<div class="row list">
			<div class="col-3 text-center">
				<label class="form-label">
					AUTOR
				</label>
			</div>
			<div class="col-3 text-center">
				<label class="form-label">
					POSTAGEM
				</label>
			</div>
			<div class="col-6 text-center">
				<label class="form-label">
					COMENTÁRIO
				</label>
			</div>

		</div>

		<!-- table lines -->
		@foreach($comments as $comment)
		<div class="row list position-relative {{ ($comment['name'] === session('user.name')) ? 'alert alert-warning' : null }}">
			<a class='stretched-link' href='{{ route('comment.show', ['comment' => $comment['id']]) }}'>
			</a>
			<div id="comment-name" class="col-3">
				<h3 class='text-start'>
					{{ $comment['name'] }}
				</h3>
			</div>
			<div class="col-9">
				<p>
					{{ $comment['body'] }}
				<p>
			</div>
		</div>
		@endforeach

</x-layout-default>
