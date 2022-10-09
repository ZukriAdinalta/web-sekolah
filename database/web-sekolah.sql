-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2022 pada 21.45
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'berita.jpg',
  `id_user` int(11) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `isi`, `gambar`, `id_user`, `views`, `created_at`, `updated_at`) VALUES
(1, 'SMA Negeri 2 Sungai Limau ikuti turnamen Futsal dan Lomba PBB', 'sma-negeri-2-sungai-limau-ikuti-turnamen-futsal-dan-lomba-pbb', '<p>Tim Futsal SMA Negeri 2 Sungai Limau mengikuti turnamen futsal yang diadakan oleh Ikatan Pelajar Sungai Limau Pada tanggal 28 Februari 2022 berlokasi di Papila Futsal Sungai Limau. Dihari sebelumnya, Tim PBB SMA Negeri 2 Sungai Limau juga mengikuti lomba PBB Tingkat SMA Se-Kabupaten Padang Pariaman di Kantor Bupati Padang Pariaman.</p>', '1646914522_80ecb046d062b34de317.jpg', 1, 18, '2022-03-10', '2022-03-10'),
(2, 'Pelantikan Pengurus OSIS 2022-2023', 'pelantikan-pengurus-osis-2022-2023', '<p>Setelah melasanakan pemilihan OSIS Pada tanggal 19 Januari 2022, Pengurus OSIS Terpilih akhirnya dilantik pada tanggal 31 Januari 2022. Pelantikan dilaksanakan pada saat upacara bendera, dan dilantik langsung oleh Kepala SMA Negeri 2 Sungai Limau, Bapak Aziz Prima Syahrial. Kegiatan ini sekaligus mengukuhkan pengurus OSIS Sebelumnya sebagai MPK SMA Negeri 2 Sungai Limau</p>', '1646914592_cb11b68c528bc6f841a6.jpg', 1, 19, '2022-03-10', '2022-03-10'),
(4, 'Upacara Perpisahan Kelas XII TP.2021/2022', 'upacara-perpisahan-kelas-xii-tp20212022', '<p>Seiring dengan makin dekatnya waktu ujian akhir bagi siswa Kelas XII SMA Negeri 2 Sungai Limau Tahun Ajaran 2021/2022, hari ini Senin 7 Maret 2022 seluruh siswa mengadakan upacara penghormatan. Upacara dipimpin oleh Kepala Sekolah, dan pelaksananya oleh Siswa Kelas XII. Selesai upacara, seluruh kelas XII Bersama majelis guru berfoto bersama untuk kenang-kenangan.</p>', 'berita.jpg', 1, 0, '2022-03-12', '2022-03-12'),
(5, 'Muhasabah Siswa Kelas XII TP.2021/2022', 'muhasabah-siswa-kelas-xii-tp20212022', '<p>SMA Negeri 2 Sungai Limau melaksanakan kegiatan Muhasabah yang ditujukan untuk siswa Kelas XII Pada hari Kamis, 10 Maret 2022. Kegiatan Muhasabah ini berlangsung di Mesjid Raya Sungai Sirah, dan diisi dengan pencerahan oleh Ustadz setempat. Diharapkan dengan adanya kegiatan Muhasabah ini para siswa yang akan mengikuti ujian akhir akan menjadi lebih rileks dan fokus sehingga menghasilkan hasil ujian yang optimal bagi siswa tersebut dan SMA Negeri 2 Sungai Limau.</p>', 'berita.jpg', 1, 0, '2022-03-12', '2022-03-12'),
(6, 'Kunjungan SMA 1 Sungai Lasi ke SMA Negeri 2 Sungai Limau', 'kunjungan-sma-1-sungai-lasi-ke-sma-negeri-2-sungai-limau', '<p>SMA Negeri 2 Sungai Limau menerima kunjungan dari SMA Negeri 1 IX Koto Sungai Lasi pada hari sabtu tanggal 12 Februari 2022. Kunjungan ini dalam rangka Studi banding dari SMA Negeri 1 Sungai Lasi ke SMA Negeri 2 Sungai Limau sekaligus Pertandingan persahabatan futsal antara kedua sekolah. Adapun rmbongan SMA Negeri 1 Sungai Lasi terdiri dari 33 orang yang terdiri dari pengurus OSIS dan majelis guru. Dari awal kedatangan, kedua sekolah saling menampilkan kesenian dari daerah masing-masing. Kegiatan dilanjutkan dengan temu ramah di ruang galeri SMA Negeri 2 Sungai Limau, dan diakhiri dengan pertandingan persahabatan futsal yang akhirnya dimenangkan SMA Negeri 2 Sungai Limau dengan skor 3-0.</p>', 'berita.jpg', 1, 0, '2022-03-12', '2022-03-12'),
(7, 'Pelaksanaan TO UTBK SMA N 2 Sungai Limau', 'pelaksanaan-to-utbk-sma-n-2-sungai-limau', '<p>SMA Negeri 2 Sungai Limau bekerjasama dengan edubrand.id melaksanakan kegiatan Tryout Ujian Tulis Berbasis komputer (UTBK) Pada tanggal 27-28 Januari 2022. Kegiatan ini diikuti oleh seluruh siswa kelas XII SMA Negeri 2 Sungai Limau. Adapun tujuan dari kegiatan ini adalah mempersiapkan lulusan SMA Negeri 2 Sungai Limau agar meraih hasil sebaik mungkin pada UTBK asli nantinya, agar meningkatkan jumlah lulusan yang diterima di perguruan tinggi. Ini merupakan TO pertama dari rangkaian TO UTBK yang diadakan SMA Negeri 2 Sungai Limau, TO selanjutnya akan dilaksanakan pada tanggal 26 Februari 2022.</p>', '1647074631_a2a0eddee169bc0975e2.jpg', 1, 19, '2022-03-12', '2022-03-12'),
(8, 'USDBW SMA Negeri 2 Sungai Limau', 'usdbw-sma-negeri-2-sungai-limau', '<p>SMA Negeri 2 Sungai Limau melaksanakan Ujian Sekolah Daring Berbasis Web (USDBW) Tahun ajaran 2021/2022. Ujian ini merupakan ujian akhir bagi siswa Kelas XII sebagai syarat kelulusan. USDBW berlangsung dari tanggal 14 - 21 Maret 2022 di 13 Ruang Kelas yang ada di SMA Negeri 2 Sungai Limau. Pada pelaksanaan USDBW ini siswa menggunakan smartphone masing-masing untuk ujian, dengan diawasi oleh Pengawas Silang dari Sekolah lain.</p>', '1647505902_6d643f5ade35c2b80a7b.jpg', 1, 19, '2022-03-17', '2022-03-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `file` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id`, `nama`, `file`, `created_at`, `updated_at`) VALUES
(3, 'Fisika', '1646733562_22eefb2a742e6b1a9a3c.pdf', '2022-03-08 18:53:25', NULL),
(4, 'Silabus Kimia', '1646740742_10c671a8430a79afa26a.docx', '2022-03-08 05:59:02', '2022-03-08'),
(6, 'Kimia 3', '1647522363_397d664a77823697274d.pdf', '2022-03-17 08:05:33', '2022-03-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_gallery` int(11) DEFAULT NULL,
  `ket_foto` varchar(225) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `id_gallery`, `ket_foto`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Calon Osis', 'gallery.jpg', '2022-03-18', '2022-03-18'),
(2, 1, 'Calon Osis 2', 'gallery.jpg', '2022-03-18', '2022-03-18'),
(3, 1, 'Calon Osis 3', '1647612246_23355921b01f0ff39402.jpg', '2022-03-18', '2022-03-18'),
(4, 2, 'Calon Osis 1', '1647614595_621ef49b0bdf943c45c3.jpg', '2022-03-18', '2022-03-18'),
(5, 2, 'Calon Osis 2', '1647614607_77d1de041537fd542b6e.jpg', '2022-03-18', '2022-03-18'),
(6, 2, 'Calon Osis 3', 'gallery.jpg', '2022-03-18', '2022-03-18'),
(7, 2, 'Calon Osis 4', '1647614627_78bb3eaba9ad11033cd8.jpg', '2022-03-18', '2022-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `nama_gallery` varchar(255) DEFAULT NULL,
  `sampul_gallery` varchar(50) DEFAULT 'gallery.jpg',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `nama_gallery`, `sampul_gallery`, `created_at`, `updated_at`) VALUES
(1, 'Pemilihan Osis 2022', '1647612196_0c67fe7639074e0941b6.jpg', '2022-03-18', '2022-03-18'),
(2, 'Pemilihan Osis 2021', '1647614556_808b034ae4806e62d932.jpg', '2022-03-18', '2022-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(225) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(5) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'profil.jpg',
  `id_mapel` int(2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `pendidikan`, `foto`, `id_mapel`, `created_at`, `updated_at`) VALUES
(4, '11353104169', 'Oktavia Pratama', 'Sungai Limau', '2004-10-06', 'S1', 'profil.jpg', 3, '2022-03-06', '2022-03-06'),
(7, '11353104168', 'zukri adinalta', 'Sungai Limau', '2022-03-08', 'S1', '1646743747_8146687a20b34de2dacf.jpg', 8, '2022-03-08', '2022-03-08'),
(9, '11353104167', 'Andre Surtiawan', 'Pariaman', '1998-12-08', 'S3', '1647503568_0a1bb36ce49064d48dba.jpg', 9, '2022-03-17', '2022-03-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X IPA 1'),
(2, 'X IPS 1'),
(4, 'X IPA 2 '),
(6, 'X IPS 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`) VALUES
(3, 'Bahasa Arab'),
(8, 'Kimia'),
(9, 'Fisika'),
(15, 'Sejarah'),
(20, 'Biologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto` varchar(225) DEFAULT 'pengumuman.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `slug`, `nama`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman-Libur-Semeseter-Genap', 'Pengumuman Libur Semeseter Genap', 'Pengumuman Libur Semeseter mulai tanggal 10 maret 2021 sampai 30 maret 2022', 'pengumuman.jpg', '2022-03-05 22:34:51', '2022-03-05 22:42:57'),
(3, 'ujian-akhir-semester-2022', 'Ujian Akhir Semester 2022', '<p><strong>Ujian Akhir Semester 2022</strong></p>', 'pengumuman.jpg', '2022-03-09 22:50:05', '2022-03-09 23:05:41'),
(4, 'pengumuman-ujian-semester-2022', 'Pengumuman Ujian Semester 2022', '<p>Pengumuman hujian semester mulai tanggal 23 maret 2022 sampai 10 april 2022</p>', 'pengumuman.jpg', '2022-03-16 20:23:31', '2022-03-16 20:26:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `slug` varchar(225) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'prestasi.jpg',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `slug`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'juara-1-pramuka-antar-sekolah', 'Juara 1 Pramuka Antar Sekolah', '<p>Juara 1 Pramuka Antar sekolah</p>', 'prestasi.jpg', '2022-03-17', '2022-03-17'),
(2, 'juara-1-futsall-se-kabupaten-padang-pariaman', 'Juara 1 Futsall Se Kabupaten Padang Pariaman', '<p>Juara 1 futsall se kabupaten padang pariaman</p>', '1647519630_be94b1b6d69fa5dc2737.jpg', '2022-03-17', '2022-03-17'),
(3, 'juara-1-paramuka-se-kabupaten-padang-pariaman', 'Juara 1 Paramuka Se Kabupaten Padang Pariaman', '<p>Juara 1 paramuka Se Kabupaten Padang Pariaman</p>', 'prestasi.jpg', '2022-03-17', '2022-03-17'),
(6, 'juara-3-pbb-padang-pariaman', 'Juara 3 Pbb Padang Pariaman', '<p>juara 3 pbb</p>', 'prestasi.jpg', '2022-03-18', '2022-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(225) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `tempat_lahir`, `tgl_lahir`, `foto`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, '1113531041687', 'zukri adinalta', 'Padang', '1995-12-10', '1646562819_f92702f7cb93270de11f.jpg', 1, '2022-03-06', '2022-03-15'),
(2, '1113531041678', 'Andre Surtiawan', 'Sungai Limau', '1999-03-24', 'profil.jpg', 2, '2022-03-06', '2022-03-06'),
(4, '113531041678', 'Oktavia Pratama', 'Sungai Sirah', '1998-10-15', '1647345150_673bfc58c63f6c74e889.jpg', 1, '2022-03-15', '2022-03-16'),
(8, '312312412132', 'sintia putri', 'Pariaman', '2022-03-09', '1647611840_bfdc4d667f1445e0d765.jpg', 4, '2022-03-18', '2022-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slideshow`
--

INSERT INTO `slideshow` (`id`, `judul`, `foto`) VALUES
(2, '', '1646903358_1398ab38c1e996b605da.jpg'),
(4, '', '1646904124_43d9425a83e013c305fc.jpg'),
(7, 'Guru SMAN 2 Sungai Limau', 'gbanner3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `logo` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `tlpn` varchar(16) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `visiMisi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `fotoKepsek` varchar(225) DEFAULT NULL,
  `kepalaSekolah` text DEFAULT NULL,
  `organisasi` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id`, `logo`, `title`, `title2`, `email`, `tlpn`, `alamat`, `map`, `visiMisi`, `sejarah`, `fotoKepsek`, `kepalaSekolah`, `organisasi`) VALUES
(1, '1647614185_17701750c1972e9ecef4.png', 'SMA NEGERI 2', 'SUNGAI LIMAU', 'info@sma2sungailimau.sch.id', '(0751)-6910918', 'Jl.Siti Manggopoh Sungai Sirah, Sungai Limau', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6379918560638!2d100.08152831427134!3d-0.5447470354192121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd51dcebb8f5b8d%3A0x716c9538dc1b7de5!2sSMAN%202%20Sungai%20Limau!5e0!3m2!1sid!2sid!4v1647339675423!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '<p><strong>Visi Sekolah</strong><br>Menjadi sekolah yang Religius, Berkarakter, Berprestasi dan Berwawasan Lingkungan<br><br><strong>Misi Sekolah</strong></p><ol><li>Melaksanakan program peningkatan kompetensi siswa di bidang akademik dan non akademik yang dapat bersaing di tingkat nasional dan internasional</li><li>Melaksanakan program peningkatan kompetensi pendidik dan tenaga kependidikan).</li><li>Melaksanakan program kerjasama dan kemitraan dengan intitusi pendidikan, pemerintah, usaha, dan industri</li><li>Melaksanakan pengelolaan layanan pendidikan sesuai standar mutu ISO 9001 dan 14001</li><li>Melaksanakan pendidikan karakter agar terwujud lulusan yang beriman, bertakwa, dan berakhlak mulia</li><li>Melaksanakan program pengembangan sekolah ramah sosial dan ramah lingkungan</li></ol>', '<p>Seiring dengan bertambahnya jumlah peserta didik yang mendaftar di SMA Negeri Sungai Limau, pada tahun ajaran 2000/2001 diajukanlah pembuatan kelas filial (kelas jauh) dari SMA tersebut untuk menampung siswa yang berlebih yang berlokasi di Nagari Pilubang, desa sungai sirah. Kepanitiaan pembuatan kelas filial ini kemudian disetujui oleh Kepala Dinas Pendidikan dan Olahraga Kabupaten Padang Pariaman, Drs. Busnizar Raza pada tahun 2001 dengan menunjuk Mulyadi, SH sebagai ketua panitia.</p><p>Panitia pembangunan kelas filial ini akhirnya bias mendapatkan hibah tanah seluas 2,5 hektar dari keluarga martin di Nagari Pilubang, sehingga pada bulan agustus 2001 pembangunan SMA Negeri 2 Sungai Limau bias dimulai. Dana pembangunan SMA Negeri 2 Sungai Limau bersumber dari APBN dan dana sharing dari APBD Padang Pariaman Tahun Anggaran 2001/2002.</p><p>Pembangunan tahap 1 SMA Negeri&nbsp; 2 Sungai Limau terdiri dari bangunan kantor, pustaka, laboratorium dan ruangan kelas yang selesai pada Bulan Juni 2002. Pada bulan itu juga dilaksanakan pembelajaran di sekolah, dengan status kelas filial sampai tahun 2004. Pada Tahun 2004 sekolah ini baru berdiri sendiri dengan status negeri menjadi SMA Negeri2 Sungai Limau.</p><p>Setelah tahun 2004, pembangunan kembali dilanjutkan secara bertahap dengan menambah berbagai bangunan dan prasarana. Akan tetapi, gempa yang mengguncang wilayah sumatera barat pada 30 September 2009 memporak porandakan sebagian besar bangunan sekolah. Pasca gempa, bangunan sekolah kembali dibangun secara bertahap dengan menggunakan dana dari Japan International Cooperation Agency (JICA) sehingga bisa kembali melaksanakan pembelajaran pada tahun ajaran 2010/2011.</p>', '1647611876_35860dcb49f532be227a.jpg', '<h2><strong>Aziz Prima Syahrial</strong></h2><h4><strong>NIP. 19850808 200901 1003</strong><br>&nbsp;</h4><p>Aziz Prima Syahrial adalah kepala SMA Negeri 2 Sungai Limau yang mulai menjabat pada tanggal 18 Desember 2021. Beliau menjadi kepala sekolah definitif menggantikan Drs. Harwin yang sebelumnya menjabat sebagai Plt. Kepala Sekolah SMA Negeri 2 Sungai Limau sejak April 2020.</p>', '1646898504_4d930f4cf53920c8bd4b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `foto` varchar(225) DEFAULT 'profil.jpg',
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `foto`, `created`, `updated`) VALUES
(2, 'Desnando', 'kuma', '$2y$10$wPRa./pNfPdwktvgrWFeOuhOtQsLzo9Bki0gTImUf3oDHFTca0RLO', 1, '1647175225_e0ed6f48c027047ff6aa.jpg', '2022-03-01', '2022-03-06'),
(11, 'Andre', 'kumm4', '$2y$10$ODf4oXHomA151v6CXKNNpOSpM.K6uDW4vytEiDDGjbLFwrTKLAasu', 1, '1647501830_c9b5695c53abdbda22c7.jpg', '2022-03-17', '2022-03-17'),
(14, 'adi saputra', 'adiputra', '$2y$10$MxCGQUBjK8YNWtalcaG2heUNOyZFrx0XlvABybXtVKNVhzvFUaNrS', 2, '1647614828_fd377d7679d388dbfa91.jpg', '2022-03-18', '2022-03-18'),
(15, 'Zukri Adinalta', 'kumabbj', '$2y$10$2OAYYTG.qbiYkYrXe7ef5e4jzvlCB5dcY4dWakvxebFrynYxqrlvi', 1, 'profil.jpg', '2022-05-16', '2022-05-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
