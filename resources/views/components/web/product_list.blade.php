<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="karl-projects-menu mb-100">
        <div class="text-center portfolio-menu">
            @foreach ($kategori as $item)
                <button class="btn active" data-filter=".{{ $item->nama }}">{{ $item->nama }}</button>
            @endforeach
            <button class="btn active" data-filter=".all">Semua</button>
        </div>
    </div>

    <div class="container">
        <div class="row karl-new-arrivals">
            @foreach ($produk as $item)
                @include('components.web.modal_produk', ['item' => $item])
                <div class="col-12 col-sm-6 col-md-4 single_gallery_item 
                    @foreach ($item->kategori()->pluck('nama')->toArray() as $key => $value)
                        {{ $value }}
                    @endforeach all fadeInUpBig" data-wow-delay="0.2s">
                    <div class="product-img">
                        <img src="{{ asset('foto_produk') }}/{{ $item->foto }}" alt="">
                        <div class="product-quicview">
                            <a href="#" data-toggle="modal" data-target="#quickview{{ $item->id }}"><i class="ti-plus"></i></a>
                        </div>
                    </div>
                    <div class="product-description">
                        <h4 class="product-price">
                            Rp.{{ number_format($item->harga) }} 
                        </h4>
                        <p>{{ $item->nama }}</p>    
                        <a href="{{ route('toko.produk.detail', $item->id) }}" class="add-to-cart-btn">Lihat Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>