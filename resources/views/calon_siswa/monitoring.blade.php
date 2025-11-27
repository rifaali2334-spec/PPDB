@extends('admin.layouts_admin.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Monitoring Progres Pendaftaran</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahapan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-secondary opacity-7">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Biodata Siswa</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  @if($dataSiswa)
                    <span class="badge badge-sm bg-gradient-success">Lengkap</span>
                  @else
                    <span class="badge badge-sm bg-gradient-secondary">Belum Lengkap</span>
                  @endif
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">
                    {{ $dataSiswa ? $dataSiswa->created_at->format('d/m/Y') : '-' }}
                  </span>
                </td>
                <td class="align-middle">
                  <span class="text-secondary text-xs">
                    {{ $dataSiswa ? 'Biodata sudah lengkap' : 'Silakan lengkapi biodata' }}
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Data Orang Tua</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  @if($dataOrtu)
                    <span class="badge badge-sm bg-gradient-success">Lengkap</span>
                  @else
                    <span class="badge badge-sm bg-gradient-secondary">Belum Lengkap</span>
                  @endif
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">
                    {{ $dataOrtu ? $dataOrtu->created_at->format('d/m/Y') : '-' }}
                  </span>
                </td>
                <td class="align-middle">
                  <span class="text-secondary text-xs">
                    {{ $dataOrtu ? 'Data orang tua sudah lengkap' : 'Silakan lengkapi data orang tua' }}
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Upload Berkas</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  @if($berkas)
                    <span class="badge badge-sm bg-gradient-success">Sudah Upload</span>
                  @else
                    <span class="badge badge-sm bg-gradient-secondary">Belum Upload</span>
                  @endif
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">
                    {{ $berkas ? $berkas->created_at->format('d/m/Y') : '-' }}
                  </span>
                </td>
                <td class="align-middle">
                  <span class="text-secondary text-xs">
                    {{ $berkas ? 'Berkas sudah diupload' : 'Silakan upload berkas pendaftaran' }}
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Pembayaran</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  @if($pendaftar)
                    @if($pendaftar->status == 'PAID')
                      <span class="badge badge-sm bg-gradient-success">Sudah Bayar</span>
                    @elseif($pendaftar->status == 'ADM_PASS')
                      <span class="badge badge-sm bg-gradient-success">Verifikasi Diterima</span>
                    @elseif($pendaftar->status == 'ADM_REJECT')
                      <span class="badge badge-sm bg-gradient-danger">Verifikasi Ditolak</span>
                    @elseif($pendaftar->status == 'SUBMIT')
                      <span class="badge badge-sm bg-gradient-info">Menunggu Verifikasi</span>
                    @else
                      <span class="badge badge-sm bg-gradient-secondary">Belum Bayar</span>
                    @endif
                  @else
                    <span class="badge badge-sm bg-gradient-secondary">Belum Bayar</span>
                  @endif
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">
                    {{ $pendaftar && $pendaftar->tgl_verifikasi_payment ? \Carbon\Carbon::parse($pendaftar->tgl_verifikasi_payment)->format('d/m/Y') : '-' }}
                  </span>
                </td>
                <td class="align-middle">
                  <span class="text-secondary text-xs">
                    @if($pendaftar)
                      @if($pendaftar->status == 'PAID')
                        Pembayaran sudah diverifikasi
                      @elseif($pendaftar->status == 'ADM_PASS')
                        Administrasi diterima, silakan lakukan pembayaran
                      @elseif($pendaftar->status == 'ADM_REJECT')
                        Administrasi ditolak, silakan perbaiki data
                      @elseif($pendaftar->status == 'SUBMIT')
                        Menunggu verifikasi panitia
                      @else
                        Silakan lakukan pembayaran
                      @endif
                    @else
                      Silakan lakukan pembayaran
                    @endif
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection