<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin_css/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('admin_css/img/favicon.png') }}">
  <title>
    Portal PPDB - Panitia
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ asset('admin_css/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('admin_css/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link id="pagestyle" href="{{ asset('admin_css/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="{{ asset('admin_css/img/logo-ct-dark.png') }}" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">PPDB Panitia</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    @include('panitia.views.partials.navbar')
  </aside>
  
  <main class="main-content position-relative border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0"></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="/" class="nav-link text-white p-0">
                <i class="fa fa-sign-out fixed-plugin-button-nav cursor-pointer"></i>
                <span class="d-sm-inline d-none ms-1">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('content')
  </main>
  
  <script src="{{ asset('admin_css/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin_css/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_css/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin_css/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin_css/js/plugins/chartjs.min.js') }}"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('admin_css/js/argon-dashboard.min.js') }}"></script>
</body>

</html>