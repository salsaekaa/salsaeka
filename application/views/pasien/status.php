<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
                <th>Nama</th>
              <th>Jadwal</th>
              <th>Poli</th>
              <th>Dokter</th>
              <th>Keluhan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pendaftaran as $p): ?>
              <tr>
                <td><?= $p->nama; ?></td>
                <td><?= $p->tanggal . ' / ' . date('H:i', strtotime($p->jam)); ?></td>
                <td><?= $p->poli; ?></td>
                <td><?= $p->dokter; ?></td>
                <td><?= $p->keluhan; ?></td>
                <td>
                  <?php if ($p->status == 'menunggu'): ?>
                    <span class="badge badge-warning">Menunggu</span>
                  <?php elseif ($p->status == 'diterima'): ?>
                    <span class="badge badge-success">Diterima</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Ditolak</span>
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
