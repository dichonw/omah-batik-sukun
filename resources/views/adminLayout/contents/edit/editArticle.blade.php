@extends('adminLayout.index')

@section('title')
    Artikel
@endsection

@section('breadcrumb')
    Artikel
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Artikel</h3>
    </div>
    <div class="card-body">
        @foreach ($dataArticle as $article)
        <form role="form" method="POST" action="/admin/article/edit_article/{{ $article->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Judul Artikel</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="article_title" placeholder="Masukan Judul Artikel" value="{{ $article->article_title }}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Gambar</label>
                <input type="hidden" name="oldImage" value="{{ $article->image }}">
                @if ($article->image)
                    <img src="{{ asset('/assets/img/article') }}/{{$article->image}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <div class="input-group">
                  <input type="file" id="image" name="image" onchange="previewImage()">
                </div>
                @error('image')
                    <small>{{ $message }}</small>
                @enderror
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Masukan Deskripsi" value="{{ $article->description }}"> --}}
                <textarea name="description" placeholder="Masukkan Deskripsi">{{ $article->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Link (Opsional)</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="optional_link" placeholder="Masukan Link (Optional)" value="{{ $article->optional_link }}">
            </div>
            <a href="{{ url('admin/article') }}">
                <button type="button" class="btn btn-default float-sm-left">Keluar</button>
            </a>
            <button type="submit" class="btn btn-primary float-sm-right">Ubah Artikel</button>
        </form>
        @endforeach
    </div>
  </div>

  <script>
    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }

  </script>

@endsection
