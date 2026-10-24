<?php
if (!function_exists('pio_page_title')) {
  function pio_page_title($class, $method) {
    $class = strtolower($class);
    $method = strtolower($method);

    $titles = array(
      'dashboard'      => 'Dashboard',
      'search'         => 'Cari Produk',
      'opname'         => 'Stock Opname',
      'transferstock'  => 'Transfer Stock',
      'auth'           => 'Login',
      'report'         => 'Laporan',
      'reportmaster'   => 'Laporan Master Data',
      'reportstock'    => 'Laporan Stock',
      'reportpurchase' => 'Laporan Pembelian',
      'reportpayment'  => 'Laporan Pelunasan',
      'reportsales'    => 'Laporan Penjualan',
      'masterdata'     => array(
        '_default'  => 'Master Data',
        'brand'     => 'Brand',
        'customer'  => 'Customer',
        'ekspedisi' => 'Expedisi',
        'warehouse' => 'Gudang',
        'category'  => 'Kategori',
        'product'   => 'Produk',
        'payment'   => 'Pembayaran',
        'salesman'  => 'Salesman',
        'unit'      => 'Satuan',
        'supplier'  => 'Supplier',
      ),
      'purchase' => array(
        '_default'       => 'Pembelian',
        'submission'     => 'Pengajuan Pembelian',
        'po'             => 'PO Pembelian',
        'warehouseinput' => 'Penginputan Gudang',
        'returpurchase'  => 'Retur Pembelian',
        'detailpurchase' => 'Detail Pembelian',
      ),
      'sales' => array(
        '_default'         => 'Penjualan',
        'salesorder'       => 'Sales Order',
        'salespage'        => 'Penjualan',
        'salesdropship'    => 'Penjualan Dropship',
        'revisisalespage'  => 'Revisi Penjualan',
        'retursales'       => 'Retur Penjualan',
      ),
      'payment' => array(
        '_default'    => 'Pelunasan',
        'debt'        => 'Pelunasan Hutang',
        'receivable'  => 'Pelunasan Piutang',
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

    .sidebar_minimize .main-header, .sidebar_minimize .main-panel {
      width: 100% !important;
      transition: all .3s;
    }
    
    @media screen and (min-width: 992px) {
      .sidebar_minimize .main-header, .sidebar_minimize .main-panel {
        width: 100% !important;
        transition: all .3s;
      }
    }

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
  <div class="wrapper sidebar_minimize">

    <div class="main-panel">
      <div class="main-header">
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            Detail PO
          </div>
        </nav>
<!-- End Navbar -->