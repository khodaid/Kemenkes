@extends('templates.admin.nav-bar')

@section('session')
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=X4MwsYD8oBYzHlNMz9NU&callback=initMap"
type="text/javascript"></script> --}}
<script src="http://maps.googleapis.com/maps/api/js"></script>
<table class="table">
    <thead>
        <tr>
            <th scope="row">Id</th>
            <th scope="row">Judul</th>
            <th scope="row">Berita</th>
            <th scope="row">Foto</th>
            <th scope="row" colspan="2">Action</th>
        </tr>
    </thead>

    {{-- @foreach ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{str_limit($article->article,100)}}</td>
            <td>{{$article->photo}}</td>
        </tr>
    @endforeach --}}
    @forelse ($Article as $article)
    <tbody>
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{str_limit($article->article,50)}}</td>
            {{-- <td>{{$article->photo}}</td> --}}
            <td><img src="{{ $article->getImage()}}" alt="" height="50px"></td>
            <td><a class="btn btn-danger" href="{{route('hapusBerita', $article)}}">Hapus</a></td>
            <td><a class="btn btn-success" href="">Edit</a></td>
        </tr>
    </tbody>

    @empty
        <h3>Data Kosong</h3>
    @endforelse
</table>
{{-- <script>
    // fungsi initialize untuk mempersiapkan peta
    function initialize() {
    var propertiPeta = {
        center:new google.maps.LatLng(-8.5830695,116.3202515),
        zoom:20,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    
    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    }

    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script> --}}
<div id="googleMap" style="width:100%;height:380px;"></div>
@endsection