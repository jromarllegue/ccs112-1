<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD DETAIL - BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #fff5d7; font-family: 'Calibri';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="form-container flex">
		<label class="form-title">ADD AN AUTHOR/CATEGORY</label>
		<form action="add_detail.php" method="POST" autocomplete="off">
			<div class="radio-form flex">
				<div>
					<input type="radio" name="detail" value="author" required><label>AUTHOR</label>
				</div>
				<div>
					<input type="radio" name="detail" value="category" required><label>CATEGORY</label>
				</div>
			</div>
			<div class="sub-form-container flex">
				<div class="form-labels flex">
					<label> NAME:</label>
				</div>	
				<div class="input-container flex">
					<input type="text" name="name" class="form-inputs" required>
				</div>
			</div>
			<div class="form-submit flex justify-center">
				<input type="submit" name="submit" value="CONFIRM">
				<?php
					if(isset ($_POST["submit"])) {
						$name = $_POST["name"];
						$detail = $_POST["detail"];

						include_once("config.php");

						if ($detail == "category") {
							$result = mysqli_query($mysqli, "INSERT INTO tbl_category VALUES ('default', '$name');");
							header("Location: index.php?show=categories");
						} 
						else if ($detail == "author"){
							$result = mysqli_query($mysqli, "INSERT INTO tbl_authors VALUES ('default', '$name');");
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