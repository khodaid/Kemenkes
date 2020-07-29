@extends('templates.admin.nav-bar')

@section('session')

	@forelse ($Schedule as $schedule)
		<tr>
			<td>{{$schedule->nama_acara}}</td>
			<td>{{$schedule->tanggal}}</td>
			<td>{{$schedule->tempat}}</td>
		</tr>
		@empty
			<h3>Data Kosong</h3>
	@endforelse
@endsection