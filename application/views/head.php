<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">

<!-- Google Web Fonts -->
<link rel="preconnect" href="<?php echo base_url('https://fonts.googleapis.com')?>">
<link rel="preconnect" href="<?php echo base_url('https://fonts.gstatic.com')?>" crossorigin>
<link href="<?php echo base_url('https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap')?>" rel="stylesheet"> 
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- Icon Font Stylesheet -->
<link href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')?>" rel="stylesheet">
<head>
    <!-- Tautan Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css')?>">
</head>


<!-- Libraries Stylesheet -->
<link href="<?php echo base_url('assets/lib/animate/animate.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/lib/lightbox/css/lightbox.min.css')?>" rel="stylesheet">
</head>

    <title>Document</title>
</head>
<body>	
<style>
        /* Include the updated CSS here */
        #loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: darkcyan; /* Adjust opacity as needed */
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader,
        .loader:before,
        .loader:after {
            background: #fff; /* Adjust color as needed */
            -webkit-animation: load1 1s infinite ease-in-out;
            animation: load1 1s infinite ease-in-out;
            width: 1em;
            height: 4em;
        }

        .loader:before,
        .loader:after {
            position: absolute;
            top: 0;
            content: '';
        }

        .loader:before {
            left: -1.5em;
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .loader {
            text-indent: -9999em;
            margin: 288px auto;
            position: relative;
            font-size: 11px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        .loader:after {
            left: 1.5em;
        }

        @-webkit-keyframes load1 {
            0%, 80%, 100% {
                box-shadow: 0 0 #fff;
                height: 4em;
            }
            40% {
                box-shadow: 0 -2em #fff;
                height: 5em;
            }
        }

        @keyframes load1 {
            0%, 80%, 100% {
                box-shadow: 0 0 #fff;
                height: 4em;
            }
            40% {
                box-shadow: 0 -2em #fff;
                height: 5em;
            }
        }
    </style>
    <div id="loading-spinner">
        <div class="loader">Loading...</div>
    </div>

       <!-- Navbar & Hero Start -->
       <div class="container-xxl position-relative p-0" >
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 " >
                <a href="" class="navbar-brand p-0" style="color:darkcyan;">
                    <h1 class="m-0">UMKM</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="<?= site_url('/')?>" class="nav-item nav-link js-scroll-trigger">Home</a>
                        <a href="<?= site_url('/#kategori')?>" class="nav-item nav-link">Kategori</a>
                        <a href="<?= site_url('/#produk')?>" class="nav-item nav-link">Produk</a>
                        <a href="<?= site_url('filter')?>" class="nav-item nav-link">Cari</a>
                        <a href="<?= site_url('/#kontak')?>" class="nav-item nav-link">Kontak</a>
                    </div>
                    <a href="<?=site_url('auth/login')?>" class="btn btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block" >
        Masuk
        <i class="fas fa-sign-in-alt"></i> 
    </a>
                </div>
            </nav>
            <div class="container-xxl hero-header " style="background-color:darkcyan;">
            <div class="container px-lg-5">
<div class="container"><br><br><br><br>
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
            <h1 class="text-white mb-4 animated slideInDown">UMKM KABUPATEN BANDUNG</h1>
            <p class="text-white pb-3 animated slideInDown">Website ini menampilkan semua UMKM yang ada di Kabupaten Bandung</p>
            <a href="<?= site_url('/#kategori')?>" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill animated slideInRight ">Telusuri</a>
        </div>
        <div class="col-lg-6 text-center text-lg-start">
        <img class="img-fluid animated zoomIn" src="<?php echo base_url('assets/img/logo.png')?>" alt="" width="900px" height="900px">


            <!-- <canvas id="umkmPieChart" width="400" height="400"></canvas> -->
            </div>
        </div>
    </div>
</div><br>
</div>		
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/lib/wow/wow.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/easing/easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/waypoints/waypoints.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/counterup/counterup.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/owlcarousel/owl.carousel.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/isotope/isotope.pkgd.min.js')?>"></script>
    <script src="<?php echo base_url('assets/lib/lightbox/js/lightbox.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    

    <script>
    // Data UMKM yang berasal dari PHP
    var umkmData = <?php echo json_encode($users); ?>;
    var totalUMKM = umkmData.length;

    // Menghitung jumlah total pemilik UMKM dengan usertype 'Owner'
    var totalPemilikUMKM = umkmData.reduce(function(total, user) {
        return user.usertype === 'Owner' ? total + 1 : total;
    }, 0);

    // Data Produk yang berasal dari PHP (misalkan $produks adalah array produk)
    var produkData = <?php echo json_encode($produks); ?>;

    // Filter produk yang memiliki status "disetujui"
    var produkDisetujui = produkData.filter(function(produk) {
        return produk.status === 'disetujui';
    });

    // Menghitung jumlah total produk yang disetujui
    var totalProdukDisetujui = produkDisetujui.length;

    // Menghitung jumlah total produk dari semua UMKM
    var totalProduk = produkData.length;

    // Menghitung persentase untuk setiap nilai
    var percentageUMKM = ((totalUMKM / (totalUMKM + totalProdukDisetujui)) * 100).toFixed(2);
    var percentageProdukDisetujui = ((totalProdukDisetujui / (totalUMKM + totalProdukDisetujui)) * 100).toFixed(2);

    // Membuat array data untuk Chart.js
    var chartData = {
        labels: ['Total Pemilik : ' + totalPemilikUMKM + ' (' + percentageUMKM + '%)', 'Total UMKM : ' + totalProdukDisetujui + ' (' + percentageProdukDisetujui + '%)'],
        datasets: [{
            data: [percentageUMKM, percentageProdukDisetujui],
            backgroundColor: [
                'rgba(243, 16, 16, 0.8)',
                'rgba(16, 49, 243, 0.8)'
            ],
            borderWidth: 1
        }]
    };

    var options = {
        plugins: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    color: 'white'
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed) {
                            label += context.parsed + '%';
                        }
                        return label;
                    }
                }
            },
            datalabels: {
                color: 'white',
                font: {
                    weight: 'bold',
                    size: 16
                },
                formatter: function(value, context) {
                    return value + '%';
                }
            }
        }
    };

    // Menggambar diagram lingkaran
    var ctx = document.getElementById('umkmPieChart').getContext('2d');
    var umkmPieChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: options,
        plugins: [ChartDataLabels]
    });
</script>

        <script>
        // Show spinner when the DOM content is being loaded
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("loading-spinner").style.display = "block";
        });

        // Hide spinner when the entire page has loaded
        window.addEventListener("load", function() {
            document.getElementById("loading-spinner").style.display = "none";
        });
    </script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
