<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
:root {
  --red:#d21f2c; --red-dk:#8a1017; --green:#2ecc71; --blue:#3b82f6; --amber:#f59e0b;
  --dark:#1e2a3a; --slate:#64748b; --border:#e8edf5; --bg:#f0f3f9; --white:#fff;
  --card-sh:0 2px 16px rgba(30,42,58,.08);
}
body{background:var(--bg)!important; font-size: 15.5px !important;}
.page-inner{padding-top:0!important;}
.container{max-width:1400px;}
.stat-card{border:none!important;border-radius:18px!important;overflow:hidden;margin-bottom:1.4rem;position:relative;transition:transform .22s,box-shadow .22s;}
.stat-card:hover{transform:translateY(-4px);}
.stat-card .card-body{padding:1.5rem!important;}
.sc-top{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;margin-bottom:1.1rem;}
.sc-label{font-size:.82rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;opacity:.85;margin-bottom:.35rem;color:#fff;display:flex;align-items:center;gap:.4rem;}
.sc-value{font-size:1.7rem;font-weight:800;color:#fff;line-height:1;letter-spacing:-.5px;}
.sc-divider{border:none;border-top:1px solid rgba(255,255,255,.18);margin:0 0 .85rem;}
.sc-meta{display:flex;justify-content:space-between;font-size:.87rem;color:rgba(255,255,255,.75);}
.sc-meta strong{color:#fff;font-weight:700;}
.sc-meta span{display:flex;align-items:center;gap:.3rem;}
.sc-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;background:rgba(255,255,255,.2);color:#fff;}
.sc-trend{flex-shrink:0;text-align:center;background:rgba(255,255,255,.18);border-radius:12px;padding:.35rem .7rem;}
.sc-trend .tr-pct{font-size:.85rem;font-weight:800;color:#fff;display:flex;align-items:center;gap:.2rem;justify-content:center;}
.sc-trend .tr-sub{font-size:.66rem;color:rgba(255,255,255,.8);white-space:nowrap;}
.sc-ring1,.sc-ring2{position:absolute;border-radius:50%;border:1px solid rgba(255,255,255,.08);pointer-events:none;}
.sc-ring1{width:130px;height:130px;right:-30px;top:-30px;}
.sc-ring2{width:80px;height:80px;right:20px;bottom:-25px;}
.sc-red{background:linear-gradient(135deg,var(--red),var(--red-dk));box-shadow:0 8px 28px rgba(210,31,44,.32);}
.sc-green{background:linear-gradient(135deg,#2ecc71,#16a34a);box-shadow:0 8px 28px rgba(46,204,113,.28);}
.sc-blue{background:linear-gradient(135deg,#3b82f6,#1d4ed8);box-shadow:0 8px 28px rgba(59,130,246,.28);}
.chart-panel{height:430px!important;display:flex;flex-direction:column;}
.chart-panel>.card-body{flex:1;min-height:0;overflow-y:auto;}
.chart-canvas-wrap{position:relative;height:260px;}
.chart-select{border:1px solid var(--border);border-radius:8px;font-size:.82rem;color:var(--dark);padding:.3rem .6rem;background:#fafbfd;font-weight:600;}
.donut-wrap{display:flex;align-items:center;justify-content:center;position:relative;margin-bottom:1rem;}
.donut-center{position:absolute;text-align:center;pointer-events:none;}
.donut-center .dc-num{font-size:1.5rem;font-weight:800;color:var(--dark);line-height:1;}
.donut-center .dc-label{font-size:.72rem;color:var(--slate);}
.legend-row{display:flex;align-items:center;justify-content:space-between;padding:.5rem 0;border-bottom:1px solid var(--border);}
.legend-row:last-child{border-bottom:none;}
.legend-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0;margin-right:.55rem;}
.legend-name{font-size:.88rem;color:var(--dark);font-weight:600;display:flex;align-items:center;}
.legend-count{font-size:.86rem;font-weight:700;color:var(--dark);}
.legend-pct{font-size:.78rem;color:var(--slate);margin-left:.4rem;}
.empty-activity{display:flex;align-items:center;gap:1rem;padding:.3rem 0;}
.ea-badge{width:56px;height:56px;border-radius:14px;background:rgba(59,130,246,.1);color:var(--blue);display:flex;flex-direction:column;align-items:center;justify-content:center;flex-shrink:0;line-height:1.1;}
.ea-badge .ea-day{font-size:1.05rem;font-weight:800;}
.ea-badge .ea-mon{font-size:.68rem;font-weight:700;text-transform:uppercase;}
.ea-text{flex:1;}
.ea-title{font-size:.94rem;font-weight:700;color:var(--dark);}
.ea-sub{font-size:.82rem;color:var(--slate);}
.ea-icon{color:var(--border);font-size:1.3rem;}
.panel{border:none!important;border-radius:18px!important;box-shadow:var(--card-sh)!important;margin-bottom:1.4rem;overflow:hidden;}
.panel>.card-header{background:var(--white)!important;border-bottom:1px solid var(--border)!important;padding:.95rem 1.4rem!important;}
.ph-title{display:flex;align-items:center;gap:.55rem;font-size:.9rem;font-weight:700;text-transform:uppercase;letter-spacing:.7px;color:var(--dark);}
.ph-icon{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.88rem;flex-shrink:0;}
.ph-badge{font-size:.83rem;font-weight:700;padding:.2rem .65rem;border-radius:20px;}
.panel>.card-body{background:var(--white);padding:1.1rem 1.4rem!important;}
.t-feed{list-style:none;padding:0;margin:0;}
.t-item{display:flex;gap:.85rem;padding:.65rem 0;border-bottom:1px solid var(--border);}
.t-item:last-child{border-bottom:none;}
.t-dot{width:32px;height:32px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0;margin-top:.05rem;}
.t-dot-red{background:rgba(242,89,97,.1);color:var(--red);} .t-dot-blue{background:rgba(59,130,246,.1);color:var(--blue);}
.t-body{flex:1;min-width:0;}
.t-title{font-size:1rem;color:var(--dark);font-weight:500;line-height:1.45;margin-bottom:.18rem;}
.t-title .inv-ref{color:var(--red);font-weight:700;}
.t-time{font-size:.81rem;color:var(--slate);display:flex;align-items:center;gap:.25rem;}
.l-row{display:flex;align-items:flex-start;justify-content:space-between;gap:.8rem;padding:.65rem 0;border-bottom:1px solid var(--border);}
.l-row:last-child{border-bottom:none;}
.lr-name{font-size:.92rem;font-weight:700;color:var(--dark);margin-bottom:.1rem;}
.lr-sub{font-size:.84rem;color:var(--slate);}
.lr-end{text-align:right;flex-shrink:0;}
.lr-end small{font-size:.82rem;color:var(--slate);display:block;}
.lr-end .inv-ref{font-size:.83rem;color:var(--red);font-weight:600;}
.rank-num{width:26px;height:26px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.82rem;font-weight:800;flex-shrink:0;margin-top:.1rem;}
.rank-1{background:rgba(245,158,11,.15);color:#d97706;} .rank-2{background:rgba(100,116,139,.12);color:#475569;} .rank-3{background:rgba(146,64,14,.12);color:#92400e;} .rank-n{background:var(--bg);color:var(--slate);}
.qty-pill{background:rgba(59,130,246,.1);color:var(--blue);border-radius:20px;padding:.18rem .65rem;font-size:.83rem;font-weight:700;white-space:nowrap;display:inline-block;}
.inv-pill{background:rgba(242,89,97,.08);color:var(--red);border-radius:6px;padding:.15rem .5rem;font-size:.82rem;font-weight:700;display:inline-block;margin-bottom:.2rem;}
.debt-val{font-size:.92rem;font-weight:700;color:var(--red-dk);}
.due-date{font-size:.82rem;color:var(--slate);}
.scroll-body{max-height:300px;overflow-y:auto;}
.scroll-body::-webkit-scrollbar{width:4px;} .scroll-body::-webkit-scrollbar-track{background:transparent;} .scroll-body::-webkit-scrollbar-thumb{background:var(--border);border-radius:4px;}
.panel{height:350px;}
</style>

<?php
  $today_total     = $data['get_transaction_today'][0]['total_today'] ?? 0;
  $yesterday_total = $data['get_transaction_yesterday'][0]['total_yesterday'] ?? 0;
  $pct_today = $yesterday_total > 0 ? (($today_total - $yesterday_total) / $yesterday_total) * 100 : ($today_total > 0 ? 100 : 0);

  $month_total      = $data['get_transaction_month'][0]['total_month'] ?? 0;
  $last_month_total = $data['get_transaction_last_month'][0]['total_last_month'] ?? 0;
  $pct_month = $last_month_total > 0 ? (($month_total - $last_month_total) / $last_month_total) * 100 : ($month_total > 0 ? 100 : 0);
?>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <!-- STAT CARDS -->
    <div class="row">
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-red">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label"><i class="fas fa-shopping-bag"></i> Penjualan Hari Ini</div>
                <div class="sc-value">Rp <?php echo number_format($today_total); ?></div>
              </div>
              <div class="sc-trend">
                <div class="tr-pct"><i class="fas fa-arrow-<?php echo $pct_today < 0 ? 'down' : 'up'; ?>"></i><?php echo number_format(abs($pct_today), 0); ?>%</div>
                <div class="tr-sub">Dari kemarin</div>
              </div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><i class="fas fa-shopping-cart"></i> <strong><?php echo number_format($data['get_transaction_today'][0]['total_transaction'] ?? 0); ?></strong> Transaksi</span>
              <span><i class="fas fa-box"></i> <strong><?php echo number_format($data['get_transaction_today_item'][0]['total_item'] ?? 0); ?></strong> Item Terjual</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-green">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label"><i class="fas fa-chart-bar"></i> Penjualan Bulan Ini</div>
                <div class="sc-value">Rp <?php echo number_format($month_total); ?></div>
              </div>
              <div class="sc-trend">
                <div class="tr-pct"><i class="fas fa-arrow-<?php echo $pct_month < 0 ? 'down' : 'up'; ?>"></i><?php echo number_format(abs($pct_month), 0); ?>%</div>
                <div class="tr-sub">Dari bulan lalu</div>
              </div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><i class="fas fa-shopping-cart"></i> <strong><?php echo number_format($data['get_transaction_month'][0]['total_transaction'] ?? 0); ?></strong> Transaksi</span>
              <span><i class="fas fa-box"></i> <strong><?php echo number_format($data['get_transaction_month_item'][0]['total_item'] ?? 0); ?></strong> Item Terjual</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card stat-card sc-blue">
          <span class="sc-ring1"></span><span class="sc-ring2"></span>
          <div class="card-body">
            <div class="sc-top">
              <div>
                <div class="sc-label"><i class="fas fa-layer-group"></i> Total Aset</div>
                <div class="sc-value">Rp <?php echo number_format($data['get_total_asset'][0]['total_omzet'] ?? 0); ?></div>
              </div>
              <div class="sc-icon"><i class="fas fa-layer-group"></i></div>
            </div>
            <hr class="sc-divider">
            <div class="sc-meta">
              <span><strong><?php echo number_format($data['get_total_asset_item'][0]['total_item'] ?? 0); ?></strong> Item dalam Stok</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ROW: Grafik Penjualan | Distribusi Stok -->
    <div class="row">

      <div class="col-md-7">
        <div class="card panel chart-panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(210,31,44,.1);color:var(--red);"><i class="fas fa-chart-bar"></i></div>
                Grafik Penjualan 7 Hari Terakhir
              </div>
              <select class="chart-select">
                <option>7 Hari Terakhir</option>
              </select>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-canvas-wrap">
              <canvas id="salesChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="card panel chart-panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(59,130,246,.1);color:var(--blue);"><i class="fas fa-chart-pie"></i></div>
                Distribusi Stok per Kategori
              </div>
              <a href="<?php echo base_url(); ?>Masterdata/product" style="font-size:.83rem;color:var(--red);font-weight:600;text-decoration:none;">Lihat Detail</a>
            </div>
          </div>
          <div class="card-body">
            <?php
              $donut_colors = ['#d21f2c', '#3b82f6', '#2ecc71', '#f59e0b', '#8b5cf6', '#64748b'];
              $donut_total = 0;
              foreach ($data['stock_by_category'] as $row) { $donut_total += $row['total_item']; }
            ?>
            <div class="donut-wrap" style="height:170px;">
              <canvas id="stockDonutChart" width="170" height="170"></canvas>
              <div class="donut-center">
                <div class="dc-num"><?php echo count($data['stock_by_category']); ?></div>
                <div class="dc-label">Total Item</div>
              </div>
            </div>
            <div>
              <?php $ci = 0; foreach ($data['stock_by_category'] as $row):
                $pct = $donut_total > 0 ? round(($row['total_item'] / $donut_total) * 100) : 0;
                $color = $donut_colors[$ci % count($donut_colors)]; $ci++;
              ?>
              <div class="legend-row">
                <div class="legend-name"><span class="legend-dot" style="background:<?php echo $color; ?>;"></span><?php echo htmlspecialchars($row['category_name']); ?></div>
                <div><span class="legend-count"><?php echo number_format($row['total_item']); ?> item</span><span class="legend-pct"><?php echo $pct; ?>%</span></div>
              </div>
              <?php endforeach; ?>
              <?php if (empty($data['stock_by_category'])): ?>
              <div class="legend-row"><span style="color:var(--slate);font-size:.87rem;">Belum ada data stok.</span></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ROW 2: Aktifitas Terakhir | Aktifitas Mendatang -->
    <div class="row">

      <div class="col-md-6">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(242,89,97,.1);color:var(--red);"><i class="fas fa-history"></i></div>
                Aktifitas Terakhir
              </div>
              <span class="ph-badge" style="background:rgba(242,89,97,.1);color:var(--red);"><?php echo date('d M'); ?></span>
            </div>
          </div>
          <div class="card-body scroll-body">
            <ul class="t-feed">
              <?php foreach($data['get_last_activity'] as $row): ?>
              <li class="t-item">
                <div class="t-dot t-dot-red"><i class="fas fa-dot-circle"></i></div>
                <div class="t-body">
                  <div class="t-title">
                    <?php
                      $desc = explode('Ref:', $row['activity_table_desc'])[0];
                      echo trim(htmlspecialchars($desc));
                    ?> &mdash; <span class="inv-ref">"<?php echo htmlspecialchars($row['activity_table_ref']); ?>"</span>
                  </div>
                  <div class="t-time"><i class="fas fa-clock" style="font-size:.75rem;"></i> <?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(59,130,246,.1);color:var(--blue);"><i class="fas fa-calendar-check"></i></div>
                Aktifitas Mendatang
              </div>
              <span class="ph-badge" style="background:rgba(59,130,246,.1);color:var(--blue);"><?php echo date('d M', strtotime('+1 day')); ?></span>
            </div>
          </div>
          <div class="card-body scroll-body">
            <?php if (empty($data['get_next_activity'])): ?>
            <div class="empty-activity">
              <div class="ea-badge">
                <div class="ea-day"><?php echo date('d', strtotime('+1 day')); ?></div>
                <div class="ea-mon"><?php echo date('M', strtotime('+1 day')); ?></div>
              </div>
              <div class="ea-text">
                <div class="ea-title">Tidak ada aktifitas mendatang</div>
                <div class="ea-sub">Nikmati hari Anda!</div>
              </div>
              <i class="fas fa-calendar-check ea-icon"></i>
            </div>
            <?php else: ?>
            <ul class="t-feed">
              <?php foreach($data['get_next_activity'] as $row): ?>
              <li class="t-item">
                <div class="t-dot t-dot-blue"><i class="fas fa-bell"></i></div>
                <div class="t-body">
                  <div class="t-title">
                    <?php echo ($row['keterangan'] === 'purchase') ? 'Jatuh Tempo Pembelian' : 'Jatuh Tempo Penjualan'; ?>
                    &mdash; <span class="inv-ref">"<?php echo htmlspecialchars($row['inv']); ?>"</span>
                  </div>
                  <div class="t-time"><i class="fas fa-calendar" style="font-size:.75rem;"></i> <?php echo date('d M Y', strtotime($row['due_date'])); ?></div>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>

    <!-- ROW 3: Transfer Stok | Top Products | Faktur Terlewat -->
    <div class="row">

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <div class="ph-title">
                <div class="ph-icon" style="background:rgba(245,158,11,.1);color:var(--amber);"><i class="fas fa-exchange-alt"></i></div>
                History Transfer Stok
              </div>
              <a href="<?php echo base_url(); ?>Transferstock" style="font-size:.85rem;color:var(--red);font-weight:600;text-decoration:none;">Lihat Semua &rarr;</a>
            </div>
          </div>
          <div class="card-body scroll-body">
            <?php foreach($data['transfer_stock'] as $row): ?>
            <div class="l-row">
              <div style="flex:1;min-width:0;">
                <div class="lr-name"><?php echo htmlspecialchars($row['warehouse_from_name']); ?> <span style="color:var(--slate);font-weight:400;">&rarr;</span> <?php echo htmlspecialchars($row['warehouse_to_name']); ?></div>
                <div class="lr-sub">Transfer antar cabang</div>
              </div>
              <div class="lr-end">
                <small><?php echo date('d M, H:i', strtotime($row['created_at'])); ?></small>
                <span class="inv-ref"><?php echo htmlspecialchars($row['hd_transfer_stock_code']); ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="ph-title">
              <div class="ph-icon" style="background:rgba(245,158,11,.1);color:var(--amber);"><i class="fas fa-trophy"></i></div>
              Top Products 3 Bulan
            </div>
          </div>
          <div class="card-body">
            <?php
              $rankClasses = ['rank-1','rank-2','rank-3'];
              $ri = 0;
              foreach($data['top_product_3_month'] as $row):
                $cls = isset($rankClasses[$ri]) ? $rankClasses[$ri] : 'rank-n';
                $ri++;
            ?>
            <div class="l-row">
              <div class="rank-num <?php echo $cls; ?>"><?php echo $ri; ?></div>
              <div style="flex:1;min-width:0;">
                <div class="lr-name"><?php echo htmlspecialchars($row['product_name']); ?></div>
                <div class="lr-sub"><?php echo htmlspecialchars($row['product_code']); ?></div>
              </div>
              <span class="qty-pill"><?php echo $row['total_transaction']; ?> item</span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card panel">
          <div class="card-header">
            <div class="ph-title">
              <div class="ph-icon" style="background:rgba(242,89,97,.1);color:var(--red);"><i class="fas fa-file-invoice-dollar"></i></div>
              Faktur Terlewat
            </div>
          </div>
          <div class="card-body scroll-body">
            <?php foreach($data['lost_faktur'] as $row): ?>
            <div class="l-row">
              <div style="flex:1;min-width:0;">
                <div><span class="inv-pill"><?php echo htmlspecialchars($row['hd_sales_inv']); ?></span></div>
                <div class="debt-val">Rp <?php echo number_format($row['hd_sales_remaining_debt']); ?></div>
              </div>
              <div class="lr-end" style="margin-top:.2rem;">
                <span class="due-date">
                  <i class="fas fa-calendar-times" style="color:var(--red);margin-right:.2rem;font-size:.78rem;"></i>
                  <?php echo date('d-m-Y', strtotime($row['hd_sales_due_date'])); ?>
                </span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require DOC_ROOT_PATH . $this->config->item('footer'); ?>

<script>
  var salesLabels = <?php echo json_encode(array_column($data['sales_last_7_days'], 'label')); ?>;
  var salesTotals = <?php echo json_encode(array_column($data['sales_last_7_days'], 'total')); ?>;

  var salesCtx = document.getElementById('salesChart').getContext('2d');
  var salesGradient = salesCtx.createLinearGradient(0, 0, 0, 220);
  salesGradient.addColorStop(0, 'rgba(210,31,44,.25)');
  salesGradient.addColorStop(1, 'rgba(210,31,44,0)');

  new Chart(salesCtx, {
    type: 'line',
    data: {
      labels: salesLabels,
      datasets: [{
        label: 'Penjualan',
        data: salesTotals,
        borderColor: '#d21f2c',
        backgroundColor: salesGradient,
        borderWidth: 2.5,
        pointBackgroundColor: '#d21f2c',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointRadius: 4,
        pointHoverRadius: 6,
        fill: true,
        lineTension: 0
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: { display: false },
      tooltips: {
        backgroundColor: '#1e2a3a',
        titleFontSize: 12,
        bodyFontSize: 12,
        displayColors: false,
        callbacks: {
          label: function (tooltipItem) {
            return 'Rp ' + Number(tooltipItem.yLabel).toLocaleString('id-ID');
          }
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            callback: function (value) {
              if (value >= 1000000) return (value / 1000000).toFixed(0) + 'Jt';
              if (value >= 1000) return (value / 1000).toFixed(0) + 'Rb';
              return value;
            }
          },
          gridLines: { color: '#eef1f6' }
        }],
        xAxes: [{ gridLines: { display: false } }]
      }
    }
  });

  var stockLabels = <?php echo json_encode(array_column($data['stock_by_category'], 'category_name')); ?>;
  var stockValues = <?php echo json_encode(array_column($data['stock_by_category'], 'total_item')); ?>;
  var stockColors = ['#d21f2c', '#3b82f6', '#2ecc71', '#f59e0b', '#8b5cf6', '#64748b'];

  if (stockLabels.length) {
    new Chart(document.getElementById('stockDonutChart').getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: stockLabels,
        datasets: [{
          data: stockValues,
          backgroundColor: stockColors.slice(0, stockLabels.length),
          borderWidth: 3,
          borderColor: '#fff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutoutPercentage: 72,
        legend: { display: false },
        tooltips: { enabled: true }
      }
    });
  }
</script>
