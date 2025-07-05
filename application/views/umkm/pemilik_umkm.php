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


          <div class="content-wrapper">
    <!-- Content -->

    <!-- Bootstrap Container -->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">List Pemilik UMKM</h5>
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
                                    <th>Logo</th>
                                    <th>Nama Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($umkms)): ?>
                                    <?php foreach ($umkms as $umkm): ?>
                                        <?php if ($umkm && isset($umkm->photo)): ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('uploads/umkm/' . $umkm->photo) ?>" width="50" height="50" alt="UMKM Logo" class="rounded-circle">
                                                </td>
                                                <td><?= $umkm->nama_pemilik ?></td>
                                                <td style="white-space: pre-line; max-width: 150px; overflow: hidden;"><?= $umkm->jalan ?>, <?= $umkm->desa_kelurahan ?>, <?= $umkm->kecamatan ?></td>
                                                <td><?= $umkm->nomor_hp ?></td>
                                                <td><?= $umkm->email ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <button class="dropdown-item btn btn-edit" data-toggle="modal" data-target="#editModal" data-umkmid="<?= $umkm->id ?>" data-umkmname="<?= $umkm->nama_pemilik ?>" data-jalan="<?= $umkm->jalan ?>" data-desa_kelurahan="<?= $umkm->desa_kelurahan ?>" data-kecamatan="<?= $umkm->kecamatan ?>" data-umkmphone="<?= $umkm->nomor_hp ?>" data-email="<?= $umkm->email ?>" data-photo="<?= $umkm->photo ?>">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                            </button>
                                                            <button class="dropdown-item btn btn-delete" data-umkmid="<?= $umkm->id ?>">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <!-- Add UMKM Modal -->
            <div class="modal fade bd-input-modal" tabindex="-1" role="dialog" aria-labelledby="inputModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pemilik</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUmkmForm" method="POST" action="<?php echo site_url('umkm/insert_umkm'); ?>" enctype="multipart/form-data">
                    <label for="nama_pemilik" class="col-form-label">Nama Pemilik</label>
                    <select class="form-control" name="nama_pemilik" id="nama_pemilik" required>
        <!-- Gunakan PHP untuk menghasilkan opsi pilihan -->
    <?php
    // Ambil daftar username beserta fullname dari database
    $query = "SELECT u.username, u.fullname FROM users u LEFT JOIN pemilik_umkm m ON u.username = m.username WHERE m.username IS NULL";
    $usernames = $this->db->query($query)->result();
    
    // Loop melalui daftar username dan tampilkan fullname sebagai opsi pilihan
    foreach ($usernames as $user) {
        echo '<option value="' . $user->fullname . '">' . $user->fullname . '</option>';
    }
    ?>
    </select>
                    <label for="username" class="col-form-label">Username</label>
                    <select class="form-control" name="username" id="username" required>
        <!-- Gunakan PHP untuk menghasilkan opsi pilihan -->
        <?php
        // Ambil daftar username dari database
        $query = "SELECT u.username FROM users u LEFT JOIN pemilik_umkm m ON u.username = m.username WHERE m.username IS NULL";
        $usernames = $this->db->query($query)->result();
        
        // Loop melalui daftar username dan tampilkan sebagai opsi pilihan
        foreach ($usernames as $user) {
            echo '<option value="' . $user->username . '">' . $user->username . '</option>';
        }
        ?>
    </select>
    <div class="form-group">
                         <label for="jalan" class="col-form-label">Jalan</label>
                        <input type="text" class="form-control" name="jalan" id="jalan" required>
                    </div>
                    <div class="form-group">
                         <label for="desa_kelurahan" class="col-form-label">Desa / Kelurahan</label>
                        <input type="text" class="form-control" name="desa_kelurahan" id="desa_kelurahan" required>
                    </div>
                    <div class="form-group">
                         <label for="kecamatan" class="col-form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" required>
                    </div>

                    <div class="form-group">
                         <label for="nomor_hp" class="col-form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                        name="email" id="email"
                          placeholder="Email"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="saveUmkmBtn" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel" aria-hidden="true" data-url="<?php echo base_url('umkm/update_status'); ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="umkm_name" id="umkm_name" > <!-- Assuming $umkm_name is available -->
                <h5 class="modal-title" id="acceptModalLabel">Konfirmasi Penerimaan UMKM</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda akan menerima UMKM ini. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-confirm-accept">Terima</button>
            </div>
        </div>
    </div>
