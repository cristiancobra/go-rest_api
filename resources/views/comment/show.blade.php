<x-layout-default>

	<x-slot:title>
		DETALHES DO COMENTÁRIO
		</x-slot>

		@if(isset($message))
		<div class="alert alert-success" role="alert">
			{{ $message }}
		</div>
		@endif

		<div class="row pb-3">

			<div class="col-3">
				<label class="form-label">
					POSTAGEM
				</label>
			</div>
			<div class="col-8">
				<a href="{{ route('post.show', [
					'post' => $comment['post_id'],
				])}}">
					{{ $comment['title'] }}
				</a>
			</div>
			<div class="row pb-3">
				<div class="col-3">
					<label class="form-label">
						AUTOR DO COMENTÁRIO
					</label>
				</div>
				<div class="col-8">
					{{ $comment['name'] }}
				</div>
			</div>
			<div class="row pb-3">
				<div class="col-3">
					<label class="form-label">
						EMAIL
					</label>
				</div>
				<div class="col-8">
					{{ $comment['email'] }}
				</div>
			</div>
			<div class="row pb-3 container-show">
				<div class="col-3">
					<label class="form-label">
						COMENTÁRIO
					</label>
				</div>
				<div class="col-8">
					{{ $comment['body'] }}
				</div>
			</div>

		</div>

		<div class="row mt-4">
			<div class="col text-end">
				<form method='post' action="{{ route('comment.destroy', [
					'comment' => $comment['id'],
				]) }}">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-outline-danger">
						APAGAR
					</button>
				</form>
			</div>
		</div>

</x-layout-default>