
<style>
  .pio-footer{border-top:1px solid #eef0f3;background:#fff;padding:16px 30px;}
  .pio-footer .container-fluid{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.5rem;}
  .pio-footer-brand{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:#1e2a3a;font-weight:700;}
  .pio-footer-brand img{width:20px;height:20px;object-fit:contain;}
  .pio-footer-copy{font-size:.8rem;color:#8a8f98;}
</style>
<footer class="footer pio-footer">
  <div class="container-fluid">
    <div class="pio-footer-brand">
      <img src="<?php echo base_url(); ?>assets/logo.png" alt="Toko Pionir">
      Toko Pionir
    </div>
    <div class="pio-footer-copy">
      &copy; <?php echo date('Y'); ?> Toko Pionir. All rights reserved.
    </div>
  </div>
</footer>
</div>


</script>

<script src="<?php echo base_url(); ?>dist/js/core/jquery-3.7.1.min.js"></script>


<script src="<?php echo base_url(); ?>dist/js/core/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/chart.js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/chart-circle/circles.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/jsvectormap/world.js"></script>
<script src="<?php echo base_url(); ?>dist/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/kaiadmin.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/fancybox.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.js"></script>
<script src="<?php echo base_url(); ?>dist/js/autonumeric.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
 <script src="<?php echo base_url(); ?>dist/js/parsley.js"></script>


<script>

  // Cegah submit ganda (klik 2x/double-click) ke endpoint yang mengubah data (save_*, delete_*),
  // berlaku untuk seluruh halaman karena file ini (footer.php) dimuat di semua halaman.
  // Request kedua yang persis sama (method + url) sementara request pertama masih berjalan akan dibatalkan.
  (function(){
    var pendingRequests = {};
    var mutatingUrlPattern = /\/(save|delete)_[a-z0-9_]+/i;

    $(document).ajaxSend(function(event, jqXHR, ajaxOptions){
      var method = (ajaxOptions.type || 'GET').toUpperCase();
      if(method !== 'POST' || !mutatingUrlPattern.test(ajaxOptions.url)){
        return;
      }
      var key = method + ' ' + ajaxOptions.url;
      if(pendingRequests[key]){
        jqXHR.__dupGuardAborted = true;
        jqXHR.abort();
        return;
      }
      pendingRequests[key] = true;
      jqXHR.__dupGuardKey = key;
    });

    $(document).ajaxComplete(function(event, jqXHR){
      if(jqXHR.__dupGuardKey){
        delete pendingRequests[jqXHR.__dupGuardKey];
      }
    });
  })();

  // Judul tab browser otomatis mengikuti judul yang ditampilkan di halaman itu sendiri
  // (heading "Tambah X" di halaman add/edit yang sudah di-redesign, atau heading "Daftar X"
  // di halaman list lama), supaya selalu sesuai nama halaman tanpa perlu daftar manual per-route.
  (function(){
    var heading = document.querySelector('[class$="-page-header"] h5')
      || document.querySelector('h3.fw-bold.mb-3');
    if(heading){
      var text = heading.textContent.replace(/\s+/g, ' ').trim();
      if(text){
        document.title = text + ' | Pionir Backoffice';
      }
    }
  })();



  $('#basic-datatables').DataTable({
    order: [[0, 'asc']],
  })

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


  $('body').on('shown.bs.modal', '.editmodal', function() {
    $(this).find('.js-example-basic-multiple').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('#exampleModaledit').length !== 0)
        dropdownParent = $("#exampleModaledit");
      $(this).select2({
        dropdownParent: $("#exampleModaledit")
      // ...
      });
    });
  });



  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });

  $('body').on('shown.bs.modal', '.modal', function() {
    $(this).find('.js-example-basic-single').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('#myModal').length !== 0)
        dropdownParent = $("#myModal");
      $(this).select2({
        dropdownParent: $("#myModal")
      // ...
      });
    });
  });


  $('body').on('shown.bs.modal', '.editmodal', function() {
    $(this).find('.js-example-basic-single').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('#exampleModaledit').length !== 0)
        dropdownParent = $("#exampleModaledit");
      $(this).select2({
        dropdownParent: $("#exampleModaledit")
      // ...
      });
    });
  });

  
  $('body').on('shown.bs.modal', '.filter', function() {
    $(this).find('.js-example-basic-single').each(function() {
      var dropdownParent = $(document.body);
      if ($(this).parents('#myModalsearch').length !== 0)
        dropdownParent = $("#myModalsearch");
      $(this).select2({
        dropdownParent: $("#myModalsearch")
      // ...
      });
    });
  });

  $('#reload').click(function(e){
    e.preventDefault();
    location.reload();
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  Fancybox.bind("[data-fancybox]", {
  }) 

  // elemen #pieChart tidak ada di halaman manapun (sisa kode lama) -- dibungkus guard supaya
  // tidak melempar error dan menghentikan script di bawahnya (termasuk notif_success)
  var pieChartEl = document.getElementById("pieChart");
  if (pieChartEl) {
    var pieChart = pieChartEl.getContext("2d");
    var myPieChart = new Chart(pieChart, {
      type: "pie",
      data: {
        datasets: [
          {
            data: [50, 35, 15],
            backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b"],
            borderWidth: 0,
          },
        ],
        labels: ["Pendapatan", "Pengeluaran", "Hpp"],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: "bottom",
          labels: {
            fontColor: "rgb(154, 154, 154)",
            fontSize: 11,
            usePointStyle: true,
            padding: 20,
          },
        },
        pieceLabel: {
          render: "percentage",
          fontColor: "white",
          fontSize: 14,
        },
        tooltips: false,
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 20,
            bottom: 20,
          },
        },
      },
    });
  }

  function notif_success(title, message, state)
  {
    var placementFrom = $("#notify_placement_from option:selected").val();
    var placementAlign = $("#notify_placement_align option:selected").val();
    var state = state;
    var style = state;
    var content = {};

    content.message = message;
    content.title = title;
    content.icon = "fa fa-bell";

    $.notify(content, {
      type: state,
      placement: {
        from: placementFrom,
        align: placementAlign,
      },
      time: 1000,
      delay: 25,
    });
  }

</script>
</body>
</html>