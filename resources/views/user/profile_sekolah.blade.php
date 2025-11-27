@extends('admin.layouts_admin.main')

@section('content')
<div class="row mt-4">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Profile Singkat Sekolah</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <h5 class="font-weight-bolder">SMK Negeri 1 Contoh</h5>
            <p class="text-sm">
              SMK Negeri 1 Contoh adalah sekolah menengah kejuruan yang berdiri sejak tahun 1985. 
              Sekolah ini berkomitmen untuk menghasilkan lulusan yang kompeten, berkarakter, dan siap kerja.
            </p>
            
            <h6 class="font-weight-bolder mt-4">Visi</h6>
            <p class="text-sm">
              Menjadi SMK unggul yang menghasilkan lulusan berkarakter, kompeten, dan berdaya saing global.
            </p>
            
            <h6 class="font-weight-bolder mt-4">Misi</h6>
            <ul class="text-sm">
              <li>Menyelenggarakan pendidikan kejuruan yang berkualitas</li>
              <li>Mengembangkan kompetensi siswa sesuai kebutuhan industri</li>
              <li>Membentuk karakter siswa yang berakhlak mulia</li>
              <li>Membangun kemitraan dengan dunia usaha dan industri</li>
            </ul>
            
            <h6 class="font-weight-bolder mt-4">Nilai-Nilai</h6>
            <ul class="text-sm">
              <li><strong>Integritas:</strong> Jujur dan dapat dipercaya</li>
              <li><strong>Profesional:</strong> Kompeten dan bertanggung jawab</li>
              <li><strong>Inovasi:</strong> Kreatif dan adaptif</li>
              <li><strong>Kolaborasi:</strong> Kerjasama dan sinergi</li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <h6>Informasi Sekolah</h6>
                <hr>
                <p class="text-sm mb-1"><strong>Alamat:</strong></p>
                <p class="text-xs">Jl. Pendidikan No. 123, Kota Contoh</p>
                
                <p class="text-sm mb-1 mt-3"><strong>Telepon:</strong></p>
                <p class="text-xs">(021) 123-4567</p>
                
                <p class="text-sm mb-1 mt-3"><strong>Email:</strong></p>
                <p class="text-xs">info@smkn1contoh.sch.id</p>
                
                <p class="text-sm mb-1 mt-3"><strong>Website:</strong></p>
                <p class="text-xs">www.smkn1contoh.sch.id</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection