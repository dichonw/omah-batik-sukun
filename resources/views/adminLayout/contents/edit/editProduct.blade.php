@extends('adminLayout.index')

@section('title')
    Produk
@endsection

@section('breadcrumb')
    Produk
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Produk</h3>
    </div>
    <div class="card-body">
        @foreach ($dataProduct as $product)
        <form role="form" method="POST" action="/admin/product/edit_product/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" placeholder="Masukan Nama Produk" value="{{ $product->product_name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Gambar</label>
                <input type="hidden" name="oldImage" value="{{ $product->image }}">
                @if ($product->image)
                    <img src="{{ asset('/assets/img/product') }}/{{$product->image}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <div class="input-group">
                  <input type="file" id="image" name="image" onchange="previewImage()">
                </div>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="price" placeholder="Masukan Harga Produk" value="{{ $product->price }}">
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Diskon(Opsional)</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="discount" placeholder="Masukan Diskon Produk" value="{{ $product->discount }}">
            </div> --}}
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="3" name="description" placeholder="Masukan Deskripsi">{{ $product->description }}</textarea>  
            </div>
            <a href="{{ url('admin/product') }}">
                <button type="button" class="btn btn-default float-sm-left">Keluar</button>
            </a>
            <button type="submit" class="btn btn-primary float-sm-right">Ubah Produk</button>
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