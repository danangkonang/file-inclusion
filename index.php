<?php
$target_path = '';
$uploadOk = false;

if (isset($_POST['submit'])) {
	
	$target_dir  = 'uploads/';

	$path = $_FILES['image']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);

	$target_path = $target_dir . md5(time()) . "." . $ext;;

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
	{	
		$uploadOk = true;	
	}
	else 
	{
		die("Upload gagal!");
	}		

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>LFI/RFI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	
	<?php
	
	if ($uploadOk)
	{
		echo "<p>Upload berhasil:</p>";
		echo "<img src='{$target_path}' width='200'>";
		echo "<p>Lakasi file:</p>";
		echo $target_path;
	}
	
	?>
		
	<form action="" method="post" enctype="multipart/form-data">
		<p>Masukkan gambar:</p>
		<input type="file" name="image" accept="image/*"/>
		<br/>
		<br/>
		<input type="submit" name="submit"/>
	</form>


	<br><br><br><br><br>

	<form method="GET">
    <label>Select Timezone</label>
    <select name="timezone">
			<option value="america.php">America/New_York</option>
			<option value="singapore.php">Asia/Singapore</option>
			<option value="indonesia.php">Asia/Singapore</option>
    </select>
    <input type="submit" value="Display time"/>
	</form>

	<?php
		if(isset($_GET['timezone'])){
			$timezone=$_GET['timezone'];
		}else{
			$timezone='america.php';
		}
		include "time_zone/$timezone";
	?>
	
</body>

</html>



