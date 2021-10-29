<header class="header_area">
    <div class="top_header_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-end">
                <div class="col-12 col-lg-7">
                    <div class="top_single_area d-flex align-items-center">
                        <div class="top_logo">
                            <a href=""><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
                        </div>
                        <div class="header-cart-menu d-flex align-items-center ml-auto">
                            <div class="cart">
                                <a href="{{ route('toko.keranjang') }}" id="header-cart-btn">
                                    @if (!empty(auth()->user()->id))
                                        @php
                                            $pelanggan = App\Models\Pelanggan::where('user_id', auth()->user()->id)->first();
                                            $jumlah_keranjang = App\Models\PelangganKeranjang::where('pelanggan_id', $pelanggan->id)->count();
                                        @endphp
                                        <span class="cart_quantity">{{ $jumlah_keranjang }}</span> 
                                    @endif
                                    <i class="ti-bag"></i>
                                </a>
                            </div>
                            <div class="cart" style="padding-left: 10px;">
                                <a href="{{ route('toko.pemesanan') }}" id="header-cart-btn">
                                    @if (!empty(auth()->user()->id))
                                        @php
                                            $jumlah_pesanan = App\Models\Pemesanan::where('pelanggan_id', $pelanggan->id)->where('status', '!=', 2)->count();    
                                        @endphp
                                        <span class="cart_quantity">{{ $jumlah_pesanan }}</span> 
                                    @endif
                                    <i class="ti-truck"></i>
                                </a>
                            </div>
                            <div class="cart" style="padding-left: 10px;">
                                <a href="{{ route('toko.akun') }}" id="header-cart-btn">
                                    <i class="ti-user"></i>
                                </a>
                            </div>
                            <div class="cart" style="padding-left: 10px;">
                                <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" 
                                   id="header-cart-btn">
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}"
                                    method="POST" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="main_header_area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 d-md-flex justify-content-between">
                    <div class="header-social-area">
                        <a href="{{ $contact->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="{{ $contact->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <div class="main-menu-area">
                        <nav class="navbar navbar-expand-lg align-items-start">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                            <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{ route('toko./') }}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('toko.produk') }}">Produk</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('toko.promo') }}">Promo</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('toko.tentang_kami') }}">Tentang Kami</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="help-line">
                        <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> {{ $contact->no_telfon }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>