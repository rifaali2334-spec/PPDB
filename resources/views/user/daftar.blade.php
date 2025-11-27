@extends('user.layouts.main')

@section('content')
<div class="row mt-4">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Form Daftar PPDB</h6>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        
        @if(isset($statusPendaftaran) && $statusPendaftaran->status != 'DRAFT')
          <div class="alert 
            @if($statusPendaftaran->status == 'SUBMIT') alert-warning
            @elseif($statusPendaftaran->status == 'ADM_PASS') alert-success
            @elseif($statusPendaftaran->status == 'ADM_REJECT') alert-danger
            @else alert-info
            @endif
            alert-dismissible fade show" role="alert">
            <strong>Status Pendaftaran:</strong> 
            @if($statusPendaftaran->status == 'SUBMIT')
              Menunggu verifikasi dari panitia
            @elseif($statusPendaftaran->status == 'ADM_PASS')
              ✅ Pendaftaran Anda telah DITERIMA oleh panitia!
            @elseif($statusPendaftaran->status == 'ADM_REJECT')
              ❌ Pendaftaran Anda DITOLAK oleh panitia
            @else
              Status: {{ $statusPendaftaran->status }}
            @endif
            <br><small>No. Pendaftaran: {{ $statusPendaftaran->no_pendaftaran }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
        <form method="POST" action="{{ route('pengguna.daftar.store') }}">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Lengkap</label>
                <input class="form-control" type="text" name="nama" maxlength="120" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">NIK</label>
                <input class="form-control" type="text" name="nik" maxlength="20" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">NISN</label>
                <input class="form-control" type="text" name="nisn" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Jenis Kelamin</label>
                <select class="form-control" name="jk" required>
                  <option value="">Pilih jenis kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Tempat Lahir</label>
                <input class="form-control" type="text" name="tmp_lahir" maxlength="60" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Tanggal Lahir</label>
                <input class="form-control" type="date" name="tgl_lahir" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea class="form-control" rows="3" name="alamat" required></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Provinsi</label>
                <select class="form-control" name="provinsi" id="provinsi" required>
                  <option value="">Pilih provinsi</option>
                  @foreach(\DB::table('provinces')->get() as $prov)
                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Kabupaten/Kota</label>
                <select class="form-control" name="kabupaten" id="kabupaten" required>
                  <option value="">Pilih kabupaten</option>
                  @foreach(\DB::table('regencies')->get() as $reg)
                    <option value="{{ $reg->id }}" data-province="{{ $reg->province_id }}">{{ $reg->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Kecamatan</label>
                <select class="form-control" name="kecamatan" id="kecamatan" required>
                  <option value="">Pilih kecamatan</option>
                  @foreach(\DB::table('districts')->get() as $dist)
                    <option value="{{ $dist->id }}" data-regency="{{ $dist->regency_id }}">{{ $dist->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Kelurahan/Desa</label>
                <select class="form-control" name="kelurahan" id="kelurahan" required>
                  <option value="">Pilih kelurahan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jurusan Pilihan</label>
            <select class="form-control" name="jurusan_id" required>
              <option value="">Pilih jurusan</option>
              @foreach(\App\Models\table_jurusan::all() as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
              @endforeach
            </select>
          </div>
          <h6 class="mt-4">Data Asal Sekolah</h6>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">NPSN</label>
                <input class="form-control" type="text" name="npsn" maxlength="20" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nama Sekolah</label>
                <input class="form-control" type="text" name="nama_sekolah" maxlength="150" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Kabupaten Sekolah</label>
                <input class="form-control" type="text" name="kabupaten_sekolah" maxlength="100" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Nilai Rata-rata</label>
                <input class="form-control" type="number" name="nilai_rata" step="0.01" max="100" required>
              </div>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan Data Pendaftaran</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('provinsi').addEventListener('change', function() {
    const provinsi = this.value;
    const kabupatenOptions = document.querySelectorAll('#kabupaten option');
    
    kabupatenOptions.forEach(option => {
        if (option.value === '' || option.dataset.province === provinsi) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });
    
    document.getElementById('kabupaten').value = '';
    document.getElementById('kecamatan').value = '';
    document.getElementById('kelurahan').innerHTML = '<option value="">Pilih kelurahan</option>';
});

document.getElementById('kabupaten').addEventListener('change', function() {
    const kabupaten = this.value;
    const kecamatanOptions = document.querySelectorAll('#kecamatan option');
    
    kecamatanOptions.forEach(option => {
        if (option.value === '' || option.dataset.regency === kabupaten) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });
    
    document.getElementById('kecamatan').value = '';
    document.getElementById('kelurahan').innerHTML = '<option value="">Pilih kelurahan</option>';
});

document.getElementById('kecamatan').addEventListener('change', function() {
    const kecamatan = this.value;
    const kelurahanSelect = document.getElementById('kelurahan');
    
    if (kecamatan) {
        fetch(`/api/kelurahan/${kecamatan}`)
            .then(response => response.json())
            .then(data => {
                kelurahanSelect.innerHTML = '<option value="">Pilih kelurahan</option>';
                data.forEach(village => {
                    kelurahanSelect.innerHTML += `<option value="${village.id}">${village.name}</option>`;
                });
            })
            .catch(error => {
                console.error('Error:', error);
                kelurahanSelect.innerHTML = '<option value="">Error loading data</option>';
            });
    } else {
        kelurahanSelect.innerHTML = '<option value="">Pilih kelurahan</option>';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('#kabupaten option, #kecamatan option').forEach(option => {
        if (option.value !== '') option.style.display = 'none';
    });
});
</script>
@endsection