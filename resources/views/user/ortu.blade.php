@extends('user.layouts.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Data Orang Tua</h6>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        <form method="POST" action="{{ route('pengguna.ortu.store') }}">          @csrf
          <h6 class="text-primary">Data Ayah</h6>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Ayah</label>
                <input class="form-control" type="text" name="nama_ayah" maxlength="120" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Pekerjaan Ayah</label>
                <input class="form-control" type="text" name="pekerjaan_ayah" maxlength="100" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">No. HP Ayah</label>
            <input class="form-control" type="text" name="hp_ayah" maxlength="20" required>
          </div>
          
          <h6 class="text-success mt-4">Data Ibu</h6>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Ibu</label>
                <input class="form-control" type="text" name="nama_ibu" maxlength="120" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Pekerjaan Ibu</label>
                <input class="form-control" type="text" name="pekerjaan_ibu" maxlength="100" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">No. HP Ibu</label>
            <input class="form-control" type="text" name="hp_ibu" maxlength="20" required>
          </div>
          
          <h6 class="text-info mt-4">Data Wali (Opsional)</h6>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Wali</label>
                <input class="form-control" type="text" name="wali_nama" maxlength="120">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">No. HP Wali</label>
                <input class="form-control" type="text" name="wali_hp" maxlength="20">
              </div>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan Data Orang Tua</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection