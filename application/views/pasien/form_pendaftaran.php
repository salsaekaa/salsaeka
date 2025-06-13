<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="post">
            <div class="form-group">
  <label>Nama Pasien</label>
  <input type="text" class="form-control" value="<?= $nama_pasien; ?>" readonly>
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
            <label>No. Telepon</label>
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
  <select name="dokter_poli" class="form-control" required>
    <option value="">-- Pilih Dokter dan Poli --</option>
    <?php foreach ($dokter as $d): ?>
      <option value="<?= $d->nama . '|' . $d->poli ?>">
        <?= $d->nama ?> (<?= $d->poli ?>)
      </option>
    <?php endforeach; ?>
  </select>
</div>

          <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
        </form>
      </div>
    </div>
  </section>
</div>
