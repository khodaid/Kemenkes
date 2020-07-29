@extends('templates.admin.nav-bar')

@section('session')

<div class="container ml-0 mr-auto my-4">
    <div class="row">
        <div class="col-sm-6 bg-info py-4">
            <form action="{{route('beritaSuccess')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Judul</h3>
                <input class="form-control" type="text" name="judul" placeholder="masukan judul">
                <h3>Isi Berita</h3>
                <textarea class="form-control" name = "content" rows="10"></textarea>
                <h3>Foto</h3>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="photo">
                  <label class="custom-file-label" for="customFile"></label>
                </div>
                <!-- <input type="file" name="photo"> -->
                <p></p>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    
        <div class="col-sm-6">
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
                    <tr rowspan="2">
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{str_limit($article->article,40)}} <br><a href="{{ route('editBerita' , '$article') }} "> Baca Selengkapnya</a></br></td>
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

<script>
    $('#customFile').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
@endsection