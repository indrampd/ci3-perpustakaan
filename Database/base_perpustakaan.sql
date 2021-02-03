-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 18.04
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `sinopsis`, `created_at`, `updated_at`) VALUES
(30, 'Bukan Sarjana Kertas', 'bukan-sarjana-kertas', 'J.S. Khairen', 'Bukune', 'bukansarjanakertas.jpg', 'Buku ini menceritakan tentang sekumpulan mahasiswa yang berkuliah di kampus UDEL yang bila di cari mesin pencarian google tidak akan muncul karena reputasinya yang sangat buruk dan hanya sebagai pilihan terkahir orang-orang untuk berkuliah. Diantaranya ada Ogi dan sahabatnya Ranjau, lalu Gala, kemudian ada Arko, lalu Sania, Juwisa, dan Catherine.\r\n\r\nSekumpulan mahasiswa ini memiliki beragam alasan mereka untuk berkuliah. Ada yang karena terpaksa, ada yang memilih kuliah karena ditolak kampus pilihannya sehingga mau tak mau pun kuliah di kampus yang tidak terkenal pun jadilah untuk mereka tetap berkuliah karena menurut pandangan mereka sendiri kuliah merupakan sesuatu yang membanggakan. Di hari pertama kuliah mereka masuk di kelas konseling dan dosen yang mengajarnya adalah seorang dosen bernama bu Lira yang membawa koper hitam dan pizza serta langsung membagikan pizza kepada seisi kelas tersebut yang sebanyak 30 orang. Di hari pertama tersebut, mahasiswa yang berada di kelas diberi sambutan yang sangat membuat para mahasiswa ketakutan juga dengan riuh gemuruh suara mahasiswa yang membuatnya semakin ketakutan.', 0, 0),
(34, 'Bukan Generasi Bacot', 'bukan-generasi-bacot', 'J.S. Khairen', 'Bukune', 'bukangenerasibacot1.png', 'Gaji? Cukup, cukup besar.\r\nKarier? Mulus melesat.\r\nBisnis? Sebentar lagi soft launching.\r\nKarya? Sudah banyak yang suka.\r\nJodoh? Aih! Sedikit lagi.\r\n\r\nMantap betul nasib Arko, Gala, Juwisa, Sania, Ogi, dan Randi. Para alumni kampus UDEL yang amburadul ini ternyata berhasil melawan tikus-tikus kehidupan.\r\n\r\nNamun, tikus-tikus tersebut nyatanya tidak sepenuhnya hilang. Mereka malah membesar, menyelinap dalam pekerjaan yang menyita waktu, mimpi-mimpi yang makin terasa jauh, dan dilema antara kembali ke kampung atau terus bertarung di kota tanpa tujuan.\r\n\r\nAkankah mereka menemukan jawaban dari semua ini? Atau terus melakukan pembenaran lewat bac*t tanpa mendengarkan apa yang sebenarnya diinginkan hati?\r\n\r\n***', 0, 0),
(40, 'Bukan Jongos Berdasi', 'bukan-jongos-berdasi', 'J.S. Khairen', 'Bukune', 'bukanjongosberdasi.jpg', 'Alumni Kampus UDEL kini telah lulus. Masuk ke dunia nyata yang penuh tikus. Ada yang bertahan, ada yang sebentar lagi mampus.\r\n\r\nKerja di Bank EEK? Ada. Kerjanya pindah terus? Ada. Bimbang ikut keinginan orangtua atau ikut kata hati? Ada. Apa lagi pengangguran banyak acara, pasti ada. Namun, diam-diam ada juga yang karirnya lancar, gajinya mekar, dan jodohnya gempar menggelegar.\r\n\r\nMendapat intimidasi dari rekan kerja, lingkungan, dan keluarga itu sudah biasa. Mendapat cemoohan bagi yang ingin berkarya, jelas jauh lebih biasa. Menerima perlakuan semena-mena, hingga tertawaan dan hinaan adalah sarapan pagi.\r\n\r\nAkankah mereka bertahan di dunia yang penuh intrik ini? Atau mereka harus jadi jongos berdasi, pura-pura mampu beradaptasi, dengan tantangan dunia yang terus gonta-ganti?\r\n\r\nBuku ini wajib dibaca oleh pelajar SMA, mahasiswa, para orangtua, karyawan, petinggi perusahaan, para pencari kerja, mereka yang ingin berkarya, para pengambil kebijakan di berbagai institusi, hingga Presiden Korea Utara agar kita bisa memutuskan apakah besok libur atau kerja dan berkarya.\r\n\r\nBuku kedua dari serial novel “KAMI (BUKAN) SARJANA KERTAS.”', 0, 0),
(41, 'Hujan', 'hujan', 'Fiersa Besari', 'Gremedia', 'default.png', '', 0, 1610806701),
(42, 'Bebas', 'bebas', 'J.S. Khairen', 'Bukune', 'default.png', '', 0, 0),
(43, 'Angin', 'angin', 'Fiersa Besari', 'Gremedia', 'default.png', '', 0, 0),
(44, 'Badai', 'badai', 'Fiersa Besari', 'Gremedia', 'default.png', '', 0, 0),
(45, 'Samudra', 'samudra', 'Fiersa Besari', 'Gremedia', 'default.png', '', 0, 0),
(46, '15 CM', '15-cm', 'Anonim', 'None', 'default.png', '', 0, 0),
(47, 'Agen 86', 'agen-86', 'Anonim', 'None', 'default.png', '', 0, 0),
(48, 'Eye Shield 21', 'eye-shield-21', 'Anonim', 'Gremedia', 'default.png', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `user_id`, `book_id`, `date_created`) VALUES
(1, 2, 30, 1610816235);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'praktikumpbo21@gmail.com', 'default.jpg', '$2y$10$tKlSbnQZ9ftaBH6.Nr1CXuic4jdOLterrjX1vIDcC9sKvG4Sw70IW', 1, 1, 1610656086),
(2, 'Member', 'member@gmail.com', 'default.jpg', '$2y$10$XL32fPdMYxuPhtgsIQr2jOC8aFD0b/pfNOhC5VzxblVExshMSY/Zy', 2, 1, 1610656166),
(3, 'Member', '1806097@sttgarut.ac.id', 'default.jpg', '$2y$10$4/3XQn.kYhFeRUTiBhMchexwuA2Q8omsO/eQN0aDKdYUFTkqdPFf6', 2, 1, 1610738475);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(11, 2, 11),
(15, 1, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(11, 'Book');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-users', 1),
(8, 2, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 11, 'Data Buku', 'book', 'fas fa-fw fa-swatchbook', 1),
(11, 11, 'Data Peminjaman Buku', 'book/pinjam', 'fas fa-fw fa-clipboard-list', 1),
(12, 1, 'Kelola Buku Perpustakaan', 'admin/databuku', 'fas fa-fw fa-book', 1),
(13, 1, 'Kelola Data Pinjam', 'admin/datapinjam', 'fas fa-fw fa-archive', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
