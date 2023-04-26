<!DOCTYPE html>
<html>

<head>
	<title>Cetak Kartu Pendaftaran Santri Baru</title>
	<link rel="stylesheet" type="text/css" href="../../assets/style/css/bootstrap.min.css">
</head>
<style type="text/css">
	th {
		text-align: center;
		vertical-align: none
	}

	.large {
		text-transform: uppercase;
	}
</style>

<body style="width: 900px; font-family: unset;">
	<br>
	<div class="container-fluid">
		<p style="font-size: 15px;font-weight: bold;text-align: center; width: 800px;">
			TAHFIDZ AL-QURAN SYEIKH ABDURRAHMAN<br>
			Asam Kumbang Prov, Puluik Puluik,
			<br>Kec. IV Nagari Bayang Utara, Kabupaten Pesisir Selatan<br>
			No. Telp :0822 1790 7549
		</p>
		<br>

		<?php
		include('../../config/connection.php');

		$NIK = $_GET['id'];

		$query = mysqli_query($conn, "SELECT a.NIK, a.Nama_Peserta_Didik, a.Tanggal_Lahir, a.Alamat_Tinggal, b.Nama_Ayah, b.Telepon_Ayah, b.Nama_Ibu, b.Telepon_Ibu, c.harga, c.status  FROM identitas_siswa a 
  										LEFT JOIN orang_tua_wali b 
  										ON a.Id_Identitas_Siswa = b.Id_Identitas_Siswa 
  										LEFT JOIN administrasi c 
  										ON a.Id_Identitas_Siswa = c.id_identitas_siswa
  										WHERE a.NIK = $NIK");

		foreach ($query as $row) {
		?>

			<div class="row">
				<div class="col-md-6">
					Identitas Calon Santri Baru: <br><br>
					<table>
						<tr>
							<td width="110px">NIK</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['NIK'] ?></td>
						</tr>
						<tr>
							<td width="110px">Nama</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Nama_Peserta_Didik'] ?></td>
						</tr>
						<tr>
							<td width="110px">Tanggal Lahir</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Tanggal_Lahir'] ?></td>
						</tr>
						<tr>
							<td width="110px">Alamat</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Alamat_Tinggal'] ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					Identitas Orang Tua Calon Santri Baru: <br><br>
					<table>
						<tr>
							<td width="100px">Nama Ayah</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Nama_Ayah'] ?></td>
						</tr>
						<tr>
							<td width="100px">Telepon Ayah</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Telepon_Ayah'] ?></td>
						</tr>
						<tr>
							<td width="100px">Nama Ibu</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Nama_Ibu'] ?></td>
						</tr>
						<tr>
							<td width="100px">Telepon Ibu</td>
							<td width="20px">:</td>
							<td width="300px"><?= $row['Telepon_Ibu'] ?></td>
						</tr>
					</table>
				</div>
			</div>
			<br>
			<div class="container">
				<div class="row container">
					<div class="col-md-6" style="font-size: 30px; "><?php if ($row['harga'] != NULL) {
																		echo 'Rp. ';
																	}
																	echo $row['harga']; ?></div>
					<div class="col-md-6" style="font-size: 20px;">
						<p style="border-style: double; text-align: center; width: 280px; padding: 5px;"><?php if ($row['status'] == NULL) {
																												echo 'Belum Lunas';
																											}
																											echo $row['status']; ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
<script>
	window.print();
</script>

</html>