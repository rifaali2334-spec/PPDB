@extends('admin.layouts_admin.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body p-4">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Total Pengguna</p>
                <h4 class="font-weight-bolder mb-0">{{ $totalPengguna ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Total Jurusan</p>
                <h4 class="font-weight-bolder mb-0">{{ $totalJurusan ?? 0 }}</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold text-muted">Status PPDB</p>
                <h4 class="font-weight-bolder mb-0 text-success">Aktif</h4>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
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
          <h5 class="mb-0">Admin - Kelola Data Master</h5>
        </div>
        <div class="card-body pt-4">
          <h6 class="text-center mb-3">Data Master</h6>
          <div class="row justify-content-center">
            <div class="col-md-6 mb-3">
              <a href="{{ route('admin.jurusan') }}" class="btn btn-success w-100 py-3">
                <i class="ni ni-hat-3 me-2"></i>Kelola Jurusan
              </a>
            </div>
            <div class="col-md-6 mb-3">
              <a href="{{ route('admin.pengguna') }}" class="btn btn-primary w-100 py-3">
                <i class="ni ni-circle-08 me-2"></i>Kelola Pengguna/User
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection