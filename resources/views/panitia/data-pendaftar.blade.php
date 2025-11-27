@extends('panitia.layouts_panitia.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Data Semua Pendaftar</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Pendaftaran</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jurusan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Daftar</th>
                </tr>
              </thead>
              <tbody>
                @forelse($pendaftars as $index => $pendaftar)
                <tr>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $pendaftar->nama }}</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pendaftar->no_pendaftaran }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Jurusan {{ $pendaftar->jurusan_id }}</p>
                  </td>
                  <td>
                    @if($pendaftar->status == 'SUBMIT')
                      <span class="badge badge-sm bg-gradient-warning">Pending</span>
                    @elseif($pendaftar->status == 'ADM_PASS')
                      <span class="badge badge-sm bg-gradient-success">Terverifikasi</span>
                    @elseif($pendaftar->status == 'ADM_REJECT')
                      <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                    @else
                      <span class="badge badge-sm bg-gradient-info">{{ $pendaftar->status }}</span>
                    @endif
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $pendaftar->tanggal_daftar ? date('Y-m-d', strtotime($pendaftar->tanggal_daftar)) : '-' }}</p>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data pendaftar</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection