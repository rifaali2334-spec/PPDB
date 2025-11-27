@extends('keuangan.layouts.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Total Pembayaran</p>
                <h4 class="font-weight-bolder mb-0">{{ $totalPembayaran ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4">
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
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Sudah Terverifikasi</p>
                <h4 class="font-weight-bolder mb-0">{{ $sudahVerifikasi ?? 0 }}</h4>
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
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Total Berkas</p>
                <h4 class="font-weight-bolder mb-0">{{ $totalBerkas ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection