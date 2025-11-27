@extends('user.layouts.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Profile Pengguna</h6>
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
                <label class="form-control-label">Email</label>
                <input class="form-control" type="email" placeholder="Masukkan email">
              </div>
            </div>
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
                <label class="form-control-label">Tanggal Lahir</label>
                <input class="form-control" type="date">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection