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

/* HERO */
.brand-hero{position:relative;overflow:hidden;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);border-radius:0;padding:1.1rem 45px;margin:0 -45px 1.6rem;display:flex;align-items:center;justify-content:space-between;gap:1.5rem;flex-wrap:wrap;}
.brand-hero::before{content:'';position:absolute;width:220px;height:220px;border-radius:50%;background:radial-gradient(circle,rgba(210,31,44,.1) 0%,transparent 70%);right:20px;top:-120px;}
.brand-hero h2{font-size:1.6rem;font-weight:800;color:var(--dark);margin:0 0 .3rem;position:relative;z-index:1;}
.brand-hero h2 span{color:var(--red);}
.brand-hero p{font-size:.88rem;color:var(--slate);margin:0;max-width:480px;position:relative;z-index:1;}
.brand-hero-right{display:flex;align-items:center;gap:1.4rem;position:relative;z-index:1;}
.brand-hero-logo{width:56px;height:56px;flex-shrink:0;}
.brand-hero-logo img{width:100%;height:100%;object-fit:contain;}

/* STAT CARDS */
.bstat-card{background:var(--white);border-radius:16px;box-shadow:var(--card-sh);padding:1.2rem 1.4rem;display:flex;align-items:center;gap:1rem;margin-bottom:1.4rem;}
.bstat-icon{width:52px;height:52px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;}
.bstat-icon.red{background:rgba(210,31,44,.1);color:var(--red);}
.bstat-icon.green{background:rgba(34,197,94,.1);color:var(--green);}
.bstat-icon.amber{background:rgba(245,158,11,.1);color:var(--amber);}
.bstat-label{font-size:.85rem;color:var(--slate);margin-bottom:.2rem;}
.bstat-value{font-size:1.6rem;font-weight:800;color:var(--dark);line-height:1;}

/* TOOLBAR */
.product-toolbar{margin-bottom:.2rem;}
.product-toolbar .btn {
  border-radius: 10px;
  font-weight: 600;
  font-size: .85rem;
  white-space: nowrap;
  border: 1.5px solid var(--border);
  background: var(--white);
  color: var(--dark);
  padding: .55rem 1.1rem;
  display: inline-flex;
  align-items: center;
  gap: .45rem;
  transition: all .2s;
}
.product-toolbar .btn:hover {
  border-color: var(--red);
  color: var(--red);
  background: var(--white);
}
.product-toolbar .btn-primary,
.product-toolbar .btn-primary:disabled {
  background: linear-gradient(135deg,var(--red),var(--red-dk)) !important;
  border: none !important;
  color: #fff !important;
  box-shadow: 0 4px 14px rgba(210,31,44,.3);
}
.product-toolbar .btn-primary:hover {
  opacity: .92;
  color: #fff !important;
}
.product-toolbar .btn-primary:disabled {
  opacity: .5;
  cursor: not-allowed;
}
.product-toolbar .dropdown-menu {
  border-radius: 10px;
  box-shadow: 0 6px 20px rgba(0,0,0,.12);
  border: none;
}
.product-toolbar .dropdown-item {
  padding: .5rem 1rem;
  font-size: .87rem;
}
.product-toolbar .dropdown-item:hover {
  background: rgba(210,31,44,.08);
  color: var(--red);
}

/* CARD / TABLE PANEL */
.card {
  border: none;
  border-radius: 16px;
  box-shadow: var(--card-sh);
  overflow: hidden;
}
.card-header {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 1.3rem 1.4rem 1rem;
}
.card-header h3 {
  font-size: 1.15rem;
  font-weight: 800;
  color: var(--dark);
}
.card-body { padding: 1.2rem 1.4rem 1.4rem; }

#product-list thead th {
  background: #fafbfd;
  color: var(--slate);
  font-size: .76rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .5px;
  padding: .9rem 1rem;
  border-bottom: 1px solid var(--border);
  border-top: none;
  white-space: nowrap;
}
#product-list tbody td {
  padding: .75rem 1rem;
  font-size: .87rem;
  color: var(--dark);
  border-bottom: 1px solid var(--border);
  border-top: none;
  vertical-align: middle;
}
#product-list.table-striped tbody tr:nth-of-type(odd) {
  background-color: transparent;
}
#product-list tbody tr:hover {
  background: #fbfbfd;
}
#product-list .table-product {
  font-size: .9rem;
  font-weight: 700;
  color: var(--dark);
  margin: 0;
}
#product-list p {
  font-size: .8rem;
  color: var(--slate);
  margin: 0;
}
#product-list img {
  border-radius: 8px;
}

