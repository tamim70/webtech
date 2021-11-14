<?php

session_start();
//--- SESSION VALIDATION---\\


if (!isset($_SESSION['utype'])) {
	header("location:login.php");
} else {
	if ($_SESSION['utype'] != "admin") {
		header("location:login.php");
	} else {
	}
}

//--- SESSION VALIDATION---\\

require "includes/db_connect.inc.php";
require "includes/validation.php";


$id = $username = $name = $phone = $mail = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


	if (isset($_POST['logOut'])) {

		session_destroy();
		header("location:login.php");
	} else {
		$flag = 0;

		$name = mysqli_real_escape_string($conn, $_POST["u_name"]);
		$phone = mysqli_real_escape_string($conn, $_POST["u_phone"]);


		if (!validate_name($name)) {

			$flag = 1;
		}

		if (!validate_phone($phone)) {

			$flag = 1;
		}

		$current_data = file_get_contents('data.json');
		$array_data = json_decode($current_data, true);
		$extra = array(
			'id'                    =>     $_SESSION['userid'],
			'username'               =>     $_POST['username'],
			'fullname'               =>     $_POST['fullname'],
			'address'               =>     $_POST['address'],
			'contact'               =>     $_POST['contact'],
			'mail'               =>     $_POST['mail'],
			'hiredate'          =>     $_POST["hiredate"],
			'password'               =>     $_POST['pass'],
		);
		$array_data[] = $extra;
		foreach ($array_data as $key => $value) {
			if ($value['id'] == $_SESSION['userid'])
				unset($array_data[$key]);
		}
		$final_data = json_encode($array_data);
		file_put_contents('data.json', $final_data);
	}
}

$current_data = file_get_contents('data.json');
$array_data = json_decode($current_data, true);
foreach ($array_data as $key => $value) {
	
	if ($value["id"] == $_SESSION['userid']) {
		$id = $value["id"];
		$username = $value['username'];
		$name = $value["fullname"];
		$phone = $value["contact"];
		$mail = $value["mail"];
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="" type="">
	<title>Admin Panel</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- ---fonts S--- -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- ---fonts E--- -->

	<link rel="stylesheet" type="text/css" href="cssfile/leftNav.css">
	<link rel="stylesheet" type="text/css" href="cssfile/footer.css">
	<link rel="stylesheet" type="text/css" href="cssfile/panel.css">
	<link rel="stylesheet" type="text/css" href="cssfile/common.css">
</head>


<body>

	<?php include 'includes/leftNav_admin.php'; ?>

	<!-- -------------------------------------------------------------- -->

	<section id="board">

		<h1 class="header">My Profile</h1>
		<button class="add_btn" onclick="edit()">Edit</button>


		<form method="POST">

			<div style="margin-top: 50px">
				<p class="common_label">ID</p>
				<input class="common_inputField" type="text" name="u_id" value="<?php echo $id; ?>" readonly>
			</div>
			<div>
				<p class="common_label">username</p>
				<input class="common_inputField" type="text" name="u_username" value="<?php echo $username; ?>" readonly>
			</div>
			<div>
				<p class="common_label">Full Name</p>
				<input class="info common_inputField" type="text" name="u_name" value="<?php echo $name; ?>" readonly>
			</div>
			<div>
				<p class="common_label">phone</p>
				<input class="info common_inputField" type="text" name="u_phone" value="<?php echo $phone; ?>" readonly>
			</div>
			<div>
				<p class="common_label">E-mail</p>
				<input class="common_inputField" type="text" name="u_mail" value="<?php echo $mail; ?>" readonly>
			</div>


			<input id="save_btn" class="common_btn" style="display: none; margin-top: 20px;" type="submit" name="save_btn" value="SAVE">
			<br>

		</form>
		<a href="changePass.php"><button class="common_btn" style="margin-top: 20px; margin-bottom: 60px">Change Password</button></a>
	</section>

	<script>
		function edit() {
			var save = document.getElementById("save_btn");
			save.style.display = "block";

			var info = document.getElementsByClassName("info");
			for (i = 0; i < info.length; i++) {
				info[i].readOnly = false;
			}


		}
	</script>

</body>

</html>
