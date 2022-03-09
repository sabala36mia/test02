<?php
header("content-type:text/html; charset=utf-8");
	// {"pname":"珍珠奶茶"}
	$data = file_get_contents("php://input",'r');
	// echo "來自後端".$data;
	// $data = '{"pname":"珍珠奶茶01"}';
	$mydata = array();

	$mydata = json_decode($data, true);

	// echo isset($mydata["pname"]);

	// 阻擋錯誤的欄位命名及空白欄位
	if (isset($mydata["pname"])) {
		if (trim($mydata["pname"]) != "") {
			$p_pname = $mydata["pname"];

			$servername = "localhost";
			$username = "root";
			$password = "123456";
			$dbname = "test1013";

			$inline = mysqli_connect($servername, $username, $password, $dbname);

			if (!$inline) {
				die("連線錯誤".mysqli_connect_error());
			}

			$sql = "INSERT INTO product(Pname) VALUES('$p_pname')";

			if(mysqli_query($inline, $sql)){
				// 新增成功
				echo '{"state": true, "message": "新增成功"}';
			}else{
				// 新增失敗
				echo '{"state": false, "message": "新增失敗"}';
			}
			mysqli_close($inline);
		}else{
			echo '{"state": false, "message": "欄位不得為空白"}';
		}
	}else{
		echo '{"state": false, "message": "欄位錯誤"}';
	}	
?>