/* BADGES */
.badge {
  border-radius: 20px !important;
  font-weight: 600 !important;
  padding: .35rem .7rem !important;
  font-size: .76rem !important;
  letter-spacing: .2px;
}
.badge-success { background: rgba(34,197,94,.12) !important; color: #16803c !important; }
.badge-danger { background: rgba(210,31,44,.1) !important; color: var(--red) !important; }
.badge-warning { background: rgba(245,158,11,.14) !important; color: #a86206 !important; }
.badge-primary { background: rgba(59,130,246,.12) !important; color: #1d4ed8 !important; }

/* ACTION BUTTONS (AJAX-rendered rows) */
.btn-icon.btn-warning,
.btn-icon.btn-info,
.btn-icon.btn-danger {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  border: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: .8rem;
  color: #fff;
  padding: 0;
}
.btn-icon.btn-warning { background: #3b82f6 !important; border-color: #3b82f6 !important; }
.btn-icon.btn-info { background: var(--slate) !important; border-color: var(--slate) !important; }
.btn-icon.btn-danger { background: var(--red) !important; border-color: var(--red) !important; }
.btn-icon:disabled { opacity: .45; cursor: not-allowed; }

/* PAGINATION */
.dataTables_wrapper .bottom{display:flex;align-items:center;justify-content:space-between;padding:1rem 0 0;flex-wrap:wrap;gap:.6rem;}
.dataTables_info{font-size:.85rem;color:var(--slate);}
.dataTables_paginate{display:flex;}
.dataTables_paginate .pagination{display:flex;gap:.35rem;margin:0;}
.dataTables_paginate .page-item .page-link{width:34px;height:34px;display:flex;align-items:center;justify-content:center;border-radius:9px!important;border:1px solid var(--border);color:var(--dark);font-size:.85rem;font-weight:600;cursor:pointer;background:#fff;box-shadow:none;}
.dataTables_paginate .page-item.active .page-link{background:var(--red);border-color:var(--red);color:#fff;}
.dataTables_paginate .page-item.disabled .page-link{opacity:.4;cursor:default;}
.dataTables_paginate .page-item:not(.disabled):not(.active) .page-link:hover{border-color:var(--red);color:var(--red);background:#fff;}
.dataTables_wrapper .top{display:flex;align-items:center;justify-content:space-between;padding:0 0 1rem;flex-wrap:wrap;gap:.6rem;}
.dataTables_length,.dataTables_filter{font-size:.85rem;color:var(--slate);}
.dataTables_length label,.dataTables_filter label{display:flex;align-items:center;gap:.5rem;font-weight:500;margin:0;}
.dataTables_length select{border:1px solid var(--border);border-radius:8px;padding:.3rem .5rem;font-size:.85rem;color:var(--dark);background:#fff;outline:none;}
.dataTables_filter input{border:1px solid var(--border);border-radius:10px;padding:.5rem .9rem;font-size:.87rem;color:var(--dark);outline:none;margin-left:.4rem;transition:border-color .2s;min-width:220px;}
.dataTables_filter input:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(210,31,44,.1);}

/* MODALS (chrome only, body fields untouched) */
.modal-content{border:none;border-radius:18px;overflow:hidden;}
.modal-header{align-items:center;gap:.9rem;padding:1.3rem 1.5rem 1rem;border-bottom:none;}
.modal-header .modal-title{font-size:1.15rem;font-weight:800;color:var(--dark);}
.modal-footer{border-top:1px solid var(--border);padding:1rem 1.5rem;gap:.6rem;}
.modal-footer .btn-danger,
.pm-modal-footer .btn-danger{background:#fff!important;border:1.5px solid var(--border)!important;color:var(--dark)!important;border-radius:10px;padding:.55rem 1.2rem;font-weight:600;font-size:.88rem;}
.modal-footer .btn-danger:hover,
.pm-modal-footer .btn-danger:hover{border-color:var(--red)!important;color:var(--red)!important;}
.modal-footer .btn-primary,
.modal-footer .btn-warning,
.modal-footer .btn-success,
.pm-modal-footer .btn-primary,
.pm-modal-footer .btn-warning,
.pm-modal-footer .btn-success{background:linear-gradient(135deg,var(--red),var(--red-dk))!important;border:none!important;color:#fff!important;border-radius:10px;padding:.55rem 1.3rem;font-weight:700;font-size:.88rem;box-shadow:0 4px 12px rgba(210,31,44,.3);}
.modal-footer .btn-primary:hover,
.modal-footer .btn-warning:hover,
.modal-footer .btn-success:hover,
.pm-modal-footer .btn-primary:hover,
.pm-modal-footer .btn-warning:hover,
.pm-modal-footer .btn-success:hover{opacity:.92;color:#fff!important;}
.modal-body .form-control,
.modal-body .form-select{border-radius:10px;border:1.5px solid var(--border);font-size:.9rem;}
.modal-body .form-control:focus,
.modal-body .form-select:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(210,31,44,.1);}

/* Tambah/Edit Produk modal redesign (chrome + layout only, inputs unchanged) */
.pm-modal-head{display:flex;align-items:flex-start;gap:.9rem;padding:1.4rem 1.5rem 1rem;background:linear-gradient(120deg,#fdf1f2 0%,#fbe4e6 45%,#fdf1f2 100%);}
.pm-modal-head .bm-icon{width:46px;height:46px;border-radius:13px;background:rgba(210,31,44,.12);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:1.15rem;flex-shrink:0;}
.pm-modal-head h5{font-size:1.3rem;font-weight:800;color:var(--dark);margin:0;}
.pm-modal-head h5 span{color:var(--red);}
.pm-modal-head p{font-size:.85rem;color:var(--slate);margin:.1rem 0 0;}
.pm-modal-head .btn-close{margin-left:auto;}
.pm-modal-body{padding:1.4rem 1.5rem;}
.pm-col-side{padding-right:1.3rem;}
.pm-col-fields{display:grid;grid-template-columns:1fr 1fr;gap:0 1.3rem;align-content:start;}
.pm-col-fields .pf-full{grid-column:1 / -1;}
@media (max-width:991px){ .pm-col-fields{grid-template-columns:1fr;} }

.pf-card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:1rem;margin-bottom:1rem;}
.pf-card-head{display:flex;align-items:center;gap:.6rem;font-weight:800;font-size:.88rem;color:var(--dark);margin-bottom:.7rem;}
.pf-card-head i{color:var(--red);}

.pf-field{margin-bottom:1rem;}
.pf-label{display:flex;align-items:center;gap:.5rem;font-weight:700;font-size:.85rem;color:var(--dark);margin-bottom:.4rem;}
.pf-icon{width:26px;height:26px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.74rem;flex-shrink:0;}
.pf-red{background:rgba(210,31,44,.1);color:var(--red);}
.pf-pink{background:rgba(236,72,153,.1);color:#ec4899;}
.pf-green{background:rgba(34,197,94,.1);color:#22c55e;}
.pf-blue{background:rgba(59,130,246,.1);color:#3b82f6;}
.pf-amber{background:rgba(245,158,11,.1);color:#b7791f;}
.pf-purple{background:rgba(139,92,246,.1);color:#8b5cf6;}
.pf-indigo{background:rgba(99,102,241,.1);color:#6366f1;}
.pf-cyan{background:rgba(6,182,212,.1);color:#0891b2;}
.pf-orange{background:rgba(249,115,22,.1);color:#ea580c;}
.pf-gray{background:rgba(100,116,139,.1);color:#64748b;}
.pf-field .form-control,
.pf-field .form-select{width:100%;}

.pm-photo-card{background:#fff;border:1px solid var(--border);border-radius:14px;padding:1.1rem;margin-bottom:1rem;}
.pm-photo-head{font-weight:800;font-size:.9rem;color:var(--dark);margin-bottom:.8rem;}
.pm-photo-card .proof{background:transparent;box-shadow:none;padding:0;border-radius:0;}
.pm-photo-card .imgArea,
.pm-photo-card .imgArea_edit{background:#fdf1f2;border:1.5px dashed rgba(210,31,44,.3);border-radius:14px;}
.pm-photo-card .imgArea i,
.pm-photo-card .imgArea_edit i{font-size:2.4rem;color:var(--red);}
.pm-photo-card .imgArea h4,
.pm-photo-card .imgArea_edit h4{font-size:.95rem;font-weight:700;color:var(--dark);margin:0;}
.pm-photo-card .imgArea p,
.pm-photo-card .imgArea_edit p{font-size:.78rem;color:var(--slate);margin:0;}
.pm-photo-card .imgArea p span,
.pm-photo-card .imgArea_edit p span{color:var(--dark);font-weight:700;}
.pm-photo-card .selectImage,
.pm-photo-card .selectImage_edit{background:#fff;border:1.5px solid var(--red);color:var(--red);border-radius:10px;font-weight:700;font-size:.85rem;padding:.6rem 1rem;}
.pm-photo-card .selectImage:hover,
.pm-photo-card .selectImage_edit:hover{background:var(--red);color:#fff;}
.pm-photo-card .removeImage_edit{background:#fff!important;border:1.5px solid var(--border)!important;color:var(--slate)!important;font-weight:600;font-size:.82rem;}
.pm-photo-card .removeImage_edit:hover{border-color:var(--red)!important;color:var(--red)!important;}
.pm-photo-card #active-image img{width:100%;border-radius:10px;margin-top:.6rem;}

.pf-note textarea{background:#fdf1f2;border:1.5px solid rgba(210,31,44,.2)!important;min-height:320px;resize:vertical;}

.pm-modal-footer{border-top:1px solid var(--border);padding:1rem 1.5rem;gap:.6rem;}

/* taller select2 fields to match the redesigned inputs */
.pf-field .select2-container--default .select2-selection--single{height:46px;display:flex;align-items:center;border-radius:10px;border:1.5px solid var(--border);}
.pf-field .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:1.4;padding-left:12px;}
.pf-field .select2-container--default .select2-selection--single .select2-selection__arrow{height:44px;}
.pf-field .select2-container--default .select2-selection--multiple{min-height:52px;padding:.35rem .5rem;border-radius:10px;border:1.5px solid var(--border);}
.pf-field .select2-container--default .select2-selection--multiple .select2-selection__choice{margin-top:.35rem;}
</style>

<?php $stats = $data['stats']; ?>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <!-- HERO -->
    <div class="brand-hero">
      <div>
        <h2>Daftar <span>Produk</span></h2>
        <p>Kelola data produk, stok, dan harga jual untuk operasional toko Anda.</p>
      </div>
      <div class="brand-hero-right">
        <div class="brand-hero-logo"><img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir"></div>
      </div>
    </div>

    <div class="page-header">

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex flex-wrap align-items-center gap-2">
              <div>
                <h3 class="fw-bold mb-3">Daftar Produk</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <div class="d-flex flex-wrap align-items-center gap-2 product-toolbar">
                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModalsearch" type="button">
                  <span class="btn-label"><i class="fas fa-filter"></i></span> Filter
                </button>
                <div class="modal fade filter" id="myModalsearch" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Pencarian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <?php if($data['check_role_product'][0]['access_supplier'] == 'Y'){ ?>
                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Supplier</label>
                          <div class="col-md-12 p-0">
                            <select class="form-control input-full js-example-basic-single" id="filter_supplier" name="filter_supplier">
                              <option value="">ALL</option>
                              <?php foreach ($data['supplier_list'] as $row) { ?>
                                <option value="<?php echo $row->supplier_name; ?>"><?php echo $row->supplier_name; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <?php } ?>

                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Kategori</label>
                          <div class="col-md-12 p-0">
                            <select class="form-control input-full js-example-basic-single" id="filter_category" name="filter_category">
                              <option value="">ALL</option>
                              <?php foreach ($data['category_list'] as $row) { ?>
                                <option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>  
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Brand</label>
                          <div class="col-md-12 p-0">
                            <select class="form-control input-full js-example-basic-single" id="filter_brand" name="filter_brand">
                              <option value="">ALL</option>
                              <?php foreach ($data['brand_list'] as $row) { ?>
                                <option value="<?php echo $row->brand_id; ?>"><?php echo $row->brand_name; ?></option>  
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Product Status</label>
                          <div class="col-md-12 p-0">
                            <select class="form-control input-full js-example-basic-single" id="filter_product_status" name="filter_product_status">
                              <option value="">ALL</option>
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                              <option value="Discontinue">Discontinue</option>
                              
                            </select>
                          </div>
                        </div>

                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">In Transit</label>
                          <div class="col-md-12 p-0">
                            <select class="form-control input-full js-example-basic-single" id="filter_in_transit" name="filter_in_transit">
                              <option value="">ALL</option>
                              <option value="1">None</option>
                              <option value="2">In Transit</option>
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                        <button type="button" id="filter" class="btn btn-warning" ><i class="fas fa-search"></i> Cari</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if($data['check_role_product'][0]['access_mass_edit'] == 'Y'){ ?>
                <div class="btn-group dropdown">
                  <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown"><span class="btn-label"><i class="fas fa-file-excel"></i></span> Excell</button>
                  <ul class="dropdown-menu dropdown-menu-end" role="menu">
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>Masterdata/export_sample_import_product"><i class="fas fa-download me-2 text-muted"></i>Download Template</a>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalImportExcell"><i class="fas fa-file-import me-2 text-muted"></i>Import Excell</a>
                    </li>
                  </ul>
                </div>
                <a href="<?php echo base_url(); ?>Masterdata/stock_mass_update" class="btn btn-outline-dark"><span class="btn-label"><i class="fas fa-file-pen"></i></span> Mass Edit Product</a>
                <?php } ?>
                <button class="btn btn-outline-info" id="reload" type="button"><span class="btn-label"><i class="fas fa-sync"></i></span> Reload</button>
                <?php if($data['check_auth']['check_access'][0]->add == 'N'){ ?>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl" disabled="disabled"><span class="btn-label"><i class="fa fa-plus"></i></span> Tambah Produk</button>
                <?php }else{ ?>
                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl"><span class="btn-label"><i class="fa fa-plus"></i></span> Tambah Produk</button>
               <?php } ?>
                </div>
               <div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="pm-modal-head">
                      <div class="bm-icon"><i class="fas fa-cube"></i></div>
                      <div>
                        <h5 id="exampleModalLabel">Tambah <span>Produk</span></h5>
                        <p>Tambahkan detail produk baru ke dalam sistem.</p>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form name="save_product_form" id="save_product_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>Masterdata/save_product" method="post">
                      <div class="pm-modal-body">
                        <div class="row">
                          <div class="col-md-4 pm-col-side">

                            <div class="pm-photo-card">
                              <div class="pm-photo-head">Foto Produk</div>
                              <div class="proof">
                                <div class="imgArea" data-title="">
                                  <input type="file" name="screenshoot" id="screenshoot" hidden accept="image/*" />
                                  <i class="fa-solid fa-cloud-arrow-up"></i>
                                  <h4>Upload foto produk</h4>
                                  <p>PNG, JPG, JPEG (Maks <span>2MB</span>)</p>
                                </div>
                                <button class="selectImage" type="button"><i class="fas fa-upload"></i> Pilih Gambar</button>
                              </div>
                            </div>

                            <!-- kept hidden exactly as before, field unchanged -->
                            <div class="form-group form-inline" style="display:none;">
                              <label for="inlineinput" class="col-md-3 col-form-label">Catatan Penting</label>
                              <div class="col-md-12 p-0">
                                <textarea class="form-control" id="product_purchase_record" name="product_purchase_record" rows="4"></textarea>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-8">
                            <div class="pm-col-fields">

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-red"><i class="fas fa-hashtag"></i></span> Kode Produk</label>
                                <input type="text" class="form-control input-full" name="product_code" id="product_code" value="Auto" readonly>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-pink"><i class="fas fa-tag"></i></span> Nama Produk</label>
                                <input type="text" class="form-control input-full" name="product_name" id="product_name" placeholder="Nama Produk">
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-amber"><i class="fas fa-list"></i></span> Kategori</label>
                                <select class="form-control input-full js-example-basic-single" id="product_category" name="product_category">
                                  <option>-- Pilih Kategori --</option>
                                  <?php foreach ($data['category_list'] as $row) { ?>
                                    <option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-green"><i class="fas fa-cube"></i></span> Brand</label>
                                <select class="form-control input-full js-example-basic-single" id="product_brand" name="product_brand">
                                  <option>-- Pilih Brand --</option>
                                  <?php foreach ($data['brand_list'] as $row) { ?>
                                    <option value="<?php echo $row->brand_id; ?>"><?php echo $row->brand_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-blue"><i class="fas fa-building"></i></span> Supplier</label>
                                <select class=" form-control input-full js-example-basic-multiple js-states" name="product_supplier[]" id="product_supplier" multiple="multiple">
                                  <option value="">-- Pilih Supplier --</option>
                                  <?php foreach ($data['supplier_list'] as $row) { ?>
                                    <option value="<?php echo $row->supplier_id; ?>"><?php echo $row->supplier_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-indigo"><i class="fas fa-file-alt"></i></span> Item Supplier</label>
                                <textarea class="form-control" id="product_item_supplier" name="product_item_supplier" rows="3"></textarea>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-purple"><i class="fas fa-box"></i></span> Satuan Dasar</label>
                                <select class="form-control input-full js-example-basic-single" id="product_unit" name="product_unit">
                                  <option value="">-- Pilih Satuan Dasar --</option>
                                  <?php foreach ($data['unit_list'] as $row) { ?>
                                    <option value="<?php echo $row->unit_id; ?>"><?php echo $row->unit_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-amber"><i class="fas fa-folder"></i></span> Golongan Produk</label>
                                <select class="form-select form-control" name="product_tax" id="product_tax">
                                  <option value="PPN">Barang Kena Pajak</option>
                                  <option value="NON PPN">Barang Tidak Kena Pajak</option>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-cyan"><i class="fas fa-shapes"></i></span> Jenis Produk</label>
                                <select class="form-select form-control" id="product_type" name="product_type">
                                  <option value="N">Produk</option>
                                  <option value="Y">Paket</option>
                                </select>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-indigo"><i class="fas fa-warehouse"></i></span> Min Stok</label>
                                <input type="number" class="form-control input-full" id="product_min_stock" name="product_min_stock" placeholder="Min Stok">
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-orange"><i class="fas fa-cart-shopping"></i></span> Min Order</label>
                                <textarea class="form-control" id="product_min_order" name="product_min_order" rows="3"></textarea>
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-cyan"><i class="fas fa-weight-hanging"></i></span> Berat (Gram)</label>
                                <input type="number" class="form-control input-full" id="product_weight" name="product_weight" placeholder="Berat">
                              </div>

                              <div class="pf-field">
                                <label class="pf-label"><span class="pf-icon pf-blue"><i class="fas fa-map-marker-alt"></i></span> Lokasi</label>
                                <textarea class="form-control" id="product_location" name="product_location" rows="3"></textarea>
                              </div>

                              <div class="pf-field pf-full">
                                <label class="pf-label"><span class="pf-icon pf-gray"><i class="fas fa-align-left"></i></span> Deskripsi Produk</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
                              </div>

                              <div class="pf-field pf-full">
                                <label class="pf-label"><span class="pf-icon pf-gray"><i class="fas fa-key"></i></span> Kata Kunci</label>
                                <textarea class="form-control" id="product_search_key" name="product_search_key" rows="3"></textarea>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="pm-modal-footer d-flex justify-content-end">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade bd-example-modal-xl editmodal" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                  <div class="pm-modal-head">
                    <div class="bm-icon"><i class="fas fa-cube"></i></div>
                    <div>
                      <h5 id="exampleModaledit">Edit <span>Produk</span></h5>
                      <p>Perbarui informasi detail produk pada sistem.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form name="edit_product_form" id="edit_product_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>Masterdata/edit_product" method="post">
                    <div class="pm-modal-body">
                      <div class="row">
                        <div class="col-md-4 pm-col-side">

                          <div class="pm-photo-card">
                            <div class="pm-photo-head">Foto Produk</div>
                            <div class="proof">
                              <div class="imgArea_edit" data-title="">
                                <input type="text" name="reset_image" id="reset_image" value="">
                                <input type="file" name="screenshoot_edit" id="screenshoot_edit" hidden accept="image/*" />
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <h4>Upload foto produk</h4>
                                <p>PNG, JPG, JPEG (Maks <span>2MB</span>)</p>
                                <div id="active-image"></div>
                              </div>
                              <button class="selectImage_edit" type="button"><i class="fas fa-upload"></i> Pilih Gambar</button>
                              <button class="removeImage_edit" type="button"><i class="fas fa-trash-alt"></i> Hapus Gambar</button>
                            </div>
                          </div>

                          <div class="pf-card">
                            <div class="pf-card-head"><i class="fas fa-toggle-on"></i> Status Produk</div>
                            <select class="form-control input-full js-example-basic-single" id="product_status_edit" name="product_status_edit">
                              <option>-- Pilih Status --</option>
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                              <option value="Discontinue">Discontinue</option>
                            </select>
                          </div>

                          <div class="pf-card pf-note">
                            <div class="pf-card-head"><i class="fas fa-file-alt"></i> Catatan Penting</div>
                            <textarea class="form-control" id="product_note_edit" name="product_note_edit" rows="16"></textarea>
                          </div>

                        </div>
                        <div class="col-md-8">
                          <div class="pm-col-fields">

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-red"><i class="fas fa-hashtag"></i></span> Kode Produk</label>
                              <input type="hidden" class="form-control input-full" name="product_id_edit" id="product_id_edit" value="Auto" readonly>
                              <input type="text" class="form-control input-full" name="product_code_edit" id="product_code_edit" value="Auto" readonly>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-pink"><i class="fas fa-tag"></i></span> Nama Produk</label>
                              <input type="text" class="form-control input-full" name="product_name_edit" id="product_name_edit" placeholder="Nama Produk">
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-amber"><i class="fas fa-list"></i></span> Kategori</label>
                              <select class="form-control input-full js-example-basic-single" id="product_category_edit" name="product_category_edit">
                                <option>-- Pilih Kategori --</option>
                                <?php foreach ($data['category_list'] as $row) { ?>
                                  <option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-green"><i class="fas fa-cube"></i></span> Brand</label>
                              <select class="form-control input-full js-example-basic-single" id="product_brand_edit" name="product_brand_edit">
                                <option>-- Pilih Brand --</option>
                                <?php foreach ($data['brand_list'] as $row) { ?>
                                  <option value="<?php echo $row->brand_id; ?>"><?php echo $row->brand_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-blue"><i class="fas fa-building"></i></span> Supplier</label>
                              <select class=" form-control input-full js-example-basic-multiple js-states" name="product_supplier_edit[]" id="product_supplier_edit" multiple="multiple">
                                <option value="">-- Pilih Supplier --</option>
                                <?php foreach ($data['supplier_list'] as $row) { ?>
                                  <option value="<?php echo $row->supplier_id; ?>"><?php echo $row->supplier_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-indigo"><i class="fas fa-file-alt"></i></span> Item Supplier</label>
                              <textarea class="form-control" id="product_item_supplier_edit" name="product_item_supplier_edit" rows="3"></textarea>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-purple"><i class="fas fa-box"></i></span> Satuan Dasar</label>
                              <select class="form-control input-full js-example-basic-single" id="product_unit_edit" name="product_unit_edit">
                                <option value="">-- Pilih Satuan Dasar --</option>
                                <?php foreach ($data['unit_list'] as $row) { ?>
                                  <option value="<?php echo $row->unit_id; ?>"><?php echo $row->unit_name; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-amber"><i class="fas fa-folder"></i></span> Golongan Produk</label>
                              <select class="form-select form-control" name="product_tax_edit" id="product_tax_edit">
                                <option value="PPN">Barang Kena Pajak</option>
                                <option value="NON PPN">Barang Tidak Kena Pajak</option>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-cyan"><i class="fas fa-shapes"></i></span> Jenis Produk</label>
                              <select class="form-select form-control" id="product_type_edit" name="product_type_edit">
                                <option value="N">Produk</option>
                                <option value="Y">Paket</option>
                              </select>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-indigo"><i class="fas fa-warehouse"></i></span> Min Stok</label>
                              <input type="number" class="form-control input-full" id="product_min_stock_edit" name="product_min_stock_edit" placeholder="Min Stock">
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-orange"><i class="fas fa-cart-shopping"></i></span> Min Order</label>
                              <textarea class="form-control" id="product_min_order_edit" name="product_min_order_edit" rows="3"></textarea>
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-cyan"><i class="fas fa-weight-hanging"></i></span> Berat (Gram)</label>
                              <input type="number" class="form-control input-full" id="product_weight_edit" name="product_weight_edit" placeholder="Berat">
                            </div>

                            <div class="pf-field">
                              <label class="pf-label"><span class="pf-icon pf-blue"><i class="fas fa-map-marker-alt"></i></span> Lokasi</label>
                              <textarea class="form-control" id="product_location_edit" name="product_location_edit" rows="3"></textarea>
                            </div>

                            <div class="pf-field pf-full">
                              <label class="pf-label"><span class="pf-icon pf-gray"><i class="fas fa-align-left"></i></span> Deskripsi Produk</label>
                              <textarea class="form-control" id="product_description_edit" name="product_description_edit" rows="3"></textarea>
                            </div>

                            <!-- kept hidden exactly as before, field unchanged -->
                            <div class="form-group form-inline pf-full" style="display: none;">
                              <label for="inlineinput" class="col-md-3 col-form-label">Catatan Penting</label>
                              <div class="col-md-12 p-0">
                                <textarea class="form-control" id="product_purchase_record_edit" name="product_purchase_record_edit" rows="4"></textarea>
                              </div>
                            </div>

                            <div class="pf-field pf-full">
                              <label class="pf-label"><span class="pf-icon pf-gray"><i class="fas fa-key"></i></span> Kata Kunci</label>
                              <textarea class="form-control" id="product_search_key_edit" name="product_search_key_edit" rows="3"></textarea>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="pm-modal-footer d-flex justify-content-end">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="product-list" class="display table table-striped table-hover">
          <thead>
            <tr>
              <th width="30%">Nama Produk</th>
              <th>Satuan</th>
              <th>Brand</th>
              <th>Kategori</th>
              <th>Harga Jual</th>
              <th>Supplier</th>
              <th>Status</th>
              <th>In Transit</th>
              <th>Paket</th>
              <th>PPN</th>
              <th width="20%;">Gambar</th>
              <th width="10%;">Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>


<!-- Modal Import Excell -->
<div class="modal fade" id="modalImportExcell" tabindex="-1" role="dialog" aria-labelledby="modalImportExcellLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalImportExcellLabel">Import Excell Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="import_excell_form" enctype="multipart/form-data">
        <div class="modal-body">
          <p>Download terlebih dahulu template sebelum melakukan import.
            <a href="<?php echo base_url(); ?>Masterdata/export_sample_import_product" class="text-success fw-bold"><i class="fas fa-file-excel"></i> Download Template</a>
          </p>
          <div class="form-group">
            <label class="col-form-label">Pilih File Excel (.xlsx)</label>
            <input type="file" class="form-control" id="import_excell_file" accept=".xlsx,.xls">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
          <button type="submit" id="btn_import_excell" class="btn btn-success"><i class="fas fa-upload"></i> Import</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>  


  new bootstrap.Modal(document.getElementById('myModal'), {backdrop: 'static', keyboard: false})  
  new bootstrap.Modal(document.getElementById('exampleModaledit'), {backdrop: 'static', keyboard: false})  
    
  $(document ).ready(function() {
    table_product_list();
    if (window.performance) {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Masterdata/delete_filter_product",
        dataType: "json",
        data: {},
        success : function(data){
          if (data.code == "200"){
            console.log('clear');
          }
        }
      });
    }
  });

  $('#exampleModaledit').on('hidden.bs.modal', function () {
      location.reload();
  });

  function table_product_list(){
    $('#product-list').DataTable({
      serverSide: true,
      search: true,
      processing: true,
      ordering: false,
      ajax: {
        url: '<?php echo base_url(); ?>Masterdata/product_list',
        type: 'POST',
        data: function (d) {
          d.filter_supplier = $('#filter_supplier').val();
          d.filter_category = $('#filter_category').val();
          d.filter_brand = $('#filter_brand').val();
          d.filter_product_status = $('#filter_product_status').val();
          d.filter_in_transit = $('#filter_in_transit').val();
        }
      },
      columns:
      [
        {data: 0},
        {data: 1},
        {data: 2},
        {data: 3},
        {data: 4},
        {data: 5},
        {data: 6},
        {data: 7},
        {data: 8},
        {data: 9},
        {data: 10},
        {data: 11}
      ],
      language: {
        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
        infoEmpty: 'Tidak ada data',
        infoFiltered: '',
        zeroRecords: 'Produk tidak ditemukan',
        processing: 'Memuat data...',
        paginate: {
          previous: '<i class="fas fa-chevron-left"></i>',
          next: '<i class="fas fa-chevron-right"></i>'
        }
      }
    });
  }

  function setprice(id){
    var url = "<?php echo base_url(); ?>Masterdata/settingproduct?id="+id;
    window.open(url, '_blank').focus();
    //window.location.href = "<?php echo base_url(); ?>Masterdata/settingproduct?id="+id;
  }

  $('#save_product_form').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var product_name = $("#product_name").val();
    var product_category = $("#product_category").val();
    var product_brand = $("#product_brand").val();
    var product_supplier = $("#product_supplier").val();
    var product_unit = $("#product_unit").val();
    var product_supplier_text    = $('#product_supplier option:selected').toArray().map(item => item.text).join();
    formData.append('product_supplier_text', product_supplier_text);


    if(product_name == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nama Produk Harus Di Isi',
      })
    }else if(product_category == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Kategori Harus Di Isi',
      })
    }else if(product_brand == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Brand Harus Di Isi',
      })
    }else if(product_supplier == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Supplier Harus Di Isi',
      })
    }else if(product_unit == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Satuan Harus Di Isi',
      })
    }else{
      $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){          
          window.location.href = "<?php echo base_url(); ?>Masterdata/product";
          Swal.fire('Saved!', '', 'success');
        }
      });
    }
  }));

  $('#filter').click(function(e){
    e.preventDefault();
    var filter_supplier           = $("#filter_supplier option:selected").text();
    var filter_category           = $("#filter_category").val();
    var filter_brand              = $("#filter_brand").val();
    var filter_product_status     = $("#filter_product_status").val();
    var filter_in_transit         = $("#filter_in_transit").val();

    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/insert_filter_product",
      dataType: "json",
      data: {filter_supplier:filter_supplier, filter_category:filter_category, filter_brand:filter_brand, filter_product_status:filter_product_status, filter_in_transit:filter_in_transit},
      success : function(data){
        if (data.code == "200"){
          $('#product-list').DataTable().ajax.reload();
          $('#myModalsearch').modal('hide');
        }
      }
    });
  });

  $('#edit_product_form').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var product_name = $("#product_name_edit").val();
    var product_category = $("#product_category_edit").val();
    var product_brand = $("#product_brand_edit").val();
    var product_supplier = $("#product_supplier_edit").val();
    var product_unit = $("#product_unit_edit").val();
    var product_supplier_text    = $('#product_supplier_edit option:selected').toArray().map(item => item.text).join();
    formData.append('product_supplier_text_edit', product_supplier_text);


    if(product_name == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nama Produk Harus Di Isi',
      })
    }else if(product_category == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Kategori Harus Di Isi',
      })
    }else if(product_brand == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Brand Harus Di Isi',
      })
    }else if(product_supplier == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Supplier Harus Di Isi',
      })
    }else if(product_unit == ''){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Satuan Harus Di Isi',
      })
    }else{
      $.ajax({
        type:'POST',
        url: $(this).attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){          
          window.location.href = "<?php echo base_url(); ?>Masterdata/product";
          Swal.fire('Saved!', '', 'success');
        }
      });
    }
  }));

  /* image uplaod */
  const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon",
    "image/avif",
  ];
  function validFileType(file) {
    return fileTypes.includes(file.type);
  }

  let inputHidden = document.querySelector("#screenshoot");
  let triggerInput = document.querySelector(".selectImage");
  let imgArea = document.querySelector(".imgArea");

  triggerInput.addEventListener("click",function(){
    inputHidden.click();
  })

  inputHidden.addEventListener("change",function(e){
    let image = e.target.files[0];
    if(!validFileType(image)){
      alert("invalid file type");
      return;
    }
    if(image.size > 2097152){
      alert("image size must be less than 2MB");
      return;
    }else{
      const reader = new FileReader();
      reader.addEventListener("load",function(){
        const allImgs = document.querySelectorAll(".imgArea img");
        allImgs.forEach((img) => {
          img.remove();
        })
        const imgUrl = reader.result;
        const img = document.createElement("img");
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add("active");
        imgArea.dataset.title = image.name;
      })
      reader.readAsDataURL(image);
    }
  })
  /* END IMAGE UPLOAD */


// Edit Image //

  let inputHidden_edit = document.querySelector("#screenshoot_edit");
  let triggerInput_edit = document.querySelector(".selectImage_edit");
  let imgArea_edit = document.querySelector(".imgArea_edit");

  triggerInput_edit.addEventListener("click",function(){
    inputHidden_edit.click();
  })

  inputHidden_edit.addEventListener("change",function(e){
    let image = e.target.files[0];
    if(!validFileType(image)){
      alert("invalid file type");
      return;
    }
    if(image.size > 2097152){
      alert("image size must be less than 2MB");
      return;
    }else{
      const reader = new FileReader();
      reader.addEventListener("load",function(){
        const allImgs = document.querySelectorAll(".imgArea_edit img");
        allImgs.forEach((img) => {
          img.remove();
        })
        const imgUrl = reader.result;
        const img = document.createElement("img");
        img.src = imgUrl;
        imgArea_edit.appendChild(img);
        imgArea_edit.classList.add("active");
        imgArea_edit.dataset.title = image.name;
      })
      reader.readAsDataURL(image);
    }
  })

  const removeImageButton_edit = document.querySelector('.removeImage_edit');
  if (removeImageButton_edit) {
    removeImageButton_edit.addEventListener('click', function () {
      const allImgs = document.querySelectorAll('.imgArea_edit img');
      allImgs.forEach((img) => img.remove());
      const defaultImg = document.createElement("img");
      defaultImg.src = '<?php echo base_url(); ?>assets/products/default.png';
      imgArea_edit.appendChild(defaultImg);
      imgArea_edit.classList.add('active');
      imgArea_edit.dataset.title = 'default.png';
              $("#reset_image").val(1);
    });
  }

