@extends('layouts.main')
@section('content')

        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center " style="font-size: 1.5rem;">PPLG</span>
                                <span class="section-heading-lower" style="font-size: 1rem; fw-bold">Pengembangan Perangkat Lunak dan Gim</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/pplg.png" style="max-width: 400px;" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">
                            PPLG adalah singkatan dari Pengembangan Perangkat Lunak dan Gim. Ini adalah salah satu jurusan di tingkat Sekolah Menengah Kejuruan (SMK) yang berfokus pada penguasaan keterampilan di bidang teknologi informasi, khususnya dalam pengembangan aplikasi dan software.

                            Jurusan ini sebelumnya dikenal sebagai RPL (Rekayasa Perangkat Lunak). Perubahan nama menjadi PPLG mencerminkan fokus yang lebih luas, termasuk pengembangan game (gim).
                        </p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center" style="font-size: 1.5rem;">Akuntansi</span>
                                <span class="section-heading-lower" style="font-size: 1rem; fw-bold">Pembukuan Manajemen Keuangan Serta Pencatatan</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" style="max-width: 400px;" src="assets/img/akt.png" alt="..." />
                    <div class="product-item-description d-flex ms-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">
                            Akuntansi adalah sebuah sistem informasi yang bertugas untuk mengukur, memproses, dan mengkomunikasikan informasi keuangan suatu entitas (baik perusahaan, organisasi nirlaba, maupun individu) kepada para pengguna informasi tersebut.

                            Secara sederhana, Akuntansi sering disebut sebagai "Bahasa Bisnis" karena merupakan cara utama untuk memahami kondisi finansial sebuah organisasi.
                        </p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper text-center" style="font-size: 1.5rem;">DKV</span>
                                <span class="section-heading-lower" style="font-size: 1rem; fw-bold">Desain Grafis dan Komunikasi Visual Elegant</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" style="max-width: 400px;" src="assets/img/dkv.png" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">
                            DKV adalah singkatan dari Desain Komunikasi Visual. Ini adalah cabang ilmu dan seni yang berfokus pada penyampaian pesan atau informasi kepada audiens target melalui penggunaan media visual (gambar, teks, simbol, warna, dan tata letak).

                        Secara inti, DKV adalah tentang memecahkan masalah komunikasi menggunakan solusi kreatif dan visual.
                        </p></div>
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
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-80px) rotateY(20deg);
            }
            to {
                opacity: 1;
                transform: translateX(0) rotateY(0deg);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(80px) rotateY(-20deg);
            }
            to {
                opacity: 1;
                transform: translateX(0) rotateY(0deg);
            }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.7) rotate(-5deg);
            }
            to {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .product-item {
            margin-bottom: 4rem;
            transition: all 0.3s ease;
        }
        
        .product-item:hover {
            transform: translateY(-5px);
        }
        
        .product-item:nth-child(odd) .product-item-title {
            animation: fadeInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .product-item:nth-child(even) .product-item-title {
            animation: fadeInRight 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .product-item-img {
            animation: scaleIn 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.4s both;
            transition: all 0.3s ease;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .product-item-img:hover {
            transform: scale(1.05) rotate(2deg);
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .product-item:nth-child(odd) .product-item-description {
            animation: fadeInRight 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.8s both;
        }
        
        .product-item:nth-child(even) .product-item-description {
            animation: fadeInLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.8s both;
        }
        
        .bg-faded {
            transition: all 0.3s ease;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .bg-faded:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .section-heading-upper {
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        </style>
    </body>
</html>
@endsection