@extends('adminLayout.index')

@section('title')
    Admin
@endsection

@section('breadcrumb')
    Admin
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Admin</h3>
    </div>
    <div class="card-body">
        @foreach ($dataAdmins as $admins)
          <form role="form" method="POST" action="/admin/list_admin/edit_admin/{{ $admins->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Admin</label>
              <input type="text" class="form-control" name="name_user" placeholder="Masukan Nama Admin" value="{{ $admins->name_user }}" required>
              @error('name_user')
                <small class="text text-red">
                    <ul>
                        <li>{{ $message }}</li>
                    </ul>
                </small>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan Username" value="{{ $admins->username }}" required>
                @error('username')
                    <small class="text text-red">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <div class="input-group" id="show_hide_password1">
                    <input class="form-control" type="password" placeholder="Masukan Password" name="password" value="{{ old('password') }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
                    </div>
                </div>
                @error('password')
                    <small class="text text-red">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <div class="input-group" id="show_hide_password2">
                    <input class="form-control" type="password" placeholder="Konfirmasi Password" name="password_confirmation"  value="{{ old('password_confirmation') }}"required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-eye-slash"></i></span>
                    </div>
                </div>
                @error('password_confirmation')
                    <small class="text text-red">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </small>
                @enderror
            </div>
            <a href="{{ url('admin/list_admin') }}">
                <button type="button" class="btn btn-default float-sm-left">Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary float-sm-right">Edit Admin</button>
        </form>
        @endforeach
    </div>
  </div>

  <script>
    $(document).ready(function() {
        $("#show_hide_password1 span").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password1 input').attr("type") == "text"){
                $('#show_hide_password1 input').attr('type', 'password');
                $('#show_hide_password1 i').addClass( "fa-eye-slash" );
                $('#show_hide_password1 i').removeClass( "fa-eye" );
            }else if($('#show_hide_password1 input').attr("type") == "password"){
                $('#show_hide_password1 input').attr('type', 'text');
                $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
                $('#show_hide_password1 i').addClass( "fa-eye" );
            }
        });

        $("#show_hide_password2 span").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password2 input').attr("type") == "text"){
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass( "fa-eye-slash" );
                $('#show_hide_password2 i').removeClass( "fa-eye" );
            }else if($('#show_hide_password2 input').attr("type") == "password"){
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
                $('#show_hide_password2 i').addClass( "fa-eye" );
            }
        });
    });
  </script>

@endsection