@extends('keuangan.layouts.main')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Daftar Pembayaran Keseluruhan</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Pendaftaran</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Siswa</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jurusan</th>

                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Bayar</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7">Detail</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($daftarPembayaran) && count($daftarPembayaran) > 0)
                @foreach($daftarPembayaran as $dp)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $dp->no_pendaftaran }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $dp->nama_siswa }}</p>
                    <p class="text-xs text-secondary mb-0">{{ $dp->nik }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $dp->jurusan }}</p>
                  </td>

                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">{{ $dp->tanggal_upload ? date('d/m/Y', strtotime($dp->tanggal_upload)) : '-' }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-{{ $dp->status == 'VERIFIED' ? 'success' : ($dp->status == 'REJECTED' ? 'danger' : 'warning') }}">
                      {{ $dp->status == 'VERIFIED' ? 'Terverifikasi' : ($dp->status == 'REJECTED' ? 'Ditolak' : 'Menunggu') }}
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="#" class="text-secondary font-weight-bold text-xs">Lihat Detail</a>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center py-4">
                    <p class="text-sm mb-0">Belum ada data pembayaran</p>
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