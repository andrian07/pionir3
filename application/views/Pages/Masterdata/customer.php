<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<style>
:root {
  --red:#d21f2c; --red-dk:#8a1017; --green:#22c55e; --amber:#f59e0b;
  --dark:#1e2a3a; --slate:#64748b; --border:#e8edf5; --bg:#f5f6fa; --white:#fff;
  --card-sh:0 2px 16px rgba(30,42,58,.08);
}
body{background:var(--bg)!important; font-size: 15.5px !important;}
.page-inner{padding-top:0!important;}
.container{max-width:1400px;}

.brand-hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);border-radius:0;padding:1.1rem 45px;margin:0 -45px 1.6rem;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;}
.brand-hero::before{content:'';position:absolute;width:220px;height:220px;border-radius:50%;background:radial-gradient(circle,rgba(210,31,44,.1) 0%,transparent 70%);right:20px;top:-120px;}
.brand-hero h2{font-size:1.6rem;font-weight:800;color:var(--dark);margin:0 0 .3rem;position:relative;z-index:1;}
.brand-hero h2 span{color:var(--red);}
.brand-hero p{font-size:.88rem;color:var(--slate);margin:0;max-width:480px;position:relative;z-index:1;}
.brand-hero-right{display:flex;align-items:center;gap:1.4rem;position:relative;z-index:1;}
.brand-hero-logo{width:56px;height:56px;flex-shrink:0;}
.brand-hero-logo img{width:100%;height:100%;object-fit:contain;}

.bstat-card{background:var(--white);border-radius:16px;box-shadow:var(--card-sh);padding:1.2rem 1.4rem;display:flex;align-items:center;gap:1rem;margin-bottom:1.4rem;}
.bstat-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;}
.bstat-icon.red{background:rgba(210,31,44,.1);color:var(--red);}
.bstat-icon.green{background:rgba(34,197,94,.1);color:var(--green);}
.bstat-icon.amber{background:rgba(245,158,11,.1);color:var(--amber);}
.bstat-label{font-size:.85rem;color:var(--slate);margin-bottom:.2rem;}
.bstat-value{font-size:1.6rem;font-weight:800;color:var(--dark);line-height:1;}
.bstat-sub{font-size:.76rem;color:var(--green);font-weight:600;margin-top:.35rem;}

