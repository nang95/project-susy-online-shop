@section('css')
    <style>
        .desc-detail-variasi{
            background: white;
            border-radius: 5px; 
            min-width: 100px; 
            margin-right: 10px;
            margin-bottom: 20px;
            height: 30px;
        }
    </style>
@endsection

<div class="modal fade" id="quickview{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="quickview{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="quickview_pro_img">
                                    <img src="{{ asset('foto_produk') }}/{{ $item->foto }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="title">{{ $item->nama }}</h4>
                                    <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <h5 class="price">Rp. {{ number_format($item->harga) }}</h5>
                                    <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}</p>
                                    <a href="#">Selengkapnya</a>
                                </div>
                                <form action="{{ route('toko.keranjang.insert') }}" method="post">
                                    @csrf @method('POST')
                                        @foreach ($item->variasi()->get() as $variasi)
                                            <div class="desc-detail-variasi" style="display: block !important">
                                                <div class="form-check">
                                                    <input name="variasi_id" 
                                                    class="form-check-input" 
                                                    type="radio" 
                                                    value="{{ $variasi->id }}" id="{{ $variasi->id }}">
                                                    <label class="form-check-label" for="{{ $variasi->id }}">
                                                    {{ $variasi->nama }}
                                                    </label>
                                                </div>  
                                            </div>
                                        @endforeach
                                    <div class="cart">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="jumlah" value="1">

                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" class="cart-submit">Tambah Ke keranjang</button>
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>