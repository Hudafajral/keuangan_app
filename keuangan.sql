

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(10) DEFAULT NULL CHECK (`jenis` in ('masuk','keluar')),
  `jumlah` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `transaksi` (`id`, `tanggal`, `keterangan`, `jenis`, `jumlah`) VALUES
(1, '2025-12-01', 'gajian', 'masuk', 10000000.00),
(2, '2025-12-01', 'belanja', 'keluar', 1000000.00);

ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
