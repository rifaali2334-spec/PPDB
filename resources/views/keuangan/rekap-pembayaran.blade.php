@extends('keuangan.layouts.main')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Rekap Pembayaran</h6>
          </div>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-primary mb-0">Export Excel</button>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <form method="GET" action="{{ route('keuangan.rekap-pembayaran') }}">
          <div class="row px-3 mb-3">
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control" value="{{ request('tanggal_selesai') }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary d-block">Filter</button>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label">&nbsp;</label>
                <a href="{{ route('keuangan.rekap-pembayaran') }}" class="btn btn-outline-secondary d-block">Reset</a>
              </div>
            </div>
          </div>
        </form>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Pendaftaran</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Siswa</th>

                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Verifikator</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($rekap) && count($rekap) > 0)
                @foreach($rekap as $r)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ date('d/m/Y', strtotime($r->created_at)) }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $r->no_pendaftaran ?? 'N/A' }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $r->nama_siswa ?? 'N/A' }}</p>
                  </td>

                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-{{ $r->status == 'VERIFIED' ? 'success' : ($r->status == 'REJECTED' ? 'danger' : 'warning') }}">{{ $r->status == 'VERIFIED' ? 'Terverifikasi' : ($r->status == 'REJECTED' ? 'Ditolak' : 'Menunggu') }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">Admin</span>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5" class="text-center py-4">
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