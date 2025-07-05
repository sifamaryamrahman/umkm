  <!-- Layout wrapper --><?php include('head.php'); ?>
  <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="<?=site_url('umkm/dashboard')?>" class="menu-link">
              <span class="app-brand-logo demo">
              <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo" width="50">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">UMKM</span>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
</a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="<?=site_url('umkm/dashboard')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

           
            <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Pages</span>
</li>
<!-- <?php if($user->usertype === 'Admin'): ?>
  <li class="menu-item">
              <a href="<?=site_url('umkm/pemilik_umkm')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Basic">Pemilik UMKM</div>
              </a>
            </li>
<?php endif; ?> -->
<!-- <?php if($user->usertype === 'Owner'): ?>
            <li class="menu-item">
              <a href="<?=site_url('umkm/data_umkm')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Basic">Pemilik UMKM</div>
              </a>
            </li>
            <?php endif; ?> -->
<?php if($user->usertype === 'Admin'): ?>
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle" data-toggle="product">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
        <div data-i18n="Authentications">Data UMKM</div>
    </a>
    <ul class="menu-sub" id="product-submenu">
    <li class="menu-item">
        <a href="<?=site_url('/umkm/produk1_menunggu')?>" class="menu-link">
                <div data-i18n="Basic">List UMKM Menunggu </div>
            </a>
        </li>
        <li class="menu-item">
        <a href="<?=site_url('/umkm/produk1_disetujui')?>" class="menu-link">
                <div data-i18n="Basic">List UMKM Disetujui </div>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?=site_url('/umkm/platform1')?>" class="menu-link">
                <div data-i18n="Basic">Platform Pemasaran</div>
            </a>
        </li>
    </ul>
</li>
<?php endif; ?>
<?php if($user->usertype === 'Owner'): ?>
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle" data-toggle="product">
        <i class="menu-icon tf-icons bx bx-cube-alt"></i>
        <div data-i18n="Authentications">Data UMKM</div>
    </a>
    <ul class="menu-sub" id="product-submenu">
        <li class="menu-item">
        <a href="<?=site_url('/umkm/produk')?>" class="menu-link">
                <div data-i18n="Basic">UMKM</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="<?=site_url('/umkm/platform')?>" class="menu-link">
                <div data-i18n="Basic">Platform Pemasaran</div>
            </a>
        </li>
    </ul>
</li>
<?php endif; ?>
<?php if($user->usertype === 'Admin'): ?>
            <li class="menu-item">
              <a href="<?=site_url('umkm/pengguna')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Basic">Pengguna</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=site_url('umkm/promosi1')?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Basic">Promosi</div>
              </a>
            </li>
            <?php endif; ?>
            <?php if($user->usertype === 'Owner'): ?>
            <li class="menu-item">
              <a href="<?=site_url('umkm/profil')?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Basic">Pengguna</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?=site_url('umkm/promosi')?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Basic">Promosi</div>
              </a>
            </li>
            <?php endif; ?>

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="<?=site_url('auth/logout')?>" class="menu-link" >
              <i class="bx bx-power-off me-2"></i>
                <div data-i18n="Basic">Logout</div>
              </a>
            </li>
           

           
            </li>
            <!-- Misc -->
          
        </aside>
        