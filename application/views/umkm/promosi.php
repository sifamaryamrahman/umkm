<?php if($user->usertype === 'Owner'): ?>
    <?php include('nav.php'); ?>
<body id="page-top">
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
   


<!-- Begin Page Content -->
<div class="content-wrapper">
            <!-- Content -->
<style>
    .swal2-container {
    z-index: 99999; /* Ensure SweetAlert modal appears above Bootstrap modal */
}
</style>
           <!-- Bootstrap Container -->
<div class="container-fluid">
            <?php foreach ($produks as $produk): ?>
                <?php if ($produk && isset($produk->photo) && $produk->username == $this->session->userdata('username')): ?>
                    <?php if ($produk->status != 'menunggu'): ?>
<div class="row mt-5">
<div class="card">
    </div>
    <!-- Page Heading -->
   
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Promosi Pemasaran</h5>
           <!-- Button for adding data -->
           <?php 
// Ambil instance dari database CodeIgniter
$CI =& get_instance();

// Periksa apakah ada data promosi untuk pengguna saat ini di database
$CI->db->where('username', $this->session->userdata('username'));
$num_rows = $CI->db->count_all_results('promosi_pemasaran');

if ($num_rows == 0): ?>
 <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-input-modal">
                <i class="bx bx-plus"></i> Tambah Data
            </button>
<?php else: ?>
    <button type="button" class="btn btn-sm btn-primary" disabled data-toggle="modal" data-target=".bd-input-modal">
                <i class="bx bx-plus"></i> Tambah Data
            </button>
<?php endif; ?>

        </div><br>
        <div class="card-body">
        <?php foreach ($promosis as $promosi): ?>
            <div class="row no-gutters">
            <p >1. Apakah selama setahun yang lalu pernah mendapatkan fasilitasi promosi pemasaran (pameran / bazar) dari Dinas Perdagangan dan Perindustrian Kabupaten Bandung?</label>
            <p class="card-text">
    Jawaban: <span style="color:black;"><?= $promosi->fasilitasi_promosi ?></span>
</p>
                </div><br>
                <div class="row no-gutters">
            <p >2. Hambatan dalam memasarkan produk (baik secara online maupun offline):&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <p class="card-text">
    Jawaban: <span style="color:black;"><?= $promosi->hambatan_memasarkan_produk ?></span>
</p>
                </div><br>
                <div class="row no-gutters">
            <p >3. Bantuan yang dibutuhkan untuk meningkatkan promosi pemasaran produk:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <p class="card-text">
    Jawaban: <span style="color:black;"><?= $promosi->bantuan_dibutuhkan ?></span>
</p>
                </div><br>
                <div class="row no-gutters">
            <p >4. Apakah berminat mengikuti Bazar Ramadhan 2024?&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <p class="card-text">
    Jawaban: <span style="color:black;"><?= $promosi->berminat_bazar_ramadhan ?></span>
</p>
                </div><br>
                <div class="row no-gutters">
            <p >5. Apakah berminat mengikuti pelatihan pemasaran online?&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <p class="card-text">
    Jawaban: <span style="color:black;"><?= $promosi->berminat_pelatihan_online ?></span>
</p>
                </div><br>
                <div class="d-flex justify-content-end">
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#editModal"
    data-promosiid="<?= $promosi->id ?>"
    data-username="<?= $promosi->username ?>"
    data-fasilitasi_promosi="<?= $promosi->fasilitasi_promosi ?>"
    data-hambatan_memasarkan_produk="<?= $promosi->hambatan_memasarkan_produk ?>"
    data-bantuan_dibutuhkan="<?= $promosi->bantuan_dibutuhkan ?>"
    data-berminat_bazar_ramadhan="<?= $promosi->berminat_bazar_ramadhan ?>"
    data-berminat_pelatihan_online="<?= $promosi->berminat_pelatihan_online ?>">
    Edit
</button>&nbsp; 

                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-promosiid="<?= $promosi->id ?>">
                                Delete
                            </button>
                        </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>

        </div>
    </div>
