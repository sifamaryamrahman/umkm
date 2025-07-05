<?php if (is_object($user) && $user->usertype === 'Owner'): ?>
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
<style>
    .swal2-container {
    z-index: 99999; /* Ensure SweetAlert modal appears above Bootstrap modal */
}
</style>

<div class="container-fluid">

    <!-- Page Heading -->

            
            <div class="row mt-5">
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Platform Pemasaran</h5>
        </div>
    </div>
                <div class="card-body">
                    <!-- Search bar -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Photo</th>
                                    <th style="text-align:center">Nama Usaha</th>
                                    <th style="text-align:center">Nama Produk</th>
                                    <th style="text-align:center">WhatsApp</th>
                                    <th style="text-align:center">Blibli</th>
                                    <th style="text-align:center">Lazada</th>
                                    <th style="text-align:center">Shopee</th>
                                    <th style="text-align:center">Tokopedia</th>
                                    <th style="text-align:center">Facebook</th>
                                    <th style="text-align:center">Instagram</th>
                                    <th style="text-align:center">TikTok</th>
                                    <th style="text-align:center">Lainnya</th>
                                    <th style="text-align:center" colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            
            <?php foreach ($produks as $produk): ?>
                <?php if ($produk && isset($produk->photo) && $produk->username == $this->session->userdata('username')): ?>
                    <?php if ($produk->status != 'menunggu'): ?>
                            <tbody>
                                <?php foreach ($produks as $produk): ?>
                                    <?php 
                                        // Fetch platform information for the current product
                                        $platform = $this->Platform_model->get_platform_by_id($produk->id); 
                                        
                                        // Fetch umkm_name based on the logged-in user's username
                                        $username = $this->User_model->get_umkm_name_by_username($this->session->userdata('username'));
                                        
                                        // Check if the category is associated with the logged-in user's umkm_name
                                        if ($produk->username == $username): 
                                    ?>
                                        <tr>
                                            <!-- Display product information -->
                                            <td style="text-align:center"><img src="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" width="50" height="50" alt="UMKM Logo" style="border-radius: 50%;"></td>
                                            <td style="text-align:center"><?php echo $produk->nama_usaha; ?></td>
                                            <td style="text-align:center"><?php echo $produk->nama_merek_produk; ?></td>
                                            
                                            <!-- Display platform links (if available) -->
                                            <?php if ($platform !== null): ?>
                                                <td style="text-align:center"><?php echo $platform->whatsapp ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->blibli ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->lazada ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->shopee ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->tokopedia ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->facebook ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->instagram ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->tiktok ?? ''; ?></td>
                                                <td style="text-align:center"><?php echo $platform->twitter ?? ''; ?></td>
                                            <?php else: ?>
                                                <!-- If platform information is not available, display empty cells -->
                                                <td colspan="9" style="text-align:center">Platform information not available</td>
                                            <?php endif; ?>

                                            <!-- Buttons for adding, editing, and deleting platforms -->
                                            <?php
                                                // Fetch platform information for the current product
                                                $platform = $this->Platform_model->get_platform_by_id($produk->id); 
                                            ?>

                                            <!-- Button for adding platform, disabled if platform information already exists for the current product -->
                                            <td style="text-align:center">
    <?php if ($platform === null): ?>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addPlatformModal">
            <i class="fa fa-plus-circle"></i>
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-sm btn-primary" disabled>
            <i class="fa fa-plus-circle"></i>
        </button>
    <?php endif; ?>
</td>

<td style="text-align:center">
    <?php if ($platform !== null): ?>
        <button type="button" class="btn btn-sm btn-info btn-edit-platform" 
                data-toggle="modal" data-target="#editPlatformModal" 
                data-platformid="<?php echo $platform->id ?? ''; ?>"
                data-idproduk="<?php echo $platform->id_produk ?? ''; ?>"
                data-username="<?php echo $platform->username ?? ''; ?>"
                data-whatsapp="<?php echo $platform->whatsapp ?? ''; ?>"
                data-blibli="<?php echo $platform->blibli ?? ''; ?>"
                data-lazada="<?php echo $platform->lazada ?? ''; ?>"
                data-shopee="<?php echo $platform->shopee ?? ''; ?>"
                data-tokopedia="<?php echo $platform->tokopedia ?? ''; ?>"
                data-facebook="<?php echo $platform->facebook ?? ''; ?>"
                data-instagram="<?php echo $platform->instagram ?? ''; ?>"
                data-tiktok="<?php echo $platform->tiktok ?? ''; ?>"
                data-twitter="<?php echo $platform->twitter ?? ''; ?>"
                title="Edit Platform">
            <i class="far fa-edit"></i>
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-sm btn-info btn-edit-platform" disabled>
            <i class="far fa-edit"></i>
        </button>
    <?php endif; ?>
