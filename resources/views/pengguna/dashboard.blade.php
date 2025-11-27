@extends('admin.layouts_admin.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Dashboard Pendaftar PPDB</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body text-center">
                  <h5>Selamat Datang!</h5>
                  <p>Silakan lengkapi data pendaftaran Anda</p>
                  <a href="#" class="btn btn-primary">Isi Data Pendaftaran</a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body text-center">
                  <h5>Status Pendaftaran</h5>
                  <p class="text-warning">Belum Lengkap</p>
                  <small>Lengkapi data untuk melanjutkan proses</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection