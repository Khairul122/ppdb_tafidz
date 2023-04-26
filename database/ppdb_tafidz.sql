-- phpMyAdmin SQL Dump

-- version 5.1.0

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Waktu pembuatan: 26 Apr 2023 pada 12.53

-- Versi server: 10.4.19-MariaDB

-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `ppdb_sd`

--

-- --------------------------------------------------------

--

-- Struktur dari tabel `administrasi`

--

CREATE TABLE
    `administrasi` (
        `id_administrasi` int(11) NOT NULL,
        `id_identitas_siswa` int(11) NOT NULL,
        `harga` int(16) NOT NULL,
        `status` enum('Lunas', 'Belum Lunas') NOT NULL,
        `tgl_buat` datetime NOT NULL,
        `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Trigger `administrasi`

--

DELIMITER $$

$$ 

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `TAMBAHADMINISTRASI` AFTER INSERT ON 
`ADMINISTRASI` FOR EACH ROW BEGIN 
	UPDATE identitas_siswa
	SET status_administrasi = 1
	WHERE
	    Id_Identitas_Siswa = NEW.id_identitas_siswa;
	END 
$ 

$ 

DELIMITER ;

-- --------------------------------------------------------

--

-- Struktur dari tabel `identitas_siswa`

--

CREATE TABLE
    `identitas_siswa` (
        `Id_Identitas_Siswa` int(11) NOT NULL,
        `NIK` varchar(16) NOT NULL,
        `No_KK` varchar(16) NOT NULL,
        `Nama_Panggilan` text NOT NULL,
        `Nama_Peserta_Didik` text NOT NULL,
        `Tempat_Lahir` varchar(30) NOT NULL,
        `Tanggal_Lahir` date NOT NULL,
        `Jenis_Kelamin` enum('Laki-Laki', 'Perempuan') NOT NULL,
        `Gol_Darah` varchar(5) NOT NULL,
        `Tinggi_Badan` varchar(4) NOT NULL,
        `Berat_Badan` varchar(3) NOT NULL,
        `Kewarganegaraan` varchar(10) NOT NULL,
        `Status_Anak` varchar(12) NOT NULL,
        `Anak_Ke` int(2) NOT NULL,
        `Jml_Saudara` int(2) NOT NULL,
        `Alamat_Tinggal` text NOT NULL,
        `Provinsi_Tinggal` varchar(30) NOT NULL,
        `Kab_Kota_Tinggal` varchar(30) NOT NULL,
        `Kec_Tinggal` varchar(30) NOT NULL,
        `Kelurahan_Tinggal` varchar(30) NOT NULL,
        `Kode_POS` varchar(6) NOT NULL,
        `Riwayat_Penyakit` text NOT NULL,
        `status_ortu` tinyint(1) NOT NULL,
        `status_administrasi` tinyint(1) NOT NULL,
        `tgl_buat` datetime NOT NULL,
        `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Struktur dari tabel `orang_tua_wali`

--

CREATE TABLE
    `orang_tua_wali` (
        `Id_Orang_Tua_Wali` int(11) NOT NULL,
        `Id_Identitas_Siswa` int(11) NOT NULL,
        `Nama_Ayah` varchar(30) NOT NULL,
        `Status_Ayah` varchar(10) NOT NULL,
        `Tgl_Lahir_Ayah` date NOT NULL,
        `Telepon_Ayah` varchar(14) NOT NULL,
        `Pendidikan_Terakhir_Ayah` varchar(20) NOT NULL,
        `Pekerjaan_Ayah` varchar(30) NOT NULL,
        `Penghasilan_Ayah` varchar(10) NOT NULL,
        `Alamat_Ayah` varchar(165) NOT NULL,
        `Nama_Ibu` varchar(30) NOT NULL,
        `Status_Ibu` varchar(10) NOT NULL,
        `Tgl_Lahir_Ibu` date NOT NULL,
        `Telepon_Ibu` varchar(14) NOT NULL,
        `Pendidikan_Terakhir_Ibu` varchar(20) NOT NULL,
        `Pekerjaan_Ibu` varchar(30) NOT NULL,
        `Penghasilan_Ibu` varchar(10) NOT NULL,
        `Alamat_Ibu` varchar(165) NOT NULL,
        `Nama_Wali` varchar(30) NOT NULL,
        `Status_Wali` varchar(10) NOT NULL,
        `Tgl_Lahir_Wali` date NOT NULL,
        `Telepon_Wali` varchar(14) NOT NULL,
        `Pendidikan_Terakhir_Wali` varchar(20) NOT NULL,
        `Pekerjaan_Wali` varchar(30) NOT NULL,
        `Penghasilan_Wali` varchar(10) NOT NULL,
        `Alamat_Wali` varchar(165) NOT NULL,
        `tgl_buat` datetime NOT NULL,
        `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Trigger `orang_tua_wali`

--

DELIMITER $$

CREATE TRIGGER `HAPUSORANGTUAWALI` AFTER DELETE ON 
`ORANG_TUA_WALI` FOR EACH ROW BEGIN 
	UPDATE identitas_siswa
	SET status_ortu = 0
	WHERE
	    Id_Identitas_Siswa = OLD.Id_Identitas_Siswa;
	END 
$ 

$ 

DELIMITER ;

DELIMITER $$

CREATE TRIGGER `TAMBAHORANGTUAWALI` AFTER INSERT ON 
`ORANG_TUA_WALI` FOR EACH ROW BEGIN 
	UPDATE identitas_siswa
	SET status_ortu = 1
	WHERE
	    Id_Identitas_Siswa = NEW.Id_Identitas_Siswa;
	END 
$ 

$ 

DELIMITER ;

-- --------------------------------------------------------

--

-- Struktur dari tabel `user`

--

CREATE TABLE
    `user` (
        `id` int(11) NOT NULL,
        `nama` char(45) NOT NULL,
        `username` char(65) NOT NULL,
        `password` char(125) NOT NULL,
        `hak` enum('admin', 'pegawai') NOT NULL,
        `status` enum('aktif', 'tidak aktif') NOT NULL,
        `tgl_buat` datetime NOT NULL,
        `tgl_ubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Dumping data untuk tabel `user`

--

INSERT INTO
    `user` (
        `id`,
        `nama`,
        `username`,
        `password`,
        `hak`,
        `status`,
        `tgl_buat`,
        `tgl_ubah`
    )
VALUES (
        1,
        'Admin',
        'admin',
        'admin',
        'pegawai',
        'aktif',
        '2020-09-16 19:09:20',
        '2023-04-26 10:06:43'
    );

--

-- Indexes for dumped tables

--

--

-- Indeks untuk tabel `administrasi`

--

ALTER TABLE `administrasi`
ADD
    PRIMARY KEY (`id_administrasi`),
ADD
    KEY `id_identitas_siswa` (`id_identitas_siswa`);

--

-- Indeks untuk tabel `identitas_siswa`

--

ALTER TABLE `identitas_siswa`
ADD
    PRIMARY KEY (`Id_Identitas_Siswa`),
ADD UNIQUE KEY `NISN` (`NIK`);

--

-- Indeks untuk tabel `orang_tua_wali`

--

ALTER TABLE `orang_tua_wali`
ADD
    PRIMARY KEY (`Id_Orang_Tua_Wali`),
ADD
    KEY `Id_Identitas_Siswa` (`Id_Identitas_Siswa`);

--

-- Indeks untuk tabel `user`

--

ALTER TABLE `user`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `username` (`username`);

--

-- AUTO_INCREMENT untuk tabel yang dibuang

--

--

-- AUTO_INCREMENT untuk tabel `administrasi`

--

ALTER TABLE
    `administrasi` MODIFY `id_administrasi` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 8;

--

-- AUTO_INCREMENT untuk tabel `identitas_siswa`

--

ALTER TABLE
    `identitas_siswa` MODIFY `Id_Identitas_Siswa` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;

--

-- AUTO_INCREMENT untuk tabel `orang_tua_wali`

--

ALTER TABLE
    `orang_tua_wali` MODIFY `Id_Orang_Tua_Wali` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--

-- AUTO_INCREMENT untuk tabel `user`

--

ALTER TABLE
    `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--

-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)

--

--

-- Ketidakleluasaan untuk tabel `administrasi`

--

ALTER TABLE `administrasi`
ADD
    CONSTRAINT `administrasi_ibfk_1` FOREIGN KEY (`id_identitas_siswa`) REFERENCES `identitas_siswa` (`Id_Identitas_Siswa`);

--

-- Ketidakleluasaan untuk tabel `orang_tua_wali`

--

ALTER TABLE `orang_tua_wali`
ADD
    CONSTRAINT `orang_tua_wali_ibfk_1` FOREIGN KEY (`Id_Identitas_Siswa`) REFERENCES `identitas_siswa` (`Id_Identitas_Siswa`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;