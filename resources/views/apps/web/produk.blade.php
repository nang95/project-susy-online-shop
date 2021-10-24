@extends('layouts.apps.web')

@section('content')
    @include('components.web.header')
    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <form action="{{ route('toko.produk') }}" method="GET">
                        <div class="shop_sidebar_area">
                        
                            <div class="widget catagory mb-50">
                                <!--  Side Nav  -->
                                <div class="nav-side-menu">
                                    <h6 class="mb-0">CARI BERDASARKAN KATEGORI</h6>
                                    <div class="menu-list">
                                        <ul id="menu-content2" class="menu-content collapse out">
                                            <!-- Single Item -->
                                            @foreach ($kategori as $item)    
                                            <li class="mb-2">
                                                <div class="form-check">
                                                    <input name="kategori_id[]" 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    value="{{ $item->id }}" id="{{ $item->id }}"
                                                    @if ($kategori_ids != null)
                                                        @foreach ($kategori_ids as $kategori_id)
                                                            @if ($kategori_id == $item->id)
                                                            checked
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    >
                                                    <label class="form-check-label" for="{{ $item->id }}">
                                                    {{ $item->nama }}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="widget price mb-50">
                                <h6 class="widget-title mb-30">CARI BERDASARKAN HARGA</h6>
                                <div class="widget-desc">
                                    <div class="form-group">
                                        <label for="">Dari</label>
                                        <input type="number" name="harga_dari" value="{{ $harga_dari }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sampai</label>
                                        <input type="number" name="harga_sampai" value="{{ $harga_sampai }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            @foreach ($produk as $item)
                            @include('components.web.modal_produk', ['item' => $item])
                            <!-- Single gallery Item -->
                            <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('foto_produk') }}/{{ $item->foto }}" alt="">
                                    <div class="product-quicview">
                                        <a href="#" data-toggle="modal" data-target="#quickview{{ $item->id }}"><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">Rp.{{ number_format($item->harga) }}</h4>
                                    <p>{{ $item->nama }}</p>
                                    <!-- Add to Cart -->
                                    <a href="{{ route('toko.produk.detail', $item->id) }}" class="add-to-cart-btn">Selengkapnya</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('components.web.footer')
@endsection