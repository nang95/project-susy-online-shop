@extends('layouts.apps.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Produk Variasi</li>
</ol>
<h6 class="font-weight-bolder mb-0">Produk Variasi</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card mb-2">
          <div class="card-header pb-0">
            <h6>Tambah Produk Variasi</h6>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="{{ route('admin.produk.variasi.insert') }}" enctype="multipart/form-data">
                @csrf @method('POST')
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                
                <label>Nama</label>
                <div class="mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="nama">
                </div>

                <label>Ukuran</label>
                <div class="mb-3">
                  <input type="text" name="ukuran" class="form-control" placeholder="ukuran">
                </div>

                <label>Foto</label>
                <div class="mb-3">
                  <input type="file" name="foto" class="form-control" placeholder="nama">
                </div>

                <label>Stok</label>
                <div class="mb-3">
                  <input type="number" name="stok" class="form-control" placeholder="nama">
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.produk.variasi', $produk->id) }}">
                            <button type="button" class="btn btn-sm btn-danger" style="padding-left: 10px; padding-right: 10px">Kembali</button>                        
                        </a>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-success" type="submit" style="padding-left: 10px; padding-right: 10px">Simpan</button>
                    </div>
                </div>
              </form>
          </div>
        </div>
    </div>
</div>
@endsection
