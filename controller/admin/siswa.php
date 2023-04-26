<?php

session_start();
include("../../config/connection.php");

// Tambah Data
if (isset($_POST['tambahData'])) {
	$nik 				= mysqli_real_escape_string($conn, $_POST['nik']);
	$no_kk 				= mysqli_real_escape_string($conn, $_POST['no_kk']);
	$nama_panggilan		= mysqli_real_escape_string($conn, $_POST['nama_panggilan']);
	$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
	$tempat_lahir		= mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
	$tanggal_lahir		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
	$jenis_kelamin		= mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
	$status_anak		= mysqli_real_escape_string($conn, $_POST['status_anak']);
	$anak_ke			= mysqli_real_escape_string($conn, $_POST['anak_ke']);
	$jumlah_saudara		= mysqli_real_escape_string($conn, $_POST['jumlah_saudara']);
	$alamat_tinggal		= mysqli_real_escape_string($conn, $_POST['alamat_tinggal']);
	$provinsi_tinggal	= mysqli_real_escape_string($conn, $_POST['provinsi_tinggal']);
	$kab_kota_tinggal	= mysqli_real_escape_string($conn, $_POST['kab_kota_tinggal']);
	$kecamatan_tinggal	= mysqli_real_escape_string($conn, $_POST['kecamatan_tinggal']);
	$kelurahan_tinggal	= mysqli_real_escape_string($conn, $_POST['kelurahan_tinggal']);
	$kode_pos			= mysqli_real_escape_string($conn, $_POST['kode_pos']);
	$tgl_buat 			= date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "INSERT INTO identitas_siswa SET   NIK = '$nik',
																	  No_KK = '$no_kk',
																	  Nama_Panggilan = '$nama_panggilan',
																	  Nama_Peserta_Didik = '$nama_lengkap',
																	  Tempat_Lahir = '$tempat_lahir',
																	  Tanggal_Lahir = '$tanggal_lahir',
																	  Jenis_Kelamin = '$jenis_kelamin',
																	  Status_Anak = '$status_anak',
																	  Anak_Ke = '$anak_ke',
																	  Jml_Saudara = '$jumlah_saudara',
																	  Alamat_Tinggal = '$alamat_tinggal',
																	  Provinsi_Tinggal = '$provinsi_tinggal',
																	  Kab_Kota_Tinggal = '$kab_kota_tinggal',
																	  Kec_Tinggal = '$kecamatan_tinggal',
																	  Kelurahan_Tinggal = '$kelurahan_tinggal',
																	  Kode_POS = '$kode_pos',
																	  tgl_buat = '$tgl_buat' ");

	if ($query) {
		$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil ditambahkan.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	} else {
		$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal ditambahkan.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	}
}

// Ubah Data
if (isset($_POST['ubahData'])) {
	$id 				= $_POST['id'];
	$nik 				= mysqli_real_escape_string($conn, $_POST['nik']);
	$no_kk 				= mysqli_real_escape_string($conn, $_POST['no_kk']);
	$nama_panggilan		= mysqli_real_escape_string($conn, $_POST['nama_panggilan']);
	$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
	$tempat_lahir		= mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
	$tanggal_lahir		= mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
	$jenis_kelamin		= mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
	$status_anak		= mysqli_real_escape_string($conn, $_POST['status_anak']);
	$anak_ke			= mysqli_real_escape_string($conn, $_POST['anak_ke']);
	$jumlah_saudara		= mysqli_real_escape_string($conn, $_POST['jumlah_saudara']);
	$alamat_tinggal		= mysqli_real_escape_string($conn, $_POST['alamat_tinggal']);
	$provinsi_tinggal	= mysqli_real_escape_string($conn, $_POST['provinsi_tinggal']);
	$kab_kota_tinggal	= mysqli_real_escape_string($conn, $_POST['kab_kota_tinggal']);
	$kecamatan_tinggal	= mysqli_real_escape_string($conn, $_POST['kecamatan_tinggal']);
	$kelurahan_tinggal	= mysqli_real_escape_string($conn, $_POST['kelurahan_tinggal']);
	$kode_pos			= mysqli_real_escape_string($conn, $_POST['kode_pos']);

	$query = mysqli_query($conn, "UPDATE identitas_siswa SET NIK = '$nik',
																 No_KK = '$no_kk',
																 Nama_Panggilan = '$nama_panggilan',
																 Nama_Peserta_Didik = '$nama_lengkap',
																 Tempat_Lahir = '$tempat_lahir',
																 Tanggal_Lahir = '$tanggal_lahir',
																 Jenis_Kelamin = '$jenis_kelamin',
																 Status_Anak = '$status_anak',
																 Anak_Ke = '$anak_ke',
																 Jml_Saudara = '$jumlah_saudara',
																 Alamat_Tinggal = '$alamat_tinggal',
																 Provinsi_Tinggal = '$provinsi_tinggal',
																 Kab_Kota_Tinggal = '$kab_kota_tinggal',
																 Kec_Tinggal = '$kecamatan_tinggal',
																 Kelurahan_Tinggal = '$kelurahan_tinggal',
																 Kode_POS = '$kode_pos',
																 tgl_buat = '$tgl_buat'  
									  					WHERE Id_Identitas_Siswa = '$id' ") or die(mysqli_error($conn));

	if ($query) {
		$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil diubah.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	} else {
		$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal diubah.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	}
}

// Hapus Data
if (isset($_GET['hapusData'])) {
	$id = $_GET['hapusData'];

	$query = mysqli_query($conn, "DELETE FROM identitas_siswa WHERE Id_Identitas_Siswa = $id");

	if ($query) {
		$_SESSION['alert'] = '<div class="alert alert-success alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Berhasil</div>
			                          Data berhasil dihapus.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	} else {
		$_SESSION['alert'] = '<div class="alert alert-danger alert-has-icon" id="alert">
			                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
			                        <div class="alert-body">
			                          <button class="close" data-dismiss="alert">
			                            <span>×</span>
			                          </button>
			                          <div class="alert-title">Gagal</div>
			                          Data gagal dihapus.
			                        </div>
			                      </div>';
		header('Location: ../../view/siswa/tampilData.php');
	}
}
