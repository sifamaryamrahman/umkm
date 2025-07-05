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


  <!-- / Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

 <!-- Bootstrap Container -->
<div class="container-fluid">
<div class="row mt-5">
<div class="card">
<div class="card-header">
<div class="d-flex justify-content-between align-items-center">
  <h5 class="mb-0">List UMKM</h5>
</div>
</div>
<div class="card-body">
                 
                 <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
 <tr>
     <th style="text-align:center" rowspan="3">Photo</th>
     <th style="text-align:center" rowspan="3">Nama Pemilik</th>
     <th style="text-align:center" rowspan="3">Nama Usaha</th>
     <th style="text-align:center" rowspan="3">Nama Produk</th>
     <th style="text-align:center" rowspan="3">Kategori</th>
     <th style="text-align:center" colspan="6">Perijinan</th>
     <th style="text-align:center" rowspan="3">Deskripsi</th>
     <th style="text-align:center" colspan="3">Jenis Pemasaran</th>
     <th style="text-align:center" rowspan="3">Status</th>
     <th style="text-align:center" rowspan="3">Aksi</th>

 </tr>
 <tr> <!-- Baris tambahan untuk label perijinan -->
     <th style="text-align:center" rowspan="2">NIB</th>
     <th style="text-align:center" rowspan="2">PIRT</th>
     <th style="text-align:center" rowspan="2">BPOM</th>
     <th style="text-align:center" rowspan="2">Halal</th>
     <th style="text-align:center" rowspan="2">HAKI</th>
     <th style="text-align:center" rowspan="2">Lainnya</th>
 </tr>
 <tr> <!-- Baris tambahan untuk label perijinan -->
     <th style="text-align:center">Online</th>
     <th style="text-align:center">Offline</th>
     <th style="text-align:center">Agen / Reseller</th>
 </tr>
</thead>
                         <tbody>
                         <?php foreach ($produks as $produk): ?>
            <?php if ($produk->status == 'disetujui' && isset($produk->photo)): ?>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->username == $produk->username): ?>
                                    <tr>
                                        <td style="text-align:center"><img src="<?php echo base_url('uploads/produk/' . $produk->photo); ?>" width="50" height="50" alt="UMKM Logo" style="border-radius: 50%;"></td>
                                        <td style="text-align:center"><?php echo $user->fullname; ?></td>
                                            <td style="text-align:center"><?php echo $produk->nama_usaha; ?></td>
                                            <td style="text-align:center"><?php echo $produk->nama_merek_produk; ?></td>
                                            <td style="text-align:center"><?php echo $produk->kategori_produk; ?></td>
                                            <td style="text-align:center"><?php echo $produk->nib; ?></td>
                                            <td style="text-align:center"><?php echo $produk->pirt; ?></td>
                                            <td style="text-align:center"><?php echo $produk->bpom; ?></td>
                                            <td style="text-align:center"><?php echo $produk->halal; ?></td>
                                            <td style="text-align:center"><?php echo $produk->haki; ?></td>
                                            <td style="text-align:center"><?php echo $produk->lainnya; ?></td>
                                            <td style="text-align: center; white-space: nowrap; max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
    <?php echo $produk->deskripsi_produk; ?>
