<!DOCTYPE html>
<html lang="en">

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
<?php include('head.php'); ?>
<!-- beautify ignore:end -->

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <span class="app-brand-logo demo">
                <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo" width="50">
                </span>

            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Selamat Datang di UMKM Kab Bandung! 👋</h4>
            <p class="mb-4">Silakan masuk ke akun Anda</p>

            <form class="user" action="<?= site_url('auth/process_login') ?>" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="username"
                  placeholder="Enter username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
               
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility()">
                    <i id="toggleIcon" class="bx bx-hide"></i>
                  </span>
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>

            <p class="text-center">
              <a href="<?=site_url('auth/register')?>">
                <span>Create an account</span>
              </a>
            </p>
            <div style="text-align: center;">
    <a href="<?=site_url('/')?>" class="btn btn-secondary btn-sm">
        Kembali
    </a>
</div>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById('password');
      var toggleIcon = document.getElementById('toggleIcon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bx-hide');
        toggleIcon.classList.add('bx-show');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bx-show');
        toggleIcon.classList.add('bx-hide');
      }
    }
  </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $('.user').submit(function(e) {
            e.preventDefault();
            
            var form = $(this);
            var url = form.attr('action');
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Login successful, show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Login successful!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            // Redirect to dashboard page
                            window.location.href = '<?= site_url('umkm/dashboard') ?>';
                        });
                    } else {
                        // Invalid username or password, show error message
                        if (response.message === 'Invalid username or password.') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Invalid username or password.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else if (response.message === 'Wrong password.') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Wrong password.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-2JPElVYoi5k/W+2A5sm0a0bq5R8SMM4L5ij1wNNV8xd6WBY6XzAm5PqqzDZIcKkMBBZL7gg4gJgSVrh1SmlE3A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>

</html>
