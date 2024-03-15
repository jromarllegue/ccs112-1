<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADD BOOK - BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #fff5d7; font-family: 'Calibri';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="form-container flex">
		<label class="form-title">ADD A BOOK</label>
		<form action="add_book.php" method="POST" autocomplete="off">
			<div class="sub-form-container flex">
				<div class="form-labels flex">
					<label>BOOK TITLE:</label>
					<label>AUTHOR NAME:</label>
					<label>CATEGORY:</label>
					<label>DATE PUBLISHED:</label>				
				</div>	
				<div class="input-container flex">
					<input type="text" name="book_name" class="form-inputs" required>
					<select name="author_num" class="form-inputs" required>
					<?php
						include_once("config.php");

						$sql = "SELECT * FROM tbl_authors";
						$result = $mysqli->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<option value='", $row["author_num"], "'>", $row["author_name"], "</option>";

							}
						}
					?>
					</select>						
					<select name="category_num" class="form-inputs" required>
					<?php
						include_once("config.php");

						$sql = "SELECT * FROM tbl_category";
						$result = $mysqli->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<option value='", $row["category_num"], "'>", $row["category_name"], "</option>";

							}
						}
					?>
					</select>						
					<input type="date" name="date_published" class="form-inputs" id="date" required>
				</div>
			</div>
			<div class="form-submit flex justify-center">
				<input type="submit" name="submit" value="CONFIRM">
				<?php		
					if(isset ($_POST["submit"])) {
						$book_name = $_POST["book_name"];
						$author_num = $_POST["author_num"];
						$category_num = $_POST["category_num"];

						$input_date = $_POST['date_published'];
						$date = date("Y-m-d H:i:s",strtotime($input_date));
						
						include_once("config.php");
						$result = mysqli_query($mysqli, "INSERT INTO tbl_books VALUES ('default', '$book_name', '$author_num', '$category_num', '$date');");

						header("Location: index.php");
						exit();
					}
				?>
			</div>
		</form>
	</div>
</body>
</html>