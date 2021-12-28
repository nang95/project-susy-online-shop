@extends('layouts.apps.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="{{ route('admin.pemesanan') }}">Pemesanan</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Pemesanan</li>
</ol>
<h6 class="font-weight-bolder mb-0">Detail Pemesanan</h6>
@endsection

@section('content')
@if(Session::has('flash_message'))
<script type="text/javascript">
    Swal.fire("Berhasil!","{{ Session('flash_message') }}", "success");
</script>
@endif
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Detail Pelanggan</h6>
        </div>
        <div class="card-body pl-2 pr-2 pt-0 pb-2">
          <div class="row">
            <div class="col-2">Nama</div>
            <div class="col-8">: {{ $pelanggan->nama }}</div>
          </div>
          <div class="row">
            <div class="col-2">Provinsi</div>
            <div class="col-8">: {{ $pelanggan->provinsi }}</div>
          </div>
          <div class="row">
            <div class="col-2">Kabupaten</div>
            <div class="col-8">: {{ $pelanggan->kabupaten }}</div>
          </div>
          <div class="row">
            <div class="col-2">Kecamatan</div>
            <div class="col-8">: {{ $pelanggan->kecamatan }}</div>
          </div>
          <div class="row">
            <div class="col-2">No. Telp</div>
            <div class="col-8">: {{ $pelanggan->no_telfon }}</div>
          </div>
          <div class="row">
            <div class="col-2">Alamat Lengkap</div>
            <div class="col-8">: {{ $pelanggan->alamat_lengkap }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Data Detail Pemesanan</h6>
            <div class="d-flex justify-content-between">
              <div></div>
              <form action="{{ route('admin.pemesanan.detail_pemesanan', [$pemesanan->id, $pelanggan->id]) }}" method="GET">
                <input type="text" name="q_nama" class="form-control" placeholder="Cari Nama" value="{{ $q_nama }}">
              </form>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barang</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($detail_pemesanan) === 0)
                    <tr>
                        <td colspan="8" style="text-align:center">
                            @if ($q_nama == "")
                                <span>Data Kosong</span>
                            @else
                                <span>Kriteria yang anda cari tidak sesuai</span>
                            @endif
                        </td>
                    </tr>
                  @endif
                  @foreach ($detail_pemesanan as $data_detail_pemesanan)
                  <tr>
                    <td>{{ $data_detail_pemesanan->variasi->produk->nama }} - ({{ $data_detail_pemesanan->variasi->nama }})</td>
                    <td>{{ $data_detail_pemesanan->jumlah }}</td>
                  </tr>  
                  @endforeach
                </tbody>
              </table>
              <div class="text-center">
                {{ $detail_pemesanan->appends(['q_nama' => $q_nama])->links() }}
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
<script type="text/javascript">
  function deleteThis(e){
      e.preventDefault();
      Swal.fire({
      title: "<div style='font-size:20px'>Apakah anda yakin?</div>",
      html: "<div style='font-size:15px'>Data akan dihapus secara permanen!</div>",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
      })
      .then((res) => {
          if (res.isConfirmed) {
              e.target.submit();
              swal("Data telah dihapus!", {
              icon: "success",
              });
          }
      });

      return false;
  }
</script>
@endsection