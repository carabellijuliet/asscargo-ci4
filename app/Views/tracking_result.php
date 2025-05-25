<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pelacakan - ASS Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="mb-4">Hasil Pelacakan STT Ass: <?= $pengiriman['stt_ass'] ?></h2>
        
        <div class="card mb-4">
            <div class="card-header">
                <h4>Detail Pengiriman</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Pengirim:</strong> <?= $pengiriman['nama_pengirim'] ?></p>
                        <p><strong>Penerima:</strong> <?= $pengiriman['nama_penerima'] ?></p>
                        <p><strong>Alamat:</strong> <?= $pengiriman['alamat_penerima'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kota:</strong> <?= $pengiriman['kota'] ?></p>
                        <p><strong>Paket:</strong> <?= $pengiriman['nama_paket'] ?></p>
                        <p><strong>Status Terakhir:</strong> 
                            <?= end($statusHistory)['status'] ?? 'Belum ada status' ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <h4 class="mb-3">Riwayat Status</h4>
        <div class="list-group">
            <?php foreach ($statusHistory as $status): ?>
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $status['status'] ?></h5>
                    <small><?= date('d/m/Y H:i', strtotime($status['created_at'])) ?></small>
                </div>
                <p class="mb-1">Lokasi: <?= $status['lokasi'] ?></p>
            </div>
            <?php endforeach; ?>
            
            <?php if (empty($statusHistory)): ?>
            <div class="list-group-item">
                <p class="mb-1 text-center">Belum ada riwayat status</p>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="mt-4">
            <a href="<?= base_url() ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</body>
</html>