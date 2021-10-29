@extends('layouts.apps.web')

@section('content')
    @include('components.web.header')
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Alamat Pembeli</h5>
                        </div>

                        <form action="#" method="post">
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
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Pesanan Anda</h5>
                            <p>Detail Pesanan</p>
                        </div>

                        <form action="{{ route('toko.checkout.insert') }}" method="POST">
                            @csrf @method('POST')
                            <ul class="order-details-form mb-4">
                                <li><span>Produk</span> <span>Total</span></li>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($keranjang as $item)
                                    @php
                                        $total += $item->variasi->produk->promoPrice($item->variasi->produk->id, $item->variasi->produk->harga) * $item->jumlah;   
                                    @endphp
                                    <li>
                                        <input type="hidden" name="keranjang_ids[]" value="{{ $item->id }}">
                                        <span>{{ $item->variasi->produk->nama }} ({{ $item->variasi->nama }})</span> 
                                        <span>Rp. {{ number_format($item->variasi->produk->promoPrice($item->variasi->produk->id, $item->variasi->produk->harga) * $item->jumlah) }} x {{ $item->jumlah }}</span></li>
                                @endforeach
                                <li><span>Total</span> <span>Rp. {{ number_format($total) }}</span></li>
                                <input type="hidden" value="{{ $total }}" name="total_pembayaran">
                            </ul>

                            <button type="submit" class="btn karl-checkout-btn">Place Order</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('components.web.footer')
@endsection