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

.brand-table-panel{background:var(--white);border-radius:16px;box-shadow:var(--card-sh);overflow:hidden;}
.brand-table{width:100%;margin:0;}
.brand-table thead th{background:#fafbfd;color:var(--slate);font-size:.76rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;padding:.9rem 1.2rem;border-bottom:1px solid var(--border);white-space:nowrap;}
.brand-table tbody td{padding:.85rem 1.2rem;font-size:.9rem;color:var(--dark);border-bottom:1px solid var(--border);vertical-align:middle;}
.brand-table tbody tr:last-child td{border-bottom:none;}
.brand-table tbody tr:hover{background:#fbfbfd;}
.bname{font-weight:700;}
.bcell-ellipsis{max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.status-pill{display:inline-flex;align-items:center;font-weight:600;font-size:.85rem;}
.status-dot{width:7px;height:7px;border-radius:50%;display:inline-block;margin-right:.4rem;}
.status-active{color:var(--green);}
.status-active .status-dot{background:var(--green);}
.status-inactive{color:var(--red);}
.status-inactive .status-dot{background:var(--red);}
.act-btn{width:32px;height:32px;border-radius:8px;border:none;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;color:#fff;margin-right:.35rem;}
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
.bm-label{font-size:.85rem;font-weight:700;color:var(--dark);margin-bottom:.4rem;display:block;}
.bm-input-wrap{position:relative;margin-bottom:1.1rem;}
.bm-input-wrap i{position:absolute;left:14px;top:14px;color:#9aa0a6;font-size:.9rem;}
.bm-input-wrap .form-control{padding-left:40px;border-radius:10px;border:1.5px solid var(--border);font-size:.9rem;min-height:46px;}
.bm-input-wrap .form-control:focus{border-color:var(--red);box-shadow:0 0 0 3px rgba(210,31,44,.1);}
.bm-count{text-align:right;font-size:.76rem;color:var(--slate);margin-top:-.9rem;margin-bottom:.6rem;}
.modal-footer{border-top:1px solid var(--border);padding:1rem 1.5rem;gap:.6rem;}
.btn-cancel{background:#fff;border:1.5px solid var(--border);color:var(--dark);border-radius:10px;padding:.55rem 1.2rem;font-weight:600;font-size:.88rem;}
.btn-save-brand{background:linear-gradient(135deg,var(--red),var(--red-dk));border:none;color:#fff;border-radius:10px;padding:.55rem 1.3rem;font-weight:700;font-size:.88rem;box-shadow:0 4px 12px rgba(210,31,44,.3);}
.btn-save-brand:hover{color:#fff;opacity:.92;}
</style>

<?php
  $stats = $data['stats'];
  $can_add    = $data['check_auth']['check_access'][0]->add == 'Y';
  $can_edit   = $data['check_auth']['check_access'][0]->edit == 'Y';
  $can_delete = $data['check_auth']['check_access'][0]->delete == 'Y';
?>

<div class="container">
  <div class="page-inner" style="padding-top:1.4rem;">

    <!-- HERO -->
    <div class="brand-hero">
      <div>
        <h2>Daftar <span>Ekspedisi</span></h2>
        <p>Kelola data ekspedisi untuk kebutuhan pengiriman produk Anda.</p>
      </div>
      <div class="brand-hero-right">
        <div class="brand-hero-logo"><img src="<?php echo base_url(); ?>assets/logo.png" alt="Pionir"></div>
      </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar-row">
      <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" id="ekspedisiSearch" placeholder="Cari nama ekspedisi...">
      </div>
      <button type="button" class="btn-add-brand" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" <?php echo $can_add ? '' : 'disabled'; ?>>
        <i class="fa fa-plus"></i> Tambah Ekspedisi
      </button>

      <!-- Tambah Ekspedisi -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="brand-modal-head">
              <div class="bm-icon"><i class="fas fa-shipping-fast"></i></div>
              <div>
                <h5 id="exampleModalLabel">Tambah Ekspedisi</h5>
                <p>Tambahkan data ekspedisi baru</p>
              </div>
              <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label class="bm-label">Nama Ekspedisi <span style="color:var(--red);">*</span></label>
              <div class="bm-input-wrap">
                <i class="fas fa-shipping-fast"></i>
                <input type="text" class="form-control" id="expedisi_name" placeholder="Masukkan nama ekspedisi...">
              </div>

              <label class="bm-label">Alamat</label>
              <div class="bm-input-wrap">
                <i class="fas fa-map-marker-alt"></i>
                <textarea class="form-control" id="expedisi_address" rows="3" maxlength="255" placeholder="Masukkan alamat ekspedisi..."></textarea>
              </div>
              <div class="bm-count"><span id="expedisi_address_count">0</span>/255</div>

              <label class="bm-label">Telp</label>
              <div class="bm-input-wrap">
                <i class="fas fa-phone"></i>
                <input type="text" class="form-control" id="expedisi_phone" placeholder="Masukkan nomor telp...">
              </div>

              <label class="bm-label">Deskripsi</label>
              <div class="bm-input-wrap">
                <i class="fas fa-file-alt"></i>
                <textarea class="form-control" id="expedisi_desc" rows="3" maxlength="255" placeholder="Masukkan deskripsi ekspedisi..."></textarea>
              </div>
              <div class="bm-count"><span id="expedisi_desc_count">0</span>/255</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <button type="button" id="btnsave" class="btn-save-brand"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Tambah Ekspedisi -->

      <!-- Edit Ekspedisi -->
      <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModaleditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="brand-modal-head">
              <div class="bm-icon"><i class="fas fa-pen"></i></div>
              <div>
                <h5 id="exampleModaledit">Edit Ekspedisi</h5>
                <p>Perbarui data ekspedisi</p>
              </div>
              <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label class="bm-label">Nama Ekspedisi <span style="color:var(--red);">*</span></label>
              <div class="bm-input-wrap">
                <i class="fas fa-shipping-fast"></i>
                <input type="hidden" id="expedisi_id_edit">
                <input type="text" class="form-control" id="expedisi_name_edit">
              </div>

              <label class="bm-label">Alamat</label>
              <div class="bm-input-wrap">
                <i class="fas fa-map-marker-alt"></i>
                <textarea class="form-control" id="expedisi_address_edit" rows="3" maxlength="255"></textarea>
              </div>
              <div class="bm-count"><span id="expedisi_address_edit_count">0</span>/255</div>

              <label class="bm-label">Telp</label>
              <div class="bm-input-wrap">
                <i class="fas fa-phone"></i>
                <input type="text" class="form-control" id="expedisi_phone_edit">
              </div>

              <label class="bm-label">Deskripsi</label>
              <div class="bm-input-wrap">
                <i class="fas fa-file-alt"></i>
                <textarea class="form-control" id="expedisi_desc_edit" rows="3" maxlength="255"></textarea>
              </div>
              <div class="bm-count"><span id="expedisi_desc_edit_count">0</span>/255</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-cancel" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              <button type="button" id="btnedit" class="btn-save-brand"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Edit Ekspedisi -->
    </div>

    <!-- TABLE -->
    <div class="brand-table-panel">
      <div class="table-responsive">
        <table id="ekspedisi-table" class="brand-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Ekspedisi</th>
              <th>Alamat</th>
              <th>Telp</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($data['ekspedisi_list'] as $row) { if ($row->is_active != 'Y') continue; ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td class="bname"><?php echo htmlspecialchars($row->ekspedisi_name); ?></td>
                <td class="bcell-ellipsis"><?php echo $row->ekspedisi_address !== '' ? htmlspecialchars($row->ekspedisi_address) : '-'; ?></td>
                <td><?php echo $row->ekspedisi_phone !== '' ? htmlspecialchars($row->ekspedisi_phone) : '-'; ?></td>
                <td class="bcell-ellipsis"><?php echo $row->ekspedisi_desc !== '' ? htmlspecialchars($row->ekspedisi_desc) : '-'; ?></td>
                <td>
                  <button type="button" class="act-btn act-edit edit" data-id="<?php echo $row->ekspedisi_id; ?>" data-name="<?php echo htmlspecialchars($row->ekspedisi_name); ?>" data-address="<?php echo htmlspecialchars($row->ekspedisi_address); ?>" data-phone="<?php echo htmlspecialchars($row->ekspedisi_phone); ?>" data-desc="<?php echo htmlspecialchars($row->ekspedisi_desc); ?>" data-bs-toggle="modal" data-bs-target="#exampleModaledit" <?php echo $can_edit ? '' : 'disabled'; ?>><i class="far fa-edit"></i></button>
                  <button type="button" class="act-btn act-delete delete" data-id="<?php echo $row->ekspedisi_id; ?>" data-name="<?php echo htmlspecialchars($row->ekspedisi_name); ?>" <?php echo $can_delete ? '' : 'disabled'; ?>><i class="fas fa-trash-alt"></i></button>
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
  var ekspedisiTable = $('#ekspedisi-table').DataTable({
    order: [[1, 'asc']],
    columnDefs: [
      { orderable: false, searchable: false, targets: [0, 5] }
    ],
    dom: 'rt<"bottom"ip>',
    language: {
      info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
      infoEmpty: 'Tidak ada data',
      infoFiltered: '',
      zeroRecords: 'Ekspedisi tidak ditemukan',
      paginate: {
        previous: '<i class="fas fa-chevron-left"></i>',
        next: '<i class="fas fa-chevron-right"></i>'
      }
    }
  });

  $('#ekspedisiSearch').on('keyup', function () {
    ekspedisiTable.search(this.value).draw();
  });

  new bootstrap.Modal(document.getElementById('exampleModal'), {backdrop: 'static', keyboard: false})
  new bootstrap.Modal(document.getElementById('exampleModaledit'), {backdrop: 'static', keyboard: false})

  $('#expedisi_address').on('input', function () {
    $('#expedisi_address_count').text($(this).val().length);
  });
  $('#expedisi_address_edit').on('input', function () {
    $('#expedisi_address_edit_count').text($(this).val().length);
  });
  $('#expedisi_desc').on('input', function () {
    $('#expedisi_desc_count').text($(this).val().length);
  });
  $('#expedisi_desc_edit').on('input', function () {
    $('#expedisi_desc_edit_count').text($(this).val().length);
  });

  $('#btnsave').click(function(e){
    e.preventDefault();
    var expedisi_name     = $("#expedisi_name").val();
    var expedisi_address  = $("#expedisi_address").val();
    var expedisi_phone    = $("#expedisi_phone").val();
    var expedisi_desc     = $("#expedisi_desc").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/save_ekspedisi",
      dataType: "json",
      data: {expedisi_name:expedisi_name, expedisi_address:expedisi_address, expedisi_phone:expedisi_phone, expedisi_desc:expedisi_desc},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>Masterdata/ekspedisi";
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
    var expedisi_id       = $("#expedisi_id_edit").val();
    var expedisi_name     = $("#expedisi_name_edit").val();
    var expedisi_address  = $("#expedisi_address_edit").val();
    var expedisi_phone    = $("#expedisi_phone_edit").val();
    var expedisi_desc     = $("#expedisi_desc_edit").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Masterdata/edit_ekspedisi",
      dataType: "json",
      data: {expedisi_id:expedisi_id, expedisi_name:expedisi_name, expedisi_address:expedisi_address, expedisi_phone:expedisi_phone, expedisi_desc:expedisi_desc},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>Masterdata/ekspedisi";
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
          url: "<?php echo base_url(); ?>Masterdata/delete_ekspedisi",
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

  $('#exampleModaledit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id   = button.data('id')
    var expedisi_name_edit      = button.data('name')
    var expedisi_address_edit   = button.data('address')
    var expedisi_phone_edit     = button.data('phone')
    var expedisi_desc_edit      = button.data('desc')
    var modal = $(this)
    modal.find('.modal-title, #exampleModaledit').text('Edit ' + expedisi_name_edit)
    modal.find('#expedisi_id_edit').val(id)
    modal.find('#expedisi_name_edit').val(expedisi_name_edit)
    modal.find('#expedisi_address_edit').val(expedisi_address_edit)
    modal.find('#expedisi_phone_edit').val(expedisi_phone_edit)
    modal.find('#expedisi_desc_edit').val(expedisi_desc_edit)
    $('#expedisi_address_edit_count').text((expedisi_address_edit || '').length)
    $('#expedisi_desc_edit_count').text((expedisi_desc_edit || '').length)
  })
</script>
