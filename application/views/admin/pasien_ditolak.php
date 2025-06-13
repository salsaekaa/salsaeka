<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1>Pasien Ditolak</h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Pasien</th>
              <th>Tanggal Kunjungan</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Keluhan</th>
              <th>Telepon</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pasien as $p): ?>
              <tr>
                <td><?= $p->nama; ?></td>
                <td><?= $p->tanggal; ?> (<?= date('H:i', strtotime($p->jam)); ?>)</td>
                <td><?= $p->poli; ?></td>
                <td><?= $p->dokter; ?></td>
                <td><?= $p->keluhan; ?></td>
                <td><?= $p->telepon; ?></td>
                <td><span class="badge badge-danger">Ditolak</span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
