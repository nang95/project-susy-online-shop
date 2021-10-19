@extends('layouts.dashboard.dashboard')

@section('breadcrumbs')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Master</a></li>
  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Produk</li>
</ol>
<h6 class="font-weight-bolder mb-0">Produk</h6>
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
            <h6>Data Produk</h6>
            <div class="d-flex justify-content-between">
              <a href="{{ route('admin.produk.create') }}">
                <button class="btn btn-sm btn-success" style="padding-left: 10px; padding-right: 10px">Tambah</button>
              </a>
              <form action="{{ route('admin.produk') }}" method="GET">
                <input type="text" name="q_nama" class="form-control" placeholder="Cari Nama" value="{{ $q_nama }}">
              </form>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($produk) === 0)
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
                  @foreach ($produk as $data_produk)
                  <tr>
                    <td>{{ $data_produk->nama }}</td>
                    <td>
                      <a href="{{ asset('foto_produk') }}/{{$data_produk->foto}}">Download</a>
                    </td>
                    <td>{{ Str::limit($data_produk->deskripsi, 10) }}</td>
                    <td>
                      @foreach ($data_produk->kategori()->pluck('nama')->toArray() as $key => $value)
                        <label class="label label-success">{{ $value }},</label>
                      @endforeach
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('admin.produk.edit', $data_produk->id) }}" 
                          class="text-secondary font-weight-bold text-xs" 
                          style="padding-right: 7px"
                          data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                      <a href="{{ route('admin.produk.variasi', $data_produk->id) }}" 
                        class="text-secondary font-weight-bold text-xs" 
                        data-toggle="tooltip" data-original-title="Edit user">
                        Variasi
                      </a>
                      <form onsubmit="deleteThis(event)" action="{{ route('admin.produk.delete') }}" method="POST" style="display:inline-block">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <input type="hidden" name="id" value="{{ $data_produk->id }}">
                        <button class="text-secondary font-weight-bold text-xs" style="background: none; border: 0px">Hapus</button>
                      </form>
                    </td>
                  </tr>  
                  @endforeach
                </tbody>
              </table>
              <div class="text-center">
                {{ $produk->appends(['q_nama' => $q_nama])->links() }}
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