#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`id_admin`, `nm_admin`, `email`, `image`, `role_id`, `status`, `password`, `is_active`, `date_created`) VALUES (1, 'Yohanes Selan', 'yohanesselan@gmail.com', 'simon.jpg', 2, 'Manager', '$2y$10$8PH4lc4GFJ2pdw/uiscZUO9JxMrp0q2bnQsuMVFjEijfENnHBWZhy', 1, '2020-09-01');
INSERT INTO `admin` (`id_admin`, `nm_admin`, `email`, `image`, `role_id`, `status`, `password`, `is_active`, `date_created`) VALUES (2, 'Admin KSP Swastisari', 'kspswastisari@gmail.com', 'asterius.jpg', 1, 'Admin', '$2y$10$8PH4lc4GFJ2pdw/uiscZUO9JxMrp0q2bnQsuMVFjEijfENnHBWZhy', 1, '2020-09-01');


#
# TABLE STRUCTURE FOR: admin_access_menu
#

DROP TABLE IF EXISTS `admin_access_menu`;

CREATE TABLE `admin_access_menu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role_id` int(2) NOT NULL,
  `menu_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (2, 1, 1);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (3, 1, 2);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (4, 1, 3);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (6, 2, 1);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (12, 2, 2);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (13, 1, 4);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (14, 1, 6);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (15, 2, 5);
INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES (16, 1, 7);


#
# TABLE STRUCTURE FOR: admin_menu
#

DROP TABLE IF EXISTS `admin_menu`;

CREATE TABLE `admin_menu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `menu_id` int(2) NOT NULL,
  `menu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (1, 2, 'Administrator');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (2, 3, 'Data Master');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (3, 4, 'Proses');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (5, 5, 'Data Master');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (8, 6, 'Transaksi');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (11, 1, 'Dashboard');
INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES (12, 7, 'Utility');


#
# TABLE STRUCTURE FOR: admin_sub_menu
#

DROP TABLE IF EXISTS `admin_sub_menu`;

CREATE TABLE `admin_sub_menu` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `menu_id` int(2) NOT NULL,
  `title` varchar(25) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (1, 2, 'Profil', 'admin/admin', 'fas fa-fw fa-user', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (4, 5, 'Admin', 'admin/manager', 'fas fa-fw fa-user-shield', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (5, 5, 'Anggota', 'admin/anggota', 'fas fa-fw fa-users', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (6, 3, 'Anggota', 'admin/anggota', 'fas fa-fw fa-users', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (11, 3, 'Kriteria', 'admin/kriteria', 'fas fa-fw fa-list-ol', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (12, 6, 'Simpanan', 'admin/simpanan', 'fas fa-fw fa-wallet', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (14, 3, 'Artikel', 'admin/artikel', 'fas fa-fw fa-newspaper', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (26, 1, 'Dashboard', 'admin/beranda', 'fas fa-fw fa-tachometer-alt', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (27, 4, 'Kredit', 'admin/kredit/pengajuan', 'fas fa-fw fa-table', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (28, 4, 'Diterima', 'admin/kredit', 'fas fa-fw fa-user-check', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (29, 4, 'Ditolak', 'admin/kredit/ditolak', 'fas fa-fw fa-exclamation-circle', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (30, 4, 'Selesai', 'admin/kredit/selesai', 'fas fa-fw fa-clipboard-check', 1);
INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (32, 7, 'Backup Database', 'admin/backup/index', 'fas fa-fw fa-database', 1);


#
# TABLE STRUCTURE FOR: anggota
#

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `no_buku` varchar(25) NOT NULL,
  `nm_anggota` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jns_kelamin` enum('Lelaki','Perempuan','','','') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kel_des` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `kota_kab` varchar(25) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `pendidikan_terakhir` enum('Sarjana','SMA/SMK','SMP','SD','Tidak bersekolah') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` int(2) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  UNIQUE KEY `no_buku` (`no_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4;

INSERT INTO `anggota` (`id_anggota`, `no_buku`, `nm_anggota`, `nik`, `tmpt_lahir`, `tgl_lhr`, `agama`, `no_hp`, `email`, `foto`, `jns_kelamin`, `alamat`, `rt`, `rw`, `kel_des`, `kec`, `kota_kab`, `prov`, `kode_pos`, `pendidikan_terakhir`, `pekerjaan`, `tgl_masuk`, `password`, `aktif`) VALUES (155, 'BA.155', 'Maximilianus Benge', '0123456789101113', 'Bajawa', '1998-02-05', 'Khatolik', '082237428096', 'maxmiliano098@gmail.com', 'gm1.jpg', 'Lelaki', 'Jln. Kelimutu', '003', '002', 'Kelimutu', 'Ende Tengah', 'Kupang', 'Nusa Tenggara Timur', '81555', 'SMA/SMK', 'Swasta', '2020-05-18', '$2y$10$lpIJe6wWI7KteAftpqtBH.S64SuG1Q4T/NLxYFaWwn6ADnmzqcHrW', 1);
INSERT INTO `anggota` (`id_anggota`, `no_buku`, `nm_anggota`, `nik`, `tmpt_lahir`, `tgl_lhr`, `agama`, `no_hp`, `email`, `foto`, `jns_kelamin`, `alamat`, `rt`, `rw`, `kel_des`, `kec`, `kota_kab`, `prov`, `kode_pos`, `pendidikan_terakhir`, `pekerjaan`, `tgl_masuk`, `password`, `aktif`) VALUES (156, 'BA.156', 'Tantri Lezo', '5308192905980001', 'Bajawa', '2005-05-02', 'Katolik', '082237428096', 'lezotantri@gmail.com', 'gm2.jpg', 'Perempuan', 'jln. kelimutu', '003', '001', 'Kelimutu', 'Ende Tengah', 'Ende', 'Nusa Tenggara Timur', '85111', 'SMA/SMK', 'Swasta', '2020-12-18', '$2y$10$XshmLGhVGcq6Rs8PdaH.aePOrsmgKr/ycf6xTtnHJovA7omx0Gsby', 1);


#
# TABLE STRUCTURE FOR: angsuran
#

DROP TABLE IF EXISTS `angsuran`;

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `id_kredit` int(11) NOT NULL,
  `pokok` float NOT NULL,
  `bunga` float NOT NULL,
  `sukarela` float NOT NULL,
  `jumlah_angsuran` float NOT NULL,
  `jumlah_harus_bayar` float NOT NULL,
  `jumlah_bayar` float NOT NULL,
  `denda` float NOT NULL DEFAULT 0,
  `status` enum('Belum Dibayar','Dibayar','','') NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_angsuran`),
  KEY `id_pinjaman` (`id_kredit`),
  CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_kredit`) REFERENCES `kredit` (`id_kredit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3601 DEFAULT CHARSET=utf8mb4;

INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3577, 267, '583333', '140000', '50000', '773333', '773333', '773333', '0', 'Dibayar', '2020-12-18', '2021-01-17', 'Struk_Pembayaran3.jpg');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3578, 267, '583333', '140000', '50000', '773333', '773333', '773333', '140000', 'Dibayar', '2020-12-18', '2021-02-16', 'Struk_Pembayaran4.jpg');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3579, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-03-18', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3580, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-04-17', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3581, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-05-17', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3582, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-06-16', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3583, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-07-16', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3584, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-08-15', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3585, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-09-14', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3586, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-10-14', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3587, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-11-13', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3588, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2021-12-13', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3589, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-01-12', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3590, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-02-11', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3591, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-03-13', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3592, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-04-12', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3593, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-05-12', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3594, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-06-11', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3595, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-07-11', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3596, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-08-10', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3597, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-09-09', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3598, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-10-09', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3599, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-11-08', '');
INSERT INTO `angsuran` (`id_angsuran`, `id_kredit`, `pokok`, `bunga`, `sukarela`, `jumlah_angsuran`, `jumlah_harus_bayar`, `jumlah_bayar`, `denda`, `status`, `tanggal_bayar`, `jatuh_tempo`, `bukti`) VALUES (3600, 267, '583333', '140000', '50000', '773333', '773333', '0', '0', 'Belum Dibayar', '0000-00-00', '2022-12-08', '');