</div>


            <!-- Add UMKM Modal -->
            <div class="modal fade bd-input-modal" tabindex="-1" role="dialog" aria-labelledby="inputModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Promosi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPromosiForm" method="POST" action="<?php echo site_url('promosi/insert_promosi'); ?>">
                        <div class="mb-3">
                        <label for="addUsername" class="form-label">Nama Pemilik</label>
                        <select class="form-select" name="username" id="addUsername" required aria-label="Default select example">
                        <?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if(isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    // Ambil daftar username dari database yang belum terdaftar dalam promosi
    $query = "SELECT u.username, u.fullname FROM users u LEFT JOIN promosi_pemasaran p ON u.username = p.username WHERE p.username IS NULL AND u.username = ?";
    $usernames = $this->db->query($query, array($loggedInUsername))->result();

    // Loop melalui daftar username dan tampilkan sebagai opsi pilihan
    foreach ($usernames as $user) {
        // Cek apakah opsi saat ini adalah pengguna yang login
        $selected = ($user->username == $loggedInUsername) ? 'selected' : '';

        echo '<option value="' . $user->username . '" ' . $selected . '>' . $user->fullname . '</option>';
    }
} else {
    // Jika tidak ada yang login, mungkin Anda ingin menampilkan pesan atau melakukan tindakan lain
    echo "Tidak ada pengguna yang login.";
}
?>

                        </select>
                    </div>
                    <hr><br>

                    <div class="form-group">
                        <label>1. Apakah selama setahun yang lalu pernah mendapatkan fasilitasi promosi pemasaran (pameran / bazar) dari Dinas Perdagangan dan Perindustrian Kabupaten Bandung?</label>
                        <div class="form-check">
                            <input type="radio" id="fasilitasi_ya" name="fasilitasi_promosi" value="Ya" class="form-check-input" onclick="showTextarea()">
                            <label for="fasilitasi_ya" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="fasilitasi_tidak" name="fasilitasi_promosi" value="Tidak" class="form-check-input" onclick="hideTextarea()">
                            <label for="fasilitasi_tidak" class="form-check-label">Tidak</label>
                        </div>
                    </div><br>
                    <div class="form-group" id="additionalTextWrapper" style="display: none;">
    <label for="additionalText">Alasan fasilitasi promosi pemasaran:</label>
    <textarea class="form-control" id="additionalText" name="fasilitasi_promosi" rows="3"></textarea>
</div>

                    <div class="form-group">
                        <label for="hambatan">2. Hambatan dalam memasarkan produk (baik secara online maupun offline):</label>
                        <textarea class="form-control" id="hambatan_memasarkan_produk" name="hambatan_memasarkan_produk" rows="3"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="bantuan">3. Bantuan yang dibutuhkan untuk meningkatkan promosi pemasaran produk:</label>
                        <textarea class="form-control" id="bantuan_dibutuhkan" name="bantuan_dibutuhkan" rows="3"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label>4. Apakah berminat mengikuti Bazar Ramadhan 2024?</label>
                        <div class="form-check">
                            <input type="radio" id="bazar_ya" name="berminat_bazar_ramadhan" value="Ya" class="form-check-input">
                            <label for="bazar_ya" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="bazar_tidak" name="berminat_bazar_ramadhan" value="Tidak" class="form-check-input">
                            <label for="bazar_tidak" class="form-check-label">Tidak</label>
                        </div>
                    </div><br>

                    <div class="form-group">
                        <label>5. Apakah berminat mengikuti pelatihan pemasaran online?</label>
                        <div class="form-check">
                            <input type="radio" id="pelatihan_ya" name="berminat_pelatihan_online" value="Ya" class="form-check-input">
                            <label for="pelatihan_ya" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="pelatihan_tidak" name="berminat_pelatihan_online" value="Tidak" class="form-check-input">
                            <label for="pelatihan_tidak" class="form-check-label">Tidak</label>
                        </div>
                    </div>

                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="savePromosiBtn" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

    <!-- End of Main Content -->
    <div class="modal fade bd-input-modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Promosi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPromosiForm" method="POST" action="<?php echo site_url('promosi/update_promosi'); ?>">
                <div class="mb-3">
                        <input type="hidden" name="id" id="edit_promosi_id">
                        <label for="editUsername" class="form-label">Nama Pemilik</label>
                        <select class="form-select" name="username" id="editUsername" required aria-label="Default select example">
                            <?php if (empty($promosis)): ?>
                                <option value="<?php echo $user->username; ?>"><?php echo $user->fullname; ?></option>
                            <?php else: ?>
                                <?php foreach ($promosis as $promosi): ?>
                                    <?php if ($promosi->username == $user->username): ?>
                                        <option value="<?php echo $promosi->username; ?>"><?php echo $user->fullname; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <hr><br>

                    <div class="form-group">
    <label>1. Apakah selama setahun yang lalu pernah mendapatkan fasilitasi promosi pemasaran (pameran / bazar) dari Dinas Perdagangan dan Perindustrian Kabupaten Bandung?</label>
    <div class="form-check">
        <input type="radio" id="edit_fasilitasi_ya" name="fasilitasi_promosi" value="Ya" class="form-check-input" onclick="showEditTextarea()">
        <label for="edit_fasilitasi_ya" class="form-check-label">Ya</label>
    </div>
    <div class="form-check">
        <input type="radio" id="edit_fasilitasi_tidak" name="fasilitasi_promosi" value="Tidak" class="form-check-input" onclick="hideEditTextarea()">
        <label for="edit_fasilitasi_tidak" class="form-check-label">Tidak</label>
    </div>
