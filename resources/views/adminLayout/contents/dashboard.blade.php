@extends('adminLayout.index')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    Dashboard
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Jumlah Data
            </h3>

            <div class="card-tools">
                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $dataAdmin->count() }}</h3>

                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-user"></i>
                        </div>
                        <a href="{{ url('admin/list_admin') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $dataProduct->count() }}</h3>

                            <p>Produk</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-box"></i>
                        </div>
                        <a href="{{ url('admin/product') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $dataArticle->count() }}</h3>

                            <p>Artikel</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-solid fa-book"></i>
                        </div>
                        <a href="{{ url('admin/article') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
