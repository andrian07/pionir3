<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
:root {
  --red:#d21f2c; --red-dk:#8a1017; --green:#22c55e; --blue:#3b82f6; --purple:#8b5cf6; --amber:#f59e0b;
  --dark:#1e2a3a; --slate:#64748b; --border:#e8edf5; --bg:#f5f6fa; --white:#fff;
  --card-sh:0 2px 16px rgba(30,42,58,.08);
}
body{background:var(--bg)!important; font-size: 15.5px !important;}
.page-inner{padding-top:0!important;}
.container{max-width:1400px;}

.rp-breadcrumb{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:var(--slate);font-weight:600;margin-bottom:.9rem;}
.rp-breadcrumb a{color:var(--slate);text-decoration:none;}
.rp-breadcrumb a:hover{color:var(--red);}
.rp-breadcrumb .sep{color:#c7ccd6;}
.rp-breadcrumb .current{color:var(--dark);}

.rp-hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);border-radius:20px;padding:1.8rem 2.2rem;margin-bottom:1.6rem;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;}
.rp-hero::before{content:'';position:absolute;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(210,31,44,.1) 0%,transparent 70%);right:-60px;top:-120px;}
.rp-hero h2{font-size:2rem;font-weight:800;margin:0 0 .3rem;color:var(--dark);position:relative;z-index:1;}
.rp-hero h2 span{color:var(--red);}
.rp-hero p{font-size:.92rem;color:var(--slate);margin:0;max-width:480px;position:relative;z-index:1;}
.rp-hero-quote{text-align:right;font-size:1.05rem;font-weight:700;color:var(--dark);font-style:italic;line-height:1.35;position:relative;z-index:1;}
.rp-hero-quote .qbar{display:block;width:40px;height:3px;background:var(--red);border-radius:2px;margin:.5rem 0 0 auto;}
.rp-hero-logo{width:70px;height:70px;flex-shrink:0;position:relative;z-index:1;}
.rp-hero-logo img{width:100%;height:100%;object-fit:contain;}
.rp-hero-right{display:flex;align-items:center;gap:1.4rem;}

