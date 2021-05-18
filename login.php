<?php
session_start();
require 'connection.php';
require 'User.php';
require 'sweetAlertFunctions.php';
require 'login_recordErrors.php';
require 'setSession_showErrors_redirect.php';



if (isset($data['relogin'])) {
	session_destroy();
	header('location: login.php');
}

require 'header.php';
?>

<!-- Overlay Animation -->

<div class="plus" id="plus" onclick="window.location.href = 'Final.php'"></div>
<div class="overlay"></div>

<!-- Login -->

<?php if (!isset($_SESSION['username'])) : ?>
	<div class="wrapper">
		<div class="registration-form">
			<form class="container input-fields" method="post">
				<div class="row">
					<div class="col-lg-6">
						<label>Username</label>
					</div>
					<div class="col-lg-6">
						<input type="text" class="input" name="username" placeholder="Type your username" value="<?= @$data['username'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label>Password</label>
					</div>
					<div class="col-lg-6">
						<input type="password" class="input" name="password" placeholder="Type your password" value="<?= @$data['password'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 offset-lg-8">
						<input type="submit" class="input" id="submit" name="submit" value="LOGIN">
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Relogin  -->

<?php else : ?>

	<div class="wrapper">
		<div class="registration-form">
			<form class="container input-fields" method="post">
				<div class="row">
					<div class="col-lg-12">
						<h1>You are already logged in. Do you want to relogin?</h1>
					</div>
				</div>
				<div class="row">
					<div class="col text-center">
						<button type="submit" class="btn btn-primary btn-lg" id="submit" name="relogin" value="Relogin"> Relogin </button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php endif; ?>



<?php require 'footer.php'; ?>