@if (count($top_event) == 2)
<section class="top_catagory_area d-md-flex clearfix">
    @foreach ($top_event as $item)
    <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url({{ asset('img/bg-img/bg-2.jpg') }});">
        <div class="catagory-content">
            <h2>{{ $item->nama }}</h2>
            <form action="{{ route('toko.promo') }}" method="GET">
                <input type="hidden" name="nama" value="{{ $event->nama }}">
                <a href="{{ route('toko.produk') }}" class="btn karl-btn">Belanja Sekarang</a>
            </form>
        </div>
    </div>
    @endforeach
</section>    
@endif
