@extends('templates.admin.nav-bar')

@section('session')
	<div class="container ml-0 mr-auto">
	    <div class="row">
	        <div class="col-sm-4 bg-info">
	            <form action="{{route('beritaSuccess')}}" method="post" enctype="multipart/form-data">
	            {{-- <form action="" method="post" enctype="multipart/form-data"> --}}
	                {{ csrf_field() }}
	                <h3>Judul</h3>
	                <input type="text" name="judul" placeholder="masukan judul">
	                <h3>Isi Berita</h3>
	                <textarea name = "content" ></textarea>
	                <h3>Foto</h3>
	                <input type="file" name="photo">

	                <button type="submit">Submit</button>
	            </form>
	        </div>
	        <div class="col-sm-6">
				<img src=" {{$Article->getImage()}} " alt="" height="300px">
				<!-- tambahkan script untuk menampilkan gambar dari input type -->
				<img src="photo" height="300px">
			</div>
	</div>

	<div class="container ml-auto mr-0">
		<div class="row">
			
		</div>
	</div>
@endsection