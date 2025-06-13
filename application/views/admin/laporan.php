<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <a href="<?= base_url('admin/export_pdf'); ?>" class="btn btn-danger btn-sm">
          <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
        <a href="<?= base_url('admin/export_csv'); ?>" class="btn btn-success btn-sm">
          <i class="fas fa-file-csv"></i> Export CSV
        </a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Tanggal</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Keluhan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($pendaftaran as $p): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->tanggal; ?></td>
                <td><?= $p->poli; ?></td>
                <td><?= $p->dokter; ?></td>
                <td><?= $p->keluhan; ?></td>
                <td>
                  <?php if ($p->status == 'diterima'): ?>
                    <span class="badge bg-success">Diterima</span>
                  <?php elseif ($p->status == 'ditolak'): ?>
                    <span class="badge bg-danger">Ditolak</span>
                  <?php else: ?>
                    <span class="badge bg-warning text-dark">Menunggu</span>
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
