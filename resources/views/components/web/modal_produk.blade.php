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
                                    {{-- <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div> --}}
                                    <h5 class="price">
                                        Rp. {{ number_format($item->harga) }}  
                                    </h5>
                                    <p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 200) }}</p>
                                    <a href="{{ route('toko.produk.detail', $item->id) }}" class="add-to-cart-btn">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>