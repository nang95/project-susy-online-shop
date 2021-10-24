@extends('layouts.apps.web')

@section('content')
    @include('components.web.header')
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Pengguna</h5>
                            <p>Data Lengkap Pengguna</p>
                        </div>

                        <form action="{{ route('toko.akun.update') }}" method="post">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $pelanggan->id }}">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="nama">Nama <span>*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="provinsi">Provinsi <span>*</span></label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $pelanggan->provinsi }}" required>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $pelanggan->kabupaten }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $pelanggan->kecamatan }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <textarea type="text" class="form-control" name="alamat_lengkap" id="alamat_lengkap">{{ $pelanggan->alamat_lengkap }}</textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="kode_pos">Kode Pos <span>*</span></label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $pelanggan->kode_pos }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="no_telfon">No. HP <span>*</span></label>
                                    <input type="number" class="form-control" id="no_telfon" name="no_telfon" min="0" value="{{ $pelanggan->no_telfon }}">
                                </div>

                                <div class="col-3">
                                    <button class="btn karl-checkout-btn" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.web.footer')
@endsection