.rp-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.3rem;}
.rp-card{position:relative;overflow:hidden;border-radius:18px;padding:1.4rem 1.4rem 1.2rem;display:flex;flex-direction:column;min-height:340px;}
.rp-card::after{content:'';position:absolute;right:-20px;bottom:-20px;font-size:6rem;opacity:.12;}
.rp-card-head{display:flex;align-items:center;gap:.8rem;margin-bottom:1rem;position:relative;z-index:1;}
.rp-card-icon{width:48px;height:48px;border-radius:13px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0;color:#fff;}
.rp-card-head h4{font-size:1.05rem;font-weight:800;color:var(--dark);margin:0;}
.rp-card-head p{font-size:.78rem;color:var(--slate);margin:0;}
.rp-list{list-style:none;margin:0;padding:0;flex:1;position:relative;z-index:1;}
.rp-list li{border-bottom:1px solid rgba(30,42,58,.08);}
.rp-list li:last-child{border-bottom:none;}
.rp-list a{display:flex;align-items:center;gap:.55rem;padding:.55rem 0;font-size:.86rem;font-weight:600;color:var(--dark);text-decoration:none;transition:color .15s,transform .15s;}
.rp-list a:hover{color:var(--red);transform:translateX(3px);}
.rp-list a i.rp-doc{font-size:.78rem;color:var(--slate);flex-shrink:0;}
.rp-list a i.rp-chev{margin-left:auto;font-size:.72rem;color:#c7ccd6;flex-shrink:0;}
.rp-more{display:inline-flex;align-items:center;gap:.4rem;font-weight:700;font-size:.86rem;margin-top:1rem;position:relative;z-index:1;}
.rp-deco{position:absolute;right:-14px;bottom:-10px;font-size:5.5rem;opacity:.14;z-index:0;pointer-events:none;}

.rp-amber{background:linear-gradient(160deg,#fef3e2 0%,#fde9c9 100%);}
.rp-amber .rp-card-icon{background:linear-gradient(135deg,#f59e0b,#c2760a);}
.rp-amber .rp-more{color:#b7791f;}
.rp-amber .rp-deco{color:#f59e0b;}

.rp-blue{background:linear-gradient(160deg,#eaf1ff 0%,#d6e6ff 100%);}
.rp-blue .rp-card-icon{background:linear-gradient(135deg,#3b82f6,#1d4ed8);}
.rp-blue .rp-more{color:#1d4ed8;}
.rp-blue .rp-deco{color:#3b82f6;}

.rp-red{background:linear-gradient(160deg,#fdeef0 0%,#fbd9de 100%);}
.rp-red .rp-card-icon{background:linear-gradient(135deg,var(--red),var(--red-dk));}
.rp-red .rp-more{color:var(--red);}
.rp-red .rp-deco{color:var(--red);}

.rp-green{background:linear-gradient(160deg,#e9fbf1 0%,#d3f5e2 100%);}
.rp-green .rp-card-icon{background:linear-gradient(135deg,#22c55e,#15803d);}
.rp-green .rp-more{color:#15803d;}
.rp-green .rp-deco{color:#22c55e;}

.rp-purple{background:linear-gradient(160deg,#f2eefe 0%,#e5dbfc 100%);}
.rp-purple .rp-card-icon{background:linear-gradient(135deg,#8b5cf6,#6d28d9);}
.rp-purple .rp-more{color:#6d28d9;}
.rp-purple .rp-deco{color:#8b5cf6;}
</style>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <div class="rp-breadcrumb">
      <a href="<?php echo base_url(); ?>Dashboard"><i class="fas fa-home"></i></a>
      <span class="sep">&rsaquo;</span>
      <span class="current">Laporan</span>
    </div>

    <!-- HERO -->
    <div class="rp-hero">
      <div>
        <h2>Lap<span>oran</span></h2>
        <p>Pantau dan analisa seluruh aktivitas bisnis Anda dengan laporan yang lengkap dan akurat.</p>
      </div>
      <div class="rp-hero-right">
        <div class="rp-hero-quote">&ldquo;Data hari ini,<br>keputusan lebih baik untuk esok hari&rdquo;<span class="qbar"></span></div>
        <div class="rp-hero-logo"><img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir"></div>
      </div>
    </div>

    <!-- REPORT CATEGORY CARDS -->
    <div class="rp-grid">

      <!-- MASTER DATA -->
      <div class="rp-card rp-amber" id="master-data">
        <i class="fas fa-database rp-deco"></i>
        <div class="rp-card-head">
          <div class="rp-card-icon"><i class="fas fa-database"></i></div>
          <div>
            <h4>Laporan Master Data</h4>
            <p>Data utama dalam sistem</p>
          </div>
        </div>
        <ul class="rp-list">
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportbrand"><i class="fas fa-file-alt rp-doc"></i> Laporan Brand <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportcustomer"><i class="fas fa-file-alt rp-doc"></i> Laporan Customer <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportekspedisi"><i class="fas fa-file-alt rp-doc"></i> Laporan Ekspedisi <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportwarehouse"><i class="fas fa-file-alt rp-doc"></i> Laporan Gudang <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportcategory"><i class="fas fa-file-alt rp-doc"></i> Laporan Kategori <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportproduct"><i class="fas fa-file-alt rp-doc"></i> Laporan Produk <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportsalesman"><i class="fas fa-file-alt rp-doc"></i> Laporan Salesman <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportmaster/reportsupplier"><i class="fas fa-file-alt rp-doc"></i> Laporan Supplier <i class="fas fa-chevron-right rp-chev"></i></a></li>
        </ul>
        <span class="rp-more">Lihat Laporan <i class="fas fa-arrow-right"></i></span>
      </div>

      <!-- PEMBELIAN -->
      <div class="rp-card rp-blue" id="pembelian">
        <i class="fas fa-shopping-cart rp-deco"></i>
        <div class="rp-card-head">
          <div class="rp-card-icon"><i class="fas fa-shopping-cart"></i></div>
          <div>
            <h4>Laporan Pembelian</h4>
            <p>Rekap semua aktivitas pembelian</p>
          </div>
        </div>
        <ul class="rp-list">
          <li><a href="<?php echo base_url(); ?>Reportpurchase/reportsubmission"><i class="fas fa-file-alt rp-doc"></i> Laporan Pengajuan <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpurchase/reportpo"><i class="fas fa-file-alt rp-doc"></i> Laporan PO <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpurchase/reportinputwarehouse"><i class="fas fa-file-alt rp-doc"></i> Laporan Penginputan Gudang <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpurchase/reportpurchases"><i class="fas fa-file-alt rp-doc"></i> Laporan Pembelian <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpurchase/reportreturpurchase"><i class="fas fa-file-alt rp-doc"></i> Laporan Retur Pembelian <i class="fas fa-chevron-right rp-chev"></i></a></li>
        </ul>
        <span class="rp-more">Lihat Laporan <i class="fas fa-arrow-right"></i></span>
      </div>

      <!-- PENJUALAN -->
      <div class="rp-card rp-red" id="penjualan">
        <i class="fas fa-shopping-bag rp-deco"></i>
        <div class="rp-card-head">
          <div class="rp-card-icon"><i class="fas fa-shopping-bag"></i></div>
          <div>
            <h4>Laporan Penjualan</h4>
            <p>Rekap semua aktivitas penjualan</p>
          </div>
        </div>
        <ul class="rp-list">
          <li><a href="<?php echo base_url(); ?>Reportsales/reportsalesorder"><i class="fas fa-file-alt rp-doc"></i> Laporan Sales Order <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportsales/reportsaless"><i class="fas fa-file-alt rp-doc"></i> Laporan Penjualan <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportsales/reportsalessdropship"><i class="fas fa-file-alt rp-doc"></i> Laporan Penjualan Dropship <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportsales/reportrevisisales"><i class="fas fa-file-alt rp-doc"></i> Laporan Revisi Penjualan <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportsales/reportretursales"><i class="fas fa-file-alt rp-doc"></i> Laporan Retur Penjualan <i class="fas fa-chevron-right rp-chev"></i></a></li>
        </ul>
        <span class="rp-more">Lihat Laporan <i class="fas fa-arrow-right"></i></span>
      </div>

      <!-- HUTANG / PIUTANG -->
      <div class="rp-card rp-green" id="hutang-piutang">
        <i class="fas fa-wallet rp-deco"></i>
        <div class="rp-card-head">
          <div class="rp-card-icon"><i class="fas fa-wallet"></i></div>
          <div>
            <h4>Laporan Hutang / Piutang</h4>
            <p>Monitoring piutang dan hutang</p>
          </div>
        </div>
        <ul class="rp-list">
          <li><a href="<?php echo base_url(); ?>Reportpayment/reportdebtduedate"><i class="fas fa-file-alt rp-doc"></i> Laporan Hutang Jatuh Tempo <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpayment/reportrepaymentduedate"><i class="fas fa-file-alt rp-doc"></i> Laporan Piutang Jatuh Tempo <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpayment/reportrepayments"><i class="fas fa-file-alt rp-doc"></i> Laporan Pelunasan Hutang <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportpayment/reportpiutang"><i class="fas fa-file-alt rp-doc"></i> Laporan Pelunasan Piutang <i class="fas fa-chevron-right rp-chev"></i></a></li>
        </ul>
        <span class="rp-more">Lihat Laporan <i class="fas fa-arrow-right"></i></span>
      </div>

      <!-- PERSEDIAAN -->
      <div class="rp-card rp-purple">
        <i class="fas fa-boxes rp-deco"></i>
        <div class="rp-card-head">
          <div class="rp-card-icon"><i class="fas fa-boxes"></i></div>
          <div>
            <h4>Laporan Persediaan</h4>
            <p>Stok dan pergerakan barang</p>
          </div>
        </div>
        <ul class="rp-list">
          <li><a href="<?php echo base_url(); ?>Reportstock/stockist"><i class="fas fa-file-alt rp-doc"></i> Laporan Stok <i class="fas fa-chevron-right rp-chev"></i></a></li>
          <li><a href="<?php echo base_url(); ?>Reportstock/stockcard"><i class="fas fa-file-alt rp-doc"></i> Laporan Kartu Stok <i class="fas fa-chevron-right rp-chev"></i></a></li>
        </ul>
        <span class="rp-more">Lihat Laporan <i class="fas fa-arrow-right"></i></span>
      </div>

    </div>
  </div>
</div>

<?php
require DOC_ROOT_PATH . $this->config->item('footer');
?>
