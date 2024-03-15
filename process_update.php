<?php
	if(isset ($_POST["submit"])) {
		$book_num = $_POST["book_num"];
		$book_name = $_POST["book_name"];
		$author_num = $_POST["author_num"];
		$category_num = $_POST["category_num"];

		$input_date = $_POST['date_published'];
		$date = date("Y-m-d H:i:s",strtotime($input_date));

		include_once("config.php");
		$result = mysqli_query($mysqli, "UPDATE tbl_books SET book_name = '$book_name', author_num = '$author_num', category_num = '$category_num', date_published = '$date' WHERE book_num = '$book_num';");

		header("Location: index.php");
		exit();
	}


?>
