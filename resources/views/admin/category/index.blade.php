@extends('template_backend.home')
@section('sub-judul', 'Kategori')
@section('content')


@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success')}}
	</div>
	@endif


	<a href="{{ route ('category.create') }}" class="btn btn-info">Tambah Kategori</a><br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach ($category as $result => $hasil)
		<tbody>
			<tr>
				<td>{{ $result + $category -> firstitem()}}</td>
				<td>{{ $hasil -> name }}</td>
				<td>
					<form action="{{ route('category.destroy', $hasil->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('category.edit',$hasil->id) }}" class="btn btn-primary btn-sm">edit</a>
						<button type="submit" class="btn btn-danger btn-sm">delete</button>
					</form>
				</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	{{ $category -> links()}}
@endsection