<?php
if (!function_exists('pio_page_title')) {
  function pio_page_title($class, $method) {
    $class = strtolower($class);
    $method = strtolower($method);

    $titles = array(
      'dashboard'      => 'Dashboard',
      'search'         => 'Cari Produk',
      'auth'           => 'Login',
      'report'         => 'Laporan',
      'reportmaster'   => 'Laporan Master Data',
      'reportstock'    => 'Laporan Stock',
      'reportpurchase' => 'Laporan Pembelian',
      'reportpayment'  => 'Laporan Pelunasan',
      'reportsales'    => 'Laporan Penjualan',
      'opname' => array(
        '_default'     => 'Stock Opname',
        'addopname'    => 'Tambah Stock Opname',
        'detailopname' => 'Detail Stock Opname',
      ),
      'transferstock' => array(
        '_default'          => 'Transfer Stock',
        'addtransferstock'  => 'Tambah Transfer Stock',
        'detailtransfer'    => 'Detail Transfer Stock',
      ),
      'masterdata'     => array(
        '_default'        => 'Master Data',
        'brand'           => 'Brand',
        'customer'        => 'Customer',
        'detailcustomer'  => 'Detail Customer',
        'ekspedisi'       => 'Expedisi',
        'warehouse'       => 'Gudang',
        'category'        => 'Kategori',
        'product'         => 'Produk',
        'settingproduct'  => 'Pengaturan Produk',
        'stock_mass_update' => 'Update Stok Massal',
        'payment'         => 'Pembayaran',
        'salesman'        => 'Salesman',
        'detailsalesman'  => 'Detail Salesman',
        'unit'            => 'Satuan',
        'supplier'        => 'Supplier',
      ),
      'purchase' => array(
        '_default'          => 'Pembelian',
        'addpurchase'       => 'Tambah Pembelian',
        'detailpurchase'    => 'Detail Pembelian',
        'submission'        => 'Pengajuan Pembelian',
        'detailsubmission'  => 'Detail Pengajuan',
        'po'                => 'PO Pembelian',
        'addpo'             => 'Tambah PO',
        'editpo'            => 'Edit PO',
        'detailpo'          => 'Detail PO',
        'warehouseinput'      => 'Penginputan Gudang',
        'addwarehouseinput'   => 'Tambah Penginputan Gudang',
        'detailinputstock'    => 'Detail Penginputan Gudang',
        'returpurchase'       => 'Retur Pembelian',
        'addreturpurchase'    => 'Tambah Retur Pembelian',
        'detailreturpurchase' => 'Detail Retur Pembelian',
        'purchaserevisi'      => 'Revisi Pembelian',
        'addpurchaserevisi'   => 'Tambah Revisi Pembelian',
      ),
      'sales' => array(
        '_default'          => 'Penjualan',
        'salesorder'        => 'Sales Order',
        'detailsalesorder'  => 'Detail Sales Order',
        'addsalesorder'     => 'Tambah Sales Order',
        'editsalesorder'    => 'Edit Sales Order',
        'salespage'         => 'Penjualan',
        'detailsales'       => 'Detail Penjualan',
        'addsales'          => 'Tambah Penjualan',
        'salesdropship'     => 'Penjualan Dropship',
        'addsalesdropship'  => 'Tambah Penjualan Dropship',
        'detailsalesdropship' => 'Detail Penjualan Dropship',
        'editsalesdropship'   => 'Edit Penjualan Dropship',
        'revisisalespage'   => 'Revisi Penjualan',
        'addrevisisales'    => 'Tambah Revisi Penjualan',
        'retursales'        => 'Retur Penjualan',
        'addretursales'     => 'Tambah Retur Penjualan',
        'detailretursales'  => 'Detail Retur Penjualan',
      ),
      'payment' => array(
        '_default'          => 'Pelunasan',
        'debt'              => 'Pelunasan Hutang',
        'detaildebt'        => 'Detail Pelunasan Hutang',
        'debtpayview'       => 'Bayar Hutang',
        'receivable'        => 'Pelunasan Piutang',
        'detailreceivable'  => 'Detail Pelunasan Piutang',
        'receivablepayview' => 'Bayar Piutang',
      ),
      'user' => array(
        '_default' => 'Admin',
        'role'     => 'Grup Pengguna',
        'account'  => 'Akun Pengguna',
      ),
    );

    if (!isset($titles[$class])) {
      return ucwords(str_replace('_', ' ', $class));
    }

    $entry = $titles[$class];
    if (is_string($entry)) {
      return $entry;
    }

    return isset($entry[$method]) ? $entry[$method] : $entry['_default'];
  }
}

