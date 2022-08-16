<x-layout-default>

	<x-slot:title>
		LISTA DE POSTAGENS
		<i class="fa-solid fa-user-plus"></i>
		</x-slot>

		<!-- table header -->
		<div class="row list">
			<div class="col-2">
				<h3>
					Autor
				</h3>
			</div>
			<div class="col-10">
				<h3>
					Título
				</h3>
			</div>

		</div>

		<!-- table lines -->
		@foreach($posts as $post)
		<div class="row list position-relative {{ ($post['user_id'] === session('user.id')) ? 'alert alert-warning' : null }}">
			<a class='stretched-link' href='{{ route('post.show', ['post' => $post['id']]) }}'>
			</a>
			<div id="post-name" class="col-2">
				<h3 class="text-start">
					{{ $post['name'] }}
				</h3>
			</div>
			<div class="col-10">
				<p>
					{{ $post['title'] }}
				<p>
			</div>
		</div>
		@endforeach

</x-layout-default>
