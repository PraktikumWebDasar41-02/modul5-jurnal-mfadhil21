<?php  
	session_start();
	$nama= $_SESSION['nama'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="komen.php" method="post">
		<div>
			<label>Nama : </label>
			<tr>
				<td><?php echo $nama; ?></td>
			</tr>
		</div>
		<div>
			<label>Masukkan komentar anda : </label>
			<tr>
				<td>
					<input type="text" name="komentar">
				</td>
			</tr>
		</div>
		<div>
			<input type="submit" name="submit2" value="masuk">
		</div>
	</form>
</body>
</html>

<?php  
$db = mysqli_connect("localhost", "root", "", "d_modul5");
$query = mysqli_query($db, "SELECT * FROM t_jurnal4 WHERE nama = '$nama'");
$row = mysqli_fetch_array($query);

	if(isset($_POST['submit2'])){
	$komentar = $_POST['komentar'];
		if (str_word_count($komentar)) {
			# code...
		}
	}

	if (strlen($komentar)<=5) {
		echo "Kurang dari 5 huruf";
	}
?>