<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"/>
<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"> 
<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"> 
<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/boxicons.css')?>" />
<!-- Core CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/core.css" class="template-customizer-core-css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/theme-default.css')?>" class="template-customizer-theme-css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css')?>" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
<!-- Vendors CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/apex-charts/apex-charts.css')?>" />
<!-- Page CSS -->
<!-- Helpers -->
<script src="<?php echo base_url('assets/vendor/js/helpers.js')?>"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="<?php echo base_url('assets/js/config.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
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