</td>

                                            <td style="text-align:center"><?php echo $produk->online; ?></td>
                                            <td style="text-align:center"><?php echo $produk->offline; ?></td>
                                            <td style="text-align:center"><?php echo $produk->agen_reseller; ?></td>
                                            <td><span class="badge bg-label-success"><?= $produk->status ?></span></td>
                                            <td style="text-align:center"> <div class="dropdown">
    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <button class="dropdown-item btn btn-edit" data-toggle="modal" data-target="#editProductModal" data-produkid="<?= $produk->id ?>"
                                        data-namausaha="<?= $produk->nama_usaha ?>"
                                        data-namamerekproduk="<?= $produk->nama_merek_produk ?>"
                                        data-kategoriproduk="<?= $produk->kategori_produk ?>"
                                        data-nib="<?= $produk->nib ?>"
                                        data-pirt="<?= $produk->pirt ?>"
                                        data-bpom="<?= $produk->bpom ?>"
                                        data-halal="<?= $produk->halal ?>"
                                        data-haki="<?= $produk->haki ?>"
                                        data-lainnya="<?= $produk->lainnya ?>"
                                        data-deskripsiproduk="<?= $produk->deskripsi_produk ?>"
                                        data-online="<?= $produk->online ?>"
                                        data-offline="<?= $produk->offline ?>"
                                        data-agenreseller="<?= $produk->agen_reseller ?>"
                                        data-status="<?= $produk->status ?>"
                                        data-photo="<?= $produk->photo ?>">         
            <i class="bx bx-edit-alt me-1"></i> Edit
                        </button>
        <button type="button" class="dropdown-item btn btn-delete" data-produkid="<?php echo $produk->id; ?>">
    <i class="bx bx-trash me-1"></i> Delete
</button>

    </div>
</div>


                                </div></td>
                                <?php endif; ?>
                <?php endforeach; ?>
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
<!-- Tambah Produk Modal -->
<div class="modal fade bd-input-modal" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="inputModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah UMKM</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm" method="POST" action="<?php echo site_url('produk/insert_produk'); ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="addUsername" class="form-label">Nama Pemilik</label>
                        <select class="form-select" name="username" id="addUsername" aria-label="Default select example">
                        <?php foreach ($umkms as $umkm): ?>
        <?php if ($umkm->status === 'disetujui'): ?>
            <option value="<?php echo $umkm->username; ?>"><?php echo $umkm->username; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_usaha" class="col-form-label">Nama Usaha</label>
                        <input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" required />
                    </div><br>
                    <div class="form-group">
                        <label for="nama_merek_produk" class="col-form-label">Nama Merek Produk:</label>
                        <input type="text" class="form-control" name="nama_merek_produk" id="nama_merek_produk" placeholder="Nama Merek Produk" required />
                    </div><br>
                    <div class="mb-3">
                        <label for="kategori_produk" class="form-label">Kategori Produk</label>
                        <select class="form-select" name="kategori_produk" id="kategori_produk" required aria-label="Default select example">
                            <option value="">Pilih Kategori</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Kerajinan">Kerajinan</option>
                            <option value="Fashion">Fashion</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nib" class="col-form-label">NIB:</label>
                        <input type="text" class="form-control" name="nib" id="nib" placeholder="NIB" />
                    </div><br>
                    <div class="form-group">
                        <label for="pirt" class="col-form-label">PIRT:</label>
                        <input type="text" class="form-control" name="pirt" id="pirt" placeholder="PIRT" />
                    </div><br>
                    <div class="form-group">
                        <label for="bpom" class="col-form-label">BPOM:</label>
                        <input type="text" class="form-control" name="bpom" id="bpom" placeholder="BPOM" />
                    </div><br>
                    <div class="form-group">
                        <label for="halal" class="col-form-label">Halal:</label>
                        <input type="text" class="form-control" name="halal" id="halal" placeholder="Halal" />
                    </div><br>
                    <div class="form-group">
                        <label for="haki" class="col-form-label">HAKI:</label>
                        <input type="text" class="form-control" name="haki" id="haki" placeholder="HAKI" />
                    </div><br>
                    <div class="form-group">
                        <label for="lainnya" class="col-form-label">Lainnya:</label>
                        <input type="text" class="form-control" name="lainnya" id="lainnya" placeholder="Lainnya" />
                    </div><br>
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk:</label>
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                    </div><br>
                    <div class="form-group">
                        <label>Jenis Pemasaran:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="onlineCheckbox" name="online" value="Online">
                            <label class="form-check-label" for="onlineCheckbox">Online</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="offlineCheckbox" name="offline" value="Offline">
                            <label class="form-check-label" for="offlineCheckbox">Offline</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="agenResellerCheckbox" name="agen_reseller" value="Agen / Reseller">
                            <label class="form-check-label" for="agenResellerCheckbox">Agen / Reseller</label>
                        </div>
                    </div><br>
                    <div class="form-group">
        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="saveProductBtn" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit UMKM</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="POST" action="<?php echo site_url('produk/update_produk'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="editProductId">
                    <input type="hidden" name="username" id="editUsername" value="<?php echo $produk->username; ?>">
                    <div class="form-group">
                        <label for="editNamaUsaha" class="col-form-label">Nama Usaha</label>
                        <input
                          type="text"
                          class="form-control"
                        name="nama_usaha" id="editNamaUsaha"
                          placeholder="Nama Usaha"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editNamaMerekProduk" class="col-form-label">Nama Merek Produk:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="nama_merek_produk" id="editNamaMerekProduk"editNamaMerekProduk
                          placeholder="Nama Merek Produk"
                          aria-describedby="defaultFormControlHelp" required
                        />
                    </div><br>
                        <div class="mb-3">
                        <label for="editKategoriProduk" class="form-label">Kategori Produk</label>
                        <select class="form-select" name="kategori_produk" id="editKategoriProduk" required aria-label="Default select example">
                            <option value="">Pilih Kategori</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Kerajinan">Kerajinan</option>
                            <option value="Fashion">Fashion</option>
                        </select>
                    </div>
