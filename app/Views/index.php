<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Recaka</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/assetswebprofil/img/favicon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/assetswebprofil/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/assetswebprofil/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assetswebprofil/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assetswebprofil/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assetswebprofil/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/assetswebprofil/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables.css" rel="stylesheet">
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="<?= base_url(); ?>assets/assetswebprofil/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/assetswebprofil/css/main.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="<?= base_url(); ?>assets/assetswebprofil/img/logo.png" alt=""> -->
                <h1>RECAKA<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>

                    <li class="dropdown"><a href="/"><span>Home</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>

                    </li>

                    <li><a class="nav-link scrollto" href="/#about">About</a></li>
                    <li><a class="nav-link scrollto" href="/#services">Product</a></li>
                    <li><a class="nav-link scrollto" href="/#pricing">Price</a></li>
                    <li><a class="nav-link scrollto" href="/#portfolio">Contact</a></li>
                    <li><a href="<?= url_to('frontend.login.view'); ?>">Login</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->


        </div>
    </header><!-- End Header -->

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="<?= base_url(); ?>assets/assetswebprofil/img/LOGO.png" class="img-fluid animated">
            <h2>Welcome to <span>RECAKA PARFUM</span></h2>

        </div>
    </section>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        {{-- <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section --> --}}

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>About Us</h2>
                    <p>Recaka adalah parfum anak bangsa yang diramu khusus dengan cinta untuk menghasilkan aroma yang khas dan tak terlupakan.

                        Recaka mempunyai 6 varian aroma dengan bau khas yang berbeda-beda dan cocok untuk berbagai kebutuhan, yaitu : Ruby, Diamond, Amethys, Shappire, Zircon, dan Zamrud.

                        .</p>
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="<?= base_url(); ?>assets/assetswebprofil/img/about.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">BUSINESS OVERVIEW</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Penjelasan Bisnis</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Penjelasan Bisnis 2</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">


                                <p style="text-align: justify;">Apakah Anda merupakan seorang pemula di bidang bisnis? Apakah Anda bingung menentukan bidang apa yang potensial dan menguntungkan untuk saat ini? Maka memulai usaha parfum dapat menjadi pilihan terbaik, dimana usaha parfum ini memiliki prospek yang cerah di masa depan. Untuk mengetahui seberapa besar potensi usaha parfum ini, berikut penjelasan singkat mengenai potensi usaha parfum. Melihat minat masyarakat dalam segi fashion dan penampilan yang semakin meningkat, Parfum yang dulunya merupakan kebutuhan sekunder sekarang mulai beralih menjadi sebuah kebutuhan primer dari sebagian masyarakat. Dimana makna dari kebutuhan primer merupakan kebutuhan yang HARUS selalu tersedia atau harus terpenuhi. Selain itu, parfum merupakan benda yang dapat disimpan dalam jangka waktu yang lama sehingga tidak memiliki tanggal kadaluarsa.</p>

                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">


                                <p style="text-align: justify;">Selama ini, beberapa pertanyaan yang sering kami temui dan sering ditanyakan oleh sebagian besar orang yang tertarik memulai usaha parfum, adalah "Apakah memulai usaha parfum perlu modal yang besar?" Bagi kami, jawabannya Tentu "TIDAK!" karena untuk saat ini, siapapun orangnya, semua memiliki kesempatan yang sama untuk mencapai kesuksesan dibidang usaha parfum, karena RECAKA telah memfasilitasi para calon pengusaha dengan menyediakan berbagai pilihan paket usaha komplit mulai dari yang murah meriah sampai ke tingkat yang lebih besar, sehingga andapun dapat dengan mudah untuk menyesuaikan budget yang anda miliki.
                                    Selain itu, dengan berbagai sistem bisnis yang selalu kami kembangkan dari waktu ke waktu seperti Bisnis Kemitraan parfum, semoga akan dapat lebih memudahkan anda memilih sistem usaha yang tepat, karena dengan support dan pengalaman dari team kami, kami siap mengantarkan anda menjadi pebisnis parfum yang handal.
                                </p>

                            </div><!-- End Tab 2 Content -->


                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="services" class="features">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Parfume</h2>
                    <p>Dibawah ini adalah produk yang kami jual.</p>
                </div>
                <ul class="nav nav-tabs row gy-4 d-flex">

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-suit-diamond color-red"></i>
                            <h4>Ruby</h4>
                        </a>
                    </li><!-- End Tab 1 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-diamond color-indigo"></i>
                            <h4>Diamond</h4>
                        </a>
                    </li><!-- End Tab 2 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                            <i class="bi bi-suit-spade-fill color-purple"></i>
                            <h4>Aemthys</h4>
                        </a>
                    </li><!-- End Tab 3 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                            <i class="bi bi-command color-red"></i>
                            <h4>Sapphire</h4>
                        </a>
                    </li><!-- End Tab 4 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-5">
                            <i class="bi bi-easel color-blue"></i>
                            <h4>Zircon</h4>
                        </a>
                    </li><!-- End Tab 5 Nav -->

                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-6">
                            <i class="bi bi-sunrise-fill color-yellow"></i>
                            <h4>Zamrud</h4>
                        </a>
                    </li><!-- End Tab 6 Nav -->
                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-7">
                            <i class="bi bi-sunset color-dark"></i>
                            <h4>Romeo</h4>
                        </a>
                    </li><!-- End Tab 6 Nav -->
                    <li class="nav-item col-6 col-md-4 col-lg-2">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-8">
                            <i class="bi bi-sunset-fill color-blue"></i>
                            <h4>Juliet</h4>
                        </a>
                    </li><!-- End Tab 6 Nav -->

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active show" id="tab-1">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                                <h3>Ruby</h3>
                                <p>
                                    RUBY merupakan parfum dengan kesan manis dan lembut, yang berasal dari kandungan Buah Ceri, Vanilla, Sandalwood, Chamomile, Gula dan juga Susu yang menjadi favorit pria & wanita. Aroma manis dan hangat yang dikeluarkan oleh RUBY ini cocok digunakan saat berkumpul dengan keluarga atau hangout bersama
                                    teman-teman.

                                </p>

                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/ruby.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 1 -->

                    <div class="tab-pane" id="tab-2">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Diamond</h3>
                                <p>
                                    DIAMOND merupakan parfum yang beraroma kuat dan dapat menggambarkan keberanian serta kemewahan dari pesona eleganmu. DIAMOND diracik dengan kandungan seperti Jasmine, Daffron, Amberwood hingga Ambergris, yang akan menghasilkan aroma menawan sepanjang hari.
                                </p>

                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/diamond.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 2 -->

                    <div class="tab-pane" id="tab-3">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>AMETHYS</h3>
                                <p>
                                    AMETHYS merupakan parfum dengan aroma yang elegan karena karakternya yang Oriental Spicy ini akan menghasilkan wangi yang segar, bersemangat, namun tetap Calm.
                                    Aroma itu berasal dari kandungan Black Currant, Mandarin Orange, Jasmine serta Rose. AMETHYS juga akan setia menemani anda untuk acara formal baik di luar maupun di dalam ruangan.

                                </p>

                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/Amethys.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 3 -->

                    <div class="tab-pane" id="tab-4">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>SHAPPIRE</h3>
                                <p>
                                    SHAPPIRE merupakan parfum yang memiliki aroma bunga dan buah yang kaya, seperti Wild Berries, Juicy Mandarin, Honeysuckle, Gardenia, dan Melati. Aroma bunga tersebut kemudian dikombinasikan dengan aroma dasar parfum yang lebih hangat dan earthy.
                                    SHAPPIRE akan membuatmu lebih Fresh dan bersemangat dalam melakukan kegiatan sehari-hari.

                                </p>

                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/sapphire.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 4 -->

                    <div class="tab-pane" id="tab-5">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>ZIRCON</h3>
                                <p>
                                    ZIRCON merupakan parfum beraroma segar yang berasal dari bau Manis Semangka dan Kiwi dengan Fruitiness Tart dari Rhubarb, Zesty pohon Lemon dan aroma Bunga Cyclamen, yang dikombinasikan untuk menciptakan aroma siang hari yang menggoda.
                                    ZIRCON juga cocok digunakan saat sore hingga malam hari.

                                </p>

                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/zircon.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 5 -->

                    <div class="tab-pane" id="tab-6">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Zamrud</h3>
                                <p>
                                    ZAMRUD merupakan parfum beraroma segar segar, energik, serta liar dengan komposisinya yang alami seperti Grapefruit, Mojito, Cardamom Cedar, Geranium, hingga Black Pepper. Ciri khas Sporty pada ZAMRUD cocok untuk orang yang berjiwa bebas, senang beraktivitas diluar ruangan dan suka akan tantangan.
                                </p>


                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/zamrud.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 6 -->
                    <div class="tab-pane" id="tab-7">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Romeo</h3>
                                <p>
                                    Parfum dengan aroma khas Musk dan Ambergris ini menciptakan aroma Woody yang menangkan. Mengandung Orange Mandarin, Pineapple dan Apricot yang menyegarkan, serta dipadukan dengan Freesia, Ginger, dan Peach yang menciptakan aroma mewah.
                                </p>


                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/romero.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 6 -->
                    <div class="tab-pane" id="tab-8">
                        <div class="row gy-4">
                            <div class="col-lg-8 order-2 order-lg-1">
                                <h3>Juliet</h3>
                                <p>
                                    Parfum beraroma manis khas Vanilla dan Praline ini merupakan bahan dasar dari coklat. Mengandung Nectarine dan Cashmere Wood yang khas manis dari alam, dipadukan dengan Violet, Orchid dan Rose yang melambangkan manis dan mewahnya bunga-bunga..
                                </p>


                            </div>
                            <div class="col-lg-4 order-1 order-lg-2 text-center">
                                <img src="<?= base_url(); ?>assets/assetswebprofil/img/JULIET.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End Tab Content 6 -->

                </div>

            </div>
        </section><!-- End Features Section -->




        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Pricing</h2>
                    <p>Dibawah ini adalah harga untuk distibutor dan member.</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-item featured">

                            <div class="pricing-header">
                                <h3> MEMBER (BRONZE)</h3>
                                <h4><sup>RP</sup>225.000<span></span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>3 botol (Harga : 75.000/botol)</span></li>
                                <li><i class="bi bi-dot"></i> <span>6 Starter kit (tester)</span></li>
                                <li><i class="bi bi-dot"></i> <span>ID member</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span> Reward Tingkat Silver</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span>E-book modul penjualan</span></li>
                                <li><i class="bi bi-dot"></i> <span> Group networking</span></li>
                                <li><i class="bi bi-dot"></i> <span> Bimbingan</span></li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="https://alvo.chat/1EKX" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-item featured">

                            <div class="pricing-header">
                                <h3> MEMBER (SILVER)</h3>
                                <h4><sup>RP</sup>1.400.000<span></span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>20 botol (Harga : 70.000/botol)</span></li>
                                <li><i class="bi bi-dot"></i> <span>12 Starter kit (tester)</span></li>
                                <li><i class="bi bi-dot"></i> <span>ID member</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span> Reward Tingkat Gold</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span>E-book modul penjualan</span></li>
                                <li><i class="bi bi-dot"></i> <span> Group networking</span></li>
                                <li><i class="bi bi-dot"></i> <span>T-shirt (1pcs)</span></li>
                                <li><i class="bi bi-dot"></i> <span> Bimbingan</span></li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="https://alvo.chat/1EKX" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->


                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-item featured">

                            <div class="pricing-header">
                                <h3> MEMBER (GOLD)</h3>
                                <h4><sup>RP</sup>6.500.000<span></span></h4>
                            </div>

                            <ul>
                                <li><i class="bi bi-dot"></i> <span>100 botol (Harga : 65.000/botol)</span></li>
                                <li><i class="bi bi-dot"></i> <span>60 Starter kit (tester)</span></li>
                                <li><i class="bi bi-dot"></i> <span>ID member</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span> Reward Tingkat Platinum</span>
                                </li>
                                <li><i class="bi bi-dot"></i> <span>E-book modul penjualan (5pcs)</span></li>
                                <li><i class="bi bi-dot"></i> <span>Roll Banner</span></li>
                                <li><i class="bi bi-dot"></i> <span>Banner Penjualan</span></li>
                                <li><i class="bi bi-dot"></i> <span>Brosur Penjualan</span></li>
                                <li><i class="bi bi-dot"></i> <span>Booth Penjualan</span></li>
                                <li><i class="bi bi-dot"></i> <span> Group networking</span></li>
                                <li><i class="bi bi-dot"></i> <span>T-shirt (1pcs)</span></li>
                                <li><i class="bi bi-dot"></i> <span> Bimbingan</span></li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="https://alvo.chat/1EKX" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->
                </div>

            </div>
        </section><!-- End Pricing Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Contact Us</h2>
                </div>

            </div>


            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>Dibawah ini adalah Kontak admin kami.</p>

                            <div class="info-item d-flex">
                                <i class="bi bi-instagram flex-shrink-0"></i>
                                <div>
                                    <h4>Instagram:</h4>
                                    <p>@recaka_id </p>
                                </div>
                            </div><!-- End Info Item -->



                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p href="https://alvo.chat/1EKX">085648350830</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Recaka</h3>

                            <strong>Phone:</strong> 085648350830<br>
                            <strong>Instagram:</strong> @recaka_id<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#about">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#product">Product</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#harga">Prices</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="/#contact">Contact</a></li>
                        </ul>
                    </div>



                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Recaka</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">

                    <a href="@recaka_id" class="instagram"><i class="bi bi-instagram"></i></a>

                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/assetswebprofil/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/assetswebprofil/js/main.js"></script>

</body>

</html>