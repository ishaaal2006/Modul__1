<?php
$produk = [
    [
        "nama" => "Casing IP 11",
        "kategori" => "Aksesoris",
        "harga" => 20000,
        "stok" => 5
    ],
    [
        "nama" => "Sapu",
        "kategori" => "Perabotan",
        "harga" => 20000,
        "stok" => 10
    ],
    [
        "nama" => "Advan Neova",
        "kategori" => "Sparepart",
        "harga" => 15000000,
        "stok" => 8
    ],
    [
        "nama" => "Lenovo LOQ",
        "kategori" => "Gadget",
        "harga" => 14000000,
        "stok" => 0
    ],
    [
        "nama" => "TE 37",
        "kategori" => "Sparepart",
        "harga" => 18000000,
        "stok" => 5
    ],
    [
        "nama" => "Coilover Cusco",
        "kategori" => "Sparepart",
        "harga" => 30000000,
        "stok" => 8
    ]
];

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}

$batasDiskon  = 1000000;
$persenDiskon = 10;

function hargaSetelahDiskon($harga, $persen) {
    $potongan = $harga * $persen / 100;
    return $harga - $potongan;
}

$jumlahProduk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="container">
            <nav>
                <div class="logo">Cia Store</div>
                <ul class="menu">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#katalog">Katalog</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero" id="beranda">
        <div class="container">
            <h1>Selamat Datang di Cia Store</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi terbaik dengan harga terjangkau.</p>
            <a href="#katalog" class="btn-hero">Lihat Katalog</a>
        </div>
    </section>

    <main class="container">
        <div class="info">
            <span>Total produk di katalog kami:</span>
            <strong><?= $jumlahProduk; ?> Produk</strong>
        </div>

        <h2 class="section-title" id="katalog">Katalog Produk</h2>
        <div class="katalog">
            <?php foreach ($produk as $item): ?>
                <div class="card">
                    <span class="kategori"><?= htmlspecialchars($item["kategori"]); ?></span>
                    <h3><?= htmlspecialchars($item["nama"]); ?></h3>

                    <?php if ($item["harga"] >= $batasDiskon): ?>
                        <?php $hargaAkhir = hargaSetelahDiskon($item["harga"], $persenDiskon); ?>
                        <span class="badge-diskon">Diskon <?= $persenDiskon; ?>%</span>
                        <div class="harga-normal"><?= rupiah($item["harga"]); ?></div>
                        <div class="harga"><?= rupiah($hargaAkhir); ?></div>
                    <?php else: ?>
                        <div class="harga"><?= rupiah($item["harga"]); ?></div>
                    <?php endif; ?>

                    <div class="stok">Stok: <?= $item["stok"]; ?></div>

                    <?php if ($item["stok"] > 0): ?>
                        <div class="status tersedia">● Tersedia</div>
                        <button class="btn">Beli Sekarang</button>
                    <?php else: ?>
                        <div class="status habis">● Stok Habis</div>
                        <button class="btn" disabled>Beli Sekarang</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer id="kontak">
        <div class="container">
            <p>&copy; <?= date("Y"); ?> Cia Store. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>