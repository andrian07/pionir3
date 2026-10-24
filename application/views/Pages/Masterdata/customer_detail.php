<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Customer</title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/fonts.min.css" />

  <style>
    :root {
      --red:#d21f2c; --red-dk:#8a1017; --green:#22c55e; --blue:#3b82f6; --purple:#8b5cf6; --amber:#f59e0b;
      --dark:#1e2a3a; --slate:#64748b; --border:#e8edf5; --bg:#f5f6fa; --white:#fff;
      --card-sh:0 2px 16px rgba(30,42,58,.08);
    }
    * { box-sizing: border-box; }
    body{background:var(--bg);font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;margin:0;padding:1.6rem;color:var(--dark);font-size:15px;}
    .container-detail{max-width:1400px;margin:0 auto;}

    /* HERO */
    .cd-hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);border-radius:20px;padding:1.6rem 2.2rem;margin-bottom:1.6rem;}
    .cd-hero::before{content:'';position:absolute;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle,rgba(210,31,44,.1) 0%,transparent 70%);right:-50px;top:-110px;}
    .cd-breadcrumb{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:var(--slate);font-weight:600;margin-bottom:.9rem;position:relative;z-index:1;}
    .cd-breadcrumb a{color:var(--slate);text-decoration:none;}
    .cd-breadcrumb a:hover{color:var(--red);}
    .cd-breadcrumb .sep{color:#c7ccd6;}
    .cd-breadcrumb .current{color:var(--dark);}
    .cd-breadcrumb .back-btn{width:30px;height:30px;border-radius:9px;background:#fff;border:1px solid var(--border);display:inline-flex;align-items:center;justify-content:center;color:var(--dark);cursor:pointer;margin-right:.3rem;}
    .cd-breadcrumb .back-btn:hover{border-color:var(--red);color:var(--red);}
    .cd-top{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;position:relative;z-index:1;}
    .cd-title h2{font-size:1.9rem;font-weight:800;margin:0 0 .3rem;color:var(--dark);}
    .cd-title h2 span{color:var(--red);}
    .cd-title p{margin:0;color:var(--slate);font-size:.92rem;}
    .cd-actions{display:flex;align-items:center;gap:.6rem;}
    .cd-btn{height:44px;border-radius:10px;padding:0 1.1rem;font-weight:700;font-size:.88rem;display:inline-flex;align-items:center;gap:.5rem;border:1.5px solid var(--border);background:#fff;color:var(--dark);cursor:pointer;transition:border-color .2s,color .2s;text-decoration:none;}
    .cd-btn:hover{border-color:var(--red);color:var(--red);}
    .cd-btn-primary{background:linear-gradient(135deg,var(--red),var(--red-dk));border:none;color:#fff;box-shadow:0 4px 14px rgba(210,31,44,.3);}
    .cd-btn-primary:hover{opacity:.92;color:#fff;}
    .cd-logo{width:76px;height:76px;flex-shrink:0;}
    .cd-logo img{width:100%;height:100%;object-fit:contain;}

    /* LAYOUT */
    .cd-layout{display:flex;gap:1.6rem;align-items:flex-start;flex-wrap:wrap;}
    .cd-profile{flex:0 0 320px;width:320px;}
    .cd-info{flex:1 1 480px;min-width:0;}

    /* PROFILE CARD */
    .profile-card{position:relative;overflow:hidden;border-radius:20px;background:linear-gradient(160deg,#fdf1f2 0%,#fff 55%);box-shadow:var(--card-sh);padding:2rem 1.6rem 1.8rem;text-align:center;}
    .profile-card::after{content:'';position:absolute;left:-20%;bottom:-30%;width:140%;height:60%;background:radial-gradient(ellipse at center, rgba(210,31,44,.08) 0%, transparent 70%);pointer-events:none;}
    .profile-avatar{width:120px;height:120px;border-radius:50%;background:linear-gradient(160deg,rgba(210,31,44,.18),rgba(210,31,44,.08));display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;position:relative;z-index:1;}
    .profile-avatar i{font-size:3.2rem;color:var(--red);}
    .profile-name{font-size:1.4rem;font-weight:800;color:var(--dark);margin-bottom:.15rem;position:relative;z-index:1;}
    .profile-code{font-size:.85rem;color:var(--slate);margin-bottom:.8rem;position:relative;z-index:1;}
    .profile-mini{display:flex;gap:.7rem;margin:1rem 0;position:relative;z-index:1;}
    .mini-box{flex:1;background:#fff;border:1px solid var(--border);border-radius:14px;padding:.75rem .5rem;display:flex;flex-direction:column;align-items:center;gap:.2rem;}
    .mini-box i{font-size:1rem;color:var(--amber);}
    .mini-box .mv{font-size:1.05rem;font-weight:800;color:var(--dark);}
    .mini-box .ml{font-size:.72rem;color:var(--slate);}
    .profile-member{display:flex;align-items:center;gap:.7rem;background:#fff;border:1px solid var(--border);border-radius:14px;padding:.7rem .9rem;margin-top:.4rem;position:relative;z-index:1;text-align:left;}
    .profile-member .pm-icon{width:34px;height:34px;border-radius:9px;background:rgba(210,31,44,.1);color:var(--red);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.9rem;}
    .profile-member .pm-label{font-size:.72rem;color:var(--slate);}
    .profile-member .pm-value{font-size:.9rem;font-weight:700;color:var(--dark);}
    .profile-quote{margin-top:1.4rem;font-style:italic;font-weight:700;color:var(--dark);font-size:.95rem;line-height:1.4;position:relative;z-index:1;}
    .profile-quote .qbar{display:block;width:36px;height:3px;background:var(--red);border-radius:2px;margin:.5rem auto 0;}

    /* INFO CARDS */
    .info-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.2rem;}
    @media (max-width:760px){ .info-grid{grid-template-columns:1fr;} .cd-profile{width:100%;flex:1 1 100%;} }
    .info-card{background:#fff;border-radius:16px;box-shadow:var(--card-sh);padding:1.3rem 1.4rem;}
    .info-head{display:flex;align-items:center;gap:.7rem;margin-bottom:.9rem;padding-bottom:.8rem;border-bottom:1px solid var(--border);}
    .info-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
    .info-icon.red{background:rgba(210,31,44,.1);color:var(--red);}
    .info-icon.green{background:rgba(34,197,94,.1);color:var(--green);}
    .info-icon.blue{background:rgba(59,130,246,.1);color:var(--blue);}
    .info-icon.purple{background:rgba(139,92,246,.1);color:var(--purple);}
    .info-head h4{font-size:1rem;font-weight:800;color:var(--dark);margin:0;}
    .info-row{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.6rem 0;border-bottom:1px solid var(--border);font-size:.9rem;}
    .info-row:last-child{border-bottom:none;padding-bottom:0;}
    .info-row .ik{color:var(--slate);white-space:nowrap;}
    .info-row .iv{color:var(--dark);font-weight:700;text-align:right;}

    .status-pill{display:inline-flex;align-items:center;font-weight:700;font-size:.85rem;}
    .status-dot{width:7px;height:7px;border-radius:50%;display:inline-block;margin-right:.4rem;}
    .status-active{color:var(--green);} .status-active .status-dot{background:var(--green);}
    .status-inactive{color:var(--red);} .status-inactive .status-dot{background:var(--red);}

    .rate-pill{display:inline-block;padding:.22rem .7rem;border-radius:20px;font-size:.78rem;font-weight:700;}
    .rate-normal{background:rgba(59,130,246,.1);color:#3b82f6;}
    .rate-toko{background:rgba(245,158,11,.1);color:#b7791f;}
    .rate-sales{background:rgba(14,165,233,.1);color:#0ea5e9;}
    .rate-khusus{background:rgba(34,197,94,.1);color:var(--green);}

    .exp-badge{display:inline-block;background:#eef1f6;color:var(--dark);border-radius:20px;padding:.2rem .65rem;font-size:.76rem;font-weight:600;margin:0 .25rem .25rem 0;}

    @media print {
      body{background:#fff;padding:0;}
      .cd-actions{display:none;}
      .cd-hero,.profile-card,.info-card{box-shadow:none;}
    }
  </style>
</head>
<body>

  <div class="container-detail">
    <?php foreach ($get_customer_by_id as $row): ?>

    <!-- HERO -->
    <div class="cd-hero">
      <div class="cd-breadcrumb">
        <span class="back-btn" onclick="cdGoBack()"><i class="fas fa-arrow-left"></i></span>
        <a href="<?php echo base_url(); ?>Masterdata" target="_top">Master Data</a>
        <span class="sep">&rsaquo;</span>
        <a href="<?php echo base_url(); ?>Masterdata/customer" target="_top">Customer</a>
        <span class="sep">&rsaquo;</span>
        <span class="current">Detail</span>
      </div>
      <div class="cd-top">
        <div class="cd-title">
          <h2>Detail <span>Customer</span></h2>
          <p>Informasi lengkap data pelanggan</p>
        </div>
        <div class="cd-actions">
          <button type="button" class="cd-btn" onclick="cdGoBack()"><i class="fas fa-arrow-left"></i> Kembali</button>
          <button type="button" class="cd-btn" onclick="cdEdit(<?php echo (int) $row->customer_id; ?>)"><i class="fas fa-pen"></i> Edit Data</button>
          <button type="button" class="cd-btn cd-btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
          <div class="cd-logo"><img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir"></div>
        </div>
      </div>
    </div>

    <?php
      $rate_class = 'rate-normal';
      if ($row->customer_rate == 'Toko') { $rate_class = 'rate-toko'; }
      else if ($row->customer_rate == 'Sales') { $rate_class = 'rate-sales'; }
      else if ($row->customer_rate == 'Khusus') { $rate_class = 'rate-khusus'; }

      $dob_text = '-';
      if (!empty($row->customer_dob) && $row->customer_dob != '0000-00-00') {
        $dob_text = date('d M Y', strtotime($row->customer_dob));
      }
      $member_since = '-';
      if (!empty($row->created_at)) {
        $member_since = date('d M Y', strtotime($row->created_at));
      }
    ?>

    <!-- LAYOUT -->
    <div class="cd-layout">

      <!-- PROFILE -->
      <div class="cd-profile">
        <div class="profile-card">
          <div class="profile-avatar"><i class="fas fa-user"></i></div>
          <div class="profile-name"><?php echo htmlspecialchars($row->customer_name); ?></div>
          <div class="profile-code"><?php echo htmlspecialchars($row->customer_code); ?></div>
          <?php if ($row->is_active == 'Y'): ?>
            <span class="status-pill status-active"><span class="status-dot"></span> Aktif</span>
          <?php else: ?>
            <span class="status-pill status-inactive"><span class="status-dot"></span> Tidak Aktif</span>
          <?php endif; ?>

          <div class="profile-mini">
            <div class="mini-box">
              <i class="fas fa-star"></i>
              <div class="mv"><?php echo (int) $row->customer_poin; ?></div>
              <div class="ml">Poin</div>
            </div>
            <div class="mini-box">
              <i class="fas fa-crown"></i>
              <div class="mv" style="font-size:.95rem;"><?php echo htmlspecialchars($row->customer_rate); ?></div>
              <div class="ml">Rate Customer</div>
            </div>
          </div>

          <div class="profile-member">
            <div class="pm-icon"><i class="fas fa-calendar-alt"></i></div>
            <div>
              <div class="pm-label">Member Sejak</div>
              <div class="pm-value"><?php echo $member_since; ?></div>
            </div>
          </div>

          <div class="profile-quote">
            &ldquo;Pelanggan adalah bagian dari perjalanan kami&rdquo;
            <span class="qbar"></span>
          </div>
        </div>
      </div>

      <!-- INFO GRID -->
      <div class="cd-info">
        <div class="info-grid">

          <div class="info-card">
            <div class="info-head">
              <div class="info-icon red"><i class="fas fa-user"></i></div>
              <h4>Informasi Identitas</h4>
            </div>
            <div class="info-row"><span class="ik">Kode Customer</span><span class="iv"><?php echo htmlspecialchars($row->customer_code); ?></span></div>
            <div class="info-row"><span class="ik">Nama Customer</span><span class="iv"><?php echo htmlspecialchars($row->customer_name); ?></span></div>
            <div class="info-row"><span class="ik">Tanggal Lahir</span><span class="iv"><?php echo $dob_text; ?></span></div>
            <div class="info-row"><span class="ik">Jenis Kelamin</span><span class="iv"><?php echo $row->customer_gender == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></span></div>
            <div class="info-row"><span class="ik">Rate Customer</span><span class="iv"><span class="rate-pill <?php echo $rate_class; ?>"><?php echo htmlspecialchars($row->customer_rate); ?></span></span></div>
          </div>

          <div class="info-card">
            <div class="info-head">
              <div class="info-icon green"><i class="fas fa-map-marker-alt"></i></div>
              <h4>Informasi Alamat</h4>
            </div>
            <div class="info-row"><span class="ik">Alamat</span><span class="iv"><?php echo htmlspecialchars($row->customer_address) ?: '-'; ?></span></div>
            <div class="info-row"><span class="ik">Blok</span><span class="iv"><?php echo htmlspecialchars($row->customer_address_blok) ?: '-'; ?></span></div>
            <div class="info-row"><span class="ik">No Rumah</span><span class="iv"><?php echo htmlspecialchars($row->customer_address_no) ?: '-'; ?></span></div>
            <div class="info-row"><span class="ik">RT / RW</span><span class="iv"><?php echo htmlspecialchars($row->customer_rt) . ' / ' . htmlspecialchars($row->customer_rw); ?></span></div>
          </div>

          <div class="info-card">
            <div class="info-head">
              <div class="info-icon blue"><i class="fas fa-address-book"></i></div>
              <h4>Informasi Kontak</h4>
            </div>
            <div class="info-row"><span class="ik">No Telp</span><span class="iv"><?php echo htmlspecialchars($row->customer_phone) ?: '-'; ?></span></div>
            <div class="info-row"><span class="ik">Email</span><span class="iv"><?php echo htmlspecialchars($row->customer_email) ?: '-'; ?></span></div>
          </div>

          <div class="info-card">
            <div class="info-head">
              <div class="info-icon purple"><i class="fas fa-shipping-fast"></i></div>
              <h4>Informasi Lainnya</h4>
            </div>
            <div class="info-row">
              <span class="ik">Status</span>
              <span class="iv">
                <?php if ($row->is_active == 'Y'): ?>
                  <span class="status-pill status-active"><span class="status-dot"></span> Aktif</span>
                <?php else: ?>
                  <span class="status-pill status-inactive"><span class="status-dot"></span> Tidak Aktif</span>
                <?php endif; ?>
              </span>
            </div>
            <div class="info-row"><span class="ik">Poin</span><span class="iv"><?php echo (int) $row->customer_poin; ?></span></div>
            <div class="info-row">
              <span class="ik">Ekspedisi</span>
              <span class="iv">
                <?php foreach (explode(',', $row->customer_expedisi_tag) as $tag): ?>
                  <?php if (trim($tag) !== ''): ?><span class="exp-badge"><?php echo htmlspecialchars(trim($tag)); ?></span><?php endif; ?>
                <?php endforeach; ?>
              </span>
            </div>
          </div>

        </div>
      </div>

    </div>
    <?php endforeach; ?>
  </div>

  <script>
    function cdGoBack() {
      try {
        if (window.parent && window.parent.Fancybox) {
          window.parent.Fancybox.close();
          return;
        }
      } catch (e) {}
      window.history.back();
    }
    function cdEdit(id) {
      try {
        if (window.parent && window.parent.jQuery) {
          window.parent.jQuery('.act-edit[data-id="' + id + '"]').trigger('click');
        }
      } catch (e) {}
      cdGoBack();
    }
  </script>
</body>
</html>