.toolbar-row{display:flex;align-items:center;justify-content:flex-end;gap:.8rem;margin-bottom:1.2rem;flex-wrap:wrap;}
.search-box{position:relative;}
.search-box input{width:260px;height:44px;border-radius:10px;border:1px solid var(--border);background:var(--white);padding:0 14px 0 40px;font-size:.88rem;color:var(--dark);outline:none;transition:border-color .2s;}
.search-box input:focus{border-color:var(--red);}
.search-box i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#9aa0a6;font-size:.85rem;}
.btn-add-brand{height:44px;background:linear-gradient(135deg,var(--red),var(--red-dk));border:none;color:#fff;border-radius:10px;padding:0 1.3rem;font-weight:700;font-size:.9rem;display:inline-flex;align-items:center;gap:.5rem;box-shadow:0 4px 14px rgba(210,31,44,.3);}
.btn-add-brand:hover{opacity:.92;color:#fff;}
.btn-add-brand:disabled{opacity:.5;cursor:not-allowed;}
.btn-excel-dd{height:44px;background:#fff;border:1.5px solid var(--border);color:var(--dark);border-radius:10px;padding:0 1.1rem;font-weight:600;font-size:.88rem;display:inline-flex;align-items:center;gap:.5rem;}
.btn-excel-dd:hover,.btn-excel-dd:focus{background:#fff;color:var(--dark);border-color:var(--border);}
.btn-excel-dd i{color:var(--green);}
.toolbar-row .dropdown-menu{border-radius:12px;border:1px solid var(--border);box-shadow:var(--card-sh);padding:.4rem;margin-top:.4rem;}
.toolbar-row .dropdown-menu .dropdown-item{border-radius:8px;font-size:.85rem;padding:.5rem .7rem;color:var(--dark);}
.toolbar-row .dropdown-menu .dropdown-item:hover{background:#fbeeee;color:var(--red);}

.brand-table-panel{background:var(--white);border-radius:16px;box-shadow:var(--card-sh);overflow:hidden;}
.brand-table{width:100%;margin:0;}
.brand-table thead th{background:#fafbfd;color:var(--slate);font-size:.76rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;padding:.9rem 1.2rem;border-bottom:1px solid var(--border);white-space:nowrap;}
.brand-table tbody td{padding:.85rem 1.2rem;font-size:.9rem;color:var(--dark);border-bottom:1px solid var(--border);vertical-align:middle;}
.brand-table tbody tr:last-child td{border-bottom:none;}
.brand-table tbody tr:hover{background:#fbfbfd;}
.bname{font-weight:700;}
.addr-cell{display:inline-block;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;vertical-align:middle;}
.status-pill{display:inline-flex;align-items:center;font-weight:600;font-size:.85rem;}
.status-dot{width:7px;height:7px;border-radius:50%;display:inline-block;margin-right:.4rem;}
.status-active{color:var(--green);}
.status-active .status-dot{background:var(--green);}
.status-inactive{color:var(--red);}
.status-inactive .status-dot{background:var(--red);}
.rate-pill{display:inline-flex;align-items:center;font-weight:700;font-size:.76rem;padding:.28rem .6rem;border-radius:20px;white-space:nowrap;}
.rate-normal{background:rgba(59,130,246,.1);color:#3b82f6;}
.rate-toko{background:rgba(245,158,11,.1);color:#b7791f;}
.rate-sales{background:rgba(14,165,233,.1);color:#0ea5e9;}
.rate-khusus{background:rgba(34,197,94,.1);color:var(--green);}
.exp-badge{display:inline-block;background:rgba(30,42,58,.06);color:var(--dark);font-size:.74rem;font-weight:600;padding:.22rem .55rem;border-radius:20px;margin:0 .25rem .25rem 0;}
.act-btn{width:32px;height:32px;border-radius:8px;border:none;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;color:#fff;margin-right:.35rem;}
.act-view{background:#0ea5e9;}
.act-edit{background:#3b82f6;}
.act-delete{background:var(--red);}
.act-btn:disabled{opacity:.45;cursor:not-allowed;}

.dataTables_wrapper .bottom{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.2rem;flex-wrap:wrap;gap:.6rem;}
.dataTables_info{font-size:.85rem;color:var(--slate);}
.dataTables_paginate{display:flex;}
.dataTables_paginate .pagination{display:flex;gap:.35rem;margin:0;}
.dataTables_paginate .page-item .page-link{width:34px;height:34px;display:flex;align-items:center;justify-content:center;border-radius:9px!important;border:1px solid var(--border);color:var(--dark);font-size:.85rem;font-weight:600;cursor:pointer;background:#fff;box-shadow:none;}
.dataTables_paginate .page-item.active .page-link{background:var(--red);border-color:var(--red);color:#fff;}
.dataTables_paginate .page-item.disabled .page-link{opacity:.4;cursor:default;}
.dataTables_paginate .page-item:not(.disabled):not(.active) .page-link:hover{border-color:var(--red);color:var(--red);background:#fff;}

.modal-content{border:none;border-radius:18px;overflow:hidden;}
.brand-modal-head{display:flex;align-items:flex-start;gap:.9rem;padding:1.4rem 1.5rem 1rem;}
.bm-icon{width:44px;height:44px;border-radius:12px;background:rgba(210,31,44,.1);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;}
.brand-modal-head h5{font-size:1.15rem;font-weight:800;color:var(--dark);margin:0;}
.brand-modal-head p{font-size:.82rem;color:var(--slate);margin:0;}
.modal-body{padding:0 1.5rem 1rem;}
.modal-body .row{margin-left:-8px;margin-right:-8px;}
.modal-body .row > [class^="col-"]{padding-left:8px;padding-right:8px;}
.bm-label{font-size:.85rem;font-weight:700;color:var(--dark);margin-bottom:.4rem;display:block;}
.bm-label i{color:var(--red);margin-right:.35rem;}
.bm-input-wrap{position:relative;margin-bottom:1.1rem;}
.bm-input-wrap i{position:absolute;left:14px;top:14px;color:#9aa0a6;font-size:.9rem;}
.bm-input-wrap .form-control{padding-left:40px;border-radius:10px;border:1.5px solid var(--border);font-size:.9rem;min-height:46px;}
.bm-input-wrap .form-control:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(210,31,44,.1);}
.bm-input-wrap select.form-control{padding-left:40px;appearance:auto;}
.bm-input-wrap textarea.form-control{padding-top:12px;}
.bm-plain-wrap{margin-bottom:1.1rem;}
.bm-count{text-align:right;font-size:.76rem;color:var(--slate);margin-top:-.9rem;margin-bottom:.6rem;}
.modal-footer{border-top:1px solid var(--border);padding:1rem 1.5rem;gap:.6rem;}
.btn-cancel{background:#fff;border:1.5px solid var(--border);color:var(--dark);border-radius:10px;padding:.55rem 1.2rem;font-weight:600;font-size:.88rem;}
.btn-save-brand{background:linear-gradient(135deg,var(--red),var(--red-dk));border:none;color:#fff;border-radius:10px;padding:.55rem 1.3rem;font-weight:700;font-size:.88rem;box-shadow:0 4px 12px rgba(210,31,44,.3);}
.btn-save-brand:hover{color:#fff;opacity:.92;}
</style>

<?php
  $stats      = $data['stats'];
  $can_add    = $data['check_auth']['check_access'][0]->add == 'Y';
  $can_edit   = $data['check_auth']['check_access'][0]->edit == 'Y';
  $can_delete = $data['check_auth']['check_access'][0]->delete == 'Y';
  $can_view   = $data['check_auth']['check_access'][0]->view == 'Y';
?>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <!-- HERO -->
    <div class="brand-hero">
      <div>
        <h2>Daftar <span>Customer</span></h2>
        <p>Kelola data customer dan riwayat transaksi mereka.</p>
      </div>
      <div class="brand-hero-right">
        <div class="brand-hero-logo"><img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir"></div>
      </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar-row">
      <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" id="customerSearch" placeholder="Cari nama customer...">
      </div>

      <div class="btn-group dropdown">
        <button class="btn-excel-dd dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-file-excel"></i> Excel
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a class="dropdown-item" href="#">Download Template</a></li>
          <li><a class="dropdown-item" href="#">Import Excell</a></li>
        </ul>
      </div>

      <button type="button" class="btn-add-brand" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" <?php echo $can_add ? '' : 'disabled'; ?>>
        <i class="fa fa-plus"></i> Tambah Customer
      </button>

      <!-- Tambah Customer -->
      <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="brand-modal-head">
              <div class="bm-icon"><i class="fas fa-user-tie"></i></div>
              <div>
                <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                <p>Tambahkan data customer baru</p>
              </div>
              <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 border-right">

                  <label class="bm-label">Kode Customer</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-hashtag"></i>
                    <input type="text" class="form-control" id="customer_code" value="Auto" readonly>
                  </div>

                  <label class="bm-label">Nama Customer <span style="color:var(--red);">*</span></label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" id="customer_name" placeholder="Nama Customer">
                  </div>

                  <label class="bm-label">Tgl. Lahir</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" class="form-control" id="customer_dob">
                  </div>

                  <label class="bm-label">Jenis Kelamin</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-venus-mars"></i>
                    <select class="form-select form-control" id="customer_gender">
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>

                  <label class="bm-label">Alamat</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-map-marker-alt"></i>
                    <textarea class="form-control" id="customer_address" rows="3"></textarea>
                  </div>

                  <label class="bm-label">Blok & No Rumah</label>
                  <div class="row gx-2">
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" class="form-control" id="customer_address_blok" placeholder="Blok">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_no" placeholder="No">
                      </div>
                    </div>
                  </div>

                  <label class="bm-label">RT/RW</label>
                  <div class="row gx-2">
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_rt" placeholder="RT">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_rw" placeholder="RW">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <label class="bm-label">No Telp</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" id="customer_address_phone" placeholder="No Telp">
                  </div>

                  <label class="bm-label">Email</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" id="customer_address_email" placeholder="Email">
                  </div>

                  <label class="bm-label">Alamat Pengiriman</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-shipping-fast"></i>
                    <textarea class="form-control" id="customer_send_address" rows="3"></textarea>
                  </div>

                  <label class="bm-label"><i class="fas fa-truck"></i>Expedisi</label>
                  <div class="bm-plain-wrap">
                    <select class="form-control input-full js-example-basic-multiple js-states" name="customer_expedisi" id="customer_expedisi" multiple="multiple">
                      <?php foreach ($data['ekspedisi_list'] as $row) { ?>
                        <option value="<?php echo $row->ekspedisi_id; ?>"><?php echo $row->ekspedisi_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <label class="bm-label">NPWP</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-id-card"></i>
                    <input type="text" class="form-control" id="customer_npwp" placeholder="NPWP">
                  </div>

                  <label class="bm-label">NIK</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" class="form-control" id="customer_nik" placeholder="NIK">
                  </div>

                  <label class="bm-label">Rate Customer</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-star"></i>
                    <select class="form-select form-control" id="customer_rate">
                      <option value="Normal">Normal</option>
                      <option value="Toko">Toko</option>
                      <option value="Sales">Sales</option>
                      <option value="Khusus">Khusus</option>
                    </select>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <button type="button" id="btnsave" class="btn-save-brand"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Tambah Customer -->

      <!-- Edit Customer -->
      <div class="modal fade bd-example-modal-lg editmodal" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModaleditLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="brand-modal-head">
              <div class="bm-icon"><i class="fas fa-pen"></i></div>
              <div>
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                <p>Perbarui data customer</p>
              </div>
              <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 border-right">

                  <label class="bm-label">Kode Customer</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-hashtag"></i>
                    <input type="hidden" id="customer_id_edit">
                    <input type="text" class="form-control" id="customer_code_edit" value="Auto" readonly>
                  </div>

                  <label class="bm-label">Nama Customer <span style="color:var(--red);">*</span></label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" id="customer_name_edit" placeholder="Nama Customer">
                  </div>

                  <label class="bm-label">Tgl. Lahir</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" class="form-control" id="customer_dob_edit">
                  </div>

                  <label class="bm-label">Jenis Kelamin</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-venus-mars"></i>
                    <select class="form-select form-control" id="customer_gender_edit">
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>

                  <label class="bm-label">Alamat</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-map-marker-alt"></i>
                    <textarea class="form-control" id="customer_address_edit" rows="3"></textarea>
                  </div>

                  <label class="bm-label">Blok & No Rumah</label>
                  <div class="row gx-2">
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" class="form-control" id="customer_address_blok_edit" placeholder="Blok">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_no_edit" placeholder="No">
                      </div>
                    </div>
                  </div>

                  <label class="bm-label">RT/RW</label>
                  <div class="row gx-2">
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_rt_edit" placeholder="RT">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="bm-input-wrap">
                        <i class="fas fa-hashtag"></i>
                        <input type="text" class="form-control" id="customer_address_rw_edit" placeholder="RW">
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-md-6">

                  <label class="bm-label">No Telp</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-phone"></i>
                    <input type="text" class="form-control" id="customer_address_phone_edit" placeholder="No Telp">
                  </div>

                  <label class="bm-label">Email</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-envelope"></i>
                    <input type="text" class="form-control" id="customer_address_email_edit" placeholder="Email">
                  </div>

                  <label class="bm-label">Alamat Pengiriman</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-shipping-fast"></i>
                    <textarea class="form-control" id="customer_send_address_edit" rows="3"></textarea>
                  </div>

                  <label class="bm-label"><i class="fas fa-truck"></i>Expedisi</label>
                  <div class="bm-plain-wrap">
                    <select class="form-control input-full js-example-basic-multiple js-states" name="customer_expedisi_edit" id="customer_expedisi_edit" multiple="multiple">
                      <?php foreach ($data['ekspedisi_list'] as $row) { ?>
                        <option value="<?php echo $row->ekspedisi_id; ?>"><?php echo $row->ekspedisi_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <label class="bm-label">NPWP</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-id-card"></i>
                    <input type="text" class="form-control" id="customer_npwp_edit" placeholder="NPWP">
                  </div>

                  <label class="bm-label">NIK</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" class="form-control" id="customer_nik_edit" placeholder="NIK">
                  </div>

                  <label class="bm-label">Rate Customer</label>
                  <div class="bm-input-wrap">
                    <i class="fas fa-star"></i>
                    <select class="form-select form-control" id="customer_rate_edit">
                      <option value="Normal">Normal</option>
                      <option value="Toko">Toko</option>
                      <option value="Sales">Sales</option>
                      <option value="Khusus">Khusus</option>
                    </select>
                  </div>

                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <button type="button" id="btnedit" class="btn-save-brand"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Edit Customer -->
    </div>

    <!-- TABLE -->
    <div class="brand-table-panel">
      <div class="table-responsive">
        <table id="customer-table" class="brand-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Rate</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telp</th>
              <th>Expedisi</th>
              <th>Poin</th>
              <th>Dibuat Pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($data['customer_list'] as $row) { if ($row->is_active != 'Y') continue; ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row->customer_code); ?></td>
                <td>
                  <?php
                    $rate_class = 'rate-normal';
                    if ($row->customer_rate == 'Toko') { $rate_class = 'rate-toko'; }
                    else if ($row->customer_rate == 'Sales') { $rate_class = 'rate-sales'; }
                    else if ($row->customer_rate == 'Khusus') { $rate_class = 'rate-khusus'; }
                  ?>
                  <span class="rate-pill <?php echo $rate_class; ?>"><?php echo htmlspecialchars($row->customer_rate); ?></span>
                </td>
                <td class="bname"><?php echo htmlspecialchars($row->customer_name); ?></td>
                <td><span class="addr-cell" title="<?php echo htmlspecialchars($row->customer_address); ?>"><?php echo htmlspecialchars($row->customer_address); ?></span></td>
                <td><?php echo $row->customer_phone !== '' ? htmlspecialchars($row->customer_phone) : '-'; ?></td>
                <td><?php foreach (explode(",", $row->customer_expedisi_tag) as $tag) { if (trim($tag) !== '') { echo '<span class="exp-badge">'.htmlspecialchars($tag).'</span>'; } } ?></td>
                <td><?php echo htmlspecialchars($row->customer_poin); ?></td>
                <td><?php echo date('d M Y', strtotime($row->created_at)); ?></td>
                <td>
                  <a href="<?php echo base_url(); ?>Masterdata/detailcustomer?id=<?php echo $row->customer_id; ?>" data-fancybox data-type="iframe"><button type="button" class="act-btn act-view" <?php echo $can_view ? '' : 'disabled'; ?>><i class="fas fa-eye"></i></button></a>
                  <button type="button" class="act-btn act-edit edit" data-id="<?php echo $row->customer_id; ?>" data-name="<?php echo htmlspecialchars($row->customer_name); ?>" data-bs-toggle="modal" data-bs-target="#exampleModaledit" <?php echo $can_edit ? '' : 'disabled'; ?>><i class="far fa-edit"></i></button>
                  <button type="button" class="act-btn act-delete delete" data-id="<?php echo $row->customer_id; ?>" data-name="<?php echo htmlspecialchars($row->customer_name); ?>" <?php echo $can_delete ? '' : 'disabled'; ?>><i class="fas fa-trash-alt"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?php
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>
  var customerTable = $('#customer-table').DataTable({
    order: [[3, 'asc']],
    columnDefs: [
      { orderable: false, searchable: false, targets: [0, 9] }
    ],
    dom: 'rt<"bottom"ip>',
    language: {
      info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
      infoEmpty: 'Tidak ada data',
      infoFiltered: '',
      zeroRecords: 'Customer tidak ditemukan',
      paginate: {
        previous: '<i class="fas fa-chevron-left"></i>',
        next: '<i class="fas fa-chevron-right"></i>'
      }
    }
  });

  $('#customerSearch').on('keyup', function () {
    customerTable.search(this.value).draw();
  });

  new bootstrap.Modal(document.getElementById('myModal'), {backdrop: 'static', keyboard: false})
  new bootstrap.Modal(document.getElementById('exampleModaledit'), {backdrop: 'static', keyboard: false})

  $(".delete").click(function (e) {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    Swal.fire({
      title: 'Konfirmasi?',
      text: "Apakah Anda Yakin Menghapus '"+name+"' ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d21f2c',
      cancelButtonColor: '#64748b',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>Masterdata/delete_customer",
          dataType: "json",
          data: {id:id},
          success : function(data){
            if (data.code == "200"){
              location.reload();
              Swal.fire('Saved!', '', 'success');
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.msg,
              })
            }
          }
        });
      }
    })
  });



  $('#btnsave').click(function(e){
    e.preventDefault();
    var customer_name             = $("#customer_name").val();
    var customer_dob              = $("#customer_dob").val();
    var customer_gender           = $("#customer_gender").val();
    var customer_address          = $("#customer_address").val();
    var customer_address_blok     = $("#customer_address_blok").val();
    var customer_address_no       = $("#customer_address_no").val();
    var customer_address_rt       = $("#customer_address_rt").val();
    var customer_address_rw       = $("#customer_address_rw").val();
    var customer_address_phone    = $("#customer_address_phone").val();
    var customer_address_email    = $("#customer_address_email").val();
    var customer_send_address     = $("#customer_send_address").val();
    var customer_expedisi         = $("#customer_expedisi").val();
    var customer_expedisi_text    = $('#customer_expedisi option:selected').toArray().map(item => item.text).join();
    var customer_npwp             = $("#customer_npwp").val();
    var customer_nik              = $("#customer_nik").val();
    var customer_rate             = $("#customer_rate").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/save_customer",
      dataType: "json",
      data: {customer_name:customer_name, customer_dob:customer_dob, customer_gender:customer_gender, customer_address:customer_address, customer_address_blok:customer_address_blok, customer_address_no:customer_address_no, customer_address_rt:customer_address_rt, customer_address_rw:customer_address_rw, customer_address_phone:customer_address_phone, customer_address_email:customer_address_email, customer_send_address:customer_send_address, customer_dob:customer_dob, customer_gender:customer_gender, customer_expedisi:customer_expedisi, customer_npwp:customer_npwp, customer_nik:customer_nik, customer_rate:customer_rate, customer_expedisi_text:customer_expedisi_text},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>Masterdata/customer";
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


  $('#btnedit').click(function(e){
    e.preventDefault();
    var customer_id               = $("#customer_id_edit").val();
    var customer_code             = $("#customer_code_edit").val();
    var customer_name             = $("#customer_name_edit").val();
    var customer_dob              = $("#customer_dob_edit").val();
    var customer_gender           = $("#customer_gender_edit").val();
    var customer_address          = $("#customer_address_edit").val();
    var customer_address_blok     = $("#customer_address_blok").val();
    var customer_address_no       = $("#customer_address_no_edit").val();
    var customer_address_rt       = $("#customer_address_rt_edit").val();
    var customer_address_rw       = $("#customer_address_rw_edit").val();
    var customer_address_phone    = $("#customer_address_phone_edit").val();
    var customer_address_email    = $("#customer_address_email_edit").val();
    var customer_send_address     = $("#customer_send_address_edit").val();
    var customer_expedisi         = $("#customer_expedisi_edit").val();
    var customer_expedisi_text    = $('#customer_expedisi_edit option:selected').toArray().map(item => item.text).join();
    var customer_npwp             = $("#customer_npwp_edit").val();
    var customer_nik              = $("#customer_nik_edit").val();
    var customer_rate             = $("#customer_rate_edit").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/edit_customer",
      dataType: "json",
      data: {customer_id:customer_id, customer_code:customer_code, customer_name:customer_name, customer_dob:customer_dob, customer_gender:customer_gender, customer_address:customer_address, customer_address_blok:customer_address_blok, customer_address_no:customer_address_no, customer_address_rt:customer_address_rt, customer_address_rw:customer_address_rw, customer_address_phone:customer_address_phone, customer_address_email:customer_address_email, customer_send_address:customer_send_address, customer_dob:customer_dob, customer_gender:customer_gender, customer_expedisi:customer_expedisi, customer_npwp:customer_npwp, customer_nik:customer_nik, customer_rate:customer_rate, customer_expedisi_text:customer_expedisi_text},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>Masterdata/customer";
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

  $('#exampleModaledit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id   = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/get_customer_id",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          let customer_data = data.result.get_customer_by_id;
          for (let i = 0; i < customer_data.length; i++) {
            modal.find('.modal-title').text('Edit ' + customer_data[i].customer_name)
            modal.find('#customer_id_edit').val(customer_data[i].customer_id)
            modal.find('#customer_code_edit').val(customer_data[i].customer_code)
            modal.find('#customer_name_edit').val(customer_data[i].customer_name)
            modal.find('#customer_dob_edit').val(customer_data[i].customer_dob)
            modal.find('#customer_gender_edit').val(customer_data[i].customer_gender)
            modal.find('#customer_address_edit').val(customer_data[i].customer_address)
            modal.find('#customer_address_blok_edit').val(customer_data[i].customer_address_blok)
            modal.find('#customer_address_no_edit').val(customer_data[i].customer_address_no)
            modal.find('#customer_address_rt_edit').val(customer_data[i].customer_rt)
            modal.find('#customer_address_rw_edit').val(customer_data[i].customer_rw)
            modal.find('#customer_address_phone_edit').val(customer_data[i].customer_phone)
            modal.find('#customer_address_email_edit').val(customer_data[i].customer_email)
            modal.find('#customer_send_address_edit').val(customer_data[i].customer_send_address)
            modal.find('#customer_npwp_edit').val(customer_data[i].customer_npwp)
            modal.find('#customer_nik_edit').val(customer_data[i].customer_nik)
            modal.find('#customer_rate_edit').val(customer_data[i].customer_rate)
            const customer_expedisi_tag_array = customer_data[i].customer_expedisi_tag_id.split(",")
            modal.find('#customer_expedisi_edit').val(customer_expedisi_tag_array)
          }
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
</script>
