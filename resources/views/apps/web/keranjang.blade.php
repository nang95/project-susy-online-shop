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
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Pilih</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $total = 0; 
                                @endphp
                                @foreach ($keranjang as $item)
                                @php
                                    $total += $item->variasi->produk->harga * $item->jumlah;   
                                @endphp
                                <tr>
                                    <td class="cart_product_img d-flex align-items-center">
                                        <a href="http://">
                                            <img src="{{ asset('foto_produk') }}/{{ $item->variasi->foto }}" style="width: 100px;height:100px;object-fit:cover" alt="Product">
                                        </a>
                                        <h6>{{ $item->variasi->produk->nama }} ({{ $item->variasi->nama }}) - (Ukuran {{ $item->variasi->ukuran }})</h6>
                                    </td>
                                    <td class="price">
                                        Rp. {{ number_format($item->variasi->produk->harga) }}
                                    </td>
                                    <td class="qty">
                                        <div class="quantity">
                                            <input type="number" disabled class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{ $item->jumlah }}">
                                        </div>
                                    </td>
                                    <td class="total_price">
                                        Rp. {{ number_format($item->variasi->produk->harga * $item->jumlah) }}
                                    </td>
                                    <td style="padding-bottom: 40px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" 
                                            data-id="{{ $item->id }}" 
                                            data-harga="{{ $item->variasi->produk->harga * $item->jumlah }}"
                                            data-jumlah="{{ $item->jumlah }}">
                                        </div>
                                    </td>
                                    <td >
                                        <form action="{{ route('toko.keranjang.delete') }}" method="post">
                                            @csrf @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                </div>
                <div class="col-12 col-lg-4">
                    <form action="{{ route('toko.checkout.index') }}" method="POST">
                        @csrf @method('POST')
                        <div class="cart-total-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Total keranjang</h5>
                                <p>Final info</p>
                            </div>
                            <ul class="cart-total-chart">
                                <li><span><strong>Total</strong></span> 
                                    <span><strong id="total">Rp. {{ number_format($total) }}</strong></span>
                                </li>
                            </ul>
                            <input type="hidden" name="product_collect" id="product-collect" value="">
                            <button type="submit" id="checkout" class="btn karl-checkout-btn" disabled>Proceed to checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.web.footer')
@endsection

@section('footer-scripts')
    <script>
        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0,
        });

        let formCheckInput = document.getElementsByClassName('form-check-input');
        let checkoutButton = document.getElementById('checkout');

        let total = 0;
        Array.from(formCheckInput).forEach(function(el){
            el.addEventListener('click', function(){
                let cartTotal = document.getElementById('total');
                if (this.checked) {
                    checkoutButton.removeAttribute('disabled');
                    total += Number(this.getAttribute('data-harga')) * Number(this.getAttribute('data-jumlah'));
                    cartTotal.innerHTML = `Rp. ${formatter.format(total).replace(/[IDR]/gi, '')
                                                                 .replace(/(\.+\d{2})/, '')
                                                                 .trimLeft()}`;
                }

                if (!this.checked) {
                    total -= Number(this.getAttribute('data-harga')) * Number(this.getAttribute('data-jumlah'));
                    cartTotal.innerHTML = `Rp. ${formatter.format(total).replace(/[IDR]/gi, '')
                                                                 .replace(/(\.+\d{2})/, '')
                                                                 .trimLeft()}`;
                }

                if (total == 0) {
                    cartTotal.innerHTML = `Rp. {{ number_format($total) }}`;
                    checkoutButton.setAttribute('disabled', true);
                }
            });
        });
        
    </script>

    <script>
        $(document).ready(function(){
        // insert
        $('.form-check-input').click(function(){
            if($(this).prop("checked") == true){
                const id = $(this).data('id');
                let oldValue = $('#product-collect').val();
                if(oldValue === ""){
                    $('#product-collect').val(oldValue + id);    
                }else{
                    $('#product-collect').val(oldValue + ';' + id);
                }
            }

            if($(this).prop("checked") == false){
                let str = $('#product-collect').val();
                let oldValues = str.split(';')
                let id = $(this).data('id');
                
                let filter = oldValues.filter(function(oldValue){
                    return oldValue === id.toString()
                });

                // hapus data                
                let removeData = str.split(filter)

                $('#product-collect').val(removeData.join(''))
            }
        })
    });
    </script>
@endsection