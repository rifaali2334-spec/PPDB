@extends('kepsek.layouts_kepsek.main')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Jumlah Siswa per Asal Sekolah</h6>
        </div>
        <div class="card-body">
          <canvas id="chartProgress" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Detail Asal Sekolah</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Sekolah</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Siswa</th>
                </tr>
              </thead>
              <tbody>
                @forelse($chartData as $index => $sekolah)
                <tr>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $sekolah->nama_sekolah }}</h6>
                  </td>
                  <td>
                    <span class="badge badge-sm bg-gradient-primary">{{ $sekolah->jumlah }} siswa</span>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="text-center">Tidak ada data sekolah</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var ctx = document.getElementById('chartProgress').getContext('2d');
  
  @php
    $labels = [];
    $data = [];
    foreach($chartData as $item) {
      $labels[] = $item->nama_sekolah;
      $data[] = $item->jumlah;
    }
  @endphp
  
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($labels) !!},
      datasets: [{
        label: 'Jumlah Siswa',
        data: {!! json_encode($data) !!},
        backgroundColor: 'rgba(94, 114, 228, 0.8)',
        borderColor: 'rgba(94, 114, 228, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        },
        x: {
          ticks: {
            maxRotation: 45,
            minRotation: 45
          }
        }
      }
    }
  });
});
</script>
@endsection