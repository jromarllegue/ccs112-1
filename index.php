<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOOKSTORE DATABASE</title>
	<link rel="stylesheet" href="bookstore.css">
	<link rel="icon" type="image/x-icon" href="https://i.imgur.com/stIV0iu.png">
</head>
<body style="background-color: #a9a38b; font-family: 'Times New Roman';">
	<div class="header flex">
		<label><b>BOOKSTORE</b></label>
		<a href="index.php">HOME</a>
	</div>
	<div class="container flex">
		<div class="sidebar flex">
			<div class="sidebar-options">
				<a href="index.php?show=authors">AUTHORS</a>
				<a href="index.php">BOOKS</a>
				<a href="index.php?show=categories">CATEGORIES</a>
			</div>
		</div>
		<div class="sub-container flex">
			<div class="main flex">
				<div class="main-top flex space-between">
					<div class="title-container">
						<label>
							<?php
								if (!isset($_GET["show"])) {
									echo "BOOKS";
								}
								else if ($_GET["show"] == "authors") {
									echo "AUTHORS";
								}
								else if ($_GET["show"] == "categories") {
									echo "CATEGORIES";
								}
							?>
						</label>
					</div>
					<div class="crud-buttons">
						<?php
							if (!isset($_GET["show"])) { 
								echo '<button onclick="window.location.href = `add_book.php`">ADD</button>';
							}	
							else if ($_GET["show"] == "authors") {
									echo '<button onclick="window.location.href = `add_detail.php`">ADD</button>';
							}
							else if ($_GET["show"] == "categories") {
									echo '<button onclick="window.location.href = `add_detail.php`">ADD</button>';
							}
						?>
					</div>
				</div>
				<div class="main-bottom">
					<table class="main-tables" id="bookTable">
						<tr>
							<?php
								if (!isset($_GET["show"])) {
									echo '<th>BOOK ID</th>
										  <th>TITLE</th>
										  <th>AUTHOR</th>
										  <th>CATEGORY</th>
										  <th>PUBLISHED DATE</th>
										  <th><img src="settings-icon.png" height="20px"></th>';
								}
								else if ($_GET["show"] == "authors") {
									echo '<th>AUTHOR ID</th>
										  <th>AUTHOR NAME</th>									
										  <th><img src="settings-icon.png" height="20px"></th>';
								}
								else if ($_GET["show"] == "categories") {
									echo '<th>CATEGORY ID</th>
										  <th>CATEGORY NAME</th>
										  <th><img src="settings-icon.png" height="20px"></th>';
								}	
							?>
						</tr>
						<?php
							include_once("config.php");

							if (!isset($_GET["show"])) {
								$sql = "SELECT a.book_num, a.book_name, b.author_name, c.category_name, a.date_published 
										FROM tbl_books a 
										INNER JOIN tbl_authors b 
										INNER JOIN tbl_category c 
										ON a.author_num = b.author_num && a.category_num = c.category_num 
										ORDER BY a.book_num ASC;";
								$result = $mysqli->query($sql);

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr>" ,
											 	"<td>" , $row["book_num"] , "</td>" ,
											 	"<td>" , $row["book_name"] , "</td>" ,
											 	"<td>" , $row["author_name"] , "</td>" , 
											 	"<td>" , $row["category_name"] , "</td>" ,
											 	"<td>" , $row["date_published"] , "</td>" ,
											 	"<td><a href='update_book.php?book_num=", $row["book_num"], "'>Update</a>
											 	     <a href='delete_book.php?book_num=", $row["book_num"], "'>Delete</a></td>",
											 "</tr>";
									}
								}
							}
							else if ($_GET["show"] == "authors") {
								$sql = "SELECT * FROM tbl_authors";
								$result = $mysqli->query($sql);

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr>" ,
											 	"<td>" , $row["author_num"] , "</td>" ,
											 	"<td>" , $row["author_name"] , "</td>" ,
											 	"<td><a href='update_detail.php?detail=author&num=", $row["author_num"], "'>Update</a>
											 	     <a href='delete_detail.php?detail=author&num=", $row["author_num"], "'>Delete</a></td>",
											 "</tr>";
									}
								}
							}
							else if ($_GET["show"] == "categories") {
								$sql = "SELECT * FROM tbl_category";
								$result = $mysqli->query($sql);

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr>" ,
											 	"<td>" , $row["category_num"] , "</td>" ,
											 	"<td>" , $row["category_name"] , "</td>" ,
											 	"<td><a href='update_detail.php?detail=category&num=", $row["category_num"], "'>Update</a>
											 	     <a href='delete_detail.php?detail=category&num=", $row["category_num"], "'>Delete</a></td>",
											 "</tr>";
									}
								}
							}

							$mysqli->close();
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
			
</script>
</html>
