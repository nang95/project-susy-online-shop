@extends('layouts.apps.web')

@section('content')
    @include('components.web.header')
    <section class="single_product_details_area section_padding_0_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('{{ asset('foto_produk') }}/{{ $produk->foto }}');">
                                </li>
                                @php
                                    $slide_no = 0;
                                @endphp
                                @foreach ($variasi_galeri as $item)
                                    @php
                                        $slide_no += 1;
                                    @endphp
                                    <li data-target="#product_details_slider" data-slide-to="{{ $slide_no }}" style="background-image: url('{{ asset('foto_produk') }}/{{ $item->foto }}');">
                                    </li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ asset('foto_produk') }}/{{ $produk->foto }}">
                                        <img class="d-block w-100" src="{{ asset('foto_produk') }}/{{ $produk->foto }}" alt="First slide">
                                    </a>
                                </div>
                                @foreach ($variasi_galeri as $item)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('foto_produk') }}/{{ $item->foto }}">
                                            <img class="d-block w-100" src="{{ asset('foto_produk') }}/{{ $item->foto }}" alt="Second slide">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_product_desc">

                        <h4 class="title"><a href="#">{{ $produk->nama }}</a></h4>

                        <h4 class="price">
                            Rp.{{ number_format($produk->harga) }} 
                        </h4>

                        <!-- Add to Cart Form -->
                        <form action="{{ route('toko.keranjang.insert') }}" method="post">
                            @csrf @method('POST')
                            <div class="widget size mb-50">
                                <h6 class="widget-title">Tipe</h6>
                                <div class="row">
                                    @foreach ($variasi as $item)
                                    <div class="col-3 desc-detail-variasi">
                                        <div class="form-check">
                                            <input name="variasi_id" 
                                            class="form-check-input" 
                                            type="radio" 
                                            value="{{ $item->id }}" id="{{ $item->id }}">
                                            <label class="form-check-label" for="{{ $item->id }}">
                                            {{ $item->nama }} ({{ $item->ukuran }})
                                            </label>
                                        </div>  
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="cart clearfix mb-50 d-flex">
                            <div class="quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="jumlah" value="1">

                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn cart-submit d-block">Tambah ke Keranjang</button>
                            </div>
                        </form>

                        <div id="accordion" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Deskripsi Produk</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{ $produk->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.web.footer')
@endsection