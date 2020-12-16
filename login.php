<?php 
session_start();

if (isset($_SESSION["login"])) {
	header("Location: index1.php");
	exit;
}

include 'controller/koneksi.php';

	if (isset($_POST['login'])) {
		//anti inject sql
		$username=mysqli_real_escape_string($conn, $_POST['username']);
		$password=mysqli_real_escape_string($conn, $_POST['password']);

		$result=mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
		
		// cek username
		if (mysqli_num_rows($result)===1) {
			// cek password
			$row=mysqli_fetch_assoc($result);
			if ($password== $row["password"]) {
				// set session
				$data_login=mysqli_fetch_array($result, MYSQLI_BOTH);
				$_SESSION["login"]=true;
				$_SESSION["ses_id"]=$data_login["id_user"];
				$_SESSION["ses_username"]=$data_login["username"];
				$_SESSION["ses_password"]=$data_login["password"];
				$_SESSION["ses_nama"]=$data_login["nama"];
				$_SESSION["ses_level"]=$data_login["level"];
				$_SESSION["ses_status"]=$data_login["status"];
				$_SESSION["ses_jenis"]=$data_login["jenis"];

				header("Location: index1.php");
				exit;
			}
		}
		$error=true;
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<h1>Halaman Login</h1>
	<?php if (isset($error)): ?>
		<p style="color: red; font-style: italic;">username / password salah</p>
	<?php endif; ?>
	<form action="" method="POST">
		<table>
			<tr>
				<td>
					<label for="username">Nama</label>
				</td>
				<td>
					<input type="text" name="username" id="username">
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Password</label>
				</td>
				<td>
					<input type="password" name="password" id="password">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="login">Login</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>