// End Edit Image //


  $('#exampleModaledit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id   = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-title').text('Edit product ' + name)
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/get_edit_product",
      dataType: "json",
      data: {id:id},
      success : function(data){
        if (data.code == "200"){
          document.getElementById("active-image").innerHTML = "";
          let row = data.result[0];
          modal.find('#product_id_edit').val(id)
          modal.find('#product_code_edit').val(row.product_code)
          modal.find('#product_name_edit').val(row.product_name)
          modal.find('#product_category_edit').val(row.category_id).trigger('change')
          modal.find('#product_brand_edit').val(row.brand_id).trigger('change')
          modal.find('#product_unit_edit').val(row.unit_id).trigger('change')
          const product_supplier_id_tag = row.product_supplier_id_tag.split(",")
          modal.find('#product_supplier_edit').val(product_supplier_id_tag).trigger('change')
          modal.find('#product_item_supplier_edit').val(row.product_supplier_name)
          modal.find('#product_tax_edit').val(row.is_ppn)
          modal.find('#product_type_edit').val(row.is_package)
          modal.find('#product_min_stock_edit').val(row.product_min_stock)
          modal.find('#product_min_order_edit').val(row.product_min_order)
          modal.find('#product_weight_edit').val(row.product_weight)
          modal.find('#product_location_edit').val(row.product_location)
          modal.find('#product_description_edit').val(row.product_desc)
          modal.find('#product_purchase_record_edit').val(row.product_purchase_record)
          modal.find('#product_search_key_edit').val(row.product_key)
          modal.find('#product_status_edit').val(row.product_status).trigger('change')
          modal.find('#product_note_edit').val(row.product_note.replace(/<br\s*\/?>/gi, "\n"))


          var elem = document.createElement("img");
          document.getElementById("active-image").appendChild(elem);
          elem.onerror = function () { this.onerror = null; this.src = '<?php echo base_url(); ?>assets/products/default.png'; };
          elem.src = '<?php echo base_url(); ?>assets/products/'+(row.product_image || 'default.png');

          // populate timeline-note with product notes returned from server
          var timeline = document.getElementById('timeline-note');
          timeline.innerHTML = '';
          if (data.detail && data.detail.length > 0) {
            data.detail.forEach(function(n) {
              var wrap = document.createElement('div');
              wrap.id = 'product-note-' + (n.ms_product_note_id || n.id || '');
              wrap.className = 'product-note-item';
              var noteId = n.ms_product_note_id || n.id || '';
              wrap.innerHTML = '<div class="d-flex">' +
                '<div class="flex-1 ms-3 pt-1">' +
                '<span class="text-muted">' + n.product_desc + '</span>' +
                '</div>' +
                '<div class="float-end pt-1">' +
                '<small class="text-muted">' +
                '<button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn" onclick="deleteProductNote(\'' + noteId + '\')"><i class="fas fa-trash-alt sizing-fa"></i></button>' +
                '</small>' +
                '</div>' +
                '</div>' +
                '<div class="separator-dashed"></div>';
              timeline.appendChild(wrap);
            });
          } else {
            timeline.innerHTML = '<div class="text-muted">No notes</div>';
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

  function deletes(id)
  {
    Swal.fire({
      title: 'Konfirmasi?',
      text: "Apakah Anda Yakin Menghapus Data Produk ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>Masterdata/delete_product",
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
  }

  function deleteProductNote(noteId){
    if(!noteId) return;
    Swal.fire({
      title: 'Konfirmasi?',
      text: "Apakah Anda Yakin Menghapus Catatan Produk ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>Masterdata/delete_product_note",
          dataType: "json",
          data: {note_id:noteId},
          success : function(data){
            if (data.code == "200"){
              var el = document.getElementById('product-note-'+noteId);
              if(el) el.remove();
              Swal.fire('Deleted!', '', 'success'); 
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.msg || data.result,
              })
            }
          }
        });
      }
    })
  }

  $(".delete").click(function (e) {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");

  });


  $('#reload').click(function(e){
    e.preventDefault();
    location.reload();
  });
  
    // Import Excel
  $('#import_excell_form').on('submit', function(e){
    e.preventDefault();
    var file = $('#import_excell_file')[0].files[0];
    if(!file){
      Swal.fire({ icon: 'error', title: 'Oops...', text: 'Pilih file Excel terlebih dahulu.' });
      return;
    }
    var formData = new FormData();
    formData.append('file', file);
    $('#btn_import_excell').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Importing...');
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>Masterdata/import_product_excell',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data){
        var res = typeof data === 'string' ? JSON.parse(data) : data;
        $('#btn_import_excell').prop('disabled', false).html('<i class="fas fa-upload"></i> Import');
        if(res.code == 200){
          $('#modalImportExcell').modal('hide');
          $('#import_excell_file').val('');
          Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.result }).then(function(){ console.log('reload'); });
        } else {
          Swal.fire({ icon: 'error', title: 'Oops...', text: res.result });
        }
      },
      error: function(){
        $('#btn_import_excell').prop('disabled', false).html('<i class="fas fa-upload"></i> Import');
        Swal.fire({ icon: 'error', title: 'Oops...', text: 'Terjadi kesalahan saat mengupload file.' });
      }
    });
  });

</script>