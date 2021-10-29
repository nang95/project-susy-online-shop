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
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_pemesanan as $item)
                                <tr>
                                    <td>{{ $item->variasi->produk->nama }} - ({{ $item->variasi->nama }})</td>
                                    <td>{{ $item->jumlah }}</td>
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