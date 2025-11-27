@extends('layouts.main')
@section('content')

        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" style=" max-width: 600px;"src="assets/img/db.png" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">SMK BAKTI NUSANTARA 666</span>
                            <span class="section-heading-lower">Sekolah Unggul</span>
                        </h2>
                        <p class="mb-3">
                            SMK Bakti Nusantara 666 merupakan salah satu sekolah menengah kejuruan yang terakreditasi A dan merupakan sekolah
                            pencetak pekerja yang profesional di bidangnya.
                        </p>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <!-- Page Animations -->
        <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-80px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(80px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateX(0) scale(1);
            }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        .intro-img {
            animation: slideInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transition: transform 0.3s ease;
        }
        
        .intro-img:hover {
            transform: scale(1.05) rotate(2deg);
        }
        
        .intro-text {
            animation: slideInRight 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
        }
        
        .section-heading-upper {
            animation: fadeInUp 1s ease-out 0.8s both, bounce 2s ease-in-out 2s infinite;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-heading-lower {
            animation: fadeInUp 1s ease-out 1s both;
            color: #555;
        }
        
        .intro-text p {
            animation: fadeInUp 1s ease-out 1.2s both;
            line-height: 1.6;
        }
        

        </style>
    </body>
</html>
@endsection