@extends('user.layouts.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Status Pendaftaran</p>
                <h4 class="font-weight-bolder mb-0 text-warning">Belum Lengkap</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-single-copy-04 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Status Berkas</p>
                <h4 class="font-weight-bolder mb-0 text-secondary">Belum Upload</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                <i class="ni ni-folder-17 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Status Pembayaran</p>
                <h4 class="font-weight-bolder mb-0 text-secondary">Belum Bayar</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row justify-content-center mt-4">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header pb-0 text-center">
          <h5 class="mb-0">Menu Pendaftaran</h5>
        </div>
        <div class="card-body pt-4">
          <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
              <a href="{{ route('pengguna.formulir') }}" class="btn btn-success w-100 py-3">
                <i class="ni ni-single-copy-04 me-2"></i>Formulir Pendaftaran
              </a>
            </div>
            <div class="col-md-6 mb-3">
              <a href="{{ route('pengguna.monitoring') }}" class="btn btn-info w-100 py-3">
                <i class="ni ni-chart-bar-32 me-2"></i>Monitoring Progres
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection