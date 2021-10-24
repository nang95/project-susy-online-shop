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
                                    <span class="cart_quantity">2</span> 
                                    <i class="ti-bag"></i>
                                </a>
                            </div>
                            <div class="cart" style="padding-left: 10px;">
                                <a href="{{ route('toko.akun') }}" id="header-cart-btn">
                                    <i class="ti-user"></i>
                                </a>
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
                        <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <div class="main-menu-area">
                        <nav class="navbar navbar-expand-lg align-items-start">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                            <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{ route('toko./') }}">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('toko.produk') }}">Produk</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Promo</a></li>
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