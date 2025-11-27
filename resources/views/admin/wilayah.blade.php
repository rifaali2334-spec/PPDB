@extends('admin.layouts_admin.main')
@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Kelola Wilayah</h6>
          </div>
          <div class="col-6 text-end">
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Wilayah</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($wilayah) && count($wilayah) > 0)
                @foreach($wilayah as $w)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $w->nama }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $w->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $w->kode ?? '-' }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold">{{ $w->tipe ?? 'Umum' }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="badge badge-sm bg-gradient-{{ $w->aktif ? 'success' : 'secondary' }}">{{ $w->aktif ? 'Aktif' : 'Nonaktif' }}</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-sm btn-outline-secondary" onclick="editWilayah({{ $w->id }}, '{{ $w->nama }}', '{{ $w->kode }}', '{{ $w->deskripsi }}', '{{ $w->tipe }}', {{ $w->aktif }})">Edit</button>
                    <form method="POST" action="{{ route('admin.wilayah.delete', $w->id) }}" style="display:inline" onsubmit="return confirm('Yakin hapus wilayah ini?')">
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
                    <p class="text-sm mb-0">Belum ada data wilayah</p>
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
        <h5 class="modal-title">Tambah Wilayah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.wilayah.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Wilayah</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label>Kode Wilayah</label>
            <input type="text" class="form-control" name="kode" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <select class="form-control" name="tipe" required>
              <option value="Umum">Umum</option>
              <option value="Khusus">Khusus</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="aktif" required>
              <option value="1">Aktif</option>
              <option value="0">Nonaktif</option>
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
        <h5 class="modal-title">Edit Wilayah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" id="formEdit">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Wilayah</label>
            <input type="text" class="form-control" name="nama" id="editNama" required>
          </div>
          <div class="form-group">
            <label>Kode Wilayah</label>
            <input type="text" class="form-control" name="kode" id="editKode" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="editDeskripsi" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <select class="form-control" name="tipe" id="editTipe" required>
              <option value="Umum">Umum</option>
              <option value="Khusus">Khusus</option>
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="aktif" id="editAktif" required>
              <option value="1">Aktif</option>
              <option value="0">Nonaktif</option>
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
function editWilayah(id, nama, kode, deskripsi, tipe, aktif) {
  document.getElementById('formEdit').action = '/admin/wilayah/' + id;
  document.getElementById('editNama').value = nama;
  document.getElementById('editKode').value = kode || '';
  document.getElementById('editDeskripsi').value = deskripsi || '';
  document.getElementById('editTipe').value = tipe || 'Umum';
  document.getElementById('editAktif').value = aktif;
  new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>
@endsection