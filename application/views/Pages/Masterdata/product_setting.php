<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
  :root {
    --pd-red:#d21f2c; --pd-green:#22c55e; --pd-blue:#3b82f6; --pd-purple:#8b5cf6; --pd-amber:#f59e0b;
    --pd-dark:#1e2a3a; --pd-slate:#64748b; --pd-border:#e8edf5; --pd-card-sh:0 2px 16px rgba(30,42,58,.08);
  }
  .pd-layout{display:flex;gap:1.4rem;align-items:flex-start;flex-wrap:wrap;}
  .pd-side{flex:0 0 300px;width:300px;}
  .pd-main{flex:1 1 480px;min-width:0;}
  @media (max-width:860px){ .pd-side{width:100%;flex:1 1 100%;} }

  .pd-photo-card{background:#fff;border-radius:16px;box-shadow:var(--pd-card-sh);padding:1.2rem;margin-bottom:1rem;border:1px solid var(--pd-border);}
  .pd-photo-wrap{position:relative;border-radius:12px;overflow:hidden;background:#f3f4f6;height:200px;display:flex;align-items:center;justify-content:center;}
  .pd-photo-wrap img{width:100%;height:100%;object-fit:contain;}
  .pd-status-badge{position:absolute;top:10px;left:10px;z-index:2;}
  .pd-name{font-size:1.1rem;font-weight:800;color:var(--pd-dark);margin:1rem 0 .5rem;}
  .pd-code-row{display:flex;align-items:center;justify-content:space-between;gap:.6rem;margin-bottom:.9rem;}
  .pd-code{font-weight:700;color:var(--pd-dark);font-size:.9rem;}
  .pd-chips{display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:1rem;}
  .pd-chip{flex:1;min-width:85px;display:flex;align-items:center;gap:.5rem;background:#fafbfd;border:1px solid var(--pd-border);border-radius:10px;padding:.5rem .6rem;}
  .pd-chip .ci{width:26px;height:26px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.7rem;flex-shrink:0;}
  .pd-chip .cv{font-size:.78rem;font-weight:700;color:var(--pd-dark);line-height:1.2;}
  .pd-chip .cl{font-size:.66rem;color:var(--pd-slate);}
  .pd-stock-card{display:flex;align-items:center;gap:.6rem;background:rgba(210,31,44,.06);border:1px solid rgba(210,31,44,.15);border-radius:12px;padding:.8rem .9rem;}
  .pd-stock-card .si{width:36px;height:36px;border-radius:10px;background:rgba(210,31,44,.12);color:var(--pd-red);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
  .pd-stock-card .sv{font-size:1rem;font-weight:800;color:var(--pd-dark);line-height:1.15;}
  .pd-stock-card .sl{font-size:.7rem;color:var(--pd-slate);}

  .pd-card{background:#fff;border-radius:16px;box-shadow:var(--pd-card-sh);padding:1.2rem 1.4rem;margin-bottom:1.2rem;border:1px solid var(--pd-border);}
  .pd-card-head{display:flex;align-items:center;gap:.7rem;margin-bottom:.9rem;padding-bottom:.8rem;border-bottom:1px solid var(--pd-border);}
  .pd-card-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
  .pd-card-head h4{font-size:.98rem;font-weight:800;color:var(--pd-dark);margin:0;}

  .pd-info-grid{display:grid;grid-template-columns:1fr 1fr;gap:0 1.6rem;}
  @media (max-width:760px){ .pd-info-grid{grid-template-columns:1fr;} }
  .pd-info-row{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;padding:.6rem 0;border-bottom:1px solid var(--pd-border);font-size:.86rem;}
  .pd-info-row:last-child{border-bottom:none;}
  .pd-info-row .ik{color:var(--pd-slate);white-space:nowrap;flex-shrink:0;}
  .pd-info-row .iv{color:var(--pd-dark);font-weight:700;text-align:right;}

  .pd-exp-badge{display:inline-block;background:var(--pd-blue);color:#fff;border-radius:20px;padding:.18rem .6rem;font-size:.72rem;font-weight:700;margin:0 0 .25rem .25rem;}
  .pd-status-pill{display:inline-flex;align-items:center;font-weight:700;font-size:.85rem;}
  .pd-status-dot{width:7px;height:7px;border-radius:50%;display:inline-block;margin-right:.4rem;}
  .pd-status-active{color:var(--pd-green);} .pd-status-active .pd-status-dot{background:var(--pd-green);}
  .pd-status-inactive{color:var(--pd-red);} .pd-status-inactive .pd-status-dot{background:var(--pd-red);}
  .pd-status-discontinue{color:var(--pd-amber);} .pd-status-discontinue .pd-status-dot{background:var(--pd-amber);}
  .pd-yn-pill{display:inline-flex;align-items:center;gap:.3rem;font-weight:700;font-size:.78rem;border-radius:20px;padding:.15rem .6rem;}
  .pd-yn-yes{background:rgba(34,197,94,.1);color:var(--pd-green);}
  .pd-yn-no{background:rgba(210,31,44,.08);color:var(--pd-red);}

  .pd-note-box{background:#fdf1f2;border:1.5px solid rgba(210,31,44,.2);border-radius:10px;padding:.8rem .9rem;font-size:.84rem;color:var(--pd-dark);white-space:pre-line;max-height:200px;overflow-y:auto;}

  .pd-table{width:100%;border-collapse:collapse;font-size:.85rem;}
  .pd-table th{background:#fafbfd;color:var(--pd-slate);font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.4px;padding:.6rem .7rem;border-bottom:1px solid var(--pd-border);text-align:left;}
  .pd-table td{padding:.6rem .7rem;border-bottom:1px solid var(--pd-border);color:var(--pd-dark);}
  .pd-table tr:last-child td{border-bottom:none;}
  .pd-badge-blue{background:var(--pd-blue);color:#fff;border-radius:8px;padding:.2rem .55rem;font-size:.78rem;font-weight:700;}
  .pd-badge-amber{background:var(--pd-amber);color:#fff;border-radius:8px;padding:.2rem .55rem;font-size:.78rem;font-weight:700;}
  .pd-disc-period{font-size:.8rem;color:var(--pd-slate);margin-bottom:.8rem;}
</style>

<div class="container">
  <div class="page-inner">
    <div class="page-header">

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-left">
              <div>
                <h3 class="fw-bold mb-3">Pengaturan Harga Produk</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <div class="btn-group dropdown">
                 <a href="<?php echo base_url(); ?>Masterdata/product"><button class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</button></a>
                 <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><span class="btn-label"><i class="far fa-edit sizing-fa"></i></span> Edit</button>
                 <div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Setting Harga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-4 border-right">
                            <h4 style="text-align:center;">Detail Produk</h4>
                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Kode Produk / Barcode</label>
                              <div class="col-md-12 p-0">
                                <input type="hidden" class="form-control input-full" id="item_id" value="<?php echo $_GET['id']; ?>" readonly>
                                <input type="text" class="form-control input-full" id="item_code" readonly>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Nama Produk</label>
                              <div class="col-md-12 p-0">
                                <input type="text" class="form-control input-full" id="item_name" readonly>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Satuan</label>
                              <div class="col-md-12 p-0">
                                <input type="text" class="form-control input-full" id="item_unit" readonly>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Harga Beli</label>
                              <div class="col-md-12 p-0">
                                <input type="text" class="form-control input-full" id="item_purchase_price" value="0">
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">HPP</label>
                              <div class="col-md-12 p-0">
                                <input type="text" class="form-control input-full" id="item_hpp" value="0">
                              </div>
                            </div>

                          </div>



                          <div class="col-md-4 border-right">
                            <h4 style="text-align:center;">Margin & Harga Jual</h4>
                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Harga Jual Normal</label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <input id="item_price_1_percentage" name="item_price_1_percentage" type="text" class="form-control text-right" value="0">
                                </div>

                                <div class="col-sm-8">
                                  <input id="item_price_1" name="item_price_1" type="text" class="form-control text-right"  value="0">
                                </div>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Harga Jual Toko</label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <input id="item_price_2_percentage" name="item_price_2_percentage" type="text" class="form-control text-right" value="0">
                                </div>

                                <div class="col-sm-8">
                                  <input id="item_price_2" name="item_price_2" type="text" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Harga Sales</label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <input id="item_price_3_percentage" name="item_price_3_percentage" type="text" class="form-control text-right" value="0">
                                </div>

                                <div class="col-sm-8">
                                  <input id="item_price_3" name="item_price_3" type="text" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>


                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Harga Khusus</label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <input id="item_price_4_percentage" name="item_price_4_percentage" type="text" class="form-control text-right" value="0">
                                </div>

                                <div class="col-sm-8">
                                  <input id="item_price_4" name="item_price_4" type="text" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 border-right">
                            <h4 style="text-align:center;">Disc Seasonal</h4>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Disc</label>
                              <div class="row">
                                <div class="col-sm-12">
                                  <input id="disc_percentage" name="disc_percentage" type="text" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Dari Tanggal: </label>
                              <div class="row">
                                <div class="col-sm-12">
                                  <input id="start_disc" name="start_disc" type="date" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>

                            <div class="form-group form-inline">
                              <label for="inlineinput" class="col-md-3 col-form-label">Sampai Tanggal: </label>
                              <div class="row">
                                <div class="col-sm-12">
                                  <input id="end_disc" name="end_disc" type="date" class="form-control text-right" value="0">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                        <button type="button" class="btn btn-primary" id="btnsave"><i class="fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php foreach ($data['settingproduct'] as $row) { ?>
              <?php
                $pd_status_class = 'pd-status-active';
                if ($row->product_status == 'Tidak Aktif') { $pd_status_class = 'pd-status-inactive'; }
                else if ($row->product_status == 'Discontinue') { $pd_status_class = 'pd-status-discontinue'; }

                $pd_total_stock = 0;
                foreach ($data['product_stock'] as $s) { $pd_total_stock += (float) $s->stock; }
                $pd_stock_unit = !empty($data['product_stock']) ? $data['product_stock'][0]->unit_name : $row->unit_name;

                $pd_note = $row->product_note;
                if ($pd_note == null || $pd_note == '') { $pd_note = 'Tidak ada catatan penting'; }
                $pd_note = str_replace(['<br />', '<br>', '<br/>'], "\n", $pd_note);

                $pd_has_disc_start = !empty($row->product_disc_start_date) && $row->product_disc_start_date != '0000-00-00';
                $pd_has_disc_end = !empty($row->product_disc_end_date) && $row->product_disc_end_date != '0000-00-00';
              ?>

              <div class="pd-layout">

                <!-- LEFT -->
                <div class="pd-side">
                  <div class="pd-photo-card">
                    <div class="pd-photo-wrap">
                      <span class="pd-status-badge pd-status-pill <?php echo $pd_status_class; ?>" style="background:#fff;border-radius:20px;padding:.25rem .7rem;box-shadow:var(--pd-card-sh);"><span class="pd-status-dot"></span> <?php echo htmlspecialchars($row->product_status); ?></span>
                      <img src="<?php echo base_url(); ?>assets/products/<?php echo htmlspecialchars($row->product_image); ?>" alt="<?php echo htmlspecialchars($row->product_name); ?>" onerror="this.onerror=null;this.src='<?php echo base_url(); ?>assets/products/default.png';">
                    </div>

                    <div class="pd-name"><?php echo htmlspecialchars($row->product_name); ?></div>

                    <div class="pd-code-row">
                      <div class="pd-code"><?php echo htmlspecialchars($row->product_code); ?></div>
                    </div>

                    <div class="pd-chips">
                      <div class="pd-chip">
                        <div class="ci" style="background:rgba(245,158,11,.1);color:#b7791f;"><i class="fas fa-list"></i></div>
                        <div><div class="cv"><?php echo htmlspecialchars($row->category_name); ?></div><div class="cl">Kategori</div></div>
                      </div>
                      <div class="pd-chip">
                        <div class="ci" style="background:rgba(34,197,94,.1);color:var(--pd-green);"><i class="fas fa-cube"></i></div>
                        <div><div class="cv"><?php echo htmlspecialchars($row->brand_name); ?></div><div class="cl">Brand</div></div>
                      </div>
                      <div class="pd-chip">
                        <div class="ci" style="background:rgba(59,130,246,.1);color:var(--pd-blue);"><i class="fas fa-box"></i></div>
                        <div><div class="cv"><?php echo htmlspecialchars($row->unit_name); ?></div><div class="cl">Satuan</div></div>
                      </div>
                    </div>

                    <div class="pd-stock-card">
                      <div class="si"><i class="fas fa-warehouse"></i></div>
                      <div style="flex:1;">
                        <div class="sv"><?php echo number_format($pd_total_stock); ?> <?php echo htmlspecialchars($pd_stock_unit); ?></div>
                        <div class="sl">Stok Tersedia</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- MAIN -->
                <div class="pd-main">

                  <div class="pd-card">
                    <div class="pd-card-head">
                      <div class="pd-card-icon" style="background:rgba(210,31,44,.1);color:var(--pd-red);"><i class="fas fa-file-alt"></i></div>
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
                            <?php foreach (explode(',', $row->product_supplier_tag) as $tag): ?>
                              <?php if (trim($tag) !== ''): ?><span class="pd-exp-badge"><?php echo htmlspecialchars(trim($tag)); ?></span><?php endif; ?>
                            <?php endforeach; ?>
                          </span>
                        </div>
                        <div class="pd-info-row"><span class="ik">Item Supplier</span><span class="iv"><?php echo nl2br(htmlspecialchars($row->product_supplier_name)); ?></span></div>
                      </div>
                      <div>
                        <div class="pd-info-row"><span class="ik">Satuan Dasar</span><span class="iv"><?php echo htmlspecialchars($row->unit_name); ?></span></div>
                        <div class="pd-info-row"><span class="ik">Min Stok</span><span class="iv"><?php echo number_format($row->product_min_stock); ?></span></div>
                        <div class="pd-info-row"><span class="ik">Min Order</span><span class="iv"><?php echo htmlspecialchars($row->product_min_order); ?></span></div>
                        <div class="pd-info-row"><span class="ik">Berat (Gram)</span><span class="iv"><?php echo number_format($row->product_weight); ?></span></div>
                        <div class="pd-info-row"><span class="ik">Status</span><span class="iv"><span class="pd-status-pill <?php echo $pd_status_class; ?>"><span class="pd-status-dot"></span> <?php echo htmlspecialchars($row->product_status); ?></span></span></div>
                        <div class="pd-info-row">
                          <span class="ik">Paket</span>
                          <span class="iv"><?php if ($row->is_package == 'Y'): ?><span class="pd-yn-pill pd-yn-yes"><i class="fas fa-check-circle"></i> Termasuk paket</span><?php else: ?><span class="pd-yn-pill pd-yn-no"><i class="fas fa-times-circle"></i> Tidak termasuk paket</span><?php endif; ?></span>
                        </div>
                        <div class="pd-info-row">
                          <span class="ik">PPN</span>
                          <span class="iv"><?php if ($row->is_ppn == 'PPN'): ?><span class="pd-yn-pill pd-yn-yes"><i class="fas fa-check-circle"></i> PPN</span><?php else: ?><span class="pd-yn-pill pd-yn-no"><i class="fas fa-times-circle"></i> Non PPN</span><?php endif; ?></span>
                        </div>
                        <div class="pd-info-row"><span class="ik">HPP</span><span class="iv"><span class="pd-badge-amber">Rp <?php echo number_format($row->product_hpp); ?></span></span></div>
                        <div class="pd-info-row"><span class="ik">Harga Beli</span><span class="iv"><span class="pd-badge-amber">Rp <?php echo number_format($row->product_price); ?></span></span></div>
                        <div class="pd-info-row"><span class="ik">Lokasi</span><span class="iv"><?php echo htmlspecialchars($row->product_location); ?></span></div>
                      </div>
                      <div class="pd-info-row" style="grid-column:1 / -1;"><span class="ik">Deskripsi</span><span class="iv" style="text-align:left;flex:1;margin-left:2rem;"><?php echo nl2br(htmlspecialchars($row->product_desc)); ?></span></div>
                      <div class="pd-info-row" style="grid-column:1 / -1;display:block;">
                        <div class="ik" style="margin-bottom:.5rem;"><i class="fas fa-file-alt" style="color:var(--pd-red);"></i> Catatan Penting</div>
                        <div class="pd-note-box"><?php echo $pd_note; ?></div>
                      </div>
                    </div>
                  </div>

                  <?php if ($row->product_po_status > 0): ?>
                  <div class="pd-card">
                    <div class="pd-card-head">
                      <div class="pd-card-icon" style="background:rgba(59,130,246,.1);color:var(--pd-blue);"><i class="fas fa-truck"></i></div>
                      <h4>Status Pengadaan <span class="pd-status-pill" style="color:var(--pd-blue);margin-left:.5rem;"><span class="pd-status-dot" style="background:var(--pd-blue);"></span> Intransit</span></h4>
                    </div>
                    <div style="font-size:.85rem;color:var(--pd-slate);margin-bottom:.8rem;">Produk ini masih punya PO yang belum masuk Pembelian:</div>
                    <div class="table-responsive">
                      <table class="pd-table">
                        <thead><tr><th>No PO</th><th>Tanggal PO</th><th>Qty Dipesan</th><th>Barang</th></tr></thead>
                        <tbody>
                          <?php if (empty($data['pending_po'])): ?>
                          <tr><td colspan="4" style="color:var(--pd-slate);">PO tidak ditemukan (data status mungkin tidak sinkron).</td></tr>
                          <?php endif; ?>
                          <?php foreach ($data['pending_po'] as $po): ?>
                          <tr>
                            <td><?php echo htmlspecialchars($po->hd_po_invoice); ?></td>
                            <td><?php echo date('d-m-Y', strtotime($po->hd_po_date)); ?></td>
                            <td><strong><?php echo number_format($po->dt_po_qty); ?></strong> <?php echo htmlspecialchars($row->unit_name); ?></td>
                            <td>
                              <?php if ($po->hd_po_status == 'Success'): ?>
                                <span class="pd-yn-pill pd-yn-yes"><i class="fas fa-check-circle"></i> Sudah Diterima</span>
                              <?php else: ?>
                                <span class="pd-yn-pill pd-yn-no"><i class="fas fa-truck"></i> Belum Diterima</span>
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
                      <div class="pd-card-icon" style="background:rgba(34,197,94,.1);color:var(--pd-green);"><i class="fas fa-tags"></i></div>
                      <h4>Harga &amp; Diskon</h4>
                    </div>
                    <div class="pd-disc-period">
                      <i class="fas fa-calendar-alt"></i> Periode Diskon:
                      <?php echo $pd_has_disc_start ? date('d-m-Y', strtotime($row->product_disc_start_date)) : '-'; ?>
                      s/d
                      <?php echo $pd_has_disc_end ? date('d-m-Y', strtotime($row->product_disc_end_date)) : '-'; ?>
                      (<?php echo (int) $row->product_disc_percentage; ?>%)
                    </div>
                    <div class="table-responsive">
                      <table class="pd-table">
                        <thead>
                          <tr><th>Tipe</th><th>Margin</th><th>Harga Jual</th><th>Diskon (%)</th><th>Diskon (Rp)</th></tr>
                        </thead>
                        <tbody>
                          <?php
                            $pd_tiers = array(
                              array('Umum', $row->product_sell_percentage_1, $row->product_sell_price_1),
                              array('Toko', $row->product_sell_percentage_2, $row->product_sell_price_2),
                              array('Sales', $row->product_sell_percentage_3, $row->product_sell_price_3),
                              array('Khusus', $row->product_sell_percentage_4, $row->product_sell_price_4),
                            );
                            foreach ($pd_tiers as $pd_tier):
                              list($pd_label, $pd_margin, $pd_price) = $pd_tier;
                              $pd_disc_price = $pd_price - ($pd_price * $row->product_disc_percentage / 100);
                          ?>
                          <tr>
                            <td><strong><?php echo $pd_label; ?></strong></td>
                            <td><?php echo (int) $pd_margin; ?>%</td>
                            <td><span class="pd-badge-blue">Rp <?php echo number_format($pd_price); ?></span></td>
                            <td><?php echo (int) $row->product_disc_percentage; ?>%</td>
                            <td><span class="pd-badge-amber">Rp <?php echo number_format($pd_disc_price); ?></span></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="pd-card">
                    <div class="pd-card-head">
                      <div class="pd-card-icon" style="background:rgba(139,92,246,.1);color:var(--pd-purple);"><i class="fas fa-warehouse"></i></div>
                      <h4>Stock per Cabang / Gudang</h4>
                    </div>
                    <div class="table-responsive">
                      <table class="pd-table">
                        <thead><tr><th>Cabang / Gudang</th><th>Qty</th></tr></thead>
                        <tbody>
                          <?php if (empty($data['product_stock'])): ?>
                          <tr><td colspan="2" style="color:var(--pd-slate);">Belum ada data stok.</td></tr>
                          <?php endif; ?>
                          <?php foreach ($data['product_stock'] as $s): ?>
                          <tr>
                            <td><?php echo htmlspecialchars($s->warehouse_name); ?></td>
                            <td><strong><?php echo number_format($s->stock); ?></strong> <?php echo htmlspecialchars($s->unit_name); ?></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>


  new bootstrap.Modal(document.getElementById('myModal'), {backdrop: 'static', keyboard: false})  
  
  let item_purchase_price = new AutoNumeric('#item_purchase_price', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let item_hpp = new AutoNumeric('#item_hpp', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let item_price_1 = new AutoNumeric('#item_price_1', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let item_price_2 = new AutoNumeric('#item_price_2', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });
  let item_price_3 = new AutoNumeric('#item_price_3', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });
  let item_price_4 = new AutoNumeric('#item_price_4', {
    currencySymbol : 'Rp. ',
    decimalCharacter : ',',
    decimalPlaces: 0,
    decimalPlacesShownOnFocus: 0,
    digitGroupSeparator : '.',
  });

  let item_price_1_percentage = new AutoNumeric('#item_price_1_percentage', {
    suffixText: "%",
    decimalPlaces: 0,
  });

  let item_price_2_percentage = new AutoNumeric('#item_price_2_percentage', {
    suffixText: "%",
    decimalPlaces: 0,
  });

  let item_price_3_percentage = new AutoNumeric('#item_price_3_percentage', {
    suffixText: "%",
    decimalPlaces: 0,
  });

  let item_price_4_percentage = new AutoNumeric('#item_price_4_percentage', {
    suffixText: "%",
    decimalPlaces: 0,
  });
  
  let disc_percentage = new AutoNumeric('#disc_percentage', {
    suffixText: "%",
    decimalPlaces: 0,
  });


  $('body').on('shown.bs.modal', '.modal', function() {
    $(this).find('.js-example-basic-multiple').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('#myModal').length !== 0)
        dropdownParent = $("#myModal");
      $(this).select2({
        dropdownParent: $("#myModal")
      // ...
      });
    });
  });

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });

  $('#btnsave').click(function(e){
    e.preventDefault();
    var item_id                       = $("#item_id").val();
    var item_purchase_price_val       = item_purchase_price.get();
    var item_hpp_val                  = item_hpp.get();
    var item_price_1_percentage_val   = item_price_1_percentage.get();
    var item_price_2_percentage_val   = item_price_2_percentage.get();
    var item_price_3_percentage_val   = item_price_3_percentage.get();
    var item_price_4_percentage_val   = item_price_4_percentage.get();
    var item_price_1_val              = item_price_1.get();
    var item_price_2_val              = item_price_2.get();
    var item_price_3_val              = item_price_3.get();
    var item_price_4_val              = item_price_4.get();
    var disc_percentage_val           = disc_percentage.get();
    var start_disc_val                = $("#start_disc").val();
    var end_disc_val                  = $("#end_disc").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/edit_price",
      dataType: "json",
      data: {item_id:item_id, item_purchase_price_val:item_purchase_price_val, item_hpp_val:item_hpp_val, item_price_1_percentage_val:item_price_1_percentage_val, item_price_2_percentage_val:item_price_2_percentage_val, item_price_3_percentage_val:item_price_3_percentage_val, item_price_4_percentage_val:item_price_4_percentage_val, item_price_1_val:item_price_1_val, item_price_2_val:item_price_2_val, item_price_3_val:item_price_3_val, item_price_4_val:item_price_4_val, disc_percentage_val:disc_percentage_val, start_disc_val:start_disc_val, end_disc_val:end_disc_val},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>Masterdata/settingproduct?id="+item_id;
          Swal.fire('Saved!', '', 'success');
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.result,
          })
        }
      }
    });
  });


  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var modal = $(this)
    modal.find('.modal-title').text('Edit Harga')
    var id = $("#item_id").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/get_edit_product",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          let row = data.result[0];
          modal.find('#item_code').val(row.product_code)
          modal.find('#item_name').val(row.product_name)
          modal.find('#item_unit').val(row.unit_name)
          item_purchase_price.set(row.product_price)
          item_hpp.set(row.product_hpp)
          item_price_1.set(row.product_sell_price_1)
          item_price_2.set(row.product_sell_price_2)
          item_price_3.set(row.product_sell_price_3)
          item_price_4.set(row.product_sell_price_4)
          item_price_1_percentage.set(row.product_sell_percentage_1)
          item_price_2_percentage.set(row.product_sell_percentage_2)
          item_price_3_percentage.set(row.product_sell_percentage_3)
          item_price_4_percentage.set(row.product_sell_percentage_4)
          disc_percentage.set(row.product_disc_percentage)
          modal.find('#start_disc').val(row.product_disc_start_date)
          modal.find('#end_disc').val(row.product_disc_end_date)
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.result,
          })
        }
      }
    });
  })

  $('#item_price_1_percentage').on('input', function (event) {
    let item_price_1_percentage_cal = parseInt(item_price_1_percentage.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_1_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_1_percentage_cal / 100));
    item_price_1.set(item_price_1_cal);
  })

  $('#item_price_2_percentage').on('input', function (event) {
    let item_price_2_percentage_cal = parseInt(item_price_2_percentage.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_2_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_2_percentage_cal / 100));
    item_price_2.set(item_price_2_cal);
  })

  $('#item_price_3_percentage').on('input', function (event) {
    let item_price_3_percentage_cal = parseInt(item_price_3_percentage.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_3_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_3_percentage_cal / 100));
    item_price_3.set(item_price_3_cal);
  })

  $('#item_price_4_percentage').on('input', function (event) {
    let item_price_4_percentage_cal = parseInt(item_price_4_percentage.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_4_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_4_percentage_cal / 100));
    item_price_4.set(item_price_4_cal);
  })



  $('#item_price_1').on('input', function (event) {
    let item_price_1_cal = parseInt(item_price_1.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_1_percentage_cal = (item_price_1_cal / item_purchase_price_cal * 100) - 100;
    item_price_1_percentage.set(item_price_1_percentage_cal);
  })

  $('#item_price_2').on('input', function (event) {
    let item_price_2_cal = parseInt(item_price_2.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_2_percentage_cal = (item_price_2_cal / item_purchase_price_cal * 100) - 100;
    item_price_2_percentage.set(item_price_2_percentage_cal);
  })

  $('#item_price_3').on('input', function (event) {
    let item_price_3_cal = parseInt(item_price_3.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_3_percentage_cal = (item_price_3_cal / item_purchase_price_cal * 100) - 100;
    item_price_3_percentage.set(item_price_3_percentage_cal);
  })

  $('#item_price_4').on('input', function (event) {
    let item_price_4_cal = parseInt(item_price_4.get());
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_4_percentage_cal = (item_price_4_cal / item_purchase_price_cal * 100) - 100;
    item_price_4_percentage.set(item_price_4_percentage_cal);
  })

  $('#item_purchase_price').on('input', function (event) {
    let item_purchase_price_cal = parseInt(item_purchase_price.get());
    let item_price_1_percentage_cal = parseInt(item_price_1_percentage.get());
    let item_price_2_percentage_cal = parseInt(item_price_2_percentage.get());
    let item_price_3_percentage_cal = parseInt(item_price_3_percentage.get());
    let item_price_4_percentage_cal = parseInt(item_price_4_percentage.get());
    let item_price_1_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_1_percentage_cal / 100));
    let item_price_2_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_2_percentage_cal / 100));
    let item_price_3_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_3_percentage_cal / 100));
    let item_price_4_cal = (item_purchase_price_cal + (item_purchase_price_cal * item_price_4_percentage_cal / 100));
    item_price_1.set(item_price_1_cal);
    item_price_2.set(item_price_1_cal);
    item_price_3.set(item_price_1_cal);
    item_price_4.set(item_price_1_cal);
  })
  



</script>