$pio_page_title = isset($page_title)
  ? $page_title
  : pio_page_title($this->router->fetch_class(), $this->router->fetch_method());
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?php echo htmlspecialchars($pio_page_title); ?> | Pionir Backoffice</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
  <link rel="icon" href="<?php echo base_url(); ?>assets/logo.png" type="image/x-icon"/>
  <style type="text/css">
    .img-thumbnail {
      padding: .25rem;
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: .25rem;
      box-shadow: 0 1px 2px rgba(0, 0, 0, .075);
      max-width: 100%;
      height: auto;
    }

    :root {
      --pio-red: #d21f2c;
      --pio-red-dark: #8a1017;
      --pio-dark: #1a1a2e;
    }

    /* ── Sidebar ── */
    .sidebar[data-background-color="dark"] {
      background:
        linear-gradient(180deg, rgba(8,3,5,0) 0%, rgba(8,3,5,.6) 78%, rgba(6,2,3,.92) 100%),
        url('<?php echo base_url(); ?>assets/leftmenu.png') center / cover no-repeat;
      border-right: none;
    }
    .sidebar .sidebar-logo .logo-header {
      background: transparent !important;
      border-bottom: 1px solid rgba(255,255,255,.12);
    }
    .sidebar .sidebar-logo .logo-header .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .sidebar .sidebar-logo .logo-header .logo img {
      width: 34px;
      height: 34px;
      object-fit: contain;
    }
    .sidebar .sidebar-logo .logo-header .logo h1 {
      font-size: 1.05rem !important;
      font-weight: 800 !important;
      letter-spacing: .4px;
      margin: 0 !important;
      color: #fff !important;
    }
    .sidebar .nav-secondary > .nav-item > a {
      color: rgba(255,255,255,.82) !important;
      border-radius: 10px;
      margin: 2px 10px 2px 6px;
      padding: .62rem .9rem;
      font-weight: 500;
      font-size: .88rem;
      transition: background .2s, color .2s;
    }
    .sidebar .nav-secondary > .nav-item > a i {
      color: rgba(255,255,255,.62);
      width: 20px;
      text-align: center;
      transition: color .2s;
    }
    .sidebar .nav-secondary > .nav-item > a:hover {
      background: rgba(255,255,255,.09);
      color: #fff !important;
    }
    .sidebar .nav-secondary > .nav-item > a:hover i { color: #fff; }
    #pioSidebarNav > .nav-item.active > a,
    #pioSidebarNav > .nav-item.active > a:focus,
    #pioSidebarNav > .nav-item.active > a:hover,
    #pioSidebarNav > .nav-item.active > a[data-bs-toggle="collapse"] {
      background: linear-gradient(135deg, var(--pio-red), var(--pio-red-dark)) !important;
      color: #fff !important;
      box-shadow: 0 6px 16px rgba(210,31,44,.35);
    }
    #pioSidebarNav > .nav-item.active > a i,
    #pioSidebarNav > .nav-item.active > a p,
    #pioSidebarNav > .nav-item.active > a .caret { color: #fff !important; }
    .sidebar .nav-collapse { padding-left: 0; list-style: none; }
    .sidebar .nav-collapse li { list-style: none; }
    .sidebar .nav-collapse li a {
      margin: 1px 10px 1px 6px;
      border-radius: 8px;
      padding: .48rem 1rem .48rem 2.7rem;
      position: relative;
    }
    .sidebar .nav-collapse li a:hover { background: rgba(255,255,255,.08); }
    .sidebar .nav-collapse .sub-item { color: rgba(255,255,255,.65); font-size: .83rem; }
    .sidebar .nav-collapse li a:hover .sub-item { color: #fff !important; }
    .sidebar .nav-collapse li.active a { background: rgba(210,31,44,.16) !important; }
    .sidebar .nav-collapse li.active .sub-item,
    .sidebar .nav-collapse li.active > a { color: #ff9d9d !important; font-weight: 700; }
    .sidebar .nav-collapse li.active a::before {
      content: '';
      position: absolute;
      left: 1.15rem;
      top: 50%;
      transform: translateY(-50%);
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--pio-red);
    }
    .sidebar .sidebar-wrapper { padding-bottom: 160px; }

    .sidebar-footer-brand {
      position: absolute;
      left: 0; right: 0; bottom: 0;
      padding: 18px 22px 20px;
      background: linear-gradient(180deg, rgba(8,3,5,0) 0%, rgba(6,2,3,.8) 45%, rgba(6,2,3,.95) 100%);
    }
    .sfb-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
    .sfb-logo img { width: 30px; height: 30px; object-fit: contain; flex-shrink: 0; }
    .sfb-logo strong { display: block; color: #fff; font-size: .82rem; font-weight: 800; letter-spacing: .4px; line-height: 1.3; }
    .sfb-logo span { display: block; color: rgba(255,255,255,.55); font-size: .64rem; letter-spacing: .8px; text-transform: uppercase; }

    /* ── Topbar ── */
    .main-header { background: #fff; }
    .navbar-header-transparent { background: transparent; }
    .topbar-nav .nav-link { color: #4b4f58; }
    .topbar-greeting { display: flex; align-items: center; gap: 1.1rem; }
    .topbar-greeting .tg-title { font-weight: 700; font-size: .98rem; color: var(--pio-dark); white-space: nowrap; }
    .topbar-greeting .tg-wave { font-style: normal; }
    .topbar-date { display: flex; align-items: center; gap: .45rem; font-size: .82rem; color: #64748b; background: #f6f7f9; border: 1px solid #eef0f3; border-radius: 20px; padding: .4rem .85rem; white-space: nowrap; }
    .topbar-date i { color: var(--pio-red); }
    @media (max-width: 767px) { .topbar-greeting { display: none; } }
  </style>
  <script src="<?php echo base_url(); ?>dist/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["<?php echo base_url(); ?>dist/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/plugins.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/kaiadmin.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/fancy.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/jquery-ui.css">

</head>
<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="<?php echo base_url(); ?>/Dashboard" class="logo">
            <img
            src="<?php echo base_url(); ?>assets/logo.png"
            alt="navbar brand"
            class="navbar-brand"
            height="50"
            /><h1 style="color:#ffffff; margin-top:10px;">Pionir</h1>
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <?php $nav_current = strtolower($this->router->fetch_class()); ?>
          <ul class="nav nav-secondary" id="pioSidebarNav">

            <li class="nav-item<?php echo $nav_current == 'dashboard' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Dashboard">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item<?php echo $nav_current == 'note' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Note">
                <i class="fas fa-sticky-note"></i>
                <p>Catatan</p>
              </a>
            </li>

            <?php if($data['check_auth']['check_auth_nav'][0]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][1]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][2]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][3]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][4]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][5]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][6]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][7]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][8]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][9]->nav_bar == 'Y' ){ ?>
            <li class="nav-item<?php echo $nav_current == 'masterdata' ? ' active' : ''; ?>">
              <a data-bs-toggle="collapse" href="#master">
                <i class="fas fa-layer-group"></i>
                <p>Master Data</p>
                <span class="caret"></span>
              </a>
              <div class="collapse<?php echo $nav_current == 'masterdata' ? ' show' : ''; ?>" id="master">
                <ul class="nav nav-collapse">
                  <?php if($data['check_auth']['check_auth_nav'][0]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/brand">
                      <span class="sub-item">Brand</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][1]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/customer">
                      <span class="sub-item">Customer</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][2]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/ekspedisi">
                      <span class="sub-item">Expedisi</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][3]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/warehouse">
                      <span class="sub-item">Gudang</span>
                    </a>
                  </li>
                  <?php } ?>
                   <?php if($data['check_auth']['check_auth_nav'][4]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/category">
                      <span class="sub-item">Kategori</span>
                    </a>
                  </li>
                  <?php } ?>
                   <?php if($data['check_auth']['check_auth_nav'][5]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/product">
                      <span class="sub-item">Produk</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][6]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/payment">
                      <span class="sub-item">Pembayaran</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][7]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/salesman">
                      <span class="sub-item">Salesman</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][8]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/unit">
                      <span class="sub-item">Satuan</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][9]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Masterdata/supplier">
                      <span class="sub-item">Supplier</span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php } ?>

            <?php if($data['check_auth']['check_auth_nav'][14]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'search' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Search">
                <i class="fas fa-search"></i>
                <p>Cari Produk</p>
              </a>
            </li>
            <?php } ?>
            
            <?php if($data['check_auth']['check_auth_nav'][10]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][11]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][12]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][13]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][17]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'purchase' ? ' active' : ''; ?>">
              <a data-bs-toggle="collapse" href="#purchase">
                <i class="fas fa-shopping-cart"></i>
                <p>Pembelian</p>
                <span class="caret"></span>
              </a>
              <div class="collapse<?php echo $nav_current == 'purchase' ? ' show' : ''; ?>" id="purchase">
                <ul class="nav nav-collapse">
                  <?php if($data['check_auth']['check_auth_nav'][10]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase/submission">
                      <span class="sub-item">Pengajuan</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][11]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase/po">
                      <span class="sub-item">PO</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][12]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase/warehouseinput">
                      <span class="sub-item">Penginputan Gudang</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][13]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase">
                      <span class="sub-item">Pembelian</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php /* 
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase/purchaserevisi">
                      <span class="sub-item">Revisi Pembelian</span>
                    </a>
                  </li>
                  */ ?>
                  <?php if($data['check_auth']['check_auth_nav'][17]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Purchase/returpurchase">
                      <span class="sub-item">Retur Pembelian</span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php } ?>

            <?php if($data['check_auth']['check_auth_nav'][15]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][16]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][22]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][17]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'sales' ? ' active' : ''; ?>">
              <a data-bs-toggle="collapse" href="#sales">
                <i class="fas fa-shopping-cart"></i>
                <p>Penjualan</p>
                <span class="caret"></span>
              </a>
              <div class="collapse<?php echo $nav_current == 'sales' ? ' show' : ''; ?>" id="sales">
                <ul class="nav nav-collapse">
                  <?php if($data['check_auth']['check_auth_nav'][15]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Sales/salesorder">
                      <span class="sub-item">Sales Order</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][16]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Sales/salespage">
                      <span class="sub-item">Penjualan</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][15]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Sales/salesdropship">
                      <span class="sub-item">Penjualan Dropship</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][22]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Sales/revisisalespage">
                      <span class="sub-item">Revisi Penjualan</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][17]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Sales/retursales">
                      <span class="sub-item">Retur Penjualan</span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php } ?>

            <?php if($data['check_auth']['check_auth_nav'][19]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][20]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'payment' ? ' active' : ''; ?>">
              <a data-bs-toggle="collapse" href="#payment">
                <i class="fas fa-money-bill"></i>
                <p>Pelunasan</p>
                <span class="caret"></span>
              </a>
              <div class="collapse<?php echo $nav_current == 'payment' ? ' show' : ''; ?>" id="payment">
                <ul class="nav nav-collapse">
                  <?php if($data['check_auth']['check_auth_nav'][19]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Payment/debt">
                      <span class="sub-item">Pelunasan Hutang</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][20]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>Payment/receivable">
                      <span class="sub-item">Pelunasan Piutang</span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php } ?>

            <?php if($data['check_auth']['check_auth_nav'][24]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'opname' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Opname">
                <i class="fas fa-box"></i>
                <p>Stock Opname</p>
              </a>
            </li>
            <?php } ?>

             <?php if($data['check_auth']['check_auth_nav'][21]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'transferstock' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Transferstock">
                <i class="fas fa-exchange-alt"></i>
                <p>Transfer Stock</p>
              </a>
            </li>
            <?php } ?>

             <?php if($data['check_auth']['check_auth_nav'][25]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'report' ? ' active' : ''; ?>">
              <a href="<?php echo base_url(); ?>Report">
                <i class="fas fa-file-pdf"></i>
                <p>Laporan</p>
              </a>
            </li>
            <?php } ?>

            <?php if($data['check_auth']['check_auth_nav'][26]->nav_bar == 'Y' || $data['check_auth']['check_auth_nav'][27]->nav_bar == 'Y'){ ?>
            <li class="nav-item<?php echo $nav_current == 'user' ? ' active' : ''; ?>">
              <a data-bs-toggle="collapse" href="#user">
                <i class="fas fa-user"></i>
                <p>Admin</p>
                <span class="caret"></span>
              </a>
              <div class="collapse<?php echo $nav_current == 'user' ? ' show' : ''; ?>" id="user">
                <ul class="nav nav-collapse">
                  <?php if($data['check_auth']['check_auth_nav'][26]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>User/role">
                      <span class="sub-item">Grup Pengguna</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($data['check_auth']['check_auth_nav'][27]->nav_bar == 'Y'){ ?>
                  <li>
                    <a href="<?php echo base_url(); ?>User/account">
                      <span class="sub-item">Akun Pengguna</span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="sidebar-footer-brand">
        <div class="sfb-logo">
          <img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir Store">
          <div>
            <strong>PIONIR STORE</strong>
            <span>Sistem Manajemen Retail</span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
              src="<?php echo base_url(); ?>dist//img/kaiadmin/logo_light.svg"
              alt="navbar brand"
              class="navbar-brand"
              height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav
        class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
        >
        <div class="container-fluid">
          <div class="topbar-greeting">
            <div class="tg-title">Selamat Datang, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! <span class="tg-wave">&#128075;</span></div>
            <div class="topbar-date"><i class="fas fa-calendar-alt"></i> <?php echo date('l, d F Y'); ?></div>
          </div>
          <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

<li class="nav-item topbar-user dropdown hidden-caret">
  <a
  class="dropdown-toggle profile-pic"
  data-bs-toggle="dropdown"
  href="#"
  aria-expanded="false"
  >
  <div class="avatar-sm">
    <img
    src="<?php echo base_url(); ?>dist//img/profile.jpg"
    alt="..."
    class="avatar-img rounded-circle"
    />
  </div>
  <span class="profile-username">
    <span class="op-7">Hi,</span>
    <span class="fw-bold"><?php echo $_SESSION['user_name']; ?></span>
  </span>
</a>
<ul class="dropdown-menu dropdown-user animated fadeIn">
  <div class="dropdown-user-scroll scrollbar-outer">
    <li>
      <div class="user-box">
        <div class="avatar-lg">
          <img src="<?php echo base_url(); ?>dist//img/profile.jpg" alt="image profile" class="avatar-img rounded"/>
        </div>
        <div class="u-text">
          <h4><?php echo $_SESSION['user_name']; ?></h4>
          <a href="profile.html" class="btn btn-xs btn-secondary btn-sm"><?php echo $_SESSION['user_role']; ?></a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Account Setting</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo base_url(); ?>Auth/logout">Logout</a>
    </li>
  </div>
</ul>
</li>
</ul>
</div>
</nav>
<!-- End Navbar -->