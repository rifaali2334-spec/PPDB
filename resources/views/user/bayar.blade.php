@extends('user.layouts.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Pembayaran PPDB</h6>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        @if(isset($statusPembayaran))
          @if($statusPembayaran->status == 'VERIFIED')
            <div class="alert alert-success" role="alert">
              <strong>Selamat!</strong> Pembayaran Anda telah diverifikasi dan diterima oleh keuangan.
            </div>
          @elseif($statusPembayaran->status == 'REJECTED')
            <div class="alert alert-danger" role="alert">
              <strong>Maaf!</strong> Pembayaran Anda ditolak oleh keuangan. Silakan upload ulang bukti pembayaran yang valid.
            </div>
          @elseif($statusPembayaran->status == 'PENDING')
            <div class="alert alert-info" role="alert">
              <strong>Info:</strong> Bukti pembayaran Anda sedang dalam proses verifikasi oleh keuangan. Mohon tunggu.
            </div>
          @endif
        @endif
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <h6 class="text-primary">Informasi Pembayaran</h6>
                <hr>
                <div class="row">
                  <div class="col-6">
                    <p class="text-sm mb-1"><strong>Biaya Pendaftaran:</strong></p>
                    <h5 class="text-success">Rp 550.000</h5>
                  </div>
                  <div class="col-6">
                    <p class="text-sm mb-1"><strong>Status:</strong></p>
                    @if(isset($statusPembayaran))
                      @if($statusPembayaran->status == 'VERIFIED')
                        <span class="badge badge-sm bg-gradient-success">Pembayaran Diterima</span>
                      @elseif($statusPembayaran->status == 'REJECTED')
                        <span class="badge badge-sm bg-gradient-danger">Pembayaran Ditolak</span>
                      @else
                        <span class="badge badge-sm bg-gradient-warning">Menunggu Verifikasi</span>
                      @endif
                    @else
                      <span class="badge badge-sm bg-gradient-secondary">Belum Upload</span>
                    @endif
                  </div>
                </div>
                

                <form method="POST" action="{{ route('pengguna.bayar.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="form-control-label">Upload Bukti Pembayaran</label>
                    <input class="form-control" type="file" name="bukti_pembayaran" accept="image/*,.pdf" required>
                    <small class="text-muted">Format: JPG, PNG, PDF (Max: 2MB)</small>
                  </div>
                  
                  <div class="text-end">
                    @if(isset($statusPembayaran) && $statusPembayaran->status == 'VERIFIED')
                      <button type="submit" class="btn btn-success" disabled>
                        <i class="ni ni-check-bold me-1"></i>Pembayaran Terverifikasi
                      </button>
                    @else
                      <button type="submit" class="btn btn-primary">
                        <i class="ni ni-cloud-upload-96 me-1"></i>Kirim Bukti Pembayaran
                      </button>
                    @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h6 class="text-warning">Petunjuk Pembayaran</h6>
                <hr>
                <ol class="text-sm">
                  <li>Lakukan pembayaran sesuai nominal</li>
                  <li>Simpan bukti pembayaran</li>
                  <li>Upload bukti pembayaran di form</li>
                  <li>Tunggu verifikasi dari keuangan</li>
                </ol>
                
                <div class="alert alert-info text-sm mt-3">
                  <strong>Penting:</strong> Upload bukti pembayaran yang jelas dan dapat dibaca. Pembayaran akan diverifikasi dalam 1x24 jam.
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