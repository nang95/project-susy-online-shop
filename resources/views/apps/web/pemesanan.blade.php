@extends('layouts.apps.web')

@section('content')
    @include('components.web.header')
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Konfirmasi</th>
                                    <th>Detail Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanan as $item)
                                <tr>
                                    <td>{{ date('Y-m-d', strtotime($item->tanggal_pemesanan)) }}</td>
                                    <td>{{ $item->getStatus($item->status) }}</td>
                                    <td class="total_price">
                                        Rp. {{ number_format($item->total_pembayaran) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('toko.pemesanan.konfirmasi') }}" method="POST" style="display: inline-block">
                                            @csrf @method('POST')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button class="btn btn-sm btn-warning">Diterima</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('toko.pemesanan.detail', $item->id) }}">
                                            <button class="btn btn-sm btn-info">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.web.footer')
@endsection