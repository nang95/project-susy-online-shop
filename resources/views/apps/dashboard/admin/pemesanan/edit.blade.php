@extends('layouts.apps.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pemesanan</li>
</ol>
<h6 class="font-weight-bolder mb-0">Pemesanan</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card mb-2">
          <div class="card-header pb-0">
            <h6>Edit Status Pemesanan</h6>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="{{ route('admin.pemesanan.update') }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="hidden" name="id" value="{{ $pemesanan->id }}">
                <label>Status</label>
                <div class="mb-3">
                  <select name="status" class="form-control" id="status">
                    <option>-Silahkan Pilih-</option>
                    <option value="0" 
                    @if ($pemesanan->status == 0)
                        selected
                    @endif>Sedang Dikemas</option>
                    <option value="1"
                    @if ($pemesanan->status == 1)
                        selected
                    @endif>Sedang Dikirim</option>
                  </select>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.pemesanan') }}">
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
