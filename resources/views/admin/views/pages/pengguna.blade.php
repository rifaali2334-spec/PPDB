@extends('admin.layouts_admin.main')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Data Pengguna</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No HP</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @if(isset($pengguna) && count($pengguna) > 0)
                @foreach($pengguna as $p)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $p->nama }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->email }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $p->role }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">{{ $p->hp ?? '-' }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-{{ $p->aktif ? 'success' : 'secondary' }}">{{ $p->aktif ? 'Aktif' : 'Nonaktif' }}</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editPenggunaModal{{ $p->id }}">Edit</button>
                    <form method="POST" action="{{ route('admin.pengguna.delete', $p->id) }}" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6" class="text-center py-4">
                    <p class="text-sm mb-0">Belum ada data pengguna</p>
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

<!-- Add Pengguna Modal -->
<div class="modal fade" id="addPenggunaModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('admin.pengguna.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
              <option value="keuangan">Keuangan</option>
              <option value="panitia">Panitia</option>
              <option value="kepala sekolah">Kepala Sekolah</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" class="form-control" name="hp">
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-control" name="aktif">
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

<!-- Edit Pengguna Modals -->
@if(isset($pengguna) && count($pengguna) > 0)
  @foreach($pengguna as $p)
  <div class="modal fade" id="editPenggunaModal{{ $p->id }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form method="POST" action="{{ route('admin.pengguna.update', $p->id) }}">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="{{ $p->nama }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $p->email }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" value="{{ $p->password_hash }}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Role</label>
              <select class="form-control" name="role" required>
                <option value="user" {{ $p->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $p->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="keuangan" {{ $p->role == 'keuangan' ? 'selected' : '' }}>Keuangan</option>
                <option value="panitia" {{ $p->role == 'panitia' ? 'selected' : '' }}>Panitia</option>
                <option value="kepala sekolah" {{ $p->role == 'kepala sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">No HP</label>
              <input type="text" class="form-control" name="hp" value="{{ $p->hp }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select class="form-control" name="aktif">
                <option value="1" {{ $p->aktif == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $p->aktif == 0 ? 'selected' : '' }}>Nonaktif</option>
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
  @endforeach
@endif
@endsection