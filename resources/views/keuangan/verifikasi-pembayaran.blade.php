@extends('keuangan.layouts.main')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Verifikasi Pembayaran</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Pendaftaran</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Siswa</th>


                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($pembayaran) && count($pembayaran) > 0)
                @foreach($pembayaran as $p)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $p->no_pendaftaran ?? 'N/A' }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->nama_siswa ?? 'N/A' }}</p>
                  </td>


                  <td class="align-middle text-center">
                    @if($p->bukti_pembayaran)
                      <a href="{{ asset('uploads/pembayaran/' . $p->bukti_pembayaran) }}" target="_blank" class="btn btn-sm btn-outline-info">Lihat Bukti</a>
                    @else
                      <span class="text-muted">Tidak ada</span>
                    @endif
                  </td>
                  <td class="align-middle text-center text-sm">
                    @if($p->status == 'VERIFIED')
                      <span class="badge badge-sm bg-gradient-success">Diterima</span>
                    @elseif($p->status == 'REJECTED')
                      <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                    @else
                      <span class="badge badge-sm bg-gradient-warning">Menunggu</span>
                    @endif
                  </td>
                  <td class="align-middle">
                    @if($p->status == 'PENDING')
                      <form method="POST" action="{{ route('keuangan.verifikasi.terima', $p->id) }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success me-1">Terima</button>
                      </form>
                      <form method="POST" action="{{ route('keuangan.verifikasi.tolak', $p->id) }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                      </form>
                    @else
                      <span class="text-muted">Sudah diproses</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5" class="text-center py-4">
                    <p class="text-sm mb-0">Tidak ada pembayaran yang perlu diverifikasi</p>
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection