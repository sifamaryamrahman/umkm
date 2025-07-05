<?php
// Setel nilai default untuk $selectedCategory
$selectedCategory = 'all';
// Sekarang, lanjutkan dengan kode HTML dan PHP yang lain
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head1.php'); ?>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">
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
                <h1 class="section-title justify-content-center" style="color:darkcyan;"><span></span>All Produk<span></span></h1>
                <p class="text-center mb-5">What Solutions We Provide</p>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
    <div class="col-12 text-start">
        <a class="btn" style="background-color:darkcyan; color:white;" href="<?=site_url('/')?>" role="button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div><br>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <!-- Filter Kategori -->
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active"><a href="#kategori" onclick="filterCategory('all')">All</a></li>
                    <li class="mx-2"><a href="#kategori" onclick="filterCategory('Kuliner')">Kuliner</a></li>
                    <li class="mx-2"><a href="#kategori" onclick="filterCategory('Fashion')">Fashion</a></li>
                    <li class="mx-2"><a href="#kategori" onclick="filterCategory('Kerajinan')">Kerajinan</a></li>
                </ul>
            </div>
        </div>

            <!-- Portofolio Items -->
        <div class="row g-4 portfolio-container">
            <?php 
                // Mengacak urutan produk
                shuffle($produks); 
                
                // Looping produk
                foreach ($produks as $produk): 
                    // Periksa apakah produk sesuai dengan kategori yang dipilih
                    if ($produk->kategori_produk == $selectedCategory || $selectedCategory == 'all'):
            ?>
            <?php if ($produk && isset($produk->photo) && $produk->status == 'disetujui'): ?>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s" data-category="<?php echo $produk->kategori_produk; ?>">
                <div class="rounded overflow-hidden">
                    
                    <div class="position-relative overflow-hidden" >
                        <!-- Gambar Produk -->
                        <img class="img-fluid w-100" src="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" alt="">
                        <!-- Overlay untuk Tindakan -->
                        <div class="portfolio-overlay" style="background-color: rgba(0, 139, 139, 0.8);">
                            <a class="btn btn-square btn-outline-light mx-1" href="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href="<?= site_url('detail/'.$produk->id) ?>"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <!-- Informasi Produk -->
                    <div class="bg-light p-4">
                        <h5 class="fw-medium mb-2" style="color: darkcyan;"><?php echo $produk->nama_merek_produk; ?></h5>
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
            <?php 
                    endif; // Akhir dari pengecekan kategori
                endforeach; 
            ?>
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
        var selectedCategory = 'all'; // Kategori produk yang dipilih secara default

        // Fungsi untuk memfilter produk berdasarkan kategori yang dipilih
        function filterCategory(category) {
            event.preventDefault();
            // Setel kategori yang dipilih
            selectedCategory = category;
            // Hapus kelas 'active' dari semua elemen portofolio filter
            document.querySelectorAll('#portfolio-flters li').forEach(function(el) {
                el.classList.remove('active');
            });
            // Tambahkan kelas 'active' ke elemen yang dipilih
            event.target.parentElement.classList.add('active');
            // Perbarui tampilan portofolio
            displayPortfolio();
        }

        // Fungsi untuk menampilkan produk sesuai dengan kategori yang dipilih
        function displayPortfolio() {
            // Sembunyikan semua produk
            document.querySelectorAll('.portfolio-item').forEach(function(el) {
                el.style.display = 'none';
            });
            // Tampilkan produk sesuai dengan kategori yang dipilih
            document.querySelectorAll('.portfolio-item').forEach(function(el) {
                if (selectedCategory === 'all' || el.getAttribute('data-category') === selectedCategory) {
                    el.style.display = 'block';
                }
            });
        }

        // Panggil fungsi displayPortfolio() setelah dokumen dimuat
        document.addEventListener('DOMContentLoaded', function() {
            displayPortfolio();
        });
    </script>

</body>
</html>
