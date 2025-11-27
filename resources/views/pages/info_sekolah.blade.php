        @extends('layouts.main')
        @section('content')

        <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="page-header-title"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" style="max-width: 500px;" src="assets/img/info.png" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">SMK Bakti Nusantara 666</span>
                                </h2>
                                <p>SMK Bakti Nusantara 666 mempunyai aturan yang mewajibkan seluruh siswanya untuk disiplin apalagi dalam hal 
                                    menghormati guru dan staf sekolah. Hal ini bertujuan untuk membentuk karakter siswa yang baik dan bertanggung jawab di dunia 
                                    kebekerjaan nantinya,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <!-- Page Animations -->
        <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .page-header {
            animation: fadeInDown 0.8s ease-out;
        }
        
        .about-heading-img {
            animation: zoomIn 1s ease-out 0.3s both;
        }
        
        .about-heading-content {
            animation: slideInUp 1s ease-out 0.6s both;
        }
        </style>
    </body>
</html>
@endsection