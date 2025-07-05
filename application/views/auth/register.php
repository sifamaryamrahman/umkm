<?php include('head.php'); ?>

  <body>
    <style>
                .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                  <span class="app-brand-logo demo">
                  <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo" width="50">
                  </span>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Selamat Datang di UMKM Kab Bandung! 🚀</h4>
              <p class="mb-4">Buat Akun terlebih dahulu!</p>
              <div id="message"></div>
              <form action="<?php echo site_url('register/save'); ?>" method="post" class="user" enctype="multipart/form-data">
              <input type="hidden" name="usertype" value="Owner">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Username"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Fullname</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" />
                </div>
                <label for="email" class="form-label">Alamat</label>
                <div class="mb-3">
                  <label for="email" class="form-label">Jalan</label>
                  <input type="text" class="form-control" id="jalan" name="jalan" placeholder="Jalan" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Desa / Kelurahan</label>
                  <input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" placeholder="Desa / Kelurahan" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Nomor Telepon</label>
                  <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Nomor Telepon" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                </div>
                <div class="mb-3 form-password-toggle">
                <label for="email" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility()">
                    <i id="toggleIcon" class="bx bx-hide"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
              <label for="email" class="form-label">Confirm Password</label>
               <div class="input-group input-group-merge">
                
                 <input type="password" id="confpassword" class="form-control" name="confpassword"
                   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                   aria-describedby="confpassword" />
                 <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility1()">
                   <i id="toggleIcon" class="bx bx-hide"></i>
                 </span>
               </div>
             </div><br>

               
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>
<br>
              <p class="text-center">
                <span>Sudah memiliki akun?</span>
                <a href="<?=site_url('auth/login')?>">
                  <span>Login</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/popper/popper.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/js/menu.js')?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>

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
 <script>
  function togglePasswordVisibility1() {
    var confPasswordInput = document.getElementById('confpassword');
    var toggleIcon = document.getElementById('toggleIcon'); // Sesuaikan ID dengan ikon toggle untuk confpassword

    if (confPasswordInput.type === 'password') {
      confPasswordInput.type = 'text';
      toggleIcon1.classList.remove('bx-hide');
      toggleIcon1.classList.add('bx-show');
    } else {
      confPasswordInput.type = 'password';
      toggleIcon1.classList.remove('bx-show');
      toggleIcon1.classList.add('bx-hide');
    }
  }
</script>

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
                    Swal.fire({
                        icon: response.message.includes('success') ? 'success' : 'error',
                        title: response.message.includes('success') ? 'Success' : 'Error',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (response.message.includes('success')) {
                            // Redirect to login page or any other page
                            window.location.href = '<?= site_url('auth/login') ?>';
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>


</body>

</html>