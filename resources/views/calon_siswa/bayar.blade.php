@extends('admin.layouts_admin.main')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Pembayaran Pendaftaran</h6>
        <p class="text-sm mb-0">Biaya Pendaftaran: <strong>Rp 550.000</strong></p>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif

        @if($statusPembayaran)
          <div class="row mb-4">
            <div class="col-md-6">
              <h6>Status Pembayaran</h6>
              @if($statusPembayaran->status == 'VERIFIED')
                <span class="badge bg-success">Pembayaran Diterima</span>
              @elseif($statusPembayaran->status == 'REJECTED')
                <span class="badge bg-danger">Pembayaran Ditolak</span>
              @else
                <span class="badge bg-warning">Menunggu Verifikasi</span>
              @endif
            </div>
            <div class="col-md-6">
              <h6>Tanggal Upload</h6>
              <p>{{ date('d/m/Y H:i', strtotime($statusPembayaran->created_at)) }}</p>
            </div>
          </div>

          @if($statusPembayaran->bukti_pembayaran)
            <div class="row mb-4">
              <div class="col-12">
                <h6>Bukti Pembayaran yang Diupload</h6>
                <div class="card">
                  <div class="card-body text-center">
                    @php
                      $fileExtension = pathinfo($statusPembayaran->bukti_pembayaran, PATHINFO_EXTENSION);
                    @endphp
                    
                    @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']))
                      <img src="{{ asset('uploads/pembayaran/' . $statusPembayaran->bukti_pembayaran) }}" 
                           alt="Bukti Pembayaran" 
                           class="img-fluid" 
                           style="max-height: 400px;">
                    @else
                      <div class="py-4">
                        <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>
                        <p>File PDF: {{ $statusPembayaran->bukti_pembayaran }}</p>
                      </div>
                    @endif
                    
                    <div class="mt-3">
                      <a href="{{ asset('uploads/pembayaran/' . $statusPembayaran->bukti_pembayaran) }}" 
                         target="_blank" 
                         class="btn btn-primary">
                        <i class="fas fa-download"></i> Download Bukti
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if($statusPembayaran->status == 'REJECTED')
            <div class="alert alert-warning">
              <strong>Pembayaran Ditolak!</strong> Silakan upload ulang bukti pembayaran yang valid.
            </div>
          @endif
        @endif

        @if(!$statusPembayaran || $statusPembayaran->status == 'REJECTED')
          <div class="row">
            <div class="col-12">
              <h6>Upload Bukti Pembayaran</h6>
              <form method="POST" action="{{ route('calon.siswa.bayar.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="bukti_pembayaran" class="form-label">Pilih File Bukti Pembayaran</label>
                  <input type="file" 
                         class="form-control" 
                         id="bukti_pembayaran" 
                         name="bukti_pembayaran" 
                         accept=".jpg,.jpeg,.png,.pdf" 
                         required>

                </div>
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                </button>
              </form>
            </div>
          </div>
        @endif

        @if($statusPembayaran && $statusPembayaran->status == 'VERIFIED')
          <div class="alert alert-success">
            <strong>Pembayaran Berhasil Diverifikasi!</strong> 
            Bukti pembayaran Anda telah diterima dan diverifikasi oleh tim keuangan.
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection