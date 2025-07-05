<?php if($user->usertype === 'Admin'): ?>
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
                     id="searchInput"
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
                      <div class="dropdown-divider"></div>
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


<body id="page-top">
<div class="content-wrapper">
  <!-- Content -->

 <!-- Bootstrap Container -->
<div class="container-fluid">
<div class="row mt-5">
<div class="card">
<div class="card-header">
<div class="d-flex justify-content-between align-items-center">
  <h5 class="mb-0">List Pengguna</h5>
  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-input-modal">
      <i class="bx bx-plus"></i> Tambah Data
  </button>
</div>
</div>
                <div class="card-body">
                 
                <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="dataTable">
                        <thead>
    <tr>
    <th style="text-align:center">Photo</th>
                                <th style="text-align:center">Username</th>
                                <th style="text-align:center">Fullname</th>
                                <th style="text-align:center">Role</th>
                                <th style="text-align:center">Alamat</th>
                                <th style="text-align:center">Nomor Telepon</th>
                                <th style="text-align:center">Email</th>
        <th style="text-align:center">Actions</th>
    </tr>
</thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user && isset($user->photo)): ?>
                                    <tr>
                                        <td style="text-align:center">
    <img src="<?= base_url('uploads/users/' . $user->photo) ?>" width="50" height="50" alt="User Photo" style="border-radius: 50%;">
</td>

                                        <td style="text-align:center"><?= $user->username ?></td>
                                        <td style="text-align:center"><?= $user->fullname ?></td>
                                        <td style="text-align:center"><?= $user->usertype ?></td>
                                        <td style="white-space: pre-line; max-width: 150px; overflow: hidden;"><?= $user->jalan ?>, <?= $user->desa_kelurahan ?>, <?= $user->kecamatan ?></td>
                                        <td style="text-align:center"><?= $user->nomor_hp ?></td>
                                        <td style="text-align:center"><?= $user->email ?></td>
                                            <td>
                            <div class="dropdown">
    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <button class="dropdown-item btn btn-edit" data-toggle="modal" data-target="#editModal" data-userid="<?= $user->username ?>" data-username="<?= $user->username ?>" data-fullname="<?= $user->fullname ?>" data-usertype="<?= $user->usertype ?>" data-jalan="<?= $user->jalan ?>" data-desa_kelurahan="<?= $user->desa_kelurahan ?>" data-kecamatan="<?= $user->kecamatan ?>" data-nomor_hp="<?= $user->nomor_hp ?>" data-email="<?= $user->email ?>"  data-photo="<?= $user->photo ?>">
            <i class="bx bx-edit-alt me-1"></i> Edit
                        </button>
        <button type="button" class="dropdown-item btn btn-delete" data-toggle="modal" data-target="#deleteModal" data-userid="<?= $user->username ?>">

    <i class="bx bx-trash me-1"></i> Delete
</button>

    </div>
</div>


                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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

            <!-- Add User Modal -->
            <div class="modal fade bd-input-modal" tabindex="-1" role="dialog" aria-labelledby="inputModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
    <form id="addUserForm" method="POST" action="<?php echo site_url('pengguna/save'); ?>">
        <div class="form-group">
            <label for="username" class="col-form-label">Username</label>
            <input
                          type="text"
                          class="form-control"
                         name="username" id="username"
                          placeholder="Username"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        
        <div class="form-group">
            <label for="fullname" class="col-form-label">Fullname</label>
            <input
                          type="text"
                          class="form-control"
                        name="fullname" id="fullname"
                          placeholder="Fullname"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Role</label>
                        <select class="form-select" name="usertype" id="usertype" required>
                        <option value="Admin">Admin</option>
                        <option value="Owner">Owner</option>
                        </select>
                      </div>
                      <label for="jalan" class="col-form-label">Alamat</label>
                      <div class="form-group">
            <label for="jalan" class="col-form-label">Jalan</label>
            <input
                          type="text"
                          class="form-control"
                        name="jalan" id="jalan"
                          placeholder="Jalan"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="form-group">
            <label for="desa_kelurahan" class="col-form-label">Desa / Kelurahan</label>
            <input
                          type="text"
                          class="form-control"
                        name="desa_kelurahan" id="desa_kelurahan"
                          placeholder="Desa / Kelurahan"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="form-group">
            <label for="kecamatan" class="col-form-label">Kecamatan</label>
            <input
                          type="text"
                          class="form-control"
                        name="kecamatan" id="kecamatan"
                          placeholder="Kecamatan"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="form-group">
            <label for="nomor_hp" class="col-form-label">Nomor Telepon</label>
            <input
                          type="text"
                          class="form-control"
                        name="nomor_hp" id="nomor_hp"
                          placeholder="Nomor Telepon"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input
                          type="text"
                          class="form-control"
                        name="email" id="email"
                          placeholder="Email"
                          aria-describedby="defaultFormControlHelp" required
                        />
        </div><br>
        <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div><br>
                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-password12">Confirm Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="confpassword" id="confpassword"  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                          <span id="basic-default-password2" class="input-group-text cursor-pointer"
                            ><i class="bx bx-hide"></i
                          ></span>
                        </div>
                      </div>
    </form>
</div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" id="saveUserBtn" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Edit User Modal -->
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
                    <div class="mb-3">
                        <label for="editUsertype" class="form-label">Role</label>
                        <select class="form-select" name="usertype" id="editUsertype" aria-label="Default select example">
                        <option value="Admin">Admin</option>
                        <option value="Owner">Owner</option>
                        </select>
                      </div>
                      <label for="edit_desa_kelurahan" class="col-form-label">Alamat</label>
                      <div class="form-group">
                        <label for="edit_jalan" class="col-form-label">Jalan</label>
                        <input
                          type="text"
                          class="form-control"
                       name="jalan" id="edit_jalan"
                          placeholder="Jalan"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                      <div class="form-group">
                        <label for="edit_desa_kelurahan" class="col-form-label">Desa / Kelurahan</label>
                        <input
                          type="text"
                          class="form-control"
                       name="desa_kelurahan" id="edit_desa_kelurahan"
                          placeholder="Desa / Kelurahan"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_kecamatan" class="col-form-label">Kecamatan</label>
                        <input
                          type="text"
                          class="form-control"
                       name="kecamatan" id="edit_kecamatan"
                          placeholder="Kecamatan"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_nomor_hp" class="col-form-label">Nomor Telepon</label>
                        <input
                          type="text"
                          class="form-control"
                       name="nomor_hp" id="edit_nomor_hp"
                          placeholder="Nomor Telepon"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_email" class="col-form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                       name="email" id="edit_email"
                          placeholder="Email"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
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
    </div>
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

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     $(document).ready(function () {
            $('#saveUserBtn').on('click', function () {
                var username = $('#username').val();
                var fullname = $('#fullname').val();
                var usertype = $('#usertype').val();
                var jalan = $('#jalan').val();
    var desa_kelurahan = $('#desa_kelurahan').val();
    var kecamatan = $('#kecamatan').val();
    var nomor_hp = $('#nomor_hp').val();
    var email = $('#email').val();
                var password = $('#password').val();
                var confpassword = $('#confpassword').val();

                if (username.trim() === '' || fullname.trim() === '' || usertype.trim() === '' || jalan.trim() === '' || desa_kelurahan.trim() === '' || kecamatan.trim() === '' || nomor_hp.trim() === '' ||  password.trim() === '' || confpassword.trim() === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Harap lengkapi semua input yang diperlukan.'
                    });
                } else {
                    var formData = new FormData($('#addUserForm')[0]);
                    $.ajax({
                        type: 'POST',
                        url: $('#addUserForm').attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (response) {
                            if (response.message === 'Registration successful.') {
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
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while processing your request.'
                            });
                        }
                    });
                }
            });


        // Menangani klik tombol edit di dalam tabel
