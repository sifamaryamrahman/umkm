<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head1.php'); ?>
    <link href="assets/img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="assets/css/style1.css" rel="stylesheet">
</head>
<body style="background-color:white;">
    <div class="container-xxl py-2" id="kategori">
        <div class="container py-2 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="section-title text-primary justify-content-center"><span></span>UMKM<span></span></h1>
                <p class="text-center mb-5">What Solutions We Provide</p>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
    <div class="col-12 text-start">
        <a class="btn btn-primary" href="<?=site_url('/')?>" role="button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
            <br><br>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="container">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo base_url('uploads/umkm/' . $umkms->photo); ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="card-title text-uppercase mb-4"><i class="fas fa-store-alt mr-4"></i>&nbsp;&nbsp;Pemilik UMKM</h4>
                    <hr>
                    <h5 class="card-title">Nama: <?php echo $umkms->nama_pemilik ?></h5>
                    <h5 class="card-title">No Telepon: <?php echo $umkms->nomor_hp; ?></h5>
                    <h5 class="card-title">Email: <?php echo $umkms->email; ?></h5>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





<br><br><br>
<div class="wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="section-title text-primary justify-content-center"><span></span>Produk<span></span></h1>
                <p class="text-center mb-5">What Solutions We Provide</p>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <!-- Filter Kategori -->
                <ul class="list-inline mb-5" id="portfolio-flters">
                <li class="mx-2 active"><a href="#kategori" onclick="filterCategory('all', event)">All</a></li>
<li class="mx-2 "><a href="#kategori" onclick="filterCategory('Kuliner', event)">Kuliner</a></li>
<li class="mx-2"><a href="#kategori" onclick="filterCategory('Fashion', event)">Fashion</a></li>
<li class="mx-2"><a href="#kategori" onclick="filterCategory('Kerajinan', event)">Kerajinan</a></li>

                </ul>
            </div>
            <div class="container py-1">
    <div class="row">
        <?php foreach($produks as $produk): ?>
            <?php if ($produk && isset($produk->photo) && $produk->status == 'disetujui'): ?>
            <div class="col-md-4 mb-4 produk-item" data-category="<?php echo $produk->kategori_produk; ?>">
                <div class="card">
                    <img src="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" class="card-img-top" alt="...">
                </div>
                <div class="bg-light p-4">
                    <h5 class="fw-medium mb-2" style="color: darkblue;"><?php echo $produk->nama_merek_produk; ?></h5>
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


                        </style> <br>
                    <!-- You can add more details here if needed -->
                    <a href="<?= site_url('detail/' . $produk->id) ?>" class="btn btn-primary" >Lihat Selengkapnya</a>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
        </div>
        




                        <!-- <div class="col-md-7">
                            <div class="card-body">
                                <p class="card-text">
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="color:darkblue;">
                                                        Alamat Toko
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="card-block ml-2">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.232720857895!2d110.688150414497!3d-6.6179845547008105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711f9512d8aa8d%3A0xb609e5fe9aa1528c!2sJl.%20Balei%20Desa%20Tahunan%2C%20Kauman%2C%20Tahunan%2C%20Kec.%20Tahunan%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah%2059451!5e0!3m2!1sid!2sid!4v1613196055755!5m2!1sid!2sid" width="100%"  height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="-1"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div> -->
                        <?php /* if ($umkms !== null && !empty($umkms->umkm_address)): ?>
                                <p style="font-size: 16px; line-height: 1.6; color: #333;">
                                    <?php echo $umkms->umkm_address; ?>
                                </p>
                            <?php else: ?>
                                <p style="font-size: 16px; line-height: 1.6; color: #333;">
                                    Alamat toko tidak tersedia.
                                </p>
                            <?php endif; */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="http://localhost/umkm/assets/mail/jqBootstrapValidation.js"></script>
    <script src="http://localhost/umkm/assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="http://localhost/umkm/js/scripts.js"></script>
    <script>
    function filterCategory(category, event) {
        event.preventDefault();
        var items = document.querySelectorAll('.produk-item');
        if (category === 'all') {
            items.forEach(function(item) {
                item.style.display = 'block';
            });
        } else {
            items.forEach(function(item) {
                if (item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    }
</script>


</body>
</html>
