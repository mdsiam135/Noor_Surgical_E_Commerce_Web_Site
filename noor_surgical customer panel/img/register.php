<?php
include '../components/connection.php';

if (isset($_POST['register'])) {

	$id = unique_id();
	$name = $_POST['name'];
	$name = filter_var($name, FILTER_SANITIZE_STRING);

	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_STRING);

	$pass = sha1($_POST['password']);
	$pass = filter_var($pass, FILTER_SANITIZE_STRING);

	$cpass = sha1($_POST['cpassword']);
	$cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

	$user_type = $_POST['user_type'];
	$user_type = filter_var($name, FILTER_SANITIZE_STRING);

	$select_admin = $conn->prepare("SELECT * FROM `users` WHERE email =  ? ");
	$select_admin->execute([$email]);

	if ($select_admin->rowCount() > 0) {
		//echo "user email already exit";
		$warning_msg[] = 'user email already exit';
	} else {
		if ($pass != $cpass) {
			$warning_msg[] = 'confirm password not matched';
		} else {
			$insert_admin = $conn->prepare("INSERT INTO `users`(id, name, email, password , user_type ) VALUES(?,?,?,?,?)");
			$insert_admin->execute([$id, $name, $email, $cpass, $user_type]);
			$success_msg[] = 'new admin register';
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">

	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time(); ?>">
	<title>noor surgical admin panel - register page</title>
</head>

<body>

	<div class="main">
		<section>
			<div class="form-container" id="admin_login">
				 <form action="" method="post" enctype="multipart/form-data">
					<h3> Register Now </h3>
					<div class="input-field">
						<label>user name <sup>*</sup></label>
						<input type="text" name="name" maxlength="20" required placeholder="Enter your username" oninput="this.value.replace(/\s/g,'')">
					</div>

					<div class="input-field">
						<label>user email <sup>*</sup></label>
						<input type="email" name="email" maxlength="50" required placeholder="Enter your email" oninput="this.value.replace(/\s/g,'')">
					</div>

					<div class="input-field">
						<label>user password <sup>*</sup></label>
						<input type="password" name="password" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
					</div>

					<div class="input-field">
						<label>confirm password <sup>*</sup></label>
						<input type="password" name="cpassword" maxlength="20" required placeholder="confirm password" oninput="this.value.replace(/\s/g,'')">
					</div>

                    <div class="input-field">
						<label>user type <sup>*</sup></label>
						<input type="text" name="user_type" maxlength="20" required placeholder="Enter your type" oninput="this.value.replace(/\s/g,'')">
					</div>

					

					<button type="submit" name="register" class="btn">register now</button>
					<p>already have an account ? <a href="login.php">login now</a></p>


				</form>
			</div>
		</section>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<script type="text/javascript" src="script.js"></script>
	<?php include('../components/alert.php'); ?>
</body>

</html>