$('#dataTable').on('click', '.btn-edit', function () {
    var userId = $(this).data('userid'); // Mendapatkan id_user dari atribut data-userid pada tombol edit
    var username = $(this).data('username'); // Mendapatkan username dari atribut data-username pada tombol edit
    var fullname = $(this).data('fullname'); // Mendapatkan fullname dari atribut data-fullname pada tombol edit
    var usertype = $(this).data('usertype'); // Mendapatkan usertype dari atribut data-usertype pada tombol edit
    var jalan = $(this).data('jalan');
    var desa_kelurahan = $(this).data('desa_kelurahan');
    var kecamatan = $(this).data('kecamatan');
    var nomor_hp = $(this).data('nomor_hp');
    var email = $(this).data('email');
    var photo = $(this).data('photo');

    // Mengisi nilai input pada modal edit dengan data pengguna yang sesuai
    $('#editUserId').val(userId);
    $('#editUsername').val(username);
    $('#editFullname').val(fullname);
    $('#editUsertype').val(usertype);
    $('#edit_jalan').val(jalan);
    $('#edit_desa_kelurahan').val(desa_kelurahan);
    $('#edit_kecamatan').val(kecamatan);
    $('#edit_nomor_hp').val(nomor_hp);
    $('#edit_email').val(email);
    $('#edit_photo').val(photo);
});

// Menangani klik tombol Simpan di modal edit
$('#updateUserBtn').on('click', function () {
    // Mengumpulkan data yang diperbarui dari input
    var userId = $('#editUserId').val();
    var username = $('#editUsername').val();
    var fullname = $('#editFullname').val();
    var usertype = $('#editUsertype').val();
    var jalan = $('#edit_jalan').val();
    var desa_kelurahan = $('#edit_desa_kelurahan').val();
    var kecamatan = $('#edit_kecamatan').val();
    var nomor_hp = $('#edit_nomor_hp').val();
    var email = $('#edit_email').val();
    var password = $('#editPassword').val();
    var confpassword = $('#editConfpassword').val();
    var photo = $('#editPhoto')[0].files[0]; // Mendapatkan file foto yang dipilih

    // Membuat objek FormData untuk mengirim data ke server
    var formData = new FormData();
    formData.append('id_user', userId);
    formData.append('username', username);
    formData.append('fullname', fullname);
    formData.append('usertype', usertype);
    formData.append('jalan', jalan);
    formData.append('desa_kelurahan', desa_kelurahan);
    formData.append('kecamatan', kecamatan);
    formData.append('nomor_hp', nomor_hp);
    formData.append('email', email);
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

    // Menangani klik tombol hapus di dalam tabel
    $('#dataTable').on('click', '.btn-delete', function () {
        var userId = $(this).data('userid'); // Mendapatkan id_user dari atribut data-userid pada tombol hapus
        
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
                                window.location.reload();
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
});

</script>
<script>
    // Fungsi untuk melakukan pencarian saat input berubah
    function searchTable() {
        // Mendapatkan nilai input pencarian
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        // Loop melalui semua baris tabel, sembunyikan yang tidak cocok dengan pencarian
        for (i = 0; i < tr.length; i++) {
            // Mendapatkan sel dalam baris yang sesuai dengan kriteria pencarian
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                cell = tr[i].getElementsByTagName("td")[j];
                if (cell) {
                    txtValue = cell.textContent || cell.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Keluar dari loop saat menemukan kecocokan
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    // Tambahkan event listener ke input pencarian
    document.getElementById("searchInput").addEventListener("input", searchTable);
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
<?php else: ?>
    <!-- Non-Admin Content -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

    <body id="page-top">
        <script>
            // Display SweetAlert message
            Swal.fire({
                icon: 'error',
                title: 'Access Denied',
                text: 'Only admin users have access to this page.'
            }).then((result) => {
                // Redirect to dashboard after the user closes the SweetAlert popup
                if (result.isConfirmed) {
                    window.location.href = 'dashboard';
                }
            });
        </script>
    </body>
<?php endif; ?>


