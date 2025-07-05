<?php include('head.php'); ?>
<head>
<link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<!-- Customized Bootstrap Stylesheet -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- Template Stylesheet -->
<link href="<?php echo base_url('assets/css/style1.css')?>" rel="stylesheet">
</head>
<body style="background-color:white;">
 <!-- Service Start -->
 <div class="container-xxl py-5" id="kategori" >
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="section-title  justify-content-center" style="color:darkcyan;"><span></span>KATEGORI<span></span></h1>
                    <br>
                    <p></p>
                </div>
                <style>
                    .service-item:hover {
    background-color: darkcyan;
    transition: background-color 0.3s ease;
}
                </style>
                <div class="row g-4" style="color:darkcyan;">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0" >     
                                <i class="fas fa-utensils fa-2x" ></i>
                            </div>
                            <h5 class="mb-3">Kuliner</h5>
                            <!-- <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p> -->
                            <a class="btn btn-square" href="#produk"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column text-center rounded" >
                            <div class="service-icon flex-shrink-0" >
                                <i class="fas fa-palette fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Kerajinan</h5>
                            <!-- <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p> -->
                            <a class="btn btn-square" href="#produk"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item d-flex flex-column text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="fas fa-tshirt fa-2x"></i>
                            </div>
                            <h5 class="mb-3">Fashion</h5>
                            <!-- <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p> -->
                            <a class="btn btn-square" href="#produk"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
            </div>
        </div>
</div>
<div class="container-xxl  fact py-5 wow fadeInUp" data-wow-delay="0.1s" style="background-color:darkcyan;">
    <div class="container py-5 px-lg-5">
        <div class="row g-3 justify-content-center"> <!-- Added justify-content-center class -->
        <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x mb-3 text-white"></i>
                <h1 class="text-white mb-2 count" data-toggle="counter-up"><?php
                    // Get Produk data
                    $user = $this->User_model->get_all_users();
                    $num_user = count($user);
                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_user . '</div>';
                    ?></h1>
                <p class="text-white mb-0">Users</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fas fa-store-alt fa-3x mb-3 text-white"></i>
                <h1 class="text-white mb-2 count" data-toggle="counter-up"> <?php
                    // Get UMKM data
$owners = $this->User_model->get_all_owners();
$num_owners = count($owners);
                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_owners . '</div>';
                    ?></h1>
                <p class="text-white mb-0">Pemilik UMKM</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fas fa-th-list fa-3x mb-3 text-white"></i>
                <h1 class="text-white mb-2 count" data-toggle="counter-up"><?php
                    // Get Produk data
                    $produk = $this->Produk_model->get_approved_produk();
                    $num_produk = count($produk);
                    echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_produk . '</div>';
                    ?></h1>
                <p class="text-white mb-0">UMKM</p>
            </div>
        </div>
    </div>
</div>
        <!-- Service End -->
         <!-- Projects Start -->
         <div class="container-xxl py-5" id="produk">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="section-title justify-content-center" style="color:darkcyan;"><span></span>UMKM<span></span></h1>
            <p class="text-center mb-5">Produk Unggul dan Berkualitas</p>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active"><a href="<?= site_url('all') ?>" >Lihat Semua</a></li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            <?php 
            // Mengacak urutan produk
            shuffle($produks); 
            // Inisialisasi variabel hitung
            $counter = 0;
            // Looping produk
            foreach ($produks as $produk): 
                // Hanya menampilkan 6 produk
                if ($counter == 6) break;
                $counter++;
            ?>
             <?php if ($produk && isset($produk->photo) && $produk->status == 'disetujui'): ?>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s" >
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden" >
                        <img class="img-fluid w-100" src="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" alt="">
                        <div class="portfolio-overlay" style="background-color: rgba(0, 139, 139, 0.8);">
                            <a class="btn btn-square btn-outline-light mx-1" href="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href="<?= site_url('detail/'.$produk->id) ?>"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <h5 class="fw-medium mb-2 " style="color:darkcyan;"><?php echo $produk->nama_merek_produk; ?></h5>
                        <p class="lh-base mb-0">Kategori: <?php echo $produk->kategori_produk; ?></p>
                        <p class="lh-base mb-0 deskripsi">Deskripsi: <?php echo $produk->deskripsi_produk; ?></p>
                        <style>
.deskripsi {
    display: -webkit-box; /* Untuk browser WebKit (Safari, Chrome, dll) */
    -webkit-line-clamp: 1; /* Batasan jumlah baris yang ingin ditampilkan */
    -webkit-box-orient: vertical; /* Orientasi konten dalam box */
    overflow: hidden; /* Menyembunyikan teks yang tidak muat */
    text-overflow: ellipsis; /* Menampilkan titik-titik jika teks terlalu panjang */
}
                        </style>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
        <!-- Projects End -->
<!-- Footer Start -->
<div class="container-fluid text-light footer wow fadeIn" data-wow-delay="0.1s" style="background-color:darkcyan;">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <!-- Section 1: Address and Social Media -->
            <div class="col-md-12 col-lg-4">
                <p class="section-title text-white h5 mb-4">Address<span></span></p>
                <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Soreang Km. 17 Soreang Kabupaten Bandung Jawa Barat Indonesia</p>
                <p><i class="fa fa-phone-alt me-3"></i>022-5891691/1183</p>
                <p><i class="fa fa-envelope me-3"></i>disperindag@bandungkab</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social me-2" href="https://www.tiktok.com/@disperdagin_kabbdg"><i class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="https://web.facebook.com/disperindagkabbdg"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="https://www.instagram.com/disperdagin_kabbdg/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social me-2" href="https://www.youtube.com/channel/UC6RmH9meQ6ty6vrA0duCfuQ"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Section 2: Quick Links -->
            <div class="col-md-6 col-lg-4">
                <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Career</a>
            </div>
            
            <!-- Section 3: Newsletter -->
            <div class="col-md-6 col-lg-4">
                <p class="section-title text-white h5 mb-4">Newsletter<span></span></p>
                <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                <div class="position-relative w-100 mt-3">
                    <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                    <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Disperindag Kab Bandung</a>, All Right Reserved.
                    
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
        <!-- Back to Top -->
        <a href="#" class=" btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/lib/wow/wow.min.js')?>"></script>
<script src="<?php echo base_url('assets/lib/easing/easing.min.js')?>"></script>
<script src="<?php echo base_url('assets/lib/waypoints/waypoints.min.js')?>"></script>
<script src="<?php echo base_url('assets/lib/counterup/counterup.min.js')?>"></script> <!-- Include Counter-Up plugin -->
<script src="<?php echo base_url('assets/lib/owlcarousel/owl.carousel.min.js')?>"></script>
<script src="<?php echo base_url('assets/lib/isotope/isotope.pkgd.min.js')?>"></script>
<script src="<?php echo base_url('assets/lib/lightbox/js/lightbox.min.js')?>"></script>
<script>
    $(document).ready(function(){
        $('.count').counterUp({
            delay: 10, // Delay in milliseconds
            time: 1000 // Animation duration in milliseconds
        });
    });
</script>
    <!-- Template Javascript -->
    <script src="'assets/js/main.js"></script>
</body>
</html>