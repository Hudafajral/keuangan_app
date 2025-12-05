<?php 
include "config/koneksi.php"; 

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $ket     = $_POST['keterangan'];
    $jenis   = $_POST['jenis'];
    $jumlah  = $_POST['jumlah'];

    $stmt = $db->prepare("INSERT INTO transaksi (tanggal, keterangan, jenis, jumlah) VALUES (?,?,?,?)");
    $stmt->execute([$tanggal, $ket, $jenis, $jumlah]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- ganti sesuai lokasi css -->
</head>

<body class="form-bg">

<div class="form-login-box">
    <h2 class="form-title">Tambah Transaksi</h2>

    <form method="POST">

        <div class="input-field">
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="input-field">
            <label>Keterangan</label>
            <input type="text" name="keterangan" placeholder="Contoh: Gajian" required>
        </div>

        <div class="input-field">
            <label>Jenis</label>
            <select name="jenis" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>

        <div class="input-field">
            <label>Jumlah</label>
            <input type="number" name="jumlah" placeholder="Contoh: 150000" required>
        </div>

        <button type="submit" name="simpan" class="btn-submit">Simpan</button>

        <a href="index.php" class="back-link">← Kembali</a>

    </form>
</div>

</body>
</html>