</div><br>

<div class="form-group" id="edit_textareaDiv" style="display: none;">
                        <label for="edit_additionalText">Jika "Ya", sebutkan fasilitasi promosi pemasaran yang diikuti :</label>
                        <textarea class="form-control" id="edit_additionalText" name="fasilitasi_promosi" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_hambatan">2. Hambatan dalam memasarkan produk (baik secara online maupun offline):</label>
                        <textarea class="form-control" id="edit_hambatan_memasarkan_produk" name="hambatan_memasarkan_produk" rows="3"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label for="edit_bantuan">3. Bantuan yang dibutuhkan untuk meningkatkan promosi pemasaran produk:</label>
                        <textarea class="form-control" id="edit_bantuan_dibutuhkan" name="bantuan_dibutuhkan" rows="3"></textarea>
                    </div><br>

                    <div class="form-group">
                        <label>4. Apakah berminat mengikuti Bazar Ramadhan 2024?</label>
                        <div class="form-check">
                            <input type="radio" id="edit_bazar" name="berminat_bazar_ramadhan" value="Ya" class="form-check-input">
                            <label for="edit_bazar_ya" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="edit_bazar" name="berminat_bazar_ramadhan" value="Tidak" class="form-check-input">
                            <label for="edit_bazar_tidak" class="form-check-label">Tidak</label>
                        </div>
                    </div><br>

                    <div class="form-group">
                        <label>5. Apakah berminat mengikuti pelatihan pemasaran online?</label>
                        <div class="form-check">
                            <input type="radio" id="edit_pelatihan" name="berminat_pelatihan_online" value="Ya" class="form-check-input">
                            <label for="edit_pelatihan_ya" class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="edit_pelatihan" name="berminat_pelatihan_online" value="Tidak" class="form-check-input">
                            <label for="edit_pelatihan_tidak" class="form-check-label">Tidak</label>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="updatePromosiBtn" class="btn btn-primary">Simpan</button>
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
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
function showTextarea() {
    $('#additionalTextWrapper').show(); // Menampilkan elemen textarea
}

function hideTextarea() {
    $('#additionalTextWrapper').hide(); // Menyembunyikan elemen textarea
}

$(document).ready(function () {
    $('#savePromosiBtn').on('click', function () {
        var username = $('#addUsername').val();
        var fasilitasi_promosi = $("input[name='fasilitasi_promosi']:checked").val() || '';
        var hambatan_memasarkan_produk = $('#hambatan_memasarkan_produk').val();
        var bantuan_dibutuhkan = $('#bantuan_dibutuhkan').val();
        var berminat_bazar_ramadhan = $("input[name='berminat_bazar_ramadhan']:checked").val();
        var berminat_pelatihan_online = $("input[name='berminat_pelatihan_online']:checked").val();
        
        var additionalText = '';
        if (fasilitasi_promosi === 'Ya') {
            additionalText = $('#additionalText').val(); // Mengambil nilai teks tambahan jika opsi "Ya" dipilih
        }

        // Memeriksa apakah semua input yang diperlukan telah diisi
        if (username.trim() === '' || fasilitasi_promosi.trim() === '' || 
            (fasilitasi_promosi === 'Ya' && additionalText.trim() === 'Tidak') ||
            hambatan_memasarkan_produk.trim() === '' || bantuan_dibutuhkan.trim() === '' || 
            berminat_bazar_ramadhan === undefined || berminat_pelatihan_online === undefined) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in all required fields.'
            });
        } else {
            var formData = new FormData($('#addPromosiForm')[0]);
            if (fasilitasi_promosi === 'Ya') {
        formData.append('additionalText', additionalText);
    } else {
            formData.append('fasilitasi_promosi', fasilitasi_promosi);
    }
            $.ajax({
                type: 'POST',
                url: $('#addPromosiForm').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Memuat ulang halaman setelah pengiriman berhasil
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
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'Promosi added successfully.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Memuat ulang halaman jika terjadi kesalahan
                        }
                    });
                }
            });
        }
    });
});

