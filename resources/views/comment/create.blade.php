<x-layout-default>

	<x-slot:title>
		NOVO COMENTÁRIO
		</x-slot>

		@if($errors->any())

		<div class="alert alert-danger" role="alert">
			{{$errors->first()}}
		</div>

		@endif

		<form action="{{ route('comment.store') }}" method="post">

			@csrf

			<div class="row pb-3">
				<div class="col-2">
					<label class="form-label" for="formPostTitle">
						POST
					</label>
				</div>
				<div class="col-10">

					@if( $posts > 1 )
					<div class="form-outline">
						<input class="form-control" id="formPostTitle" type="text" value="{{ $posts['title'] }}" readonly="readonly">
					</div>
					<input name='post_id' type="hidden" value="{{ $posts['id'] }}">

					@else

					<select class="form-select" id="formPostTitle" name='post_id'>
						@foreach( $posts as $post )
						<option value="{{ $post['id'] }}">
							{{ $post['title'] }}
						</option>
						@endforeach
					</select>

					@endif
				</div>
			</div>

			<div class="row pb-3">
				<div class="col-2">
					<label class="form-label" for="formCommentBody">
						COMENTÁRIO
					</label>
				</div>
				<div class="col-10">
					<textarea class="form-control" name="body" id="formCommentBody" rows="5" cols="125">{{ old('body') }}</textarea>
				</div>
			</div>


			<div class="row pb-3">
				<div class="col">
					<p class="text-end">
						<button class="btn btn-primary" type="submit">
							CRIAR
						</button>
					</p>
				</div>
			</div>

		</form>
</x-layout-default>
