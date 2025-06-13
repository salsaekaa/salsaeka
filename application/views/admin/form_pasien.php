<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= isset($pasien) ? 'Edit Data Pasien' : 'Tambah Pasien'; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">

        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?= isset($pasien) ? base_url('admin/edit_pasien/' . $pasien->id) : base_url('admin/tambah_pasien'); ?>">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= isset($pasien) ? $pasien->nama : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?= isset($pasien) ? $pasien->tgl_lahir : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= isset($pasien) ? $pasien->alamat : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= isset($pasien) ? $pasien->telepon : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <input type="text" name="keluhan" class="form-control" value="<?= isset($pasien) ? $pasien->keluhan : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" class="form-control" value="<?= isset($pasien) ? $pasien->tanggal : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Jam Kunjungan</label>
            <input type="time" name="jam" class="form-control" value="<?= isset($pasien) ? $pasien->jam : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Dokter</label>
            <input type="text" name="dokter" class="form-control" value="<?= isset($pasien) ? $pasien->dokter : ''; ?>" required>
          </div>
          <div class="form-group">
            <label>Poli</label>
            <input type="text" name="poli" class="form-control" value="<?= isset($pasien) ? $pasien->poli : ''; ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">
            <?= isset($pasien) ? 'Update' : 'Simpan'; ?>
          </button>
        </form>

      </div>
    </div>
  </section>
</div>
