<?php 
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

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
                <h3 class="fw-bold mb-3">Daftar Group Pengguna</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <button class="btn btn-info" id="btnreload"><span class="btn-label"><i class="fas fa-sync"></i></span> Reload</button>
                <?php if($data['check_auth']['check_access'][0]->add == 'Y'){ ?>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="btn-label"><i class="fa fa-plus"></i></span> Tambah</button>
                <?php }else{ ?>
                  <button class="btn btn-primary" disabled><span class="btn-label"><i class="fa fa-plus"></i></span> Tambah</button>
                <?php } ?>

                <!-- Tambah Role -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Nama Group</label>
                          <div class="col-md-12 p-0">
                            <input type="text" class="form-control input-full" id="role_name" placeholder="Nama Group">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                        <button type="button" id="btnsave" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Tambah Role -->

                <!-- Edit Role -->
                <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModaleditLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group form-inline">
                          <label for="inlineinput" class="col-md-3 col-form-label">Nama Group</label>
                          <div class="col-md-12 p-0">
                            <input type="hidden" class="form-control input-full" id="role_id">
                            <input type="text" class="form-control input-full" id="role_name_edit">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                        <button type="button" id="btnedit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Edit Role -->

                <!-- Seting Permision -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalsetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalsettingLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Setting Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <table class="table mt-3">
                          <thead>
                            <tr>
                              <th scope="col">Katalog Produk</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="listcatalog row gx-3 gy-3">
                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input type="hidden" id="role_id_acc" value="" />
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_price_umum"
                                            checked>
                                      <span>Harga Umum</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_price_toko">
                                      <span>Harga Toko</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_price_sales">
                                      <span>Harga Sales</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_price_khusus">
                                      <span>Harga Khusus</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_purchase_price">
                                      <span>Harga Beli</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_stock">
                                      <span>Stok</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_supplier">
                                      <span>Supplier di Pengajuan</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_item_supplier">
                                      <span>Item Supplier</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_status">
                                      <span>Status</span>
                                    </label>
                                  </div>

                                  <div class="col-6 col-md-4">
                                    <label class="summary-option">
                                      <input class="form-check-input"
                                            type="checkbox"
                                            id="access_mass_edit">
                                      <span>Mass Edit / Import-Export Produk</span>
                                    </label>
                                  </div>

                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <table class="table mt-3" style="text-align:cen">
                          <thead>
                            <tr>
                              <th scope="col">Module</th>
                              <th scope="col" colspan="2">Hak Akses</th>
                            </tr>
                          </thead>
                          <tbody id="temp">
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                        <button type="button" id="btneditacc" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Seting Permision -->

              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
              id="basic-datatables"
              class="display table table-striped table-hover"
              >
              <thead>
                <tr>
                  <th>Nama Group</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['group_role'] as $row) { ?>
                  <?php $is_superadmin_role = ($row->role_id == 1); ?>
                  <tr>
                    <td><?php echo $row->role_name; ?><?php if($is_superadmin_role){ ?> <span class="badge badge-secondary"><i class="fas fa-lock"></i> Terkunci</span><?php } ?></td>
                    <td>
                      <?php if($is_superadmin_role){ ?>
                      <button type="button" class="btn btn-icon btn-danger btn-sm mb-2-btn" disabled title="Group Super Admin tidak bisa dihapus"><i class="fas fa-trash-alt sizing-fa"></i></button>
                      <button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" disabled title="Group Super Admin tidak bisa diedit"><i class="far fa-edit sizing-fa"></i></button>
                      <button type="button" class="btn btn-icon btn-primary btn-sm mb-2-btn" disabled title="Group Super Admin tidak bisa diedit"><i class="fas fa-cog sizing-fa"></i></button>
                      <?php }else{ ?>
                      <?php if($data['check_auth']['check_access'][0]->delete == 'Y'){ ?>
                      <button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn" data-id="<?php echo $row->role_id; ?>" data-name="<?php echo $row->role_name; ?>"><i class="fas fa-trash-alt sizing-fa"></i></button>
                      <?php }else{ ?>
                      <button type="button" class="btn btn-icon btn-danger delete btn-sm mb-2-btn" disabled><i class="fas fa-trash-alt sizing-fa"></i></button>
                      <?php } ?>
                      <?php if($data['check_auth']['check_access'][0]->edit == 'Y'){ ?>
                      <button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" data-id="<?php echo $row->role_id; ?>" data-name="<?php echo $row->role_name; ?>" data-bs-toggle="modal" data-bs-target="#exampleModaledit"><i class="far fa-edit sizing-fa"></i></button>
                      <button type="button" class="btn btn-icon btn-primary btn-sm mb-2-btn" data-id="<?php echo $row->role_id; ?>" data-name="<?php echo $row->role_name; ?>" data-bs-toggle="modal" data-bs-target="#exampleModalsetting"><i class="fas fa-cog sizing-fa"></i></button>
                      <?php }else{ ?>
                      <button type="button" class="btn btn-icon btn-warning btn-sm mb-2-btn" disabled><i class="far fa-edit sizing-fa"></i></button>
                      <button type="button" class="btn btn-icon btn-primary btn-sm mb-2-btn" disabled><i class="fas fa-cog sizing-fa"></i></button>
                      <?php } ?>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<style>
  .listcatalog {
    margin: 0;
  }

  .summary-option {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    padding: 0.75rem 0.85rem;
    border: 1px solid #dee2e6;
    border-radius: 0.65rem;
    background-color: #f7f9fb;
    transition: background-color 0.2s ease, border-color 0.2s ease;
    cursor: pointer;
  }

  .summary-option:hover {
    background-color: #eef4fb;
    border-color: #c6d5e9;
  }

  .summary-option input {
    margin: 0;
    transform: scale(1.05);
  }

  .summary-option span {
    margin-bottom: 0;
    white-space: nowrap;
  }
</style>

<?php 
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>

  $(".delete").click(function (e) {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    Swal.fire({
      title: 'Konfirmasi?',
      text: "Apakah Anda Yakin Menghapus '"+name+"' ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>User/delete_role",
          dataType: "json",
          data: {id:id, role_name:name},
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
    var role_name   = $("#role_name").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>User/save_role",
      dataType: "json",
      data: {role_name:role_name},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>User/role";
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
    var role_id    = $("#role_id").val();
    var role_name_edit  = $("#role_name_edit").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>User/edit_role",
      dataType: "json",
      data: {role_id:role_id, role_name_edit:role_name_edit},
      success : function(data){
        if (data.code == "200"){
          window.location.href = "<?php echo base_url(); ?>User/role";
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

  $('#btneditacc').click(function(e){
    e.preventDefault();

    let role_id               = $('#role_id_acc').val();
    let access_price_umum = $('#access_price_umum').is(':checked') ? 'Y' : 'N';
    let access_price_toko = $('#access_price_toko').is(':checked') ? 'Y' : 'N';
    let access_price_sales = $('#access_price_sales').is(':checked') ? 'Y' : 'N';
    let access_price_khusus = $('#access_price_khusus').is(':checked') ? 'Y' : 'N';
    let access_purchase_price = $('#access_purchase_price').is(':checked') ? 'Y' : 'N';
    let access_stock = $('#access_stock').is(':checked') ? 'Y' : 'N';
    let access_supplier = $('#access_supplier').is(':checked') ? 'Y' : 'N';
    let access_item_supplier = $('#access_item_supplier').is(':checked') ? 'Y' : 'N';
    let access_status = $('#access_status').is(':checked') ? 'Y' : 'N';
    let access_mass_edit = $('#access_mass_edit').is(':checked') ? 'Y' : 'N';

    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>User/edit_acc_product",
        dataType: "json",
        data: {
            role_id: role_id,
            access_price_umum: access_price_umum,
            access_price_toko: access_price_toko,
            access_price_sales: access_price_sales,
            access_price_khusus: access_price_khusus,
            access_purchase_price: access_purchase_price,
            access_stock: access_stock,
            access_supplier: access_supplier,
            access_item_supplier: access_item_supplier,
            access_status: access_status,
            access_mass_edit: access_mass_edit
        },
        success: function(data){
            if (data.code == "200"){
                window.location.href = "<?php echo base_url(); ?>User/role";
                Swal.fire('Saved!', '', 'success');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.result,
                });
            }
        }
    });
});

  $('#btnreload').click(function(e){
    e.preventDefault();
    location.reload();
  });



  $('#exampleModaledit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id   = button.data('id')
    var role_name_edit   = button.data('name')
    var modal = $(this)
    modal.find('.modal-title').text('Edit ' + role_name_edit)
    modal.find('#role_id').val(id)
    modal.find('#role_name_edit').val(role_name_edit)
  })


  $('#exampleModalsetting').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id   = button.data('id')
    var role_name   = 'Ubah Aksess';
    var modal = $(this)
    modal.find('.modal-title').text(role_name)
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>User/get_setting_permission",
      dataType: "json",
      data: {id:id},
      success : function(data){
        let text_temp = "";
        var view_only_modules = ['Report','ReportMaster','ReportPurchase','ReportSales','ReportPayment','ReportStock','Search'];
        for (let i = 0; i < data.data.get_setting_permission.length; i++) {
          var is_report_module = view_only_modules.includes(data.data.get_setting_permission[i].module_name);
          if(data.data.get_setting_permission[i].view == 'Y'){var view = is_report_module ? 'Lihat' : 'Lihat, ';}else{var view = 'No Access';}
          if(!is_report_module && data.data.get_setting_permission[i].add == 'Y'){var add = 'Tambah, ';}else{var add = '';}
          if(!is_report_module && data.data.get_setting_permission[i].edit == 'Y'){var edit = 'Edit, ';}else{var edit = '';}
          if(!is_report_module && data.data.get_setting_permission[i].delete == 'Y'){var deletes = 'Hapus';}else{var deletes = '';}
          text_temp +=
          '<tr><td>'+data.data.get_setting_permission[i].module_title+'</td><td class="'+data.data.get_setting_permission[i].module_name+'" onclick="tdclick(this)"><a href="#" id="'+data.data.get_setting_permission[i].module_name+'title" class"'+data.data.get_setting_permission[i].module_name+'-title">'+view+''+add+''+edit+''+deletes+'</a><div id="'+data.data.get_setting_permission[i].module_name+'" class="hide-permission">';
          if(data.data.get_setting_permission[i].view == 'Y'){
            text_temp +=
            '<input class="form-check-input" type="checkbox" name="flexCheckDefaulta'+data.data.get_setting_permission[i].module_name+'" id="flexCheckDefaulta'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')" checked><label class="form-check-label" for="flexCheckDefault">Lihat</label> <br />';
          }else{
            text_temp +=
            '<input class="form-check-input" type="checkbox" name="flexCheckDefaulta'+data.data.get_setting_permission[i].module_name+'" id="flexCheckDefaulta'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')"><label class="form-check-label" for="flexCheckDefault">Lihat</label> <br />';
          }

          if(!is_report_module){
          if(data.data.get_setting_permission[i].add == 'Y'){
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultb'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')" checked><label class="form-check-label" for="flexCheckDefault">Tambah</label> <br />';
          }else{
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultb'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')"><label class="form-check-label" for="flexCheckDefault">Tambah</label> <br />';
          }

          if(data.data.get_setting_permission[i].edit == 'Y'){
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultc'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')" checked><label class="form-check-label" for="flexCheckDefault">Edit</label> <br />';
          }else{
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultc'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')""><label class="form-check-label" for="flexCheckDefault">Edit</label> <br />';
          }
          if(data.data.get_setting_permission[i].delete == 'Y'){
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultd'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')" checked><label class="form-check-label" for="flexCheckDefault">Hapus</label> <br />';
          }else{
            text_temp +=
            '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultd'+data.data.get_setting_permission[i].module_name+'" onclick="editcheck(\''+data.data.get_setting_permission[i].role_permision+'-'+data.data.get_setting_permission[i].module_name+'\')"><label class="form-check-label" for="flexCheckDefault">Hapus</label> <br />';
          }
          }
          text_temp += '</div></td>'+
          '<td><a href="#" class="'+data.data.get_setting_permission[i].module_name+'" id="'+data.data.get_setting_permission[i].module_name+'cancel" onclick="hide(this)" style="display:none;">Tutup</a></td>'+
          '</tr>';
          
        }
        document.getElementById("temp").innerHTML = text_temp;

        let product_access = data.data.get_settting_product;
        if(product_access[0].access_umum_price == 'Y'){
          $('#access_price_umum').prop('checked', true);
        }else{
          $('#access_price_umum').prop('checked', false);
        }

        if(product_access[0].access_store_price == 'Y'){
          $('#access_price_toko').prop('checked', true);
        }else{
          $('#access_price_toko').prop('checked', false);
        }

        if(product_access[0].access_sales_price == 'Y'){
          $('#access_price_sales').prop('checked', true);
        }else{
          $('#access_price_sales').prop('checked', false);
        }

        if(product_access[0].access_special_price == 'Y'){
          $('#access_price_khusus').prop('checked', true);
        }else{
          $('#access_price_khusus').prop('checked', false);
        }

        if(product_access[0].access_purchase_price == 'Y'){
          $('#access_purchase_price').prop('checked', true);
        }else{
          $('#access_purchase_price').prop('checked', false);
        }

        if(product_access[0].access_stock == 'Y'){
          $('#access_stock').prop('checked', true);
        }else{
          $('#access_stock').prop('checked', false);
        }

        if(product_access[0].access_supplier == 'Y'){
          $('#access_supplier').prop('checked', true);
        }else{
          $('#access_supplier').prop('checked', false);
        }

        if(product_access[0].access_item_supplier == 'Y'){
          $('#access_item_supplier').prop('checked', true);
        }else{
          $('#access_item_supplier').prop('checked', false);
        }

        if(product_access[0].access_status == 'Y'){
          $('#access_status').prop('checked', true);
        }else{
          $('#access_status').prop('checked', false);
        }

        if(product_access[0].access_mass_edit == 'Y'){
          $('#access_mass_edit').prop('checked', true);
        }else{
          $('#access_mass_edit').prop('checked', false);
        }
        $('#role_id_acc').val(id);
      }
    });
  })


