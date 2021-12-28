@extends('layouts.apps.dashboard')

@section('content')
<div class="row">
    <div class="col mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Produk</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $produk }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-box text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pesanan Hari Ini</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $pemesanan }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-box-open text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pelanggan</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $pelanggan }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Pemesanan Hari Ini</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemesan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pemesanan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($pemesanan_hari_ini) === 0)
                    <tr>
                        <td colspan="8" style="text-align:center">
                          <span>Data Kosong</span>
                        </td>
                    </tr>
                  @endif
                  @foreach ($pemesanan_hari_ini as $data_pemesanan_hari_ini)
                  <tr>
                    <td>{{ $data_pemesanan_hari_ini->pelanggan->nama }}</td>
                    <td>{{ date('Y-m-d', strtotime($data_pemesanan_hari_ini->tanggal_pemesanan)) }}</td>
                    <td>{{ $data_pemesanan_hari_ini->getStatus($data_pemesanan_hari_ini->status) }}</td>
                    <td>Rp. {{ number_format($data_pemesanan_hari_ini->total_pembayaran) }}</td>
                  </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Pesanan Yang Terkirim</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemesan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pemesanan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @if (count($pemesanan_terkirim) === 0)
                  <tr>
                      <td colspan="8" style="text-align:center">
                        <span>Data Kosong</span>
                      </td>
                  </tr>
                @endif
                @foreach ($pemesanan_terkirim as $data_pemesanan_terkirim)
                <tr>
                  <td>{{ $data_pemesanan_terkirim->pelanggan->nama }}</td>
                  <td>{{ date('Y-m-d', strtotime($data_pemesanan_terkirim->tanggal_pemesanan)) }}</td>
                  <td>Rp. {{ number_format($data_pemesanan_terkirim->total_pembayaran) }}</td>
                </tr>  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
