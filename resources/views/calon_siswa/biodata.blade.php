@extends('admin.layouts_admin.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Biodata Siswa</h6>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Lengkap</label>
                <input class="form-control" type="text" placeholder="Masukkan nama lengkap">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">NISN</label>
                <input class="form-control" type="text" placeholder="Masukkan NISN">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Tempat Lahir</label>
                <input class="form-control" type="text" placeholder="Masukkan tempat lahir">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Tanggal Lahir</label>
                <input class="form-control" type="date">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Jenis Kelamin</label>
                <select class="form-control">
                  <option>Pilih jenis kelamin</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Agama</label>
                <select class="form-control">
                  <option>Pilih agama</option>
                  <option>Islam</option>
                  <option>Kristen</option>
                  <option>Katolik</option>
                  <option>Hindu</option>
                  <option>Buddha</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">No. HP</label>
                <input class="form-control" type="text" placeholder="Masukkan nomor HP">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Email</label>
                <input class="form-control" type="email" placeholder="Masukkan email">
              </div>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan Biodata</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection