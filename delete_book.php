<?php
	include_once("config.php");

	$currentrow = "";

	$book_num = $_GET["book_num"];
	$sql = "SELECT * FROM tbl_books WHERE book_num =". $book_num;

	$result = $mysqli->query($sql);

	$currentrow = $result->fetch_assoc();

	$mysqldate = $currentrow["date_published"];
	$date = DateTime::createFromFormat('Y-m-d', $mysqldate);
	$htmldate = $date->format('d/m/Y');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELETE BOOK - BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #fff5d7; font-family: 'Calibri';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="form-container flex">
		<label class="form-title">DELETE BOOK</label>
		<form action="process_delete.php" method="POST" autocomplete="off">
			<div class="sub-form-container flex">
				<div class="form-labels flex">
					<label>ID:</label><br><br>
					<label>BOOK TITLE:</label>
					<label>AUTHOR NAME:</label>
					<label>CATEGORY:</label>
					<label>DATE PUBLISHED:</label>				
				</div>	
				<div class="form-labels flex" max-width="350px">
					<input type="text" name="book_num" value="<?php echo $currentrow['book_num'] ?>" style="display: none;">
					<input type="text" class="form-inputs" value="<?php echo $currentrow['book_num'] ?>" disabled><br><br>
					<label><?php echo $currentrow['book_name'] ?></label>
					<label><?php echo $currentrow['author_num'] ?></label>
					<label><?php echo $currentrow['category_num'] ?></label>
					<label><?php echo $htmldate ?></label>
				</div>
			</div>
			<div class="flex justify-center">
				<input type="checkbox" required>Are you sure you want to delete this book?
			</div>
			<div class="form-submit flex justify-center">
				<div>
				</div>
				<input type="submit" name="submit" value="CONFIRM">
			</div>
		</form>
	</div>
</body>
</html>