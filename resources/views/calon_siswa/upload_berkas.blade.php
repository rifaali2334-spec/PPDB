@extends('admin.layouts_admin.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h5 class="mb-0">Upload Berkas</h5>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <form action="{{ route('calon-siswa.upload-berkas.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis">Jenis Berkas</label>
                <select class="form-control" name="jenis" required>
                  <option value="">Pilih Jenis Berkas</option>
                  <option value="IJAZAH">Ijazah</option>
                  <option value="RAPORT">Raport</option>
                  <option value="KIP">KIP</option>
                  <option value="KKS">KKS</option>
                  <option value="AKTA">Akta Kelahiran</option>
                  <option value="KK">Kartu Keluarga</option>
                  <option value="LAINNYA">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" class="form-control" name="foto" accept="image/*" required>
                <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Upload Berkas</button>
        </form>
        
        @if($berkas && count($berkas) > 0)
        <hr>
        <h6>Berkas yang Sudah Diupload</h6>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Jenis</th>
                <th>Nama File</th>
                <th>Ukuran</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($berkas as $item)
              <tr>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->nama_file }}</td>
                <td>{{ $item->ukuran_kb }} KB</td>
                <td>
                  @if($item->valid == 1)
                    <span class="badge bg-success">Valid</span>
                  @else
                    <span class="badge bg-warning">Menunggu Validasi</span>
                  @endif
                </td>
                <td>
                  <a href="{{ asset('storage/' . $item->url) }}" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection