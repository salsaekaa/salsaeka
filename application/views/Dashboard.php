<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="row">

      <!-- Box 1: Total Pendaftar -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $total_pendaftar; ?></h3>
            <p>Total Pendaftar</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="<?= base_url('admin/pendaftaran'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Box 2: Diterima -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $total_diterima; ?></h3>
            <p>Pasien Diterima</p>
          </div>
          <div class="icon">
            <i class="fas fa-check-circle"></i>
          </div>
          <a href="<?= base_url('admin/pasien_terdaftar'); ?>" class="small-box-footer">Lihat Pasien <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Box 3: Ditolak -->
      <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $total_ditolak; ?></h3>
            <p>Pasien Ditolak</p>
          </div>
          <div class="icon">
            <i class="fas fa-times-circle"></i>
          </div>
          <a href="<?= base_url('admin/pasien_ditolak'); ?>" class="small-box-footer">Lihat Pasien <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Box 4: Menunggu -->
<div class="col-lg-4 col-6">
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $total_menunggu; ?></h3>
      <p>Menunggu Konfirmasi</p>
    </div>
    <div class="icon">
      <i class="fas fa-hourglass-half"></i>
    </div>
    <a href="<?= base_url('admin/konfirmasi'); ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>


    </div>
  </section>
</div>
