@extends('panitia.layouts_panitia.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Verifikasi Data Pendaftaran</h6>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Verifikasi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
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
                      <span class="badge badge-sm bg-gradient-warning">Menunggu</span>
                    @elseif($pendaftar->status == 'ADM_PASS')
                      <span class="badge badge-sm bg-gradient-success">Terverifikasi</span>
                    @elseif($pendaftar->status == 'ADM_REJECT')
                      <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                    @else
                      <span class="badge badge-sm bg-gradient-info">{{ $pendaftar->status }}</span>
                    @endif
                  </td>
                  <td>
                    <button class="btn btn-sm btn-success me-1" onclick="verifikasi({{ $pendaftar->id }}, 'ADM_PASS')">Terima</button>
                    <button class="btn btn-sm btn-danger" onclick="verifikasi({{ $pendaftar->id }}, 'ADM_REJECT')">Tolak</button>
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

<script>
function verifikasi(id, status) {
  const action = status === 'ADM_PASS' ? 'menerima' : 'menolak';
  if(confirm('Apakah Anda yakin ingin ' + action + ' pendaftar ini?')) {
    fetch(`/panitia/verifikasi-data/${id}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
      if(data.success) {
        alert('Status berhasil diupdate!');
        location.reload();
      } else {
        alert('Gagal mengupdate status!');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Terjadi kesalahan!');
    });
  }
}
</script>
@endsection