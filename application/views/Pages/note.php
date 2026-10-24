<?php
define('DOC_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
require DOC_ROOT_PATH . $this->config->item('header');
?>
</div>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Catatan</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <i class="fas fa-sticky-note" style="margin-right:.5rem;color:#d21f2c;"></i>
              <h5 class="mb-0">Catatan</h5>
            </div>
          </div>
          <div class="card-body">
            <textarea class="form-control" id="comment" rows="20"><?php echo isset($data['get_note'][0]['ms_note_text']) ? $data['get_note'][0]['ms_note_text'] : ''; ?></textarea>
            <button class="btn btn-primary mt-3" id="save_note">
              <i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require DOC_ROOT_PATH . $this->config->item('footer'); ?>

<script>
  $('#save_note').on('click', function(e) {
    e.preventDefault();
    var $btn = $(this);
    $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin" style="margin-right:.35rem;"></i>Menyimpan...');
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>Note/save_comment',
      dataType: 'json',
      data: { comment: $('#comment').val() },
      success: function(data){
        if(data.code == '200'){
          Swal.fire({ icon: 'success', title: 'Tersimpan!', text: 'Catatan berhasil disimpan.', confirmButtonColor: '#d21f2c', timer: 1800, showConfirmButton: false });
        }
        $btn.prop('disabled', false).html('<i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan');
      },
      error: function(){
        $btn.prop('disabled', false).html('<i class="fas fa-save" style="margin-right:.35rem;"></i>Simpan Catatan');
      }
    });
  });
</script>
