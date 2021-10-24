@extends('layouts.apps.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Kategori</li>
</ol>
<h6 class="font-weight-bolder mb-0">Kategori</h6>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card mb-2">
          <div class="card-header pb-0">
            <h6>Edit Kategori</h6>
          </div>
          <div class="card-body">
            <form role="form" method="POST" action="{{ route('admin.event.produk.insert') }}">
                @csrf @method('PUT')
                <input type="hidden" name="id" value="{{ $event_produk->id }}">
                <input type="hidden" name="event_id" value="{{ $event->id }}">

                <label>Produk</label>
                <div class="mb-3">
                  <select name="produk_id" class="form-control" id="produk_id">
                    <option>-Silahkan Pilih-</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}"
                          @if ($event_produk->produk_id == $item->id)
                              selected
                          @endif>{{ $item->nama }}</option>
                    @endforeach
                  </select>
                </div>

                <label>Harga Promo</label>
                <div class="mb-3">
                  <input type="number" name="harga_promo" class="form-control" value="{{ $event_produk->harga_promo }}" placeholder="Harga Promo">
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <div>
                        <a href="{{ route('admin.event.produk', $event->id) }}">
                            <button class="btn btn-sm btn-danger" style="padding-left: 10px; padding-right: 10px">Kembali</button>                        
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
