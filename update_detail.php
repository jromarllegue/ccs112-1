<?php
	include_once("config.php");

	$detail = $_GET["detail"];
	$num = $_GET["num"];

	$detailCap = "";

	if ($detail == "author") {
		$sql = "SELECT * FROM tbl_authors WHERE author_num =". $num;
		$detailCap = "AUTHOR";
	}
	else if ($detail == "category") {
		$sql = "SELECT * FROM tbl_category WHERE category_num =". $num;
		$detailCap = "CATEGORY";
	}
	$result = $mysqli->query($sql);
	
	$currentrow = $result->fetch_assoc();
	$oldname = "";

	if ($detail == "author") {
		$oldname = $currentrow["author_name"];
	}
	else if ($detail == "category") {
		$oldname = $currentrow["category_name"];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UPDATE <?php echo $detailCap ?> - BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #fff5d7; font-family: 'Calibri';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="form-container flex">
		<label class="form-title">UPDATE <?php echo $detailCap ?></label>
		<form action="update_detail.php?detail=<?php echo $detail ?>&num=<?php echo $num ?>" method="POST" autocomplete="off">
			<div class="sub-form-container flex">
				<div class="form-labels flex">
					<label><?php echo $detailCap ?> ID:</label><br>
					<label><?php echo $detailCap ?> NAME:</label>
				</div>	
				<div class="input-container flex">
					<input type="text" class="form-inputs" value="<?php echo $num ?>" disabled><br>			
					<input type="text" name="name" class="form-inputs" value="<?php echo $oldname ?>" required>
				</div>
			</div>
			<div class="form-submit flex justify-center">
				<input type="submit" name="submit" value="CONFIRM">
				<?php
					if(isset ($_POST["submit"])) {
						$name = $_POST["name"];

						include_once("config.php");

						if ($detail == "category") {
							$result = mysqli_query($mysqli, "UPDATE tbl_category SET category_name = '$name' WHERE category_num = '$num';");
							header("Location: index.php?show=categories");
						} 
						else if ($detail == "author"){
							$result = mysqli_query($mysqli, "UPDATE tbl_authors SET author_name = '$name' WHERE author_num = '$num';");
							header("Location: index.php?show=authors");
						}

						exit();
					}
				?>
			</div>
		</form>
	</div>
</body>
</html>