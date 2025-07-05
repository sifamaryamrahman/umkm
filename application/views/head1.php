<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/css/style1.css') ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/css/demo.css') ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/img/favicon.ico')?>" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="<?php echo base_url('https://fonts.googleapis.com')?>">
<link rel="preconnect" href="<?php echo base_url('https://fonts.gstatic.com')?>" crossorigin>
<link href="<?php echo base_url('https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap')?>" rel="stylesheet"> 

<!-- Icon Font Stylesheet -->
<link href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css')?>" rel="stylesheet">
<head>
    <!-- Tautan Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
      <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 ">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">UMKM</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false">
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
</div>
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

    <!-- Template Javascript -->
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>
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
</body>
</html>
