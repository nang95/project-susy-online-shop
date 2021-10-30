<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function(){
    Route::get('login', 'LoginController@index')->name('login');
    Route::post('login', 'LoginController@login')->name('login.login');
    Route::get('daftar', 'RegisterController@index')->name('daftar');
    Route::post('daftar', 'RegisterController@insert')->name('daftar.insert');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::get('/', function(){})->middleware('checkUserLevel')->name('checkUserLevel');

    Route::prefix('/admin')->name('admin.')->middleware('admin')->namespace('Admin')->group(function(){
        Route::get('/', 'DashboardController@index')->name('/');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
        // kategori
        Route::get('kategori', 'KategoriController@index')->name('kategori');
        Route::get('kategori/create', 'KategoriController@create')->name('kategori.create');
        Route::post('kategori', 'KategoriController@insert')->name('kategori.insert');
        Route::get('kategori/edit/{kategori}', 'KategoriController@edit')->name('kategori.edit');
        Route::put('kategori', 'KategoriController@update')->name('kategori.update');
        Route::delete('kategori', 'KategoriController@delete')->name('kategori.delete');
    
        // produk
        Route::get('produk', 'ProdukController@index')->name('produk');
        Route::get('produk/create', 'ProdukController@create')->name('produk.create');
        Route::post('produk', 'ProdukController@insert')->name('produk.insert');
        Route::get('produk/edit/{produk}', 'ProdukController@edit')->name('produk.edit');
        Route::put('produk', 'ProdukController@update')->name('produk.update');
        Route::delete('produk', 'ProdukController@delete')->name('produk.delete');
    
        // produk
        Route::get('produk/variasi/{produk}', 'VariasiController@index')->name('produk.variasi');
        Route::get('produk/variasi/create/{produk}', 'VariasiController@create')->name('produk.variasi.create');
        Route::post('produk/variasi', 'VariasiController@insert')->name('produk.variasi.insert');
        Route::get('produk/edit/variasi/{variasi}/{produk}', 'VariasiController@edit')->name('produk.variasi.edit');
        Route::put('produk/variasi', 'VariasiController@update')->name('produk.variasi.update');
        Route::delete('produk/variasi', 'VariasiController@delete')->name('produk.variasi.delete');
    
        // pelanggan
        Route::get('pelanggan', 'PelangganController@index')->name('pelanggan');
        Route::delete('pelanggan', 'PelangganController@delete')->name('pelanggan.delete');
    
        // event
        Route::get('event', 'EventController@index')->name('event');
        Route::get('event/create', 'EventController@create')->name('event.create');
        Route::post('event', 'EventController@insert')->name('event.insert');
        Route::get('event/edit/{event}', 'EventController@edit')->name('event.edit');
        Route::put('event', 'EventController@update')->name('event.update');
        Route::delete('event', 'EventController@delete')->name('event.delete');
    
        // event produk
        Route::get('event/produk/{event}', 'EventProdukController@index')->name('event.produk');
        Route::get('event/produk/create/{event}', 'EventProdukController@create')->name('event.produk.create');
        Route::post('event/produk', 'EventProdukController@insert')->name('event.produk.insert');
        Route::get('event/produk/edit/{event_produk}/{event}', 'EventProdukController@edit')->name('event.produk.edit');
        Route::put('event/produk', 'EventProdukController@update')->name('event.produk.update');
        Route::delete('event/produk', 'EventProdukController@delete')->name('event.produk.delete');
    
        // carousel
        Route::get('carousel', 'CarouselController@index')->name('carousel');
        Route::get('carousel/create', 'CarouselController@create')->name('carousel.create');
        Route::post('carousel', 'CarouselController@insert')->name('carousel.insert');
        Route::get('carousel/edit/{carousel}', 'CarouselController@edit')->name('carousel.edit');
        Route::put('carousel', 'CarouselController@update')->name('carousel.update');
        Route::delete('carousel', 'CarouselController@delete')->name('carousel.delete');
    
        // pemesanan
        Route::get('pemesanan', 'pemesananController@index')->name('pemesanan');
        Route::get('pemesanan/edit/{pemesanan}', 'PemesananController@edit')->name('pemesanan.edit');
        Route::put('pemesanan', 'PemesananController@update')->name('pemesanan.update');
        Route::delete('pemesanan', 'pemesananController@delete')->name('pemesanan.delete');
    
        // Detail Pemesanan
        Route::get('pemesanan/detail_pemesanan/{pemesanan}', 'DetailPemesananController@index')->name('pemesanan.detail_pemesanan');
        Route::get('pemesanan/detail_pemesanan/edit/{detail_pemesanan}/{pemesanan}', 'DetailPemesananController@edit')->name('pemesanan.detail_pemesanan.edit');
        Route::put('pemesanan/detail_pemesanan', 'DetailPemesananController@update')->name('pemesanan.detail_pemesanan.update');
        Route::delete('detail_pemesanan', 'DetailPemesananController@delete')->name('pemesanna.detail_pemesanan.delete');
    
        // Kontak
        Route::get('kontak', 'KontakController@index')->name('kontak');
        Route::put('kontak', 'KontakController@update')->name('kontak.update');
    });

    Route::prefix('/toko')->name('toko.')->middleware('pelanggan')->namespace('Web')->group(function(){
        Route::get('keranjang', 'KeranjangController@index')->name('keranjang');
        Route::post('keranjang', 'KeranjangController@insert')->name('keranjang.insert');
        Route::delete('keranjang', 'KeranjangController@delete')->name('keranjang.delete');

        Route::post('checkout/proses', 'CheckoutController@index')->name('checkout.index');
        Route::post('checkout', 'CheckoutController@insert')->name('checkout.insert');

        Route::get('akun', 'AkunController@index')->name('akun');
        Route::put('akun', 'AkunController@update')->name('akun.update');

        Route::get('pemesanan', 'PemesananController@index')->name('pemesanan');
        Route::post('pemesanan/konfirmasi', 'PemesananController@konfirmasi')->name('pemesanan.konfirmasi');
        Route::get('pemesanan/detail/{pemesanan}', 'DetailPemesananController@index')->name('pemesanan.detail');
    });
});

Route::prefix('/toko')->name('toko.')->namespace('Web')->group(function(){
    Route::get('/', 'BerandaController@index')->name('/');
    Route::get('beranda', 'BerandaController@index')->name('beranda');

    Route::get('produk', 'ProdukController@index')->name('produk');
    Route::get('produk/detail/{produk}', 'ProdukController@detail')->name('produk.detail');

    Route::get('promo', 'PromoController@index')->name('promo');
    Route::get('promo/detail/{promo}', 'PromoController@detail')->name('promo.detail');
    
    Route::get('tentang_kami', 'TentangKamiController@index')->name('tentang_kami');
});





