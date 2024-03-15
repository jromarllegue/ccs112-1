<?php
	if(isset ($_POST["submit"])) {
		$book_num = $_POST["book_num"];

		include_once("config.php");
		$result = mysqli_query($mysqli, "DELETE FROM tbl_books WHERE book_num = $book_num;");

		header("Location: index.php");
		exit();
	}
?>
z