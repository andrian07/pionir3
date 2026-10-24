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
                <h3 class="fw-bold mb-3">Mass Update Produk</h3>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="<?php echo base_url(); ?>Masterdata/product" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Produk</a>
              </div>
            </div>
          </div>
          <div class="card-body">

            <ul class="nav nav-tabs" id="massUpdateTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-download-btn" data-bs-toggle="tab" data-bs-target="#tab-download" type="button" role="tab">Download</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-upload-btn" data-bs-toggle="tab" data-bs-target="#tab-upload" type="button" role="tab">Upload</button>
              </li>
            </ul>

            <div class="tab-content border border-top-0 p-4 mb-4">

              <!-- Download Tab -->
              <div class="tab-pane fade show active" id="tab-download" role="tabpanel">
                <p>Download seluruh data produk (harga, stock per gudang, kategori, brand, dsb) dalam format Excel. Edit kolom yang ingin diubah pada file yang telah didownload, lalu upload kembali pada tab <b>Upload</b>.</p>
                <ul>
                  <li>Semua kolom <b>bisa diedit</b>, kecuali kolom <b>KODE PRODUK</b> (ditandai abu-abu) yang dipakai sebagai kunci pencarian produk dan tidak akan diproses meski diubah.</li>
                  <li>Kolom yang dikosongkan pada saat upload akan <b>tetap memakai nilai sebelumnya</b> (tidak ikut diubah).</li>
                  <li>Kolom <b>Kategori *, Brand *, Satuan *, Supplier TERBARU</b> akan otomatis dibuat datanya bila diisi dengan nama baru yang belum ada.</li>
                </ul>
                <a href="<?php echo base_url(); ?>Masterdata/export_stock_excell" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Excel Mass Update Produk</a>
              </div>

              <!-- Upload Tab -->
              <div class="tab-pane fade" id="tab-upload" role="tabpanel">
                <p>Upload file Excel yang sudah diedit untuk menyelesaikan proses Mass Update Produk.</p>
                <ul>
                  <li>Kolom <b>KODE PRODUK</b> tidak diproses, hanya dipakai untuk mencocokkan baris dengan produk yang ada.</li>
                  <li>Kolom lain yang dikosongkan akan tetap memakai nilai sebelumnya (tidak ikut diubah).</li>
                  <li>Ukuran maks. 3MB. Gunakan format xlsx atau xls.</li>
                  <li>Sebelum diproses, sistem akan otomatis membackup data produk &amp; stock saat ini ke folder <code>backup_excell</code> sehingga dapat di-rollback bila diperlukan.</li>
                  <li>Mohon tidak mengedit produk sebelum proses upload sebelumnya selesai.</li>
                </ul>
                <form id="import_stock_excell_form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label class="col-form-label">Pilih File Excel (.xlsx / .xls)</label>
                    <input type="file" class="form-control" id="import_stock_excell_file" accept=".xlsx,.xls">
                  </div>
                  <button type="submit" id="btn_import_stock_excell" class="btn btn-success"><i class="fas fa-upload"></i> Upload &amp; Proses</button>
                </form>
              </div>

            </div>

            <div class="d-flex align-items-left">
              <div>
                <h4 class="fw-bold mb-3">Dokumen</h4>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <button class="btn btn-info" id="reload_history"><span class="btn-label"><i class="fas fa-sync"></i></span> Reload</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jenis File</th>
                    <th>Nama File</th>
                    <th>Diproses</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($data['history_list']) > 0){ ?>
                    <?php foreach($data['history_list'] as $row){ ?>
                      <tr>
                        <td><?php echo date('d/m/Y H:i', strtotime($row->created_at)); ?></td>
                        <td><?php echo $row->type == 'Download' ? 'Download Produk' : 'Upload Produk'; ?></td>
                        <td><?php echo $row->file_name; ?></td>
                        <td><?php echo $row->success_row.'/'.$row->total_row; ?></td>
                        <td>
                          <?php if($row->status == 'Success'){ ?>
                            <span class="badge badge-success">Success</span>
                          <?php }else if($row->status == 'Partial'){ ?>
                            <span class="badge badge-warning">Partial</span>
                          <?php }else{ ?>
                            <span class="badge badge-danger"><?php echo $row->status; ?></span>
                          <?php } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>Masterdata/download_stock_history_file?id=<?php echo $row->stock_excel_history_id; ?>&type=file" class="btn btn-outline-primary btn-sm">Download</a>
                          <?php if($row->type == 'Upload' && $row->backup_file_path != null){ ?>
                            <a href="<?php echo base_url(); ?>Masterdata/download_stock_history_file?id=<?php echo $row->stock_excel_history_id; ?>&type=backup" class="btn btn-outline-warning btn-sm">Download Backup</a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php }else{ ?>
                    <tr>
                      <td colspan="6" class="text-center">Belum ada dokumen.</td>
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
</div>

<?php
require DOC_ROOT_PATH . $this->config->item('footer');
?>

<script>
  $('#reload_history').click(function(e){
    e.preventDefault();
    location.reload();
  });

  $('#import_stock_excell_form').on('submit', function(e){
    e.preventDefault();
    var file = $('#import_stock_excell_file')[0].files[0];
    if(!file){
      Swal.fire({ icon: 'error', title: 'Oops...', text: 'Pilih file Excel terlebih dahulu.' });
      return;
    }
    Swal.fire({
      title: 'Konfirmasi?',
      html: "Data stock saat ini akan dibackup terlebih dahulu, lalu stock produk akan diperbarui sesuai file yang diupload. Lanjutkan?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Proses'
    }).then((result) => {
      if(result.isConfirmed){
        var formData = new FormData();
        formData.append('file', file);
        $('#btn_import_stock_excell').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>Masterdata/import_stock_excell',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data){
            var res = typeof data === 'string' ? JSON.parse(data) : data;
            $('#btn_import_stock_excell').prop('disabled', false).html('<i class="fas fa-upload"></i> Upload &amp; Proses');
            if(res.code == 200){
              $('#import_stock_excell_file').val('');
              Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.result }).then(function(){ location.reload(); });
            } else {
              Swal.fire({ icon: 'error', title: 'Oops...', text: res.result });
            }
          },
          error: function(){
            $('#btn_import_stock_excell').prop('disabled', false).html('<i class="fas fa-upload"></i> Upload &amp; Proses');
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Terjadi kesalahan saat mengupload file.' });
          }
        });
      }
    });
  });
</script>
