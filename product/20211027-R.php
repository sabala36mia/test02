<?php
header("content-type:text/html; charset=utf-8");

	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$dbname = "test1013";

	$inline = mysqli_connect($servername, $username, $password, $dbname);

	if (!$inline) {
		die("連線錯誤".mysqli_connect_error());
	}

	// DESC遞減排序，ASC遞增排序
	$sql = "SELECT ID, Pname, Created_at FROM product ORDER BY ID DESC";

	$result = mysqli_query($inline, $sql);

	// fetch每次抓一筆1
	// $row = mysqli_fetch_assoc($result);

	// echo $row["ID"].$row["Pname"].$row["Created_at"];
	
	// php改成json
	$mydata = array();
	while ($row = mysqli_fetch_assoc($result)) {
		// echo $row["ID"].$row["Pname"].$row["Created_at"];
		
		//無[]會只顯示一筆，[]為每一筆陣列列出
		$mydata[] = $row;
	}
	echo json_encode($mydata);

	mysqli_close($inline);
?>