<!-- Header -->
<?php
$title = "Data Santri"; // Judulnya
require("../template/header.php"); // include headernya

if (!isset($_GET['id'])) {
	echo "<script>window.location.href = 'tampilData.php';</script>";
}
?>



<!-- Isinya -->

<section class="section">
	<div class="section-header">
		<h1><?= $title; ?></h1>
	</div>

	<?php
	if (isset($_SESSION['alert'])) {
		echo $_SESSION['alert'];
		unset($_SESSION['alert']);
	}
	?>

	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<!-- <h4>Basic DataTables</h4> -->
						<a href="tampilData.php" type="button" class="btn btn-primary daterange-btn icon-left btn-icon">
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
					</div>
					<div class="card-body">

						<div class="section-title mt-0 ml-4">Ubah Data Santri</div>

						<?php
						include('../../config/connection.php');
						$data = mysqli_query($conn, "SELECT * FROM identitas_siswa WHERE Id_Identitas_Siswa = '$_GET[id]'") or die(mysqli_error($conn));

						if (mysqli_num_rows($data) != 1) {
							echo "<script>window.location.href = 'tampilData.php';</script>";
						}

						foreach ($data as $row) {
						?>

							<!-- Ubah Data -->
							<form class="needs-validation" novalidate="" action="../../controller/admin/siswa.php" method="POST">
								<div class="modal-body">
									<!-- Id data -->
									<input type="hidden" name="id" value="<?= $row['Id_Identitas_Siswa']; ?>">
									<div class="form-group">
										<label>NIK</label>
										<input type="text" class="form-control" name="nik" required="" minlength="16" value="<?= $row['NIK']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Minimal 16 kata </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>No. KK</label>
										<input type="text" class="form-control" name="no_kk" required="" minlength="16" value="<?= $row['No_KK']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Minimal 16 kata</div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Nama Panggilan</label>
										<input type="text" class="form-control" name="nama_panggilan" required="" value="<?= $row['Nama_Panggilan']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Nama Lengkap Peserta Didik</label>
										<input type="text" class="form-control" name="nama_lengkap" required="" value="<?= $row['Nama_Peserta_Didik']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Tempat Lahir</label>
										<input type="text" class="form-control" name="tempat_lahir" required="" value="<?= $row['Tempat_Lahir']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input type="date" class="form-control" name="tanggal_lahir" required="" value="<?= $row['Tanggal_Lahir']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin" required="">
											<option value=""> ~~~ PILIH JENIS KELAMIN ~~~ </option>
											<option value="Laki-Laki" <?php if ($row['Jenis_Kelamin'] == 'Laki-Laki') {
																			echo 'selected';
																		} ?>>Laki-Laki</option>
											<option value="Perempuan" <?php if ($row['Jenis_Kelamin'] == 'Perempuan') {
																			echo 'selected';
																		} ?>>Perempuan</option>
										</select>
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Status Anak</label>
										<input type="text" class="form-control" name="status_anak" required="" value="<?= $row['Status_Anak']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Anak Ke</label>
										<input type="number" class="form-control" name="anak_ke" required="" value="<?= $row['Anak_Ke']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Jumlah Saudara</label>
										<input type="number" class="form-control" name="jumlah_saudara" required="" value="<?= $row['Jml_Saudara']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Alamat Tinggal</label>
										<textarea type="text" class="form-control" name="alamat_tinggal" required="" style="height:80px"><?= $row['Alamat_Tinggal']; ?></textarea>
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Provinsi Tinggal</label>
										<input type="text" class="form-control" name="provinsi_tinggal" required="" value="<?= $row['Provinsi_Tinggal']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Kabupaten / Kota Tinggal</label>
										<input type="text" class="form-control" name="kab_kota_tinggal" required="" value="<?= $row['Kab_Kota_Tinggal']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Kecamatan Tinggal</label>
										<input type="text" class="form-control" name="kecamatan_tinggal" required="" value="<?= $row['Kec_Tinggal']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Kelurahan Tinggal</label>
										<input type="text" class="form-control" name="kelurahan_tinggal" required="" value="<?= $row['Kelurahan_Tinggal']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<div class="form-group">
										<label>Kode POS</label>
										<input type="number" class="form-control" name="kode_pos" required="" value="<?= $row['Kode_POS']; ?>">
										<!-- Validation -->
										<div class="valid-feedback"> Baguss! </div>
										<div class="invalid-feedback"> Wajib Diisi! </div>
										<!-- End Validation -->
									</div>
									<br>
									<div class="modal-footer bg-whitesmoke br">
										<a href="tampilData.php" type="button" class="btn btn-secondary">Batal</a>
										<button class="btn btn-primary" name="ubahData">Simpan</button>
									</div>
								</div>
							</form>
							<!-- penutup Tambah Data -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<!-- Penutup Isinya -->



<!-- Footer -->
<?php require("../template/footer.php"); ?>