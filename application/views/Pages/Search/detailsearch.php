<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Produk</title>

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
    .pd-hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);border-radius:20px;padding:1.4rem 1.8rem;margin-bottom:1.4rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;}
    .pd-hero::before{content:'';position:absolute;width:260px;height:260px;border-radius:50%;background:radial-gradient(circle,rgba(210,31,44,.1) 0%,transparent 70%);right:-40px;top:-100px;}
    .pd-title{display:flex;align-items:center;gap:.9rem;position:relative;z-index:1;}
    .pd-title .bm-icon{width:46px;height:46px;border-radius:13px;background:rgba(210,31,44,.12);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:1.15rem;flex-shrink:0;}
    .pd-title h2{font-size:1.5rem;font-weight:800;margin:0;color:var(--dark);}
    .pd-title h2 span{color:var(--red);}
    .pd-title p{font-size:.85rem;color:var(--slate);margin:.1rem 0 0;}
    .pd-actions{display:flex;align-items:center;gap:.6rem;position:relative;z-index:1;}
    .pd-btn{height:42px;border-radius:10px;padding:0 1.1rem;font-weight:700;font-size:.86rem;display:inline-flex;align-items:center;gap:.5rem;border:1.5px solid var(--border);background:#fff;color:var(--dark);cursor:pointer;text-decoration:none;transition:all .2s;}
    .pd-btn:hover{border-color:var(--red);color:var(--red);}
    .pd-btn-blue{background:var(--blue);border:none;color:#fff;}
    .pd-btn-blue:hover{opacity:.9;color:#fff;}
    .pd-btn-dark{background:var(--dark);border:none;color:#fff;}
    .pd-btn-dark:hover{opacity:.9;color:#fff;}
    .pd-close{width:42px;height:42px;border-radius:10px;border:1.5px solid var(--border);background:#fff;color:var(--dark);display:inline-flex;align-items:center;justify-content:center;cursor:pointer;}
    .pd-close:hover{border-color:var(--red);color:var(--red);}

    /* LAYOUT */
    .pd-layout{display:flex;gap:1.4rem;align-items:flex-start;flex-wrap:wrap;}
    .pd-side{flex:0 0 320px;width:320px;}
    .pd-main{flex:1 1 480px;min-width:0;}

    /* LEFT SIDE CARD */
    .pd-photo-card{background:#fff;border-radius:16px;box-shadow:var(--card-sh);padding:1.2rem;margin-bottom:1rem;}
    .pd-photo-wrap{position:relative;border-radius:12px;overflow:hidden;background:#f3f4f6;height:230px;display:flex;align-items:center;justify-content:center;}
    .pd-photo-wrap img{width:100%;height:100%;object-fit:contain;}
    .pd-status-badge{position:absolute;top:10px;left:10px;z-index:2;}
    .pd-name{font-size:1.15rem;font-weight:800;color:var(--dark);margin:1rem 0 .5rem;}
    .pd-code-row{display:flex;align-items:center;justify-content:space-between;gap:.6rem;margin-bottom:.9rem;}
    .pd-code{display:flex;align-items:center;gap:.5rem;font-weight:700;color:var(--dark);font-size:.92rem;}
    .pd-code .copy-btn{width:26px;height:26px;border-radius:7px;border:1px solid var(--border);background:#fafbfd;color:var(--slate);display:inline-flex;align-items:center;justify-content:center;cursor:pointer;font-size:.72rem;}
    .pd-code .copy-btn:hover{border-color:var(--red);color:var(--red);}
    .pd-barcode{display:flex;align-items:center;gap:.5rem;color:var(--slate);font-size:.8rem;}
    .pd-chips{display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:1rem;}
    .pd-chip{flex:1;min-width:90px;display:flex;align-items:center;gap:.5rem;background:#fafbfd;border:1px solid var(--border);border-radius:10px;padding:.5rem .6rem;}
    .pd-chip .ci{width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.75rem;flex-shrink:0;}
    .pd-chip .cv{font-size:.8rem;font-weight:700;color:var(--dark);line-height:1.2;}
    .pd-chip .cl{font-size:.68rem;color:var(--slate);}
    .pd-stock-card{display:flex;align-items:center;justify-content:space-between;gap:.6rem;background:rgba(210,31,44,.06);border:1px solid rgba(210,31,44,.15);border-radius:12px;padding:.8rem .9rem;}
    .pd-stock-card .si{width:38px;height:38px;border-radius:10px;background:rgba(210,31,44,.12);color:var(--red);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
    .pd-stock-card .sv{font-size:1.05rem;font-weight:800;color:var(--dark);line-height:1.15;}
    .pd-stock-card .sl{font-size:.72rem;color:var(--slate);}
    .pd-stock-card a{font-size:.78rem;font-weight:700;color:var(--red);text-decoration:none;white-space:nowrap;}
    .pd-stock-card a:hover{text-decoration:underline;}

    /* RIGHT SIDE CARDS */
    .pd-card{background:#fff;border-radius:16px;box-shadow:var(--card-sh);padding:1.2rem 1.4rem;margin-bottom:1.2rem;}
    .pd-card-head{display:flex;align-items:center;gap:.7rem;margin-bottom:.9rem;padding-bottom:.8rem;border-bottom:1px solid var(--border);}
    .pd-card-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
    .pd-card-head h4{font-size:1rem;font-weight:800;color:var(--dark);margin:0;}

    .pd-info-grid{display:grid;grid-template-columns:1fr 1fr;gap:0 1.6rem;}
    @media (max-width:760px){ .pd-info-grid{grid-template-columns:1fr;} .pd-side{width:100%;flex:1 1 100%;} }
    .pd-info-row{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:.6rem 0;border-bottom:1px solid var(--border);font-size:.88rem;}
    .pd-info-row:last-child{border-bottom:none;}
    .pd-info-row .ik{color:var(--slate);white-space:nowrap;flex-shrink:0;}
    .pd-info-row .iv{color:var(--dark);font-weight:700;text-align:right;}

    .exp-badge{display:inline-block;background:var(--blue);color:#fff;border-radius:20px;padding:.18rem .6rem;font-size:.74rem;font-weight:700;margin:0 0 .25rem .25rem;}
    .status-pill{display:inline-flex;align-items:center;font-weight:700;font-size:.85rem;}
    .status-dot{width:7px;height:7px;border-radius:50%;display:inline-block;margin-right:.4rem;}
    .status-active{color:var(--green);} .status-active .status-dot{background:var(--green);}
    .status-inactive{color:var(--red);} .status-inactive .status-dot{background:var(--red);}
    .status-discontinue{color:var(--amber);} .status-discontinue .status-dot{background:var(--amber);}
    .yn-pill{display:inline-flex;align-items:center;gap:.3rem;font-weight:700;font-size:.8rem;border-radius:20px;padding:.15rem .6rem;}
    .yn-yes{background:rgba(34,197,94,.1);color:var(--green);}
    .yn-no{background:rgba(210,31,44,.08);color:var(--red);}

    .pd-note-box{background:#fdf1f2;border:1.5px solid rgba(210,31,44,.2);border-radius:10px;padding:.8rem .9rem;font-size:.85rem;color:var(--dark);white-space:pre-line;max-height:200px;overflow-y:auto;}

    .pd-table{width:100%;border-collapse:collapse;font-size:.86rem;}
    .pd-table th{background:#fafbfd;color:var(--slate);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;padding:.6rem .7rem;border-bottom:1px solid var(--border);text-align:left;}
    .pd-table td{padding:.6rem .7rem;border-bottom:1px solid var(--border);color:var(--dark);}
    .pd-table tr:last-child td{border-bottom:none;}
    .pd-badge-blue{background:var(--blue);color:#fff;border-radius:8px;padding:.2rem .55rem;font-size:.8rem;font-weight:700;}
    .pd-badge-amber{background:var(--amber);color:#fff;border-radius:8px;padding:.2rem .55rem;font-size:.8rem;font-weight:700;}
    .pd-disc-period{font-size:.8rem;color:var(--slate);margin-bottom:.8rem;}

    @media print {
      body{background:#fff;padding:0;}
      .pd-actions,.pd-close{display:none;}
      .pd-hero,.pd-photo-card,.pd-card{box-shadow:none;}
    }
  </style>
</head>
<body>

  <div class="container-detail">
    <?php foreach ($data['get_product_by_id'] as $row): ?>

    <?php
      $access = $data['check_role_product'][0] ?? [];

      $status_class = 'status-active';
      if ($row->product_status == 'Tidak Aktif') { $status_class = 'status-inactive'; }
      else if ($row->product_status == 'Discontinue') { $status_class = 'status-discontinue'; }

      $total_stock = 0;
      foreach ($data['product_stock'] as $s) { $total_stock += (float) $s->stock; }
      $stock_unit = !empty($data['product_stock']) ? $data['product_stock'][0]->unit_name : $row->unit_name;

      $note = $row->product_note;
      if ($note == null || $note == '') { $note = 'Tidak ada catatan penting'; }
      $note = str_replace(['<br />', '<br>', '<br/>'], "\n", $note);
    ?>

    <!-- HERO -->
    <div class="pd-hero">
      <div class="pd-title">
        <div class="bm-icon"><i class="fas fa-box"></i></div>
        <div>
          <h2>Detail <span>Produk</span></h2>
          <p>Informasi lengkap produk dalam sistem</p>
        </div>
      </div>
      <div class="pd-actions">
        <a href="<?php echo base_url(); ?>Masterdata/product" target="_top" class="pd-btn pd-btn-blue"><i class="fas fa-pen"></i> Edit Produk</a>
        <button type="button" class="pd-btn pd-btn-dark" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
        <button type="button" class="pd-close" onclick="pdClose()"><i class="fas fa-times"></i></button>
      </div>
    </div>

    <!-- LAYOUT -->
    <div class="pd-layout">

      <!-- LEFT -->
      <div class="pd-side">
        <div class="pd-photo-card">
          <div class="pd-photo-wrap">
            <?php if(($access['access_status'] ?? 'N') == 'Y'){ ?>
            <span class="pd-status-badge status-pill <?php echo $status_class; ?>" style="background:#fff;border-radius:20px;padding:.25rem .7rem;box-shadow:var(--card-sh);"><span class="status-dot"></span> <?php echo htmlspecialchars($row->product_status); ?></span>
            <?php } ?>
            <img src="<?php echo base_url(); ?>assets/products/<?php echo htmlspecialchars($row->product_image); ?>" alt="<?php echo htmlspecialchars($row->product_name); ?>" onerror="this.onerror=null;this.src='<?php echo base_url(); ?>assets/products/default.png';">
          </div>

          <div class="pd-name"><?php echo htmlspecialchars($row->product_name); ?></div>

          <div class="pd-code-row">
            <div class="pd-code"><?php echo htmlspecialchars($row->product_code); ?> <span class="copy-btn" onclick="pdCopy('<?php echo htmlspecialchars($row->product_code); ?>', this)"><i class="fas fa-copy"></i></span></div>
            <div class="pd-barcode"><i class="fas fa-barcode"></i> -</div>
          </div>

          <div class="pd-chips">
            <div class="pd-chip">
              <div class="ci" style="background:rgba(245,158,11,.1);color:#b7791f;"><i class="fas fa-list"></i></div>
              <div><div class="cv"><?php echo htmlspecialchars($row->category_name); ?></div><div class="cl">Kategori</div></div>
            </div>
            <div class="pd-chip">
              <div class="ci" style="background:rgba(34,197,94,.1);color:var(--green);"><i class="fas fa-cube"></i></div>
              <div><div class="cv"><?php echo htmlspecialchars($row->brand_name); ?></div><div class="cl">Brand</div></div>
            </div>
            <div class="pd-chip">
              <div class="ci" style="background:rgba(59,130,246,.1);color:var(--blue);"><i class="fas fa-box"></i></div>
              <div><div class="cv"><?php echo htmlspecialchars($row->unit_name); ?></div><div class="cl">Satuan</div></div>
            </div>
          </div>

          <div class="pd-stock-card">
            <div class="si"><i class="fas fa-warehouse"></i></div>
            <div style="flex:1;">
              <?php if(($access['access_stock'] ?? 'N') == 'Y'){ ?>
              <div class="sv"><?php echo number_format($total_stock); ?> <?php echo htmlspecialchars($stock_unit); ?></div>
              <?php }else{ ?>
              <div class="sv">-</div>
              <?php } ?>
              <div class="sl">Stok Tersedia</div>
            </div>
            <a href="#stockTable">Lihat Stock <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>

      <!-- MAIN -->
      <div class="pd-main">

        <div class="pd-card">
          <div class="pd-card-head">
            <div class="pd-card-icon" style="background:rgba(210,31,44,.1);color:var(--red);"><i class="fas fa-file-alt"></i></div>
            <h4>Informasi Produk</h4>
          </div>
          <div class="pd-info-grid">
            <div>
              <div class="pd-info-row"><span class="ik">Kode Produk</span><span class="iv"><?php echo htmlspecialchars($row->product_code); ?></span></div>
              <div class="pd-info-row"><span class="ik">Nama Produk</span><span class="iv"><?php echo htmlspecialchars($row->product_name); ?></span></div>
              <div class="pd-info-row"><span class="ik">Kategori</span><span class="iv"><?php echo htmlspecialchars($row->category_name); ?></span></div>
              <div class="pd-info-row"><span class="ik">Brand</span><span class="iv"><?php echo htmlspecialchars($row->brand_name); ?></span></div>
              <div class="pd-info-row">
                <span class="ik">Supplier</span>
                <span class="iv">
                  <?php if(($access['access_supplier'] ?? 'N') == 'Y'){ ?>
                    <?php foreach (explode(',', $row->product_supplier_tag) as $tag): ?>
                      <?php if (trim($tag) !== ''): ?><span class="exp-badge"><?php echo htmlspecialchars(trim($tag)); ?></span><?php endif; ?>
                    <?php endforeach; ?>
                  <?php }else{ ?>
                    -
                  <?php } ?>
                </span>
              </div>
              <div class="pd-info-row"><span class="ik">Item Supplier</span><span class="iv"><?php echo ($access['access_item_supplier'] ?? 'N') == 'Y' ? nl2br(htmlspecialchars($row->product_supplier_name)) : '-'; ?></span></div>
            </div>
            <div>
              <div class="pd-info-row"><span class="ik">Satuan Dasar</span><span class="iv"><?php echo htmlspecialchars($row->unit_name); ?></span></div>
              <div class="pd-info-row"><span class="ik">Min Stok</span><span class="iv"><?php echo number_format($row->product_min_stock); ?></span></div>
              <div class="pd-info-row"><span class="ik">Min Order</span><span class="iv"><?php echo htmlspecialchars($row->product_min_order); ?></span></div>
              <div class="pd-info-row"><span class="ik">Berat (Gram)</span><span class="iv"><?php echo number_format($row->product_weight); ?></span></div>
              <div class="pd-info-row"><span class="ik">Status</span><span class="iv"><?php if(($access['access_status'] ?? 'N') == 'Y'){ ?><span class="status-pill <?php echo $status_class; ?>"><span class="status-dot"></span> <?php echo htmlspecialchars($row->product_status); ?></span><?php }else{ ?>-<?php } ?></span></div>
              <div class="pd-info-row">
                <span class="ik">Paket</span>
                <span class="iv"><?php if ($row->is_package == 'Y'): ?><span class="yn-pill yn-yes"><i class="fas fa-check-circle"></i> Termasuk paket</span><?php else: ?><span class="yn-pill yn-no"><i class="fas fa-times-circle"></i> Tidak termasuk paket</span><?php endif; ?></span>
              </div>
              <div class="pd-info-row">
                <span class="ik">PPN</span>
                <span class="iv"><?php if ($row->is_ppn == 'PPN'): ?><span class="yn-pill yn-yes"><i class="fas fa-check-circle"></i> PPN</span><?php else: ?><span class="yn-pill yn-no"><i class="fas fa-times-circle"></i> Non PPN</span><?php endif; ?></span>
              </div>
              <div class="pd-info-row"><span class="ik">HPP</span><span class="iv"><?php if(($access['access_purchase_price'] ?? 'N') == 'Y'){ ?><span class="pd-badge-amber">Rp <?php echo number_format($row->product_hpp); ?></span><?php }else{ ?>-<?php } ?></span></div>
              <div class="pd-info-row"><span class="ik">Harga Beli</span><span class="iv"><?php if(($access['access_purchase_price'] ?? 'N') == 'Y'){ ?><span class="pd-badge-amber">Rp <?php echo number_format($row->product_price); ?></span><?php }else{ ?>-<?php } ?></span></div>
              <div class="pd-info-row"><span class="ik">Lokasi</span><span class="iv"><?php echo htmlspecialchars($row->product_location); ?></span></div>
            </div>
            <div class="pd-info-row" style="grid-column:1 / -1;"><span class="ik">Deskripsi</span><span class="iv" style="text-align:left;flex:1;margin-left:2rem;"><?php echo nl2br(htmlspecialchars($row->product_desc)); ?></span></div>
            <div class="pd-info-row" style="grid-column:1 / -1;display:block;">
              <div class="ik" style="margin-bottom:.5rem;"><i class="fas fa-file-alt" style="color:var(--red);"></i> Catatan Penting</div>
              <div class="pd-note-box"><?php echo $note; ?></div>
            </div>
          </div>
        </div>

        <?php if ($row->product_po_status > 0): ?>
        <div class="pd-card">
          <div class="pd-card-head">
            <div class="pd-card-icon" style="background:rgba(59,130,246,.1);color:var(--blue);"><i class="fas fa-truck"></i></div>
            <h4>Status Pengadaan <span class="status-pill" style="color:var(--blue);margin-left:.5rem;"><span class="status-dot" style="background:var(--blue);"></span> Intransit</span></h4>
          </div>
          <div style="font-size:.85rem;color:var(--slate);margin-bottom:.8rem;">Produk ini masih punya PO yang belum masuk Pembelian:</div>
          <div class="table-responsive">
            <table class="pd-table">
              <thead><tr><th>No PO</th><th>Tanggal PO</th><th>Qty Dipesan</th><th>Barang</th></tr></thead>
              <tbody>
                <?php if (empty($data['pending_po'])): ?>
                <tr><td colspan="4" style="color:var(--slate);">PO tidak ditemukan (data status mungkin tidak sinkron).</td></tr>
                <?php endif; ?>
                <?php foreach ($data['pending_po'] as $po): ?>
                <tr>
                  <td><?php echo htmlspecialchars($po->hd_po_invoice); ?></td>
                  <td><?php echo date('d-m-Y', strtotime($po->hd_po_date)); ?></td>
                  <td><strong><?php echo number_format($po->dt_po_qty); ?></strong> <?php echo htmlspecialchars($row->unit_name); ?></td>
                  <td>
                    <?php if ($po->hd_po_status == 'Success'): ?>
                      <span class="yn-pill yn-yes"><i class="fas fa-check-circle"></i> Sudah Diterima</span>
                    <?php else: ?>
                      <span class="yn-pill yn-no"><i class="fas fa-truck"></i> Belum Diterima</span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php endif; ?>

        <div class="pd-card">
          <div class="pd-card-head">
            <div class="pd-card-icon" style="background:rgba(34,197,94,.1);color:var(--green);"><i class="fas fa-tags"></i></div>
            <h4>Harga &amp; Diskon</h4>
          </div>
          <?php
            $has_disc_start = !empty($row->product_disc_start_date) && $row->product_disc_start_date != '0000-00-00';
            $has_disc_end = !empty($row->product_disc_end_date) && $row->product_disc_end_date != '0000-00-00';
          ?>
          <div class="pd-disc-period">
            <i class="fas fa-calendar-alt"></i> Periode Diskon:
            <?php echo $has_disc_start ? date('d-m-Y', strtotime($row->product_disc_start_date)) : '-'; ?>
            s/d
            <?php echo $has_disc_end ? date('d-m-Y', strtotime($row->product_disc_end_date)) : '-'; ?>
            (<?php echo (int) $row->product_disc_percentage; ?>%)
          </div>
          <div class="table-responsive">
            <table class="pd-table">
              <thead>
                <tr><th>Tipe</th><th>Margin</th><th>Harga Jual</th><th>Diskon (%)</th><th>Diskon (Rp)</th></tr>
              </thead>
              <tbody>
                <?php
                  $tiers = array(
                    array('Umum', $row->product_sell_percentage_1, $row->product_sell_price_1, $access['access_umum_price'] ?? 'N'),
                    array('Toko', $row->product_sell_percentage_2, $row->product_sell_price_2, $access['access_store_price'] ?? 'N'),
                    array('Sales', $row->product_sell_percentage_3, $row->product_sell_price_3, $access['access_sales_price'] ?? 'N'),
                    array('Khusus', $row->product_sell_percentage_4, $row->product_sell_price_4, $access['access_special_price'] ?? 'N'),
                  );
                  foreach ($tiers as $tier):
                    list($label, $margin, $price, $tier_access) = $tier;
                    $disc_price = $price - ($price * $row->product_disc_percentage / 100);
                ?>
                <tr>
                  <td><strong><?php echo $label; ?></strong></td>
                  <?php if($tier_access == 'Y'){ ?>
                  <td><?php echo (int) $margin; ?>%</td>
                  <td><span class="pd-badge-blue">Rp <?php echo number_format($price); ?></span></td>
                  <td><?php echo (int) $row->product_disc_percentage; ?>%</td>
                  <td><span class="pd-badge-amber">Rp <?php echo number_format($disc_price); ?></span></td>
                  <?php }else{ ?>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <?php } ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="pd-card" id="stockTable">
          <div class="pd-card-head">
            <div class="pd-card-icon" style="background:rgba(139,92,246,.1);color:var(--purple);"><i class="fas fa-warehouse"></i></div>
            <h4>Stock per Cabang / Gudang</h4>
          </div>
          <div class="table-responsive">
            <table class="pd-table">
              <thead><tr><th>Cabang / Gudang</th><th>Qty</th></tr></thead>
              <tbody>
                <?php if(($access['access_stock'] ?? 'N') != 'Y'): ?>
                <tr><td colspan="2" style="color:var(--slate);">Tidak ada akses melihat stok.</td></tr>
                <?php elseif (empty($data['product_stock'])): ?>
                <tr><td colspan="2" style="color:var(--slate);">Belum ada data stok.</td></tr>
                <?php else: ?>
                <?php foreach ($data['product_stock'] as $s): ?>
                <tr>
                  <td><?php echo htmlspecialchars($s->warehouse_name); ?></td>
                  <td><strong><?php echo number_format($s->stock); ?></strong> <?php echo htmlspecialchars($s->unit_name); ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <script>
    function pdClose() {
      try {
        if (window.parent && window.parent.Fancybox) {
          window.parent.Fancybox.close();
          return;
        }
      } catch (e) {}
      window.history.back();
    }
    function pdCopy(text, el) {
      var done = function () {
        var icon = el.querySelector('i');
        if (!icon) return;
        icon.classList.remove('fa-copy');
        icon.classList.add('fa-check');
        setTimeout(function () {
          icon.classList.remove('fa-check');
          icon.classList.add('fa-copy');
        }, 1200);
      };
      if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(done).catch(function () {});
      }
    }
  </script>
</body>
</html>
