index.blade.php

@extends('template_backend.home')
@section('sub-judul', 'Tag')
@section('content')


@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success')}}
	</div>
	@endif


	<a href="{{ route ('Tag.create') }}" class="btn btn-info">Tambah Tag</a><br><br>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tag</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tag as $result => $hasil)
			<tr>
				<td>{{ $result + $tag-> firstitem() }}</td>
				<td>{{ $hasil -> name }}</td>
				<td>
					<form action="{{ route('Tag.destroy', $hasil->id) }}" method="POST">
						@csrf
						@method('delete')
						<a href="{{ route('Tag.edit',$hasil->id) }}" class="btn btn-primary btn-sm">edit</a>
						<button type="submit" class="btn btn-danger btn-sm">delete</button>
					</form>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
	{{ $tag -> links()}}
@endsection
