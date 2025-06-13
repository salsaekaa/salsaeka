<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>
    <h2 style="text-align:center"><?= $title; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Poli</th>
                <th>Dokter</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pendaftaran as $p): ?>
            <tr>
                <td><?= $p->nama; ?></td>
                <td><?= $p->tanggal; ?></td>
                <td><?= $p->poli; ?></td>
                <td><?= $p->dokter; ?></td>
                <td><?= ucfirst($p->status); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