<div class="form-group">
                        <label for="nib" class="col-form-label">NIB:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="nib" id="editnib"
                          placeholder="NIB"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
<div class="form-group">
                        <label for="pirt" class="col-form-label">PIRT:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="pirt" id="editpirt"
                          placeholder="PIRT"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
<div class="form-group">
                        <label for="bpom" class="col-form-label">BPOM:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="bpom" id="editbpom"
                          placeholder="BPOM"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
<div class="form-group">
                        <label for="halal" class="col-form-label">Halal:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="halal" id="edithalal"
                          placeholder="Halal"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
<div class="form-group">
                        <label for="haki" class="col-form-label">HAKI:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="haki" id="edithaki"
                          placeholder="HAKI"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
<div class="form-group">
                        <label for="lainnya" class="col-form-label">Lainnya:</label>
                        <input
                          type="text"
                          class="form-control"
                        name="lainnya" id="editlainnya"
                          placeholder="Lainnya"
                          aria-describedby="defaultFormControlHelp"
                        />
                    </div><br>
                    <div class="form-group">
                        <label for="editDeskripsiProduk">Deskripsi Produk:</label>
                        <textarea class="form-control" id="editDeskripsiProduk" name="deskripsi_produk" rows="3" required></textarea>
                    </div><br>
                    <div class="form-group">
                        <label>Jenis Pemasaran:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="editOnline" name="online" value="Online">
                            <label class="form-check-label" for="onlineCheckbox">Online</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="editOffline" name="offline" value="Offline">
                            <label class="form-check-label" for="offlineCheckbox">Offline</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="editAgen" name="agen_reseller" value="Agen / Reseller">
                            <label class="form-check-label" for="agenResellerCheckbox">Agen / Reseller</label>
                        </div>
                    </div><br>
                    <input type="hidden" name="status" value="disetujui">
                    
                    <div class="form-group">
                    <img class="img-profile rounded-circle" style="width:150px;"
                                    src="<?= base_url('uploads/produk/' . $produk->photo) ?>">
    <div class="custom-file"><br>
        <input class="form-control" type="file"  name="photo" id="editPhoto" />
    </div>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="updateProductBtn" class="btn btn-primary">Simpan</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-47EQZopqPYAeP7+9mp8GsxjR2UFCoTvOZZy8yXz0VZI=" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
   $(document).ready(function() {

// Event handler for the "Add Data" button
$('#addDataBtn').click(function() {
    // Close the "Edit Product" modal if it's open
    $('#editProductModal').modal('hide');
    // Open the "Add Product" modal
    $('#addProductModal').modal('show');
});

$('#saveProductBtn').click(function() {
    // Get input values from the form
    var namaUsaha = $('#nama_usaha').val().trim();
    var namaProduk = $('#nama_merek_produk').val().trim();
    var kategoriProduk = $('#kategori_produk').val();
    var status = $('#status').val();
    
    // Checkboxes for jenis pemasaran
    var onlineChecked = $('#onlineCheckbox').is(':checked');
    var offlineChecked = $('#offlineCheckbox').is(':checked');
    var agenResellerChecked = $('#agenResellerCheckbox').is(':checked');

    // Prepare jenis pemasaran array
    var jenisPemasaran = [];
    if (onlineChecked) {
        jenisPemasaran.push('Online');
    }
    if (offlineChecked) {
        jenisPemasaran.push('Offline');
    }
    if (agenResellerChecked) {
        jenisPemasaran.push('Agen / Reseller');
    }

    // Check if inputs are filled
    if (namaUsaha === '' || namaProduk === '' || kategoriProduk === '' || status === '' || jenisPemasaran.length === 0) {
        // Show error message if any input is empty
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Business name, UMKM name, UMKM category, and marketing type must be filled!'
        });
    } else {
        // Prepare FormData object
        var formData = new FormData();
        formData.append('username', $('#addUsername').val());
        formData.append('nama_usaha', namaUsaha);
        formData.append('nama_merek_produk', namaProduk);
        formData.append('kategori_produk', kategoriProduk);
        formData.append('nib', $('#nib').val());
        formData.append('pirt', $('#pirt').val());
        formData.append('bpom', $('#bpom').val());
        formData.append('halal', $('#halal').val());
        formData.append('haki', $('#haki').val());
        formData.append('lainnya', $('#lainnya').val());
        formData.append('status', $('#status').val());
        formData.append('deskripsi_produk', $('#deskripsi_produk').val());
        // Append jenis_pemasaran array as comma-separated string
        formData.append('jenis_pemasaran', jenisPemasaran.join(','));

        // Send data using Fetch API
        fetch($('#addProductForm').attr('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'UMKM added successfully.') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        });
    }
});
});