</td>

<td style="text-align:center">
    <?php if ($platform !== null): ?>
        <button type="button" class="btn btn-sm btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal" data-platformid="<?php echo $platform->id ?? ''; ?>">
            <i class="far fa-trash-alt"></i>
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-sm btn-danger btn-delete" disabled>
            <i class="far fa-trash-alt"></i>
        </button>
    <?php endif; ?>
</td>

                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>

</div>
<!-- Modal -->
<div class="modal fade" id="addPlatformModal" tabindex="-1" role="dialog" aria-labelledby="addPlatformModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlatformModalLabel">Add Platform</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to add platform -->
                <form id="addPlatformForm" method="POST" action="<?php echo site_url('platform/insert_platform'); ?>">
                <div class="mb-3">
                        <label for="addId" class="form-label">Nama Produk</label>
                        <select class="form-select" name="id_produk" id="id_produk" aria-label="Default select example">
    <?php
    // Initialize an array to store unique nama_merek_produk values
    $uniqueNamaMerek = array();

    // Iterate through the produks
    foreach ($produks as $produk):
        // Check if the nama_merek_produk is not already added
        if (!in_array($produk->nama_merek_produk, $uniqueNamaMerek) && $produk->username == $username):
            // Add the nama_merek_produk to the uniqueNamaMerek array to prevent duplicates
            $uniqueNamaMerek[] = $produk->nama_merek_produk;
    ?>
            <option value="<?php echo $produk->id; ?>"><?php echo $produk->nama_merek_produk; ?></option>
    <?php
        endif;
    endforeach;
    ?>
