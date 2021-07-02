<?php
	$query = "SELECT * FROM user WHERE id=".$_SESSION['id'];
	$execute = $konek->query($query);
	$user = $execute->fetch_array(MYSQLI_ASSOC);
?>

<!-- Page Title, Breadcrumb -->
<div class="app-title">
    <div>
        <h1>Profil</h1>
    </div>
    <div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home"></i></li>
            <li class="breadcrumb-item"><a href="./?page=profil">Profil</a></li>
        </ul>
    </div>
</div>

<!-- Content -->
<div class="row">
    <div class="col-12">
		<div class="row">
			<div class="col-md-4 mb-3 mb-md-0">
				<h5 class="mt-0">Informasi Akun</h5>
				<p class="mb-0">Update informasi akunmu disini.</p>
			</div>
			<div class="col-md-8">
				<div class="tile mb-2">
					<form class="form" method="post" action="./proses/prosesubah.php">
						<div class="tile-body">
							<input type="hidden" name="id" value="<?= $user['id'] ?>">
							<input type="hidden" name="op" value="pengguna">
							<input type="hidden" name="password" value="">
							<input type="hidden" name="redirect" value="profil">
							<div class="form-group row">
								<label class="col-form-label col-md-3">Nama <span class="text-danger">*</span></label>
								<div class="col-md-9">
									<input name="nama" type="text" class="form-control" value="<?= $user['nama'] ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-3">Username <span class="text-danger">*</span></label>
								<div class="col-md-9">
									<input name="username" type="text" class="form-control" value="<?= $user['username'] ?>" required>
								</div>
							</div>
						</div>
						<div class="tile-footer">
							<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-4 mb-3 mb-md-0">
				<h5 class="mt-0">Update Password</h5>
				<p class="mb-0">Pastikan Kamu menggunakan password yang panjang dan acak supaya tetap aman.</p>
			</div>
			<div class="col-md-8">
				<div class="tile mb-2">
					<form class="form" method="post" action="./proses/prosesubah.php">
						<div class="tile-body">
							<input type="hidden" name="id" value="<?= $user['id'] ?>">
							<input type="hidden" name="op" value="update-password">
							<div class="form-group row">
								<label class="col-form-label col-md-3">Password Saat Ini <span class="text-danger">*</span></label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="password" name="current_password" class="form-control" required>
										<div class="input-group-append">
											<a href="#" class="input-group-text text-dark btn btn-toggle-password"><i class="fa fa-eye mr-0"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-3">Password Baru <span class="text-danger">*</span></label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="password" name="new_password" class="form-control" required>
										<div class="input-group-append">
											<a href="#" class="input-group-text text-dark btn btn-toggle-password"><i class="fa fa-eye mr-0"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-md-3">Konfirmasi Password <span class="text-danger">*</span></label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="password" name="confirm_password" class="form-control" required>
										<div class="input-group-append">
											<a href="#" class="input-group-text text-dark btn btn-toggle-password"><i class="fa fa-eye mr-0"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tile-footer">
							<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>