$(document).ready(function() {
    $('.btn-edit').click(function() {
        var online = $(this).data('online');
        var offline = $(this).data('offline');
        var agenreseller = $(this).data('agenreseller');
        if (online != '') {
            $('#editOnline').prop('checked', true);
        }
        if (offline != '') {
            $('#editOffline').prop('checked', true);
        }
        if (agenreseller != '') {
            $('#editAgen').prop('checked', true);
        }
        
        var id = $(this).data('produkid'); // Retrieve product ID
        var nama_usaha = $(this).data('namausaha');
        var nama_merek_produk = $(this).data('namamerekproduk');
        var kategori_produk = $(this).data('kategoriproduk');
        var nib = $(this).data('nib');
        var pirt = $(this).data('pirt');
        var bpom = $(this).data('bpom');
        var halal = $(this).data('halal');
        var haki = $(this).data('haki');
        var lainnya = $(this).data('lainnya');
        var deskripsi_produk = $(this).data('deskripsiproduk');
        var status = $(this).data('status');
        var photo = $(this).data('photo');

        // Set values to respective fields
        $('#editProductId').val(id); 
        $('#editNamaUsaha').val(nama_usaha);
        $('#editNamaMerekProduk').val(nama_merek_produk);
        $('#editKategoriProduk').val(kategori_produk);
        $('#editnib').val(nib);
        $('#editpirt').val(pirt);
        $('#editbpom').val(bpom);
        $('#edithalal').val(halal);
        $('#edithaki').val(haki);
        $('#editlainnya').val(lainnya);
        $('#editDeskripsiProduk').val(deskripsi_produk);
        $('#editJenisPemasaran').val(jenis_pemasaran);
        $('#editPhoto').val(photo);
        $('#edit_status').val(status);

        // Check checkboxes based on data
        $('#nibCheckbox').prop('checked', nib);
        $('#editnib').toggle(nib);
        $('#pirtCheckbox').prop('checked', pirt);
        $('#editpirt').toggle(pirt);
        $('#bpomCheckbox').prop('checked', bpom);
        $('#editbpom').toggle(bpom);
        $('#halalCheckbox').prop('checked', halal);
        $('#edithalal').toggle(halal);
        $('#hakiCheckbox').prop('checked', haki);
        $('#edithaki').toggle(haki);
    });

    // Toggle input field when checkbox clicked
    $('#nibCheckbox').change(function() {
        $('#editnib').toggle(this.checked);
    });

    $('#pirtCheckbox').change(function() {
        $('#editpirt').toggle(this.checked);
    });

    $('#bpomCheckbox').change(function() {
        $('#editbpom').toggle(this.checked);
    });

    $('#halalCheckbox').change(function() {
        $('#edithalal').toggle(this.checked);
    });

    $('#hakiCheckbox').change(function() {
        $('#edithaki').toggle(this.checked);
    });

    $('#lainnyaCheckbox').change(function() {
        $('#editlainnya').toggle(this.checked);
    });

    $('#updateProductBtn').on('click', function () {
        var id = $('#editProductId').val(); 
        var formData = new FormData($('#editProductForm')[0]);
        // Checkboxes for jenis pemasaran
        var onlineChecked = $('#editOnline').is(':checked');
        var offlineChecked = $('#editOffline').is(':checked');
        var agenResellerChecked = $('#editAgen').is(':checked');

        // Prepare jenis pemasaran array
        var jenisPemasaran = [];
        if (onlineChecked) {
            jenisPemasaran.push('Online');
        }
        if (offlineChecked) {
            jenisPemasaran.push('Offline');
        }
        if (agenResellerChecked) {
            jenisPemasaran.push('Agen / Reseller');
        }
        // Set jenis_pemasaran array as comma-separated string
        formData.set('jenis_pemasaran', jenisPemasaran.join(','));

        if (id.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Product ID is missing.'
            });
        } else {
            $.ajax({
                type: 'POST',
                url: $('#editProductForm').attr('action') + '/' + id,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    if (response.message === 'UMKM edited successfully.') {
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
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            confirmButtonText: 'OK' // Menambahkan teks untuk tombol OK
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload(); // Memuat ulang halaman saat tombol OK ditekan
                            }
                        });
                    }
                },
            });
        }
    });
});






    $(document).ready(function(){
    // Function to handle deleting category
    $('#dataTable').on('click', '.btn-delete', function () {
        var id = $(this).data('produkid');

        // Display confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda akan menghapus UMKM ini. Tindakan ini tidak dapat dibatalkan.',
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
                    url: '<?= site_url("produk/delete/") ?>' + id, // Adjust the URL here
                    dataType: 'json',
                    success: function (response) {
                        if (response.message === 'UMKM deleted successfully.') {
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
    // Tambahkan event click untuk tombol "Tambah Data"
    $('#addDataBtn').click(function() {
        // Periksa status saat tombol ditekan
        if ($('#edit_status').val() === 'Menunggu') {
            // Tampilkan pesan SweetAlert bahwa UMKM masih menunggu persetujuan
            Swal.fire({
                icon: 'warning',
                title: 'Tidak bisa menambah data',
                text: 'UMKM masih menunggu persetujuan. Anda tidak dapat menambah data sampai UMKM disetujui.',
            });
        } else {
            // Jika status bukan "Menunggu", tampilkan modal
            $('.bd-input-modal').modal('show');
        }
    });
})
        $(document).ready(function() {
        $('#perijinanSelect').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Lainnya') {
                $('#lainnyaInput').show();
            } else {
                $('#lainnyaInput').hide();
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
