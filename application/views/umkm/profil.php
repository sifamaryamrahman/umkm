
<?php include('nav.php'); ?>
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
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"  data-bs-toggle="dropdown" >
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
                      <a class="dropdown-item" href="<?=site_url('auth/logout')?>">
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


<div class="content-wrapper">
<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">
<div class="row mt-5">

<div class="d-flex justify-content-between align-items-center">
        <!-- Page Heading -->
        <div class="card">
<div class="card-header">
    <h5 class="mb-0">User Information</h5>
    </div>
    <div class="card-body">
        <?php foreach ($users as $user): ?>
            <?php if ($user && isset($user->photo) && $user->username == $this->session->userdata('username')):  ?>
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('uploads/users/' . $user->photo) ?>" class="card-img" alt="User Photo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Username: <?= $user->username ?></h5>
                                <p class="card-text">Fullname: <?= $user->fullname ?></p>
                                <p class="card-text">Role: <?= $user->usertype ?></p>
                                
                                <!-- Action buttons -->
                                <div class="d-flex justify-content-start"> <!-- Updated class here -->
                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#editModal" data-userid="<?= $user->username ?>" data-username="<?= $user->username ?>" data-fullname="<?= $user->fullname ?>" data-usertype="<?= $user->usertype ?>">
                                        Edit
                                    </button>&nbsp;
                                    
                                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal" data-userid="<?= $user->username ?>">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- End of Main Content -->
<style>.custom-file {
  position: relative;
  display: inline-block;
  width: 100%;
}

.custom-file-input {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}

.custom-file-label {
  display: flex;
  align-items: center;
  justify-content: space-between;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  padding: 0.375rem 0.75rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  background-color: #fff;
}

.custom-file-label::after {
  content: "Browse";
}

.custom-file-label span {
  flex: 1;
  margin-right: 10px;
}

.custom-file-label::before {
  content: "Choose File";
  margin-right: 10px;
}

.custom-file-label::after {
  background-color: #4e73df;
  color: #fff;
  padding: 0.375rem 0.75rem;
  border-radius: 0 0.25rem 0.25rem 0;
}
    .swal2-container {
    z-index: 99999; /* Ensure SweetAlert modal appears above Bootstrap modal */
}
</style>
    <!-- End of Main Content -->
   <!-- Edit User Modal -->
   <?php foreach ($users as $user): ?>
            <?php if ($user && isset($user->photo) && $user->username == $this->session->userdata('username')):  ?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="POST" action="<?= site_url('pengguna/edit/') ?>">
                    <input type="hidden" name="id_user" id="editUserId">
                    <div class="form-group">
                        <label for="editUsername" class="col-form-label">Username</label>
                        <input
                          type="text"
                          class="form-control"
                        name="username" id="editUsername"
                          placeholder="Username"
                          aria-describedby="defaultFormControlHelp" readonly
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editFullname" class="col-form-label">Fullname</label>
                        <input
                          type="text"
                          class="form-control"
                       name="fullname" id="editFullname"
                          placeholder="Fullname"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group" style="display:none">
                        <label for="editUsertype" class="col-form-label">Role</label>
                        <select class="form-control" name="usertype" id="editUsertype">
                            <option value="Admin">Admin</option>
                            <option value="Owner">Owner</option>
                        </select>
                    </div>
                    <div class="form-password-toggle">
                        <label class="editPassword" for="basic-default-password12">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="password" id="editPassword"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div><br>
                        <div class="form-password-toggle">
                        <label class="editConfpassword" for="basic-default-password12">Confirm Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="confpassword" id="editConfpassword"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
</div>
                    </div><br>
                    <div class="form-group">
                    <img class="img-profile rounded-circle" style="width:150px;"
                                    src="<?= base_url('uploads/users/' . $user->photo) ?>">
    <div class="custom-file"><br>
    <input class="form-control" type="file"  name="editPhoto" id="editPhoto" />
    </div>
</div>

                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="updateUserBtn" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- End of Content Wrapper -->


<!-- Delete User Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <?php if ($this->session->userdata('username')): ?>
                <a class="btn" style="background-color:darkcyan; color:white;" href="<?=site_url('auth/logout')?>">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        // Menangani klik tombol edit di dalam tabel
