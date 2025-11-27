@extends('admin.layouts_admin.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 text-center">
        <h5 class="mb-0">Formulir Pendaftaran</h5>
      </div>
      <div class="card-body pt-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <a href="{{ route('calon-siswa.biodata') }}" class="btn btn-primary w-100 py-3">
              <i class="ni ni-single-02 me-2"></i>Biodata Siswa
            </a>
          </div>
          <div class="col-md-6 mb-3">
            <a href="{{ route('calon-siswa.data-ortu') }}" class="btn btn-success w-100 py-3">
              <i class="ni ni-circle-08 me-2"></i>Data Orang Tua
            </a>
          </div>
          <div class="col-md-6 mb-3">
            <a href="{{ route('calon-siswa.asal-sekolah') }}" class="btn btn-info w-100 py-3">
              <i class="ni ni-hat-3 me-2"></i>Asal Sekolah
            </a>
          </div>
          <div class="col-md-6 mb-3">
            <a href="{{ route('calon-siswa.upload-berkas') }}" class="btn btn-warning w-100 py-3">
              <i class="ni ni-folder-17 me-2"></i>Upload Berkas
            </a>
          </div>
          <div class="col-md-12 mb-3">
            <a href="{{ route('calon-siswa.pembayaran') }}" class="btn btn-secondary w-100 py-3">
              <i class="ni ni-credit-card me-2"></i>Pembayaran
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection