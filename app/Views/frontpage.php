<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pengiriman - ASS Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tracking-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .hero-section {
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4">ASS Cargo</h1>
            <p class="lead">Lacak pengiriman Anda dengan mudah</p>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="tracking-box">
                    <h3 class="text-center mb-4">Lacak Nomor STT Ass</h3>
                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                    
                    <form action="<?= base_url('track') ?>" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg" 
                                   name="stt_ass" placeholder="Masukkan Nomor STT Ass" required>
                            <button class="btn btn-primary btn-lg" type="submit">Lacak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>