function editcheck(stringname)
{
  var data = stringname.split("-");
  var role_permission   = data[0];
  var module_name       = data[1];
  var checkboxView = 'flexCheckDefaulta' + module_name;
  var checkboxAdd = 'flexCheckDefaultb' + module_name;
  var checkboxEdit = 'flexCheckDefaultc' + module_name;
  var checkboxDelete = 'flexCheckDefaultd' + module_name;
  var checkedView = document.getElementById(checkboxView);
  var checkedAdd = document.getElementById(checkboxAdd);
  var checkedEdit = document.getElementById(checkboxEdit);
  var checkedDelete = document.getElementById(checkboxDelete);
  var value_permission_view = checkedView ? checkedView.checked : false;
  var value_permission_add = checkedAdd ? checkedAdd.checked : false;
  var value_permission_edit = checkedEdit ? checkedEdit.checked : false;
  var value_permission_delete = checkedDelete ? checkedDelete.checked : false;

  $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>User/updatepermision",
    dataType: "json",
    data: {role_permission:role_permission, value_permission_view:value_permission_view, value_permission_add:value_permission_add, value_permission_edit:value_permission_edit, value_permission_delete:value_permission_delete},
    success : function(data){
      console.log("sucess");
    }
  });
}



function tdclick(id){
  var name = id.className;
  var title = name+'title';
  var cancel = name+'cancel';
  document.getElementById(name).style.display = "block";
  document.getElementById(title).style.display = "none";
  document.getElementById(cancel).style.display = "block";
};

function hide(id){
  var name = id.className;
  var title = name+'title';
  var cancel = name+'cancel';
  document.getElementById(title).style.display = "block";
  document.getElementById(name).style.display = "none";
  document.getElementById(cancel).style.display = "none";
};

</script>