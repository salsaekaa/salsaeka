<footer class="main-footer text-center">
  <strong>&copy; <?= date('Y'); ?> RS HARAPAN SEHAT.</strong> All rights reserved.
</footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.44 -->
<script src="<?= base_url('assets/adminlte/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.brigde('uibutton', $.ui.button)
  </script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
 <script src="<?= base_url('assets/adminlte/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
 <script src="<?= base_url('assets/adminlte/plugins/sparkline/sparkline.js')?>"></script>
<!-- JQVMap -->
 <script src="<?= base_url('assets/adminlte/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
 <script src="<?= base_url('assets/adminlte/plugins/jqvmap/mpas/jquery.vmap.usa.js')?>"></script>
<!-- Jquery Knob Chart -->
 <script src="<?= base_url('assets/adminlte/plugins/jquery-knob/jquery-knob.min.js')?>"></script>
<!-- daterangepicker -->
 <script src="<?= base_url('assets/adminlte/plugins/moment/moment.min.js')?>"></script>
 <script src="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominnus Bootstrap 4 -->
 <script src="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote --> 
 <script src="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purpose) -->
<script src="<?= base_url('assets/adminlte/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte/dist/js/demo.js')?>"></script>

<script>
				<?php if ($this->session->flashdata('success')): ?>
					alert("<?= $this->session->flashdata('success'); ?>");
				<?php endif; ?>

				<?php if ($this->session->flashdata('error')): ?>
					alert("<?= $this->session->flashdata('error'); ?>");
				<?php endif; ?>
				</script>


<script>
  $(function () {
    //Summernote
    $('.summernote').summernote({
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'italic', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ]
    });
  });
</script>
</body>