// Menangani klik tombol edit di dalam card
$('.btn-edit').on('click', function () {
    var card = $(this).closest('.card'); // Dapatkan card yang berisi tombol edit yang ditekan
    var userId = card.find('.btn-edit').data('userid'); // Mendapatkan id_user dari tombol edit di dalam card
    var username = card.find('.btn-edit').data('username'); // Mendapatkan username dari tombol edit di dalam card
    var fullname = card.find('.btn-edit').data('fullname'); // Mendapatkan fullname dari tombol edit di dalam card
    var usertype = card.find('.btn-edit').data('usertype'); // Mendapatkan usertype dari tombol edit di dalam card

    // Mengisi nilai input pada modal edit dengan data pengguna yang sesuai
    $('#editUserId').val(userId);
    $('#editUsername').val(username);
    $('#editFullname').val(fullname);
    $('#editUsertype').val(usertype);
});


// Menangani klik tombol Simpan di modal edit
$('#updateUserBtn').on('click', function () {
    // Mengumpulkan data yang diperbarui dari input
    var userId = $('#editUserId').val();
    var username = $('#editUsername').val();
    var fullname = $('#editFullname').val();
    var usertype = $('#editUsertype').val();
    var password = $('#editPassword').val();
    var confpassword = $('#editConfpassword').val();
    var photo = $('#editPhoto')[0].files[0]; // Mendapatkan file foto yang dipilih

    // Membuat objek FormData untuk mengirim data ke server
    var formData = new FormData();
    formData.append('id_user', userId);
    formData.append('username', username);
    formData.append('fullname', fullname);
    formData.append('usertype', usertype);
    formData.append('password', password);
    formData.append('confpassword', confpassword);
    formData.append('editPhoto', photo); // Menambahkan foto ke FormData

    // Melakukan permintaan AJAX untuk mengirim data pengguna yang diperbarui ke server
    $.ajax({
        type: 'POST',
        url: '<?= site_url("pengguna/edit/") ?>' + userId, // URL untuk menangani pengeditan data pengguna
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            if (response.message === 'User updated successfully.') {
                // Jika pengeditan berhasil, tampilkan pesan sukses dan muat ulang halaman
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            } else {
                // Jika pengeditan gagal, tampilkan pesan kesalahan
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function () {
            // Jika terjadi kesalahan saat permintaan AJAX, tampilkan pesan kesalahan
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing your request.'
            });
        }
    });
});


        // Handle delete button click
        $('#togglePassword').click(function () {
    var input = $('#password');
    var icon = $(this).find('i');
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
    }
});

// Toggle confirm password visibility
$('#toggleConfPassword').click(function () {
    var input = $('#confpassword');
    var icon = $(this).find('i');
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
    }
});
// Menangani klik tombol toggle pada bidang password di form edit
$('.toggle-edit-password').click(function () {
    var input = $('#editPassword');
    var icon = $(this).find('i');
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fas fa-eye').addClass('fas fa-eye-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fas fa-eye-slash').addClass('fas fa-eye');
    }
});

// Menangani klik tombol toggle pada bidang confpassword di form edit
$('.toggle-edit-confpassword').click(function () {
    var input = $('#editConfpassword');
    var icon = $(this).find('i');
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fas fa-eye').addClass('fas fa-eye-slash');
    } else {
        input.attr('type', 'password');
        icon.removeClass('fas fa-eye-slash').addClass('fas fa-eye');
    }
});

   // Menangani klik tombol hapus di dalam card
$('.btn-delete').on('click', function () {
    var card = $(this).closest('.card'); // Dapatkan card yang berisi tombol hapus yang ditekan
    var userId = card.find('.btn-delete').data('userid'); // Mendapatkan id_user dari tombol hapus di dalam card
    
    // Menetapkan event handler untuk tombol konfirmasi hapus
    $('#confirmDeleteBtn').off('click').on('click', function () {
        // Melakukan permintaan AJAX untuk menghapus pengguna
        $.ajax({
            type: 'POST',
            url: '<?= site_url("pengguna/delete/") ?>' + userId,
            dataType: 'json',
            success: function (response) {
                if (response.message === 'User deleted successfully.') {
                    // Jika penghapusan berhasil, tampilkan pesan sukses dan muat ulang halaman
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '<?= site_url("auth/login") ?>';
                        }
                    });
                } else {
                    // Jika penghapusan gagal, tampilkan pesan kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function () {
                // Jika terjadi kesalahan saat permintaan AJAX, tampilkan pesan kesalahan
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.'
                });
            }
        });
    });
});


</script>
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

