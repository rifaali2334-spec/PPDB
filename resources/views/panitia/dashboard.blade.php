@extends('panitia.layouts_panitia.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Total Pendaftar</p>
                <h4 class="font-weight-bolder mb-0">{{ $totalPendaftar ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Data Diverifikasi</p>
                <h4 class="font-weight-bolder mb-0">{{ $dataVerifikasi ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Menunggu Verifikasi</p>
                <h4 class="font-weight-bolder mb-0">{{ $menungguVerifikasi ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row justify-content-center mt-4">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header pb-0 text-center">
          <h5 class="mb-0">Panitia - Menu Utama</h5>
        </div>
        <div class="card-body pt-4">
          <div class="row">
            <div class="col-md-6 mb-3">
              <a href="/panitia/data-pendaftar" class="btn btn-primary w-100 py-3">
                <i class="ni ni-single-02 me-2"></i>Lihat Data Pendaftar
              </a>
            </div>
            <div class="col-md-6 mb-3">
              <a href="/panitia/verifikasi-data" class="btn btn-success w-100 py-3">
                <i class="ni ni-check-bold me-2"></i>Verifikasi Data Pendaftaran
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection