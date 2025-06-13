<?php
// File: application/views/admin/kelola_pasien.php
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title; ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
        
<a href="<?= base_url('admin/tambah_pasien'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-user-plus"></i> Tambah Pasien
</a>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Keluhan</th>
              <th>Tanggal Kunjungan</th>
              <th>Jam</th>
              <th>Dokter</th>
              <th>Poli</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pasien as $p): ?>
              <tr>
                <td><?= $p->nama; ?></td>
                <td><?= $p->tgl_lahir; ?></td>
                <td><?= $p->alamat; ?></td>
                <td><?= $p->telepon; ?></td>
                <td><?= $p->keluhan; ?></td>
                <td><?= $p->tanggal; ?></td>
                <td><?= $p->jam; ?></td>
                <td><?= $p->dokter; ?></td>
                <td><?= $p->poli; ?></td>
                <td>
                  <a href="<?= base_url('admin/edit_pasien/' . $p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="<?= base_url('admin/hapus_pasien/' . $p->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
