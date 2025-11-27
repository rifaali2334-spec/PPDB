@extends('admin.layouts_admin.main')
@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Data Siswa Pendaftar</h6>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Lahir</th>
                <th class="text-secondary opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($dataSiswa) && count($dataSiswa) > 0)
                @foreach($dataSiswa as $ds)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $ds->nik }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $ds->nama }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $ds->nisn }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">{{ $ds->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">{{ $ds->tmp_lahir }}</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-sm btn-outline-secondary" onclick="editSiswa({{ $ds->pendaftar_id }}, '{{ $ds->nik }}', '{{ $ds->nama }}', '{{ $ds->nisn }}', '{{ $ds->jk }}', '{{ $ds->tmp_lahir }}', '{{ $ds->tgl_lahir }}', '{{ $ds->almat }}')">Edit</button>
                    <form method="POST" action="{{ route('admin.data-siswa.delete', $ds->pendaftar_id) }}" style="display:inline" onsubmit="return confirm('Yakin hapus data siswa ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center py-4">
                    <p class="text-sm mb-0">Belum ada data siswa</p>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.data-siswa.store') }}">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" name="nik" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>NISN</label>
                <input type="text" class="form-control" name="nisn" maxlength="20" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" maxlength="120" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jk" required>
                  <option value="">Pilih jenis kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tmp_lahir" maxlength="60" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="almat" rows="3" required></textarea>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" id="formEdit">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" name="nik" id="editNik" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>NISN</label>
                <input type="text" class="form-control" name="nisn" id="editNisn" maxlength="20" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="editNama" maxlength="120" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jk" id="editJk" required>
                  <option value="">Pilih jenis kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tmp_lahir" id="editTmpLahir" maxlength="60" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="editTglLahir" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="almat" id="editAlamat" rows="3" required></textarea>
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
function editSiswa(id, nik, nama, nisn, jk, tmp_lahir, tgl_lahir, almat) {
  document.getElementById('formEdit').action = '/admin/data-siswa/' + id;
  document.getElementById('editNik').value = nik;
  document.getElementById('editNama').value = nama;
  document.getElementById('editNisn').value = nisn;
  document.getElementById('editJk').value = jk;
  document.getElementById('editTmpLahir').value = tmp_lahir;
  document.getElementById('editTglLahir').value = tgl_lahir;
  document.getElementById('editAlamat').value = almat;
  new bootstrap.Modal(document.getElementById('modalEdit')).show();
}
</script>
@endsection