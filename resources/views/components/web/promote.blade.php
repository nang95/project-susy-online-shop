@if ($event != null)
<section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url('{{ asset('img/bg-img/bg-5.jpg') }}');">
    <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-end">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                    <h2>{{ $event->nama }} <span class="karl-level">Hot</span></h2>
                    <form action="{{ route('toko.promo') }}" method="GET">
                        <input type="hidden" name="nama" value="{{ $event->nama }}">
                        <button href="{{ route('toko.produk') }}" class="btn karl-btn mt-30">Belanja Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endif