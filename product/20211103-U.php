<?php
header("content-type:text/html; charset=utf-8");
	
	// input ==> {"id": "8" ,"pname":"珍珠奶茶"}
	$data = file_get_contents("php://input",'r');
	// echo "來自後端".$data;
	$mydata = array();

	$mydata = json_decode($data, true);

	// 1.阻擋錯誤的欄位命名及2.空白欄位
	if (isset($mydata["id"]) && isset($mydata["pname"])){
		if (trim($mydata["id"]) != "" && trim($mydata["pname"]) != ""){
			$u_id = $mydata["id"];
			$u_pname = $mydata["pname"];


			$servername = "localhost";
			$username = "root";
			$password = "123456";
			$dbname = "test1013";

			$inline = mysqli_connect($servername, $username, $password, $dbname);

			if (!$inline) {
				die("連線錯誤".mysqli_connect_error());
			}
			
			$sql = "UPDATE product SET Pname = '$u_pname' WHERE ID = '$u_id'";

			if (mysqli_query($inline, $sql)){
				echo '{"state": true, "message": "更新成功"}';
			}else{
				echo '{"state": false, "message": "更新失敗"}';
			}
			mysqli_close($inline);
		}else{
			echo '{"state": false, "message": "欄位不得為空白"}';
		}
	}else{
		echo '{"state": false, "message": "欄位錯誤"}';
	}	
?>