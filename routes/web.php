<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
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

    // pemesanan
    Route::get('pemesanan', 'pemesananController@index')->name('pemesanan');
    Route::delete('pemesanan', 'pemesananController@delete')->name('pemesanan.delete');

    Route::get('pemesanan', 'pemesananController@index')->name('pemesanan');
    Route::delete('pemesanan', 'pemesananController@delete')->name('pemesanan.delete');
});
