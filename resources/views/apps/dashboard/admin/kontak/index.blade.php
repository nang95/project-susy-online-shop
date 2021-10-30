@extends('layouts.apps.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kontak</li>
</ol>
<h6 class="font-weight-bolder mb-0">Kontak</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card mb-2">
          <div class="card-header pb-0">
            <h6>Edit Kontak</h6>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="{{ route('admin.kontak.update') }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="hidden" name="id" value="{{ $kontak->id }}">
                
                <label>No Telfon</label>
                <div class="mb-3">
                  <input type="text" name="no_telfon" class="form-control" value="{{ $kontak->no_telfon }}" placeholder="no_telfon">
                </div>

                <label>Instagram</label>
                <div class="mb-3">
                  <input type="text" name="instagram" class="form-control" value="{{ $kontak->instagram }}" placeholder="instagram">
                </div>

                <label>Facebook</label>
                <div class="mb-3">
                  <input type="text" name="facebook" class="form-control" value="{{ $kontak->facebook }}" placeholder="facebook">
                </div>

                <div class="mb-3 d-flex justify-content-between">
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
