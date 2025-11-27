@extends('layouts.main')
@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your information to register</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="/sign-up">
                    @csrf
                    <div class="mb-3">
                      <input type="text" name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" name="hp" class="form-control form-control-lg" placeholder="No. HP" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    @if($errors->any())
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                          <div>{{ $error }}</div>
                        @endforeach
                      </div>
                    @endif
                    @if(session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="/masuk" class="text-primary text-gradient font-weight-bold" style="text-decoration: none; cursor: pointer; z-index: 999; position: relative;">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
           
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
  
  <!-- Page Animations -->
  <style>
  @keyframes slideInDown {
      from {
          opacity: 0;
          transform: translateY(-50px);
      }
      to {
          opacity: 1;
          transform: translateY(0);
      }
  }
  
  @keyframes fadeInScale {
      from {
          opacity: 0;
          transform: scale(0.9);
      }
      to {
          opacity: 1;
          transform: scale(1);
      }
  }
  
  @keyframes slideInUp {
      from {
          opacity: 0;
          transform: translateY(30px);
      }
      to {
          opacity: 1;
          transform: translateY(0);
      }
  }
  
  @keyframes pulse {
      0% {
          transform: scale(1);
      }
      50% {
          transform: scale(1.05);
      }
      100% {
          transform: scale(1);
      }
  }
  
  .card {
      animation: fadeInScale 0.8s ease-out;
  }
  
  .card-header h4 {
      animation: slideInDown 1s ease-out 0.3s both;
  }
  
  .card-header p {
      animation: slideInDown 1s ease-out 0.5s both;
  }
  
  .form-control {
      animation: slideInUp 0.6s ease-out both;
      transition: all 0.3s ease;
  }
  
  .form-control:nth-child(1) {
      animation-delay: 0.7s;
  }
  
  .form-control:nth-child(2) {
      animation-delay: 0.9s;
  }
  
  .form-control:nth-child(3) {
      animation-delay: 1.1s;
  }
  
  .form-control:nth-child(4) {
      animation-delay: 1.3s;
  }
  
  .form-control:focus {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
  }
  
  .btn {
      animation: slideInUp 0.6s ease-out 1.5s both;
      transition: all 0.3s ease;
  }
  
  .btn:hover {
      animation: pulse 0.6s ease-in-out;
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  }
  
  .card-footer {
      animation: slideInUp 0.6s ease-out 1.7s both;
  }
  </style>
</body>

</html>
@endsection