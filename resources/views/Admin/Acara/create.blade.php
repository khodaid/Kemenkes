@extends('templates.admin.nav-bar')

@section('session')

	<div class="container ml-0 mr-auto">
		<div class="row">
			<div class="col-sm-4">
				<form action=" {{route('scheduleSuccess')}} " method="post" enctype="multipart/form-data">
					{{csrf_field() }}
					<p>
						<h3>Nama Acara</h3>
						<input type="text" name="namaAcara" placeholder="masukan nama acara">
					</p>
					<p>
						<h3>Tanggal Acara</h3>
						<input type="date" name="tanggal">
					</p>
					<p>
						<h3>Tempat</h3>
						<input type="text" name="tempat" placeholder="masukan nama tempat">	
					</p>
					<button type="submit" name="submit">Tambah</button>
				</form>
			</div>
		</div>
	</div>
@endsection