@extends('adminLayout.index')

@section('title')
    Produk
@endsection

@section('breadcrumb')
    Produk
@endsection

@section('content')
{{-- List table product --}}
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Produk</h3>
    </div>
    <div class="card-body">
      {{-- Alert after create new's product --}}
      @if ( session()->get('flash_message') )
          <div class="alert {{ session()->get('flash_type') }}" role="alert">
              {{ session()->get('flash_message') }}
              <button type="button" class="close float-sm-right" data-dismiss="alert" aria-label="Close">x</button>
          </div>
      @endif
      @if (count($errors) > 0)
          <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                      {{ $error }}
                  @endforeach
                  <button type="button" class="close float-sm-right" data-dismiss="alert" aria-label="Close">x</button>
              </ul>
          </div>
      @endif
      <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-create">Tambah Produk</button>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama produk</th>
          <th>Gambar</th>
          <th>Harga</th>
          {{-- <th>Diskon</th> --}}
          <th>Deskripsi</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($dataProduct as $product)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $product->product_name }}</td>
          <td>
          {{-- if file extension is png, jpg or jpeg then display image  --}}
          @if( in_array(pathinfo($product->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg','PNG', 'JPG', 'JPEG']))
              <img src="{{ asset('/assets/img/product') }}/{{$product->image}}" style="height: 100px">
          @else
              <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
              style="height: 40px">
          @endif
          </td>
          <td>Rp. {{number_format($product->price)}}</td>
          <td>Rp. {{number_format($product->discount)}}</td>
          <td>{!! $product->description !!}</td>
          <td>
            <div class="container-button">
              <a class="btn btn-sm bg-info mb-2" href="/admin/product/update_product/{{ $product->id }}">
                <i class="fas fa-edit"></i> Ubah
              </a>
              <form method="POST" action="{{ route('delete_product', $product->id) }}">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <a type="submit" class="btn btn-sm bg-danger show_confirm" data-toggle="tooltip" title='Delete'>
                  <i class="fas fa-trash"></i> Hapus
                </a>
              </form>
            </div>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

{{-- Modal  Create Product--}}
<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambahkan Produk Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ route('create_product') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="text" class="form-control" name="product_name" placeholder="Masukan Nama Produk" required>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <div class="input-group">
              <input type="file" id="image" name="image" onchange="previewImage()">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input type="number" class="form-control" name="price" placeholder="Masukan Harga Produk" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Diskon(Opsional)</label>
            <input type="number" class="form-control" name="discount" placeholder="Masukan Diskon Produk">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi</label>
            <textarea name="description" placeholder="Masukkan Deskripsi"></textarea>
          </div>
          <button type="button" class="btn btn-default float-sm-left" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary float-sm-right">Tambah Produk</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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

  $(document).on('click','.delete',function(){
       let id = $(this).attr('data-id');
       $('#id').val(id);
  });

  $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin menghapus data ini?`,
            text: "Jika anda menghapus maka data akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });

</script>
@endsection