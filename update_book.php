<?php
	include_once("config.php");

	$currentrow = "";

	$book_num = $_GET["book_num"];
	$sql = "SELECT * FROM tbl_books WHERE book_num =". $book_num;

	$result = $mysqli->query($sql);

	$currentrow = $result->fetch_assoc();

	$selected = "";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UPDATE BOOK - BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #fff5d7; font-family: 'Calibri';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="form-container flex">
		<label class="form-title">UPDATE BOOK</label>
		<form action="process_update.php" method="POST" autocomplete="off">
			<div class="sub-form-container flex">
				<div class="form-labels flex">
					<label>ID:</label><br><br>
					<label>BOOK TITLE:</label>
					<label>AUTHOR NAME:</label>
					<label>CATEGORY:</label>
					<label>DATE PUBLISHED:</label>				
				</div>	
				<div class="input-container flex">
					<input type="text" name="book_num" value="<?php echo $currentrow['book_num'] ?>" style="display: none;">
					<input type="text" class="form-inputs" value="<?php echo $currentrow['book_num'] ?>" disabled><br><br>
					<input type="text" name="book_name" class="form-inputs" value="<?php echo $currentrow['book_name'] ?>"required>
					<select name="author_num" class="form-inputs" required>
					<?php
						include_once("config.php");

						$sql = "SELECT * FROM tbl_authors";
						$result = $mysqli->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {

								if($row["author_num"] == $currentrow["author_num"]) {
									$selected = "selected";
								}
								echo "<option value='", $row["author_num"], "' ", $selected, ">", $row["author_name"], "</option>";								
								$selected = "";
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

								if($row["category_num"] == $currentrow["category_num"]) {
									$selected = "selected";
								}
								echo "<option value='", $row["category_num"], "' ", $selected, ">", $row["category_name"], "</option>";

								$selected = "";
							}
						}
					?>
					</select>						
					<input type="date" name="date_published" class="form-inputs" id="date" value="<?php echo $currentrow['date_published'] ?>" required>
				</div>
			</div>
			<div class="form-submit flex">
				<input type="submit" name="submit" value="CONFIRM">
			</div>
		</form>
	</div>
</body>
</html>