<?php empty( $app ) ? header('location:../index.php') : '' ;?>
<!-- <div>

	<?php
	if(isset($_SESSION['register'])):
	$pesan = ($_SESSION['register']== 1)?'&nbsp;Data Akun Perpustakaan telah berhasil dibuat, silahkan lakukan Login untuk melanjutkan.' : '&nbsp;Daftar Akun Perpustakaan gagal dibuat silahkan ulangi lagi.'
	?>

	<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i></button>
		<i class="icon-ok"></i>
		<?php echo $pesan; ?>

		<?php {unset($_SESSION['register']);} ?>

	</div>

	<?php
	endif;
	?>
</div> -->
	<div class="container">
		<div class="jumbotron">
			<form class="form-horizontal" method="POST" action="cek_login.php" accept-charset="UTF-8">
				<fieldset>
					<legend>Login</legend>
					<div>
						<?php if(isset($_SESSION['error'])){?>
					</div>
						<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<?php echo $_SESSION['error']; unset($_SESSION['error']);}?>
						</div>

					<div class="form-group">
						<label class="col-lg-2 control-label">NPM</label>
						<div class="col-lg-10">
							<input type="text" name="username" class="form-control" placeholder="NPM" required>
						</div>
					</div>

					<div class="form-group">
						<label for=inputNPM class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<input type="text" name="password" class="form-control" placeholder="Password" required>
						</div>
					</div>
					<button class="btn btn-danger" type="reset">Reset</button>
					<button class="btn btn-success" type="submit">Login</button>
				</fieldset>
			</form>
		</div>
	</div>
