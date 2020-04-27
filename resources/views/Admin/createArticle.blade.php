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
                <p></p>
                <button type="submit">Submit</button>
            </form>
        </div>
    
        <div class="col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Judul</th>
                        <th>Berita</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Article as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{str_limit($article->article,50)}}</td>
                        <td><img src="{{ $article->getImage()}}" alt="" height="50px"></td>
                    </tr>
                    @empty
                        <h3>Data Kosong</h3>
                    @endforelse
                </tbody>
            </table>    
        </div>
    </div>
</div>

@endsection