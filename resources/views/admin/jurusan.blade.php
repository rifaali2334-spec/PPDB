@extends('admin.layouts_admin.main')
@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Kelola Jurusan</h6>
          </div>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Jurusan</button>
          </div>
        </div>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Jurusan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kuota</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendaftar</th>
                <th class="text-secondary opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($jurusan) && count($jurusan) > 0)
                @foreach($jurusan as $j)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $j->nama }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $j->kode ?? '-' }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold">{{ $j->kuota ?? 0 }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold">0</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-sm btn-outline-secondary" onclick="editJurusan({{ $j->id }}, '{{ $j->nama }}', '{{ $j->kode }}', {{ $j->kuota }})">Edit</button>
                    <form method="POST" action="{{ route('admin.jurusan.delete', $j->id) }}" style="display:inline" onsubmit="return confirm('Yakin hapus jurusan ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5" class="text-center py-4">
                    <p class="text-sm mb-0">Belum ada data jurusan</p>
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
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.jurusan.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" class="form-control" name="nama_jurusan" required>
          </div>
          <div class="form-group">
            <label>Kode Jurusan</label>
            <input type="text" class="form-control" name="kode_jurusan" required>
          </div>
          <div class="form-group">
            <label>Kuota</label>
            <input type="number" class="form-control" name="kuota" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" id="formEdit">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" class="form-control" name="nama_jurusan" id="editNama" required>
          </div>
          <div class="form-group">
            <label>Kode Jurusan</label>
            <input type="text" class="form-control" name="kode_jurusan" id="editKode" required>
          </div>
          <div class="form-group">
            <label>Kuota</label>
            <input type="number" class="form-control" name="kuota" id="editKuota" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function editJurusan(id, nama, kode, kuota) {
  document.getElementById('formEdit').action = '/admin/jurusan/' + id;
  document.getElementById('editNama').value = nama;
  document.getElementById('editKode').value = kode;
  document.getElementById('editKuota').value = kuota;
  new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>
@endsection