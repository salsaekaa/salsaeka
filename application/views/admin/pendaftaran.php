
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Pasien</th>
              <th>Tanggal</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Keluhan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
  <?php foreach ($pendaftaran as $p): ?>
    <tr>
      <td><?= $p->nama; ?></td>
      <td><?= $p->tanggal; ?></td>
      <td><?= $p->poli; ?></td>
      <td><?= $p->dokter; ?></td>
      <td><?= $p->keluhan; ?></td>
      <td><?= ucfirst($p->status); ?></td>
      <td>
        <?php if ($p->status == 'menunggu'): ?>
          <a href="<?= base_url('admin/ubah_status/' . $p->id . '/diterima'); ?>" class="btn btn-success btn-sm" onclick="return confirm('Terima pendaftaran ini?')">Terima</a>
          <a href="<?= base_url('admin/ubah_status/' . $p->id . '/ditolak'); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tolak pendaftaran ini?')">Tolak</a>
        <?php else: ?>
          <span class="text-muted">Sudah diproses</span>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>

        </table>
      </div>
    </div>
  </section>
</div>