#
# TABLE STRUCTURE FOR: artikel
#

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tanggal_buat` date NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `foto`, `tanggal_buat`) VALUES (31, 'Berita 1', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'gm1.jpg', '2020-12-17');


#
# TABLE STRUCTURE FOR: bunga
#

DROP TABLE IF EXISTS `bunga`;

CREATE TABLE `bunga` (
  `id_bunga` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bunga` varchar(100) NOT NULL,
  `nilai` double NOT NULL,
  PRIMARY KEY (`id_bunga`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `bunga` (`id_bunga`, `jenis_bunga`, `nilai`) VALUES (1, 'Menurun 1.8%', '0.018');
INSERT INTO `bunga` (`id_bunga`, `jenis_bunga`, `nilai`) VALUES (2, 'Tetap 1%', '0.01');
INSERT INTO `bunga` (`id_bunga`, `jenis_bunga`, `nilai`) VALUES (3, 'Menurun 1.6%', '0.016');


#
# TABLE STRUCTURE FOR: gap
#

DROP TABLE IF EXISTS `gap`;

CREATE TABLE `gap` (
  `id_gap` int(11) NOT NULL AUTO_INCREMENT,
  `gap` int(11) NOT NULL,
  `bobot` double NOT NULL,
  PRIMARY KEY (`id_gap`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (1, 0, '5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (2, 1, '4.5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (4, -1, '4');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (5, 2, '3.5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (6, -2, '3');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (7, 3, '2.5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (8, -3, '2');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (9, 4, '1.5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (10, -4, '1');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (11, 5, '0.5');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (12, -5, '0');
INSERT INTO `gap` (`id_gap`, `gap`, `bobot`) VALUES (13, 6, '-1');


#
# TABLE STRUCTURE FOR: jangka_waktu_angsuran
#

DROP TABLE IF EXISTS `jangka_waktu_angsuran`;

CREATE TABLE `jangka_waktu_angsuran` (
  `min` double NOT NULL,
  `max` double NOT NULL,
  `jangka_waktu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('500000', '3000000', '6');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('3000001', '6000000', '12');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('6000001', '9000000', '18');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('9000001', '15000000', '24');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('15000001', '20000000', '30');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('20000001', '25000000', '36');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('25000001', '30000000', '42');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('30000001', '35000000', '48');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('35000001', '40000000', '54');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('40000001', '45000000', '60');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('45000001', '50000000', '66');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('50000001', '60000000', '72');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('60000001', '70000000', '78');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('70000001', '80000000', '84');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('75000001', '90000000', '90');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('80000001', '100000000', '96');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('100000001', '150000000', '102');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('150000001', '175000000', '108');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('175000001', '200000000', '114');
INSERT INTO `jangka_waktu_angsuran` (`min`, `max`, `jangka_waktu`) VALUES ('200000001', '250000000', '120');


#
# TABLE STRUCTURE FOR: kredit
#

DROP TABLE IF EXISTS `kredit`;

CREATE TABLE `kredit` (
  `id_kredit` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `id_bunga` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `besar_pinjaman` double NOT NULL,
  `jumlah_penghasilan` double NOT NULL,
  `jumlah_simpanan` double NOT NULL,
  `total_angsur` float NOT NULL,
  `status` enum('Diterima','Ditolak','Pengajuan','Selesai') NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `nilai_akhir` double NOT NULL,
  `foto_jaminan` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kredit`),
  KEY `id_kriteria` (`c1`),
  KEY `c2` (`c2`),
  KEY `c3` (`c3`),
  KEY `c4` (`c4`),
  KEY `c5` (`c5`),
  KEY `c6` (`c6`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_bunga` (`id_bunga`),
  CONSTRAINT `kredit_ibfk_1` FOREIGN KEY (`c1`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_2` FOREIGN KEY (`c2`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_3` FOREIGN KEY (`c3`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_4` FOREIGN KEY (`c4`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_5` FOREIGN KEY (`c5`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_6` FOREIGN KEY (`c6`) REFERENCES `sub_kriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_7` FOREIGN KEY (`id_bunga`) REFERENCES `bunga` (`id_bunga`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kredit_ibfk_8` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kredit` (`id_kredit`, `id_anggota`, `id_bunga`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `besar_pinjaman`, `jumlah_penghasilan`, `jumlah_simpanan`, `total_angsur`, `status`, `tgl_pengajuan`, `tgl_terima`, `nilai_akhir`, `foto_jaminan`, `aktif`) VALUES (267, 155, 2, 3, 8, 17, 22, 26, 32, '14000000', '2000000', '15000000', '17013400', 'Diterima', '2020-12-18', '2020-12-18', '3.825', 'BPKB_Kendaraan5.jpg', 1);


#
# TABLE STRUCTURE FOR: kriteria
#

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nilai_pencapaian` int(11) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (1, 'C1 - Pekerjaan', 'Core Factor', 1);
INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (2, 'C2 - Penghasilan', 'Core Factor', 1);
INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (3, 'C3 - Besar Pinjaman', 'Core Factor', 3);
INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Secondary Factor', 2);
INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (5, 'C5 - Barang Jaminan', 'Secondary Factor', 2);
INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `jenis`, `nilai_pencapaian`) VALUES (6, 'C6 - Simpanan', 'Core Factor', 2);


#
# TABLE STRUCTURE FOR: manajemen
#

DROP TABLE IF EXISTS `manajemen`;

CREATE TABLE `manajemen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (1, 'Yohanes Sason Helan, A.Md', 'General Manager', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (2, 'Imelda Anin, S.AB', 'Wakil General Manager', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (3, 'Kasmirus Kopong, S.Pd', 'Kepala Devisi Personalia', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (4, 'Thersia Pakae', 'Kepala Devisi Keuangan', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (5, 'Nusryadi Boimau, S.Pt', 'Kepala Devisi Kredit', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (7, 'Hendra M. Sikki, S.Kom', 'Kepala Devisi IT dan Pengembangan', 'default.jpg', 'manajemen');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (8, 'Simon Anunu, S.Ag, M.Pd', 'Ketua Pengawas', 'simon.jpg', 'pengawas');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (9, 'Baltasar Mosa Gerans, SE', 'Sekertaris Pengawas', 'baltasar.jpg', 'pengawas');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (10, 'Yohanes Wayong, SE', 'Anggota Pengawas', 'yohanes-wayong.jpg', 'pengawas');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (11, 'Asterius David Daki, S.Pd', 'Ketua Pengurus', 'asterius.jpg', 'pengurus');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (12, 'Drs. Lambertus Ara Tukan, MM', 'Wakil Ketua 1', 'lambertus.jpg', 'pengurus');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (13, 'Drs. Martinus Seran', 'Wakil Ketua 2', 'martinus.jpg', 'pengurus');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (14, 'Fransiskus X. S. Rahas, S.Pd, M.Hum', 'Sekertaris', 'fransiskus.jpg', 'pengurus');
INSERT INTO `manajemen` (`id`, `nama`, `jabatan`, `foto`, `status`) VALUES (15, 'Martina Saly Kale', 'Bendahara', 'martina.jpg', 'pengurus');


#
# TABLE STRUCTURE FOR: role
#

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `role` (`id`, `role`) VALUES (2, 'Manager');


#
# TABLE STRUCTURE FOR: simpanan
#

DROP TABLE IF EXISTS `simpanan`;

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `deposit` double NOT NULL,
  `kredit` double NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL,
  PRIMARY KEY (`id_simpanan`),
  KEY `no_agt` (`id_anggota`),
  KEY `no_agt_2` (`id_anggota`),
  CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4;

INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (240, 155, '350000', '0', '2020-12-18', 'Struk_Pembayaran9.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (241, 155, '500000', '0', '2020-12-18', 'Struk_Pembayaran10.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (242, 155, '500000', '0', '2020-12-18', 'Struk_Pembayaran11.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (243, 155, '750000', '0', '2020-12-18', 'Struk_Pembayaran12.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (244, 155, '5000000', '0', '2020-12-18', 'Struk_Pembayaran13.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (245, 155, '7900000', '0', '2020-12-18', 'Struk_Pembayaran14.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (246, 156, '350000', '0', '2020-12-18', 'Struk_Pembayaran15.jpg');
INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `deposit`, `kredit`, `tanggal`, `bukti`) VALUES (247, 156, '500000', '0', '2020-12-18', 'Struk_Pembayaran16.jpg');


#
# TABLE STRUCTURE FOR: sub_krit_barang
#

DROP TABLE IF EXISTS `sub_krit_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_barang` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 5;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_barang` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (25, 5, 'C5 - Barang Jaminan', 'Personal Garanty', '0', '0', '4');
INSERT INTO `sub_krit_barang` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (26, 5, 'C5 - Barang Jaminan', 'BPKB Kendaraan', '0', '0', '3');
INSERT INTO `sub_krit_barang` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (27, 5, 'C5 - Barang Jaminan', 'SK awal dan SK akhir', '0', '0', '2');
INSERT INTO `sub_krit_barang` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (28, 5, 'C5 - Barang Jaminan', 'Sertifikat tanah', '0', '0', '1');


#
# TABLE STRUCTURE FOR: sub_krit_besarpinjaman
#

DROP TABLE IF EXISTS `sub_krit_besarpinjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_besarpinjaman` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 3;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (13, 3, 'C3 - Besar Pinjaman', 'Diatas 100 Juta - 250 Juta', '100000001', '250000000', '7');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (14, 3, 'C3 - Besar Pinjaman', 'Diatas 60 Juta - 100 Juta', '60000001', '100000000', '6');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (15, 3, 'C3 - Besar Pinjaman', 'Diatas 35 Juta - 60 Juta', '35000001', '60000000', '5');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (16, 3, 'C3 - Besar Pinjaman', 'Diatas 15 Juta - 35 Juta', '15000001', '35000000', '4');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (17, 3, 'C3 - Besar Pinjaman', 'Diatas 10 Juta - 15 Juta', '10000001', '15000000', '3');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (18, 3, 'C3 - Besar Pinjaman', 'Diatas 5 Juta -10 Juta', '5000001', '10000000', '2');
INSERT INTO `sub_krit_besarpinjaman` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (19, 3, 'C3 - Besar Pinjaman', 'Dibawah 500 Ribu - 5 Juta', '0', '5000000', '1');


#
# TABLE STRUCTURE FOR: sub_krit_pekerjaan
#

DROP TABLE IF EXISTS `sub_krit_pekerjaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_pekerjaan` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 1;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_pekerjaan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (1, 1, 'C1 - Pekerjaan', 'Lain-lain', '0', '0', '5');
INSERT INTO `sub_krit_pekerjaan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (2, 1, 'C1 - Pekerjaan', 'Wiraswasta', '0', '0', '4');
INSERT INTO `sub_krit_pekerjaan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (3, 1, 'C1 - Pekerjaan', 'Swasta', '0', '0', '3');
INSERT INTO `sub_krit_pekerjaan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (4, 1, 'C1 - Pekerjaan', 'TNI/Polisi', '0', '0', '2');
INSERT INTO `sub_krit_pekerjaan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (5, 1, 'C1 - Pekerjaan', 'ASN/PNS', '0', '0', '1');


#
# TABLE STRUCTURE FOR: sub_krit_penghasilan
#

DROP TABLE IF EXISTS `sub_krit_penghasilan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_penghasilan` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 2;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (6, 2, 'C2 - Penghasilan', 'Dibawah  500 Ribu', '0', '500000', '7');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (7, 2, 'C2 - Penghasilan', 'Diatas 500 Ribu - 1 Juta', '500001', '1000000', '6');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (8, 2, 'C2 - Penghasilan', 'Diatas 1 Juta - 2.5 Juta', '1000001', '2500000', '5');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (9, 2, 'C2 - Penghasilan', 'Diatas 2,5 Juta - 5 Juta', '2500001', '5000000', '4');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (10, 2, 'C2 - Penghasilan', 'Diatas 5 Juta - 8 Juta', '5000001', '8000000', '3');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (11, 2, 'C2 - Penghasilan', 'Diatas 8 Juta - 10 Juta', '8000001', '10000000', '2');
INSERT INTO `sub_krit_penghasilan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (12, 2, 'C2 - Penghasilan', 'Diatas 10 Juta', '10000001', '999999999999999', '1');


#
# TABLE STRUCTURE FOR: sub_krit_simpanan
#

DROP TABLE IF EXISTS `sub_krit_simpanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_simpanan` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 6;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (29, 6, 'C6 - Simpanan', 'Diatas 50 Juta', '50000001', '999999999999999', '1');
INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (30, 6, 'C6 - Simpanan', 'Diatas 40 Juta - 50 Juta', '40000001', '50000000', '2');
INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (31, 6, 'C6 - Simpanan', 'Diatas 20 Juta - 40 Juta', '20000001', '40000000', '3');
INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (32, 6, 'C6 - Simpanan', 'Diatas 10 Juta - 20 Juta', '10000001', '20000000', '4');
INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (33, 6, 'C6 - Simpanan', 'Diatas 500 Ribu - 10 Juta', '500001', '10000000', '5');
INSERT INTO `sub_krit_simpanan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (34, 6, 'C6 - Simpanan', 'Dibawah 500,000', '0', '500000', '6');


#
# TABLE STRUCTURE FOR: sub_krit_tujuan
#

DROP TABLE IF EXISTS `sub_krit_tujuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sub_krit_tujuan` AS select `sub_kriteria`.`id_sub` AS `id_sub`,`kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`min` AS `min`,`sub_kriteria`.`max` AS `max`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria` and `sub_kriteria`.`id_kriteria` = 4;

utf8mb4_unicode_ci;

INSERT INTO `sub_krit_tujuan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (20, 4, 'C4 - Tujuan Pinjaman', 'Kesehatan', '0', '0', '5');
INSERT INTO `sub_krit_tujuan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (21, 4, 'C4 - Tujuan Pinjaman', 'Kesejahteraan', '0', '0', '4');
INSERT INTO `sub_krit_tujuan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (22, 4, 'C4 - Tujuan Pinjaman', 'Kredit kendaraan', '0', '0', '3');
INSERT INTO `sub_krit_tujuan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (23, 4, 'C4 - Tujuan Pinjaman', 'Pendidikan', '0', '0', '2');
INSERT INTO `sub_krit_tujuan` (`id_sub`, `id_kriteria`, `kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (24, 4, 'C4 - Tujuan Pinjaman', 'Usaha', '0', '0', '1');


#
# TABLE STRUCTURE FOR: sub_kriteria
#

DROP TABLE IF EXISTS `sub_kriteria`;

CREATE TABLE `sub_kriteria` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `nm_sub_kriteria` varchar(100) NOT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL,
  `bobot` double NOT NULL,
  PRIMARY KEY (`id_sub`),
  KEY `id_kriteria` (`id_kriteria`),
  CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (1, 1, 'Lain-lain', '0', '0', '5');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (2, 1, 'Wiraswasta', '0', '0', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (3, 1, 'Swasta', '0', '0', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (4, 1, 'TNI/Polisi', '0', '0', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (5, 1, 'ASN/PNS', '0', '0', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (6, 2, 'Dibawah  500 Ribu', '0', '500000', '7');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (7, 2, 'Diatas 500 Ribu - 1 Juta', '500001', '1000000', '6');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (8, 2, 'Diatas 1 Juta - 2.5 Juta', '1000001', '2500000', '5');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (9, 2, 'Diatas 2,5 Juta - 5 Juta', '2500001', '5000000', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (10, 2, 'Diatas 5 Juta - 8 Juta', '5000001', '8000000', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (11, 2, 'Diatas 8 Juta - 10 Juta', '8000001', '10000000', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (12, 2, 'Diatas 10 Juta', '10000001', '999999999999999', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (13, 3, 'Diatas 100 Juta - 250 Juta', '100000001', '250000000', '7');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (14, 3, 'Diatas 60 Juta - 100 Juta', '60000001', '100000000', '6');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (15, 3, 'Diatas 35 Juta - 60 Juta', '35000001', '60000000', '5');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (16, 3, 'Diatas 15 Juta - 35 Juta', '15000001', '35000000', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (17, 3, 'Diatas 10 Juta - 15 Juta', '10000001', '15000000', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (18, 3, 'Diatas 5 Juta -10 Juta', '5000001', '10000000', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (19, 3, 'Dibawah 500 Ribu - 5 Juta', '0', '5000000', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (20, 4, 'Kesehatan', '0', '0', '5');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (21, 4, 'Kesejahteraan', '0', '0', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (22, 4, 'Kredit kendaraan', '0', '0', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (23, 4, 'Pendidikan', '0', '0', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (24, 4, 'Usaha', '0', '0', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (25, 5, 'Personal Garanty', '0', '0', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (26, 5, 'BPKB Kendaraan', '0', '0', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (27, 5, 'SK awal dan SK akhir', '0', '0', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (28, 5, 'Sertifikat tanah', '0', '0', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (29, 6, 'Diatas 50 Juta', '50000001', '999999999999999', '1');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (30, 6, 'Diatas 40 Juta - 50 Juta', '40000001', '50000000', '2');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (31, 6, 'Diatas 20 Juta - 40 Juta', '20000001', '40000000', '3');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (32, 6, 'Diatas 10 Juta - 20 Juta', '10000001', '20000000', '4');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (33, 6, 'Diatas 500 Ribu - 10 Juta', '500001', '10000000', '5');
INSERT INTO `sub_kriteria` (`id_sub`, `id_kriteria`, `nm_sub_kriteria`, `min`, `max`, `bobot`) VALUES (34, 6, 'Dibawah 500,000', '0', '500000', '6');


#
# TABLE STRUCTURE FOR: user_token
#

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: v_deposit
#

DROP TABLE IF EXISTS `v_deposit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_deposit` AS select `simpanan`.`id_simpanan` AS `id_simpanan`,`simpanan`.`id_anggota` AS `id_anggota`,`anggota`.`no_buku` AS `no_buku`,`anggota`.`nm_anggota` AS `nm_anggota`,`simpanan`.`deposit` AS `deposit`,`simpanan`.`tanggal` AS `tanggal`,`simpanan`.`bukti` AS `bukti` from (`simpanan` join `anggota`) where `anggota`.`id_anggota` = `simpanan`.`id_anggota` and `simpanan`.`deposit` <> 0;

utf8mb4_unicode_ci;

INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (240, 155, 'BA.155', 'Maximilianus Benge', '350000', '2020-12-18', 'Struk_Pembayaran9.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (241, 155, 'BA.155', 'Maximilianus Benge', '500000', '2020-12-18', 'Struk_Pembayaran10.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (242, 155, 'BA.155', 'Maximilianus Benge', '500000', '2020-12-18', 'Struk_Pembayaran11.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (243, 155, 'BA.155', 'Maximilianus Benge', '750000', '2020-12-18', 'Struk_Pembayaran12.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (244, 155, 'BA.155', 'Maximilianus Benge', '5000000', '2020-12-18', 'Struk_Pembayaran13.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (245, 155, 'BA.155', 'Maximilianus Benge', '7900000', '2020-12-18', 'Struk_Pembayaran14.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (246, 156, 'BA.156', 'Tantri Lezo', '350000', '2020-12-18', 'Struk_Pembayaran15.jpg');
INSERT INTO `v_deposit` (`id_simpanan`, `id_anggota`, `no_buku`, `nm_anggota`, `deposit`, `tanggal`, `bukti`) VALUES (247, 156, 'BA.156', 'Tantri Lezo', '500000', '2020-12-18', 'Struk_Pembayaran16.jpg');


#
# TABLE STRUCTURE FOR: v_kredit
#

DROP TABLE IF EXISTS `v_kredit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kredit` AS select `simpanan`.`id_simpanan` AS `id_simpanan`,`simpanan`.`id_anggota` AS `id_anggota`,`anggota`.`no_buku` AS `no_buku`,`anggota`.`nm_anggota` AS `nm_anggota`,`simpanan`.`kredit` AS `kredit`,`simpanan`.`tanggal` AS `tanggal`,`simpanan`.`bukti` AS `bukti` from (`anggota` join `simpanan`) where `simpanan`.`id_anggota` = `anggota`.`id_anggota` and `simpanan`.`kredit` <> 0;

utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: v_kredit_anggota
#

DROP TABLE IF EXISTS `v_kredit_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kredit_anggota` AS select `kredit`.`id_kredit` AS `id_kredit`,`anggota`.`id_anggota` AS `id_anggota`,`anggota`.`no_buku` AS `no_buku`,`anggota`.`nm_anggota` AS `nm_anggota`,`sub_krit_pekerjaan`.`nm_sub_kriteria` AS `krit_pekerjaan`,`sub_krit_penghasilan`.`nm_sub_kriteria` AS `krit_penghasilan`,`sub_krit_besarpinjaman`.`nm_sub_kriteria` AS `krit_besar_pinjaman`,`sub_krit_tujuan`.`nm_sub_kriteria` AS `krit_tujuan`,`sub_krit_barang`.`nm_sub_kriteria` AS `krit_barang_jaminan`,`sub_krit_simpanan`.`nm_sub_kriteria` AS `krit_simpanan`,`bunga`.`jenis_bunga` AS `jenis_bunga`,`kredit`.`besar_pinjaman` AS `besar_pinjaman`,`kredit`.`jumlah_penghasilan` AS `jumlah_penghasilan`,`kredit`.`jumlah_simpanan` AS `jumlah_simpanan`,`kredit`.`total_angsur` AS `total_angsur`,`kredit`.`status` AS `status`,`kredit`.`tgl_pengajuan` AS `tgl_pengajuan`,`kredit`.`tgl_terima` AS `tgl_terima`,`kredit`.`nilai_akhir` AS `nilai_akhir`,`kredit`.`foto_jaminan` AS `foto_jaminan`,`kredit`.`aktif` AS `aktif` from ((((((((`bunga` join `kredit`) join `anggota`) join `sub_krit_tujuan`) join `sub_krit_simpanan`) join `sub_krit_penghasilan`) join `sub_krit_pekerjaan`) join `sub_krit_besarpinjaman`) join `sub_krit_barang`) where `anggota`.`id_anggota` = `kredit`.`id_anggota` and `bunga`.`id_bunga` = `kredit`.`id_bunga` and `sub_krit_pekerjaan`.`id_sub` = `kredit`.`c1` and `sub_krit_penghasilan`.`id_sub` = `kredit`.`c2` and `sub_krit_besarpinjaman`.`id_sub` = `kredit`.`c3` and `sub_krit_tujuan`.`id_sub` = `kredit`.`c4` and `sub_krit_barang`.`id_sub` = `kredit`.`c5` and `sub_krit_simpanan`.`id_sub` = `kredit`.`c6`;

utf8mb4_unicode_ci;

INSERT INTO `v_kredit_anggota` (`id_kredit`, `id_anggota`, `no_buku`, `nm_anggota`, `krit_pekerjaan`, `krit_penghasilan`, `krit_besar_pinjaman`, `krit_tujuan`, `krit_barang_jaminan`, `krit_simpanan`, `jenis_bunga`, `besar_pinjaman`, `jumlah_penghasilan`, `jumlah_simpanan`, `total_angsur`, `status`, `tgl_pengajuan`, `tgl_terima`, `nilai_akhir`, `foto_jaminan`, `aktif`) VALUES (267, 155, 'BA.155', 'Maximilianus Benge', 'Swasta', 'Diatas 1 Juta - 2.5 Juta', 'Diatas 10 Juta - 15 Juta', 'Kredit kendaraan', 'BPKB Kendaraan', 'Diatas 10 Juta - 20 Juta', 'Tetap 1%', '14000000', '2000000', '15000000', '17013400', 'Diterima', '2020-12-18', '2020-12-18', '3.825', 'BPKB_Kendaraan5.jpg', 1);


#
# TABLE STRUCTURE FOR: v_kriteria
#

DROP TABLE IF EXISTS `v_kriteria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kriteria` AS select `kriteria`.`id_kriteria` AS `id_kriteria`,`kriteria`.`kriteria` AS `kriteria`,`sub_kriteria`.`nm_sub_kriteria` AS `nm_sub_kriteria`,`sub_kriteria`.`bobot` AS `bobot` from (`kriteria` join `sub_kriteria`) where `kriteria`.`id_kriteria` = `sub_kriteria`.`id_kriteria`;

utf8mb4_unicode_ci;

INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (1, 'C1 - Pekerjaan', 'Lain-lain', '5');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (1, 'C1 - Pekerjaan', 'Wiraswasta', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (1, 'C1 - Pekerjaan', 'Swasta', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (1, 'C1 - Pekerjaan', 'TNI/Polisi', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (1, 'C1 - Pekerjaan', 'ASN/PNS', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Dibawah  500 Ribu', '7');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 500 Ribu - 1 Juta', '6');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 1 Juta - 2.5 Juta', '5');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 2,5 Juta - 5 Juta', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 5 Juta - 8 Juta', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 8 Juta - 10 Juta', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (2, 'C2 - Penghasilan', 'Diatas 10 Juta', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 100 Juta - 250 Juta', '7');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 60 Juta - 100 Juta', '6');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 35 Juta - 60 Juta', '5');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 15 Juta - 35 Juta', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 10 Juta - 15 Juta', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Diatas 5 Juta -10 Juta', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (3, 'C3 - Besar Pinjaman', 'Dibawah 500 Ribu - 5 Juta', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Kesehatan', '5');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Kesejahteraan', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Kredit kendaraan', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Pendidikan', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (4, 'C4 - Tujuan Pinjaman', 'Usaha', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (5, 'C5 - Barang Jaminan', 'Personal Garanty', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (5, 'C5 - Barang Jaminan', 'BPKB Kendaraan', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (5, 'C5 - Barang Jaminan', 'SK awal dan SK akhir', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (5, 'C5 - Barang Jaminan', 'Sertifikat tanah', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Diatas 50 Juta', '1');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Diatas 40 Juta - 50 Juta', '2');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Diatas 20 Juta - 40 Juta', '3');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Diatas 10 Juta - 20 Juta', '4');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Diatas 500 Ribu - 10 Juta', '5');
INSERT INTO `v_kriteria` (`id_kriteria`, `kriteria`, `nm_sub_kriteria`, `bobot`) VALUES (6, 'C6 - Simpanan', 'Dibawah 500,000', '6');


#
# TABLE STRUCTURE FOR: v_simpanan
#

DROP TABLE IF EXISTS `v_simpanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_simpanan` AS select `anggota`.`id_anggota` AS `id_anggota`,`anggota`.`no_buku` AS `no_buku`,`anggota`.`nm_anggota` AS `nm_anggota`,sum(`simpanan`.`deposit`) - sum(`simpanan`.`kredit`) AS `saldo` from (`anggota` join `simpanan`) where `simpanan`.`id_anggota` = `anggota`.`id_anggota` group by `anggota`.`id_anggota`;

utf8mb4_unicode_ci;

INSERT INTO `v_simpanan` (`id_anggota`, `no_buku`, `nm_anggota`, `saldo`) VALUES (155, 'BA.155', 'Maximilianus Benge', '15000000');
INSERT INTO `v_simpanan` (`id_anggota`, `no_buku`, `nm_anggota`, `saldo`) VALUES (156, 'BA.156', 'Tantri Lezo', '850000');