$(document).ready(function() {
    function showEditTextarea() {
        $('#edit_textareaDiv').show(); // Menampilkan textarea pada formulir edit
    }

    function hideEditTextarea() {
        $('#edit_textareaDiv').hide(); // Menyembunyikan textarea pada formulir edit
    }

    // Event listener untuk menampilkan textarea ketika 'Ya' dipilih
    $('input[name="fasilitasi_promosi"]').change(function() {
        if ($(this).val() === 'Ya') {
            showEditTextarea();
        } else {
            hideEditTextarea();
        }
    });

    // Fungsi untuk menyiapkan nilai pada formulir edit saat tombol edit diklik
    $('.btn-edit').click(function() {
        // Mendapatkan atribut data dari tombol yang diklik
        var id = $(this).data('promosiid');
        var username = $(this).data('username'); 
        var fasilitasi_promosi = $(this).data('fasilitasi_promosi');
        var hambatan_memasarkan_produk = $(this).data('hambatan_memasarkan_produk');
        var bantuan_dibutuhkan = $(this).data('bantuan_dibutuhkan');
        var berminat_bazar_ramadhan = $(this).data('berminat_bazar_ramadhan');
        var berminat_pelatihan_online = $(this).data('berminat_pelatihan_online');
        var additionalText = $(this).data('additionaltext'); // Menambahkan data textarea yang sudah ada

        // Mengatur nilai input pada modal edit
        $('#edit_promosi_id').val(id); 
        $('#editUsername').val(username);
        $('input[name="fasilitasi_promosi"]').filter('[value="' + fasilitasi_promosi + '"]').prop('checked', true);
        $('#edit_hambatan_memasarkan_produk').val(hambatan_memasarkan_produk);
        $('#edit_bantuan_dibutuhkan').val(bantuan_dibutuhkan);
        $('input[name="berminat_bazar_ramadhan"]').filter('[value="' + berminat_bazar_ramadhan + '"]').prop('checked', true);
        $('input[name="berminat_pelatihan_online"]').filter('[value="' + berminat_pelatihan_online + '"]').prop('checked', true);
        
        // Menetapkan nilai textarea sesuai dengan data yang diperoleh
        $('#edit_additionalText').val(additionalText);

        // Memeriksa apakah harus menampilkan atau menyembunyikan textarea berdasarkan nilai fasilitasi_promosi
        if (fasilitasi_promosi === 'Ya') {
            showEditTextarea();
        } else {
            hideEditTextarea();
        }
    });

    // Memproses update data promosi saat tombol update diklik
    $('#updatePromosiBtn').on('click', function () {
        var id = $('#edit_promosi_id').val(); 
        var formData = new FormData($('#editPromosiForm')[0]);

        if (id.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Product ID is missing.'
            });
        } else {
            $.ajax({
                type: 'POST',
                url: $('#editPromosiForm').attr('action') + '/' + id,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.message === 'Promosi edited successfully.') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            confirmButtonText: 'OK' // Menambahkan teks untuk tombol OK
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Memuat ulang halaman saat tombol OK ditekan
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
                        icon: 'success',
                        title: 'success',
                        text: 'Promosi added successfully.'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload(); // Memuat ulang halaman jika terjadi kesalahan
                        }
                    });
                }
            });
        }
    });
});





$('.btn-delete').click(function() {
                var id = $(this).data('promosiid');

// Display confirmation dialog using SweetAlert
Swal.fire({
    title: 'Apakah Anda yakin?',
    text: 'Anda akan menghapus Promosi ini. Tindakan ini tidak dapat dibatalkan.',
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
            url: '<?= site_url("promosi/delete/") ?>' + id,
            dataType: 'json',
            success: function (response) {
                if (response.message === 'Promosi deleted successfully.') {
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
</script>

<script>
    function showTextarea() {
        document.getElementById("additionalTextWrapper").style.display = "block";
    }

    function hideTextarea() {
        document.getElementById("additionalTextWrapper").style.display = "none";
    }
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
                text: 'Only Owner users have access to this page.'
            }).then((result) => {
                // Redirect to dashboard after the user closes the SweetAlert popup
                if (result.isConfirmed) {
                    window.location.href = 'dashboard';
                }
            });
        </script>
    </body>
<?php endif; ?>
