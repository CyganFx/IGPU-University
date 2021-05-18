<?php
function swalSuccessfulRegistration()
{
	echo
		"<script>
      	swal('Registration Successful!', 'Please, verify your login', 'success').then((value)=> {
					window.location.href = 'login.php';	
				});
		</script>";
}


function swalSuccessfulLogin($currentuser)
{
	echo
		"<script>
				swal('Hello, {$currentuser}!', 'You will be redirected to the main page', 'success')
				.then((value) => {
					window.location.href = 'Final.php';
				});
		</script>";
}

function swalLogout($currentuser)
{
	echo
		"<script>
		let flag
		swal('Hello, {$currentuser}!', 'Are you sure to logout?', 'warning')
		.then((value) => {
			" . session_destroy() . "
			window.location.href = 'login.php';
		});
</script>";
}

function toastrError($errors) {
	echo "<script>toastr.info('" . array_shift($errors) . "')</script>";
}

function swalError($errors)
{
	echo
		"<script>
      	swal({
        title: '" . array_shift($errors) . "',
        text: 'Do not try to trick the system )',
        icon: 'warning',
        dangerMode: true,
        })
	</script>";
}
?>

<!-- Without Loading the DOM first, SweetAlert won't work -->

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<title>Document</title>
</head>

<body>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Toastr Alert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	

</body>

</html>