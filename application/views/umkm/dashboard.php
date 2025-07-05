<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->

  <body>
  <?php include('nav.php'); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('uploads/users/' . $user->photo) ?>" alt class="w-px-50 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url('uploads/users/' . $user->photo) ?>" alt class="w-px-50 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $user->fullname ?></span>
                            <small class="text-muted"><?= $user->usertype ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?=site_url('umkm/profil')?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="<?=site_url('auth/logout')?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

           <!-- Bootstrap Container -->
           <div class="container-fluid">
    <div class="row mt-5">

        <!-- Admin Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Admins</div>
                            <?php
                            // Load User_model
                            $this->load->model('User_model');

                            // Get admin users
                            $admins = $this->User_model->get_users_by_type('admin');
                            $num_admins = count($admins);
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_admins . '</div>';
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="menu-icon tf-icons bx bx-user" style="font-size: 2em;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Owner Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Data Owners</div>
                            <?php
                            // Get owner users
                            $owners = $this->User_model->get_users_by_type('owner');
                            $num_owners = count($owners);
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_owners . '</div>';
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="menu-icon tf-icons bx bx-group" style="font-size: 2em;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Data UMKM</div>
                            <?php
                            // Get Produk data
                            $produk = $this->Produk_model->get_all_produk();
                            $num_produk = count($produk);
                            echo '<div class="h5 mb-0 font-weight-bold text-gray-800">' . $num_produk . '</div>';
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="menu-icon tf-icons bx bx-cube-alt" style="font-size: 2em;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <!-- Bar Chart dan Pie Chart dalam satu kolom -->
        <div class="col-xl-6 mb-4">
            <div class="row">

                <!-- Bar Chart 1 -->
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">UMKM</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="produkChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart 2 -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="desaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Pie Chart di kolom terpisah -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kecamatan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="kecamatanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>






<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn" style="background-color:darkcyan; color:white;" href="<?=site_url('auth/logout')?>">Logout</a>
            </div>
        </div>
    </div>
</div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>

    <script src="<?php echo base_url('assets/vendor/js/menu.js') ?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main1.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Page JS -->
    <script src="<?php echo base_url('assets/js/dashboards-analytics.js') ?>"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to handle toggling submenus
        function setupMenuToggle(toggleSelector, submenuSelector) {
            // Select all toggle elements
            const toggles = document.querySelectorAll(toggleSelector);

            // Add click event listener to each toggle element
            toggles.forEach(toggle => {
                toggle.addEventListener('click', function () {
                    // Get the target submenu id from data attribute
                    const targetSubmenuId = toggle.getAttribute('data-toggle');
                    const submenu = document.getElementById(targetSubmenuId + '-submenu');

                    // Toggle the 'show' class on the submenu
                    if (submenu) {
                        submenu.classList.toggle('show');
                    }
                });
            });
        }

        // Setup toggling for menu items
        setupMenuToggle('.menu-toggle', '.menu-sub');
    });
</script>
<script>
        var ctx = document.getElementById('kecamatanChart').getContext('2d');
        var kecamatanData = <?php echo json_encode(array_column($kecamatan_counts, 'count')); ?>;
        var kecamatanLabels = <?php echo json_encode(array_column($kecamatan_counts, 'kecamatan')); ?>;
        
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: kecamatanLabels,
                datasets: [{
                    label: 'Jumlah Kecamatan',
                    data: kecamatanData,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#33FF99',
                        '#FF99FF',
                        '#FF6633',
                        '#6666FF',
                        '#99FF99',
                        '#9966FF',
                        '#FF6666'
                    ]
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Pie Chart Jumlah Kecamatan'
                }
            }
        });
    </script>
<script>
        var ctx = document.getElementById('produkChart').getContext('2d');
        var produkData = <?php echo json_encode(array_column($kategori_counts, 'count')); ?>;
        var produkLabels = <?php echo json_encode(array_column($kategori_counts, 'kategori_produk')); ?>;
        
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
    labels: produkLabels,
    datasets: [{
        label: 'Jumlah UMKM per Kategori',
        data: produkData,
        backgroundColor: [
           'rgba(54, 162, 235, 1)',   // Warna untuk garis tepi bar pertama
            'rgba(255, 99, 132, 1)',  // Warna untuk garis tepi bar kedua
            'rgba(75, 192, 192, 1)', // Warna untuk garis tepi bar ketiga, dan seterusnya
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            // Anda bisa menambahkan warna sesuai dengan jumlah bar yang diinginkan
        ],
    }]
},

            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Bar Chart Kategori Produk'
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('desaChart').getContext('2d');
        var produkData = <?php echo json_encode(array_column($desa_counts, 'count')); ?>;
        var produkLabels = <?php echo json_encode(array_column($desa_counts, 'desa_kelurahan')); ?>;
        
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: produkLabels,
                datasets: [{
                    label: 'Jumlah Desa per Kategori',
                    data: produkData,
                    backgroundColor: [
            'rgba(54, 162, 235, 1)',  // Warna untuk bar pertama
            'rgba(255, 99, 132, 1)', // Warna untuk bar kedua
            'rgba(75, 192, 192, 1)', // Warna untuk bar ketiga, dan seterusnya
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            // Anda bisa menambahkan warna sesuai dengan jumlah bar yang diinginkan
        ],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Bar Chart Kategori Produk'
                }
            }
        });
    </script>
    


<style>
    /* Ensure submenus are hidden by default */
    .menu-sub {
        display: none;
    }

    /* Show submenu when 'show' class is added */
    .menu-sub.show {
        display: block;
    }
</style>


  </body>
</html>
