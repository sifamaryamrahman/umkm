
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
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" id="tentang" >
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="section-title  justify-content-center" style="color:darkcyan;"><span></span>Filter Data<span></span></h1>
                    <br>
                    <p></p>
                
                    <form action="<?php echo site_url('Dashboard/filter');?>#hasil-pencarian" method="get">
                    <div class="mb-3">
                    <label class="form-check-label " for="online">Nama UMKM</label>
                            <input type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                        </div>
                        <div class="mb-3">
                    <label class="form-check-label " for="online">Merek</label>
                            <input type="text" class="form-control" id="nama_merek_produk" name="nama_merek_produk">
                        </div>
                    <div class="mb-3">
                        <label for="kategori_produk" class="form-label ">Kategori Produk</label>
                        <select class="form-select" id="kategori_produk" name="kategori_produk">
                            <option value="">Pilih Kategori</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Kerajinan">Kerajinan</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn" style="background-color:darkcyan; color:white;">
    <i class="fa fa-search"></i> Cari
</button>

                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php
// Filter produk untuk hanya yang disetujui
$approvedProducts = array_filter($products, function($product) {
    return $product['status'] === 'disetujui';
});
?>

<?php if (isset($approvedProducts) && !empty($approvedProducts)): ?>
<div id="hasil-pencarian" class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="section-title text-center mb-4" style="color:darkcyan;">Search Results</h2>
            <br>
            <p></p>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Usaha</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Online</th>
                            <th scope="col">Offline</th>
                            <th scope="col">Agen/Reseller</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($approvedProducts as $product): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($product['id']); ?></td>
                                <td><?php echo htmlspecialchars($product['nama_usaha']); ?></td>
                                <td><?php echo htmlspecialchars($product['nama_merek_produk']); ?></td>
                                <td><?php echo htmlspecialchars($product['kategori_produk']); ?></td>
                                <td><?php echo htmlspecialchars($product['online']); ?></td>
                                <td><?php echo htmlspecialchars($product['offline']); ?></td>
                                <td><?php echo htmlspecialchars($product['agen_reseller']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div id="hasil-pencarian" class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="section-title text-center mb-4" style="color:darkcyan;">Search Results</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Usaha</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Online</th>
                            <th scope="col">Offline</th>
                            <th scope="col">Agen/Reseller</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada UMKM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



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
    

</body>
</html>
