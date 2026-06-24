<?php
// Database Destinasi Wisata
$destinasi = [
    "alam" => [
        "nama" => "Pulau Bakut & Jembatan Barito",
        "desc" => "Menikmati senja di pinggiran sungai Barito sambil melihat jembatan ikonik dan hutan mangrove yang tenang. Cocok buat ngelepas penat setelah nugas seharian.",
        "img" => "https://img.antaranews.com/cache/730x487/2020/07/21/IMG-20200721-WA0017_1.jpg?auto=format&fit=crop&w=800&q=80", // Gambar ilustrasi alam sungai/jembatan
        "tips" => "Datang jam 4 sore biar dapet golden hour."
    ],
    "kuliner" => [
        "nama" => "Siring Menara Pandang & Pasar Terapung",
        "desc" => "Pusat keramaian kota. Kamu bisa nyari jajanan tradisional, naik kelotok, atau sekadar jalan-jalan santai sambil menikmati suasana pinggir sungai Martapura.",
        "img" => "https://zjglidcehtsqqqhbdxyp.supabase.co/storage/v1/object/public/atourin/images/wilayah/banjarmasin-1638809137.png?x-image-process=image/resize,p_100,limit_1/imageslim?auto=format&fit=crop&w=800&q=80", // Gambar ilustrasi kuliner lokal
        "tips" => "Paling asyik ke sini Minggu pagi, atau malam Minggu untuk cari makan."
    ],
    "nongkrong" => [
        "nama" => "Cafe Hopping Area Kayu Tangi",
        "desc" => "Cari suasana baru buat nugas atau mabar? Banyak cafe tersembunyi dengan kopi enak dan Wi-Fi kencang di sekitar sini yang pas buat mahasiswa rantau.",
        "img" => "https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=800&q=80", // Gambar ilustrasi cafe
        "tips" => "Siapkan dompet dan pastikan colokan aman."
    ],
    "petualang" => [
        "nama" => "Bukit Matang Kaladan",
        "desc" => "Butuh effort lebih buat naik, tapi pemandangan gugusan pulau kecil di waduk Riam Kanan dari atas bukit ini bakal bikin semua beban revisi skripsi hilang.",
        "img" => "https://zjglidcehtsqqqhbdxyp.supabase.co/storage/v1/object/public/atourin/images/destination/banjar/bukit-matang-kaladan-profile1639498827.jpeg?x-image-process=image/resize,p_100,limit_1/imageslim?auto=format&fit=crop&w=800&q=80", // Gambar ilustrasi perbukitan
        "tips" => "Bawa air minum yang banyak dan berangkat pagi-pagi!"
    ]
];

$hasil = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vibe"])) {
    $pilihan_vibe = $_POST["vibe"];
    if (array_key_exists($pilihan_vibe, $destinasi)) {
        $hasil = $destinasi[$pilihan_vibe];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healing Anak Rantau Guide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            min-height: 100vh;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .header-title {
            font-weight: 800;
            color: #198754;
            letter-spacing: -1px;
        }
        .vibe-card {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            border-radius: 15px;
            overflow: hidden;
        }
        .vibe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: #198754;
        }
        .vibe-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .result-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,0.08);
            background: white;
            animation: slideUp 0.5s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        .result-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .result-body {
            padding: 30px;
        }
        .badge-tips {
            background-color: #ffc107;
            color: #000;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 30px;
            display: inline-block;
            margin-top: 15px;
        }
        @keyframes slideUp {
            to { opacity: 1; transform: translateY(0); }
        }
        /* Hide radio buttons securely */
        .vibe-radio {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        /* Style when radio is checked */
        .vibe-radio:checked + .vibe-card {
            border-color: #198754;
            background-color: #e8f5e9;
        }
        .btn-cari {
            border-radius: 30px;
            padding: 12px 40px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h1 class="header-title">🎒 Healing Anak Rantau</h1>
        <p class="text-muted fs-5">Pusing mikirin kodingan dan deadline tugas? Pilih <i>vibe</i> kamu hari ini, kami kasih rekomendasinya!</p>
    </div>

    <form method="POST" action="#hasil" class="mb-5">
        <div class="row g-4 justify-content-center mb-4">
            <div class="col-6 col-md-3">
                <label class="w-100 h-100">
                    <input type="radio" name="vibe" value="alam" class="vibe-radio" required>
                    <div class="card vibe-card h-100 text-center p-3">
                        <div class="vibe-icon">🌿</div>
                        <h5 class="fw-bold mb-0">Cari Ketenangan</h5>
                    </div>
                </label>
            </div>
            
            <div class="col-6 col-md-3">
                <label class="w-100 h-100">
                    <input type="radio" name="vibe" value="kuliner" class="vibe-radio">
                    <div class="card vibe-card h-100 text-center p-3">
                        <div class="vibe-icon">🍜</div>
                        <h5 class="fw-bold mb-0">Wisata Perut</h5>
                    </div>
                </label>
            </div>

            <div class="col-6 col-md-3">
                <label class="w-100 h-100">
                    <input type="radio" name="vibe" value="nongkrong" class="vibe-radio">
                    <div class="card vibe-card h-100 text-center p-3">
                        <div class="vibe-icon">☕</div>
                        <h5 class="fw-bold mb-0">Nugas & Ngopi</h5>
                    </div>
                </label>
            </div>

            <div class="col-6 col-md-3">
                <label class="w-100 h-100">
                    <input type="radio" name="vibe" value="petualang" class="vibe-radio">
                    <div class="card vibe-card h-100 text-center p-3">
                        <div class="vibe-icon">⛰️</div>
                        <h5 class="fw-bold mb-0">Mendaki Ringan</h5>
                    </div>
                </label>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg btn-cari shadow-sm">Cari Destinasi ✈️</button>
        </div>
    </form>

    <?php if ($hasil): ?>
        <div id="hasil" class="row justify-content-center">
            <div class="col-md-8">
                <div class="result-card">
                    <img src="<?php echo $hasil['img']; ?>" alt="<?php echo $hasil['nama']; ?>" class="result-img">
                    <div class="result-body">
                        <h2 class="fw-bold text-success mb-3"><?php echo $hasil['nama']; ?></h2>
                        <p class="fs-5 text-secondary" style="line-height: 1.6;"><?php echo $hasil['desc']; ?></p>
                        <div class="badge-tips">
                            💡 <strong>Pro Tips:</strong> <?php echo $hasil['tips']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <footer class="text-center mt-5">
        <hr class="text-muted">
        <p class="text-muted small">Tugas Cloud Computing | Dibuat dengan 💻 oleh Peri Yanur</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>