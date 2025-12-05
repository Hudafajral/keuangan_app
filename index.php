<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Catatan Keuangan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="index-bg">
<div class="index-container">

<h2>Daftar Transaksi</h2>
<a href="tambah.php" class="btn">+ Tambah Transaksi</a>

<?php
$total_masuk = $db->query("SELECT SUM(jumlah) FROM transaksi WHERE jenis='Masuk'")->fetchColumn() ?? 0;
$total_keluar = $db->query("SELECT SUM(jumlah) FROM transaksi WHERE jenis='Keluar'")->fetchColumn() ?? 0;
$sisa_uang = $total_masuk - $total_keluar;
?>

<!-- DASHBOARD 3 BOX -->
<div class="dashboard-wrapper">
    <div class="dash-box" id="filter-masuk">
        <p class="dash-title masuk">Pendapatan</p>
        <p class="dash-value masuk">Rp <?= number_format($total_masuk,0,',','.') ?></p>
    </div>

    <div class="dash-box" id="filter-keluar">
        <p class="dash-title keluar">Pengeluaran</p>
        <p class="dash-value keluar">Rp <?= number_format($total_keluar,0,',','.') ?></p>
    </div>

    <div class="dash-box" id="filter-reset">
        <p class="dash-title total">Total Uang</p>
        <p class="dash-value total">
            <?= ($sisa_uang < 0 ? "-Rp " . number_format(abs($sisa_uang),0,',','.') 
                                : "Rp " . number_format($sisa_uang,0,',','.')) ?>
        </p>
    </div>
</div>

<table id="tabel-transaksi" border="0" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Jenis</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>

<?php
$stmt = $db->query("SELECT * FROM transaksi ORDER BY id DESC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "
        <tr data-jenis='{$row['jenis']}'>
            <td>{$row['id']}</td>
            <td>{$row['tanggal']}</td>
            <td>{$row['keterangan']}</td>
            <td>{$row['jenis']}</td>
            <td>Rp " . number_format($row['jumlah'],0,",",".") . "</td>
            <td class='aksi'>
                <a href='edit.php?id={$row['id']}' class='btn-action btn-edit'>Edit</a>
                <a href='hapus.php?id={$row['id']}' class='btn-action btn-hapus' onclick='return confirm(\"Yakin?\")'>Hapus</a>
            </td>
        </tr>
    ";
}
?>
</table>

</div>

<script src="assets/script.js"></script>
</body>
</html>
