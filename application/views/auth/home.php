<!doctype html>
<html lang="en" id="home">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendor/home/css/style.css">

    <title><?= $title; ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#home">Sistem Peminjaman Proyektor</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="#navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Biar nambahin margin left nya auto biar nempel kekanan -->
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#info">Servis</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Daftar Gambar</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Tata Cara</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Daftarkan diri</a></li>
                    <li class="btn btn-primary btn-sm"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>auth/login" style="color:blue;">Login</a></li>
                </ul>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>Peminjaman Proyektor</span> <br> <span>Secara Online</span></h1>
            <a href="" class="btn btn-primary tombol">Pinjam disini </a>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Container -->
    <div class="container">

        <!-- Info -->
        <div class="row justify-content-center" id="info">
            <div class="col-10 info">
                <div class="row">
                    <div class="col-lg">
                        <img src="<?= base_url(); ?>vendor/home/img/employee.png" alt="Employee" class="float-left">
                        <h4> Diakses kapan saja </h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-lg">
                        <img src="<?= base_url(); ?>vendor/home/img/hires.png" alt="High Res" class="float-left">
                        <h4>Penggunaan mudah</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>

                    <div class="col-lg">
                        <img src="<?= base_url(); ?>vendor/home/img/security.png" alt="Security" class="float-left">
                        <h4>Keamanan Web</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>

                </div>


            </div>
        </div>

        <!-- Akhir info -->

        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Daftar Gambar</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?= base_url(); ?>vendor/home/img/portfolio/bernard-hermant.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Loker Pemyimpanan</div>
                                <div class="portfolio-caption-subheading text-muted">Tersedia 4 Loker</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?= base_url(); ?>vendor/home/img/portfolio/daniel-g-rUQP8EWpaW4-unsplash.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Proyektor</div>
                                <div class="portfolio-caption-subheading text-muted">Peminjaman Proyektor</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?= base_url(); ?>vendor/home/img/portfolio/eftakher-alam-H0r6LB_9rz4-unsplash.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Online</div>
                                <div class="portfolio-caption-subheading text-muted">Pinjam secara Online</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>



    <!-- akhir working space -->

    <!-- Tata Cara -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tata Cara Proses</h2>
                <h3 class="section-subheading text-muted">Sistem Peminjaman Proyektor</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= base_url(); ?>vendor/home/img/about/1.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>1</h4>
                            <h4 class="subheading">Daftarkan diri</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Apabila belum memiliki akun untuk login, silahkan daftarkan diri sesuai dengan perintah! Apabila sudah mendaftarkan mandiri, silahkan ke Ruang Admin dan berikan KTM untuk divalidasi.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= base_url(); ?>vendor/home/img/about/2.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2</h4>
                            <h4 class="subheading">Login</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Login lah dengan akun yang sudah terdaftar. Untuk dapat memproses peminjaman proyektor dan dapat melihat ketersediaan proyektor.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= base_url(); ?>vendor/home/img/about/3.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>3</h4>
                            <h4 class="subheading">Pilih proyektor dan Acc Dosen</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Apabila sudah melihat kode proyektor yang tersedia, silahkan pilih proyektor tersebut dan tunggu persetujuan dari dosen Matakuliah. Apabila sudah disetujui maka peminjaman dapat dilakukan.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= base_url(); ?>vendor/home/img/about/4.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>4</h4>
                            <h4 class="subheading">Scan QR Code</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Langkah terakhir apabila proses peminjaman sudah disetujui dosen, maka user akan scan QR code yang terdapat di depan loker untuk peminjaman proyektor. Dan jangan lupa ditutup kembali!</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= base_url(); ?>vendor/home/img/about/1.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>5</h4>
                            <h4 class="subheading">Proses Pengembalian</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Proses pengembalian dilakukan saat user mendapatkan notifikasi untuk segera mengembalikan proyektor. Untuk proses pengembaliaannya dengan scan QR Code untuk membuka loker dan kembalikan proyektor ditempat semula!</p>
                        </div>
                    </div>
            </ul>
        </div>
    </section>

    <!-- Daftarkan diri -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Daftarkan Diri</h2>
                <h3 class="section-subheading text-muted">Daftarkan diri untuk dapat mengakses web Sistem Peminjaman Proyektor</h3>
            </div>


            <!-- Nested Row within Card Body -->
            <form class="user" method="post" action="<?= base_url(); ?>auth/registration#contact">
                <div class="form-group">
                    <div class="col-lg mx-auto">
                        <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" name="name">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="examplenim" placeholder="NIM" name="nim">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="exampleangkatankelas" placeholder="Angkatan & Kelas" name="angkatan_kelas">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg mx-auto">
                            <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group">
                            <div class="col-lg mx-auto">
                                <label for="prodi"></label>
                                <select name="program_studi" class="form-control form-control-users">
                                    <option>-- Pilih Kategori Prodi --</option>
                                    <option>Broadband Multimedia</option>
                                    <option>Telekomunikasi</option>
                                    <option>Teknik Otomasi Listrik Industri</option>
                                    <option>Teknik Listrik</option>
                                    <option>Instrumentasi Kontrol Industri</option>
                                    <option>Elektronika Industri</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="username" placeholder="Username" name="username">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="col-sm-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?= base_url(); ?>auth/login">Already have an account? Login!</a>
            </div>
        </div>
    </section>
    <!-- Akhir daftar Diri -->


    <!-- Akhir Container -->

    <!-- footer -->
    <div class="row footer">
        <div class="col text-center">
            <p>2021 Copyright by Davina</p>
        </div>
    </div>
    <!-- akhir footer -->

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="<?= base_url(); ?>vendor/home/assets/mail/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>vendor/home/assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>vendor/home/js/scripts.js"></script>
</body>

</html>