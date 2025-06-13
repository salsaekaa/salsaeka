<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Form Tambah Pasien</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="<?= base_url('admin/tambah_pasien'); ?>">
          <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="telepon" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Keluhan Penyakit</label>
            <textarea name="keluhan" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Jam Kunjungan</label>
            <input type="time" name="jam" class="form-control" required>
          </div>

          <div class="form-group">
  <label>Dokter & Poli</label>
  <select name="dokter" class="form-control" required>
    <option value="">-- Pilih Dokter --</option>
    <?php foreach ($dokter as $d): ?>
      <option value="<?= $d->nama; ?>|<?= $d->poli; ?>">
        <?= $d->nama; ?> (<?= $d->poli; ?>)
      </option>
    <?php endforeach; ?>
  </select>
</div>


          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('admin/pendaftaran'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