</select>
</div>
<div class="mb-3">
                        <label for="addUsername" class="form-label">Nama Pemilik</label>
                        <select class="form-select" name="username" id="username" aria-label="Default select example">
    <?php if (empty($produks)): ?>
        <!-- Jika tidak ada produk, tampilkan username yang sedang login -->
        <option value="<?php echo $user->username; ?>"><?php echo $user->fullname; ?></option>
    <?php else: ?>
        <!-- Jika ada produk, tampilkan opsi dari produk -->
        <?php foreach ($produks as $produk): ?>
            <?php if ($produk->username == $user->username): ?>
                <option value="<?php echo $produk->username; ?>"><?php echo $user->fullname; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</select>
                    </div>
                    <div class="form-group">
                        <label for="nib" class="col-form-label">WhatsApp:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="whatsapp" id="whatsapp"
                          placeholder="WhatsApp"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="nib" class="col-form-label">Blibli:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="blibli" id="blibli"
                          placeholder="Blibli"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="lazada" class="col-form-label">Lazada:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="lazada" id="lazada"
                          placeholder="Lazada"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="shopee" class="col-form-label">Shopee:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="shopee" id="shopee"
                          placeholder="Shopee"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="tokopedia" class="col-form-label">Tokopedia:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="tokopedia" id="tokopedia"
                          placeholder="Tokopedia"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="facebook" class="col-form-label">Facebook:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="facebook" id="facebook"
                          placeholder="Facebook"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="instagram" class="col-form-label">Instagram:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="instagram" id="instagram"
                          placeholder="Instagram"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="tiktok" class="col-form-label">TikTok:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="tiktok" id="tiktok"
                          placeholder="TikTok"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="twitter" class="col-form-label">Lainnya:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="twitter" id="twitter"
                          placeholder="Twitter"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addPlatformBtn">Save Platform</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPlatformModal" tabindex="-1" role="dialog" aria-labelledby="editPlatformModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlatformModalLabel">Edit Platform</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to edit platform -->
                <form id="editPlatformForm" method="POST" action="<?php echo site_url('platform/update_platform'); ?>">
                    <input type="hidden" id="editPlatformId" name="id">
                    <div class="mb-3">
                        <label for="editIdProduk" class="form-label">Nama Produk</label>
                        <select class="form-select" name="id_produk" id="editIdProduk" aria-label="Default select example">
                            
                               <?php
    // Initialize an array to store unique nama_merek_produk values
    $uniqueNamaMerek = array();

    // Iterate through the produks
    foreach ($produks as $produk):
        // Check if the nama_merek_produk is not already added
        if (!in_array($produk->nama_merek_produk, $uniqueNamaMerek) && $produk->username == $username):
            // Add the nama_merek_produk to the uniqueNamaMerek array to prevent duplicates
            $uniqueNamaMerek[] = $produk->nama_merek_produk;
    ?>
            <option value="<?php echo $produk->id; ?>"><?php echo $produk->nama_merek_produk; ?></option>
    <?php
        endif;
    endforeach;
    ?>
                        </select>
                    </div>
                        <div class="mb-3">
                        <label for="editUsername" class="form-label">Nama Pemilik</label>
                        <select class="form-select" name="username" id="editUsername" aria-label="Default select example">
                            <!-- Display options for usernames -->
                            <?php if (empty($produks)): ?>
        <!-- Jika tidak ada produk, tampilkan username yang sedang login -->
        <option value="<?php echo $user->username; ?>"><?php echo $user->fullname; ?></option>
    <?php else: ?>
        <!-- Jika ada produk, tampilkan opsi dari produk -->
        <?php foreach ($produks as $produk): ?>
            <?php if ($produk->username == $user->username): ?>
                <option value="<?php echo $produk->username; ?>"><?php echo $user->fullname; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editWhatsapp" class="col-form-label">WhatsApp:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="whatsapp" id="editWhatsapp"
                          placeholder="WhatsApp"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editBlibli" class="col-form-label">Blibli:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="blibli" id="editBlibli"
                          placeholder="Blibli"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editLazada" class="col-form-label">Lazada:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="lazada" id="editLazada"
                          placeholder="Lazada"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editShopee" class="col-form-label">Shopee:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="shopee" id="editShopee"
                          placeholder="Shopee"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editTokopedia" class="col-form-label">Tokopedia:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="tokopedia" id="editTokopedia"
                          placeholder="Tokopedia"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editFacebook" class="col-form-label">Facebook:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="facebook" id="editFacebook"
                          placeholder="Facebook"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editInstagram" class="col-form-label">Instagram:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="instagram" id="editInstagram"
                          placeholder="Instagram"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editTiktok" class="col-form-label">TikTok:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="tiktok" id="editTiktok"
                          placeholder="TikTok"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editTwitter" class="col-form-label">Twitter:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="twitter" id="editTwitter"
                          placeholder="Twitter"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editPlatformBtn">Save Changes</button>
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(document).ready(function () {
    $('#addPlatformBtn').on('click', function () {
        var id_produk = $('#id_produk').val();
        var username = $('#username').val();
        var whatsapp = $('#whatsapp').val();
        var blibli = $('#blibli').val();
        var lazada = $('#lazada').val();
        var shopee = $('#shopee').val();
        var tokopedia = $('#tokopedia').val();
        var facebook = $('#facebook').val();
        var instagram = $('#instagram').val();
        var tiktok = $('#tiktok').val();
        var twitter = $('#twitter').val();

        // Validate if any required field is empty
        if (id_produk.trim() === '' || username.trim() === '' || whatsapp.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in all required fields.'
            });
        } else {
            // If all required fields are filled, proceed with AJAX request
            var formData = new FormData($('#addPlatformForm')[0]);
            $.ajax({
                type: 'POST',
                url: $('#addPlatformForm').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.message === 'Platform added successfully.') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Reload the page after successful addition
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
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown, jqXHR);
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
$(document).ready(function(){
    // Function to handle deleting category
    $('#dataTable').on('click', '.btn-delete', function () {
        var id = $(this).data('platformid');

        // Display confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus Platform ini. Tindakan ini tidak dapat dibatalkan.',
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
                    url: '<?= site_url("platform/delete_platform/") ?>' + id, // Adjust the URL here
                    dataType: 'json',
                    success: function (response) {
                        if (response.message === 'Platform deleted successfully.') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                                allowOutsideClick: false, // Prevent user from clicking outside the modal
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload(); // Reload the page after successful deletion
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
                            text: 'Terjadi kesalahan saat memproses permintaan Anda.'
                        });
                    }
                });
            }
        });
    });
});
$(document).ready(function() {
    $('.btn-edit-platform').click(function() {
        // Mengambil data dari atribut data pada tombol "Edit"
        var id = $(this).data('platformid');
        var id_produk = $(this).data('idproduk');
        var username = $(this).data('username');
        var whatsapp = $(this).data('whatsapp');
        var match;
        // Ambil nomor WhatsApp dari text website
        match = whatsapp.match(/\d+/);
        if (match) {
            whatsapp = match[0];
        }
        var blibli = $(this).data('blibli');
        // Ambil nomor Blibli dari text website
        match = blibli.match(/\/([^/]+)$/);
        if (match) {
            blibli = match[1];
        }
        var lazada = $(this).data('lazada');
        // Ambil nomor Lazada dari text website
        match = lazada.match(/\/([^/]+)$/);
        if (match) {
            lazada = match[1];
        }
        var shopee = $(this).data('shopee');
        // Ambil nomor Shopee dari text website
        match = shopee.match(/\/([^/]+)$/);
        if (match) {
            shopee = match[1];
        }
        var tokopedia = $(this).data('tokopedia');
        // Ambil nomor Tokopedia dari text website
        match = tokopedia.match(/\/([^/]+)$/);
        if (match) {
            tokopedia = match[1];
        }
        var facebook = $(this).data('facebook');
        // Ambil nomor Facebook dari text website
        match = facebook.match(/\/([^/]+)$/);
        if (match) {
            facebook = match[1];
        }
        var instagram = $(this).data('instagram');
        // Ambil nomor Instagram dari text website
        match = instagram.match(/\/([^/]+)$/);
        if (match) {
            instagram = match[1];
        }
        var tiktok = $(this).data('tiktok');
        // Ambil nomor Tiktok dari text website
        match = tiktok.match(/\/([^/]+)$/);
        if (match) {
            tiktok = match[1];
            // Split the string by the last slash and get the last element
            tiktok = tiktok.slice(1); // Remove and return the last element
        }
        var twitter = $(this).data('twitter');
        // Ambil nomor Twitter / X dari text website
        match = twitter.match(/\/([^/]+)$/);
        if (match) {
            twitter = match[1];
        }

        // Mengisi nilai input dalam modal edit dengan data yang diperlukan
        $('#editPlatformId').val(id);
        $('#editIdProduk').val(id_produk);
        $('#editUsername').val(username);
        $('#editWhatsapp').val(whatsapp);
        $('#editBlibli').val(blibli);
        $('#editLazada').val(lazada);
        $('#editShopee').val(shopee);
        $('#editTokopedia').val(tokopedia);
        $('#editFacebook').val(facebook);
        $('#editInstagram').val(instagram);
        $('#editTiktok').val(tiktok);
        $('#editTwitter').val(twitter);

        // Simpan data asli dalam atribut data-original
        $('#editPlatformForm input, #editPlatformForm textarea').each(function() {
            $(this).data('original', $(this).val());
        });
    });

    // Event handler untuk tombol "Save Changes" pada modal edit
    $('#editPlatformBtn').on('click', function () {
        var id = $('#editPlatformId').val(); 
        var formData = new FormData($('#editPlatformForm')[0]);
        
        // Pengecekan apakah ada perubahan data sebelum mengirimkan permintaan AJAX
        var dataChanged = false;
        $('#editPlatformForm input, #editPlatformForm textarea').each(function() {
            var currentValue = $(this).val();
            var originalValue = $(this).data('original');
            if (currentValue !== originalValue) {
                dataChanged = true;
                return false; // Break the loop
            }
        });

        if (!dataChanged) {
            Swal.fire({
                icon: 'info',
                title: 'No Changes',
                text: 'No changes to update.'
            });
            return; // Stop further execution
        }
        
        // Mengirimkan permintaan AJAX untuk memperbarui platform
        if (id.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill in the Platform name.'
            });
        } else {
            $.ajax({
                type: 'POST',
                url: $('#editPlatformForm').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.message === 'Platform updated successfully.') {
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
                text: 'Only Admin users have access to this page.'
            }).then((result) => {
                // Redirect to dashboard after the user closes the SweetAlert popup
                if (result.isConfirmed) {
                    window.location.href = 'dashboard';
                }
            });
        </script>
    </body>
<?php endif; ?>
