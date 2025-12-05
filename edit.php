<?php 
include "config/koneksi.php"; 

$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM transaksi WHERE id=?");
$query->execute([$id]);
$data = $query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $ket     = $_POST['keterangan'];
    $jenis   = $_POST['jenis'];
    $jumlah  = $_POST['jumlah'];

    $stmt = $db->prepare("UPDATE transaksi SET tanggal=?, keterangan=?, jenis=?, jumlah=? WHERE id=?");
    $stmt->execute([$tanggal, $ket, $jenis, $jumlah, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body class="form-bg">

<div class="form-login-box">
    <h2>Edit Transaksi</h2>

    <form method="POST">

        <div class="input-field">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>
        </div>

        <div class="input-field">
            <label>Keterangan</label>
            <input type="text" name="keterangan" value="<?= $data['keterangan'] ?>" required>
        </div>

        <div class="input-field">
            <label>Jenis</label>
            <select name="jenis">
                <option value="masuk"  <?= $data['jenis']=='masuk'?'selected':'' ?>>Masuk</option>
                <option value="keluar" <?= $data['jenis']=='keluar'?'selected':'' ?>>Keluar</option>
            </select>
        </div>

        <div class="input-field">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required>
        </div>

        <button type="submit" name="update" class="btn-submit">Update</button>

        <a href="index.php" class="back-link">← Kembali</a>

    </form>
</div>

</body>
</html>
