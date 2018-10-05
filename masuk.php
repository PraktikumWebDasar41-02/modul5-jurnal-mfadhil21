<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="login">
		<form action="masuk.php" method="post">
			<div>
				<label>NIM :</label>
				<input type="text" name="nim">
			</div>
			<div>
				<label>Nama :</label>
				<input type="text" name="nama">
			</div>
			<div>
				<label>Email :</label>
				<input type="email" name="email">
			</div>
			<div>
				<input type="submit" name="submit" value="masuk">
			</div>
		</form>
	</div>
</body>
</html>

<?php  
	if(isset($_POST['submit'])){
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	session_start();
	$_SESSION['nama'] = $nama;

	$db = mysqli_connect("localhost", "root", "", "d_modul5");
	$input = mysqli_query($db, "INSERT INTO t_jurnal4(nim, nama, email) VALUES ('$nim', '$nama', '$email')");

	if (empty($nim)) {
    	echo "<script language='javascript'>
				alert('nim jangan kosong'); 
				document.location = 'masuk.php'
			  </script>";;
	}
	if (strlen($nim)>10) {
		echo "<script language='javascript'>
				alert('nim harus lebih dari 10 angka');
				document.location = 'masuk.php' 
			  </script>";
	}
	if (!is_numeric($nim)) {
		echo "<script language='javascript'>
				alert('nim harus angka'); 
				document.location = 'masuk.php'
			  </script>";
	}

	if (empty($nama)) {
    	echo "<script language='javascript'>
				alert('nama jangan kosong');
				document.location = 'masuk.php' 
			  </script>";
    }
	if (strlen($nama) >20) {
		echo "<script language='javascript'>
				alert('nama maksimal 20 huruf')
				document.location = 'masuk.php'; 
			  </script>";
	}

	if (empty($email)) {
	   echo "Email is required";
	} else {
	   $email = test_input($email);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format"; 
		}
	}
	header("location: komen.php");
}
?>