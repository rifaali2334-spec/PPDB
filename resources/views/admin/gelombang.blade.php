@extends('admin.layouts_admin.main')
@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Kelola Gelombang</h6>
          </div>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Gelombang</button>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Gelombang</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Mulai</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Selesai</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($gelombang) && count($gelombang) > 0)
                @foreach($gelombang as $g)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $g->nama }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $g->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $g->tanggal_mulai ?? '-' }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold">{{ $g->tanggal_selesai ?? '-' }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="badge badge-sm bg-gradient-{{ $g->status == 'aktif' ? 'success' : 'secondary' }}">{{ ucfirst($g->status) }}</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-sm btn-outline-secondary" onclick="editGelombang({{ $g->id }}, '{{ $g->nama }}', '{{ $g->deskripsi }}', '{{ $g->tanggal_mulai }}', '{{ $g->tanggal_selesai }}', '{{ $g->status }}')">Edit</button>
                    <form method="POST" action="{{ route('admin.gelombang.delete', $g->id) }}" style="display:inline" onsubmit="return confirm('Yakin hapus gelombang ini?')">
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
                    <p class="text-sm mb-0">Belum ada data gelombang</p>
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
        <h5 class="modal-title">Tambah Gelombang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.gelombang.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Gelombang</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggal_selesai" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" required>
              <option value="nonaktif">Nonaktif</option>
              <option value="aktif">Aktif</option>
            </select>
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
        <h5 class="modal-title">Edit Gelombang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" id="formEdit">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Gelombang</label>
            <input type="text" class="form-control" name="nama" id="editNama" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="editDeskripsi" rows="3"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai" id="editTanggalMulai" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggal_selesai" id="editTanggalSelesai" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="editStatus" required>
              <option value="nonaktif">Nonaktif</option>
              <option value="aktif">Aktif</option>
            </select>
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
function editGelombang(id, nama, deskripsi, tanggal_mulai, tanggal_selesai, status) {
  document.getElementById('formEdit').action = '/admin/gelombang/' + id;
  document.getElementById('editNama').value = nama;
  document.getElementById('editDeskripsi').value = deskripsi || '';
  document.getElementById('editTanggalMulai').value = tanggal_mulai;
  document.getElementById('editTanggalSelesai').value = tanggal_selesai;
  document.getElementById('editStatus').value = status;
  new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>
@endsection