</div>

    <!-- End of Main Content -->
   <!-- Edit UMKM Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Pemilik</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUmkmForm" method="POST" action="<?php echo site_url('umkm/update_umkm'); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_umkm_id">
                <input type="hidden" name="username" id="edit_username" value="<?php echo $umkm->username; ?>">
                <input type="hidden" name="nama_pemilik" id="edit_nama_pemilik" value="<?php echo $umkm->nama_pemilik; ?>">
                    <div class="form-group">
                        <label for="edit_jalan" class="col-form-label">Jalan</label>
                        <input
                          type="text"
                          class="form-control"
                        name="jalan" id="edit_jalan"
                          placeholder="Jalan"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_desa_kelurahan" class="col-form-label">Desa / Kelurahan</label>
                        <input
                          type="text"
                          class="form-control"
                        name="desa_kelurahan" id="edit_desa_kelurahan"
                          placeholder="Desa / Kelurahan"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_kecamatan" class="col-form-label">Kecamatan</label>
                        <input
                          type="text"
                          class="form-control"
                        name="kecamatan" id="edit_kecamatan"
                          placeholder="Kecamatan"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_nomor_hp" class="col-form-label">Nomor Telepon</label>
                        <input
                          type="text"
                          class="form-control"
                        name="nomor_hp" id="edit_nomor_hp"
                          placeholder="Nomor HP"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="edit_email" class="col-form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                        name="email" id="edit_email"
                          placeholder="Email"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <img class="img-profile rounded-circle" style="width:150px;"
                                    src="<?= base_url('uploads/umkm/' . $umkm->photo) ?>"><br>
    <div class="custom-file"><br>
    <input class="form-control" type="file"  name="photo" id="edit_photo" />
    </div>
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

                </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="updateUmkmBtn" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


    <!-- Delete UMKM Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this UMKM?</p>
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
        $(document).ready(function () {
            $('#saveUmkmBtn').on('click', function () {
                var nama_pemilik = $('#nama_pemilik').val();
    var username = $('#username').val();
    var jalan = $('#jalan').val();
    var desa_kelurahan = $('#desa_kelurahan').val();
    var kecamatan = $('#kecamatan').val();
    var nomor_hp = $('#nomor_hp').val();
    var email = $('#email').val();

    if (nama_pemilik.trim() === '' || username.trim() === '' || jalan.trim() === '' || desa_kelurahan.trim() === '' || kecamatan.trim() === '' || nomor_hp.trim() === '' || email.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please fill in all required fields.'
        });
    } else {
        var formData = new FormData($('#addUmkmForm')[0]);
        $.ajax({
            type: 'POST',
            url: $('#addUmkmForm').attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.message === 'UMKM Owner added successfully.') { 
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
$(document).ready(function() {
    $('.btn-edit').click(function() {
        var id = $(this).data('umkmid');
        var nama_pemilik = $(this).data('umkmname'); // Retrieve UMKM name
        var jalan = $(this).data('jalan');
        var desa_kelurahan = $(this).data('desa_kelurahan');
        var kecamatan = $(this).data('kecamatan');
        var nomor_hp = $(this).data('umkmphone');
        var email = $(this).data('email');
        var photo = $(this).data('photo');

        $('#edit_umkm_id').val(id); 
        $('#edit_nama_pemilik').val(nama_pemilik);
        $('#edit_jalan').val(jalan);
        $('#edit_desa_kelurahan').val(desa_kelurahan);
        $('#edit_kecamatan').val(kecamatan);
        $('#edit_nomor_hp').val(nomor_hp);
        $('#edit_email').val(email);
        $('#edit_photo').val(photo);
    });

    $('#updateUmkmBtn').on('click', function () {
        var id = $('#edit_umkm_id').val(); 
        var formData = new FormData($('#editUmkmForm')[0]);

        if (id.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in the UMKM name.'
            });
        } else {
            $.ajax({
                type: 'POST',
                url: $('#editUmkmForm').attr('action') + '/' + id,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.message === 'UMKM Owner updated successfully.') {
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
});
$(document).ready(function () {
        $('.btn-confirm-accept').on('click', function () {
            var umkm_name = $('#umkm_name').val(); // Ambil nilai umkm_name dari input tersembunyi

            // URL endpoint untuk mengubah status
            var url = $('#acceptModal').data('url');

            // Menggunakan SweetAlert untuk konfirmasi
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda akan menerima UMKM ini. Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Terima'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi, kirim permintaan AJAX untuk memperbarui status
                    $.ajax({
                        type: 'POST',
                        url: url,
                        dataType: 'json',
                        data: { umkm_name: umkm_name, status: 'Disetujui' }, // Kirim umkm_name dan status yang baru
                        success: function (response) {
                            // Tampilkan pesan berhasil atau gagal
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Status berhasil diperbarui.'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload(); // Muat ulang halaman setelah berhasil
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Gagal memperbarui status.'
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi kesalahan saat memproses permintaan Anda.'
                            });
                        }
                    });
                }
            });
        });
    });


            // Handle delete button click
            $('.btn-delete').click(function() {
                var id = $(this).data('umkmid');

// Display confirmation dialog using SweetAlert
Swal.fire({
    title: 'Apakah Anda yakin?',
    text: 'Anda akan menghapus Pemilik UMKM ini. Tindakan ini tidak dapat dibatalkan.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus',
    cancelButtonText: 'Batal'
}).then((result) => {
    if (result.isConfirmed) {
        // If confirmed, send AJAX request to delete the item
        $.ajax({
            type: 'POST',
            url: '<?= site_url("umkm/delete/") ?>' + id,
            dataType: 'json',
            success: function (response) {
                if (response.message === 'UMKM Owner deleted successfully.') {
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
});



            // Toggle password visibility
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

            // Toggle edit password visibility
            $('.toggle-edit-password').click(function () {
                var input = $(this).parent().prev('input');
                var icon = $(this).find('i');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
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
