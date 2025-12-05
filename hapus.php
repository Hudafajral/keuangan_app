<?php
include "config/koneksi.php";

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM transaksi WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
