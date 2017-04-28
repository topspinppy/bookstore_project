<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Untitled Document</title>
</head>

<body>
 	<?php
		$nameproduct = $_POST["nameproduct"];
		$objConnect = mysqli_connect("localhost","root","","kmutnb_shop_database");
		mysqli_set_charset($objConnect, "utf8");
		// Check connection
		if (!$objConnect) {
			die("Connection failed: " . mysqli_connect_error());
		}
    $sql = "select max(id) id from catagory_books";
    $query = $objConnect->query($sql);
    $row = $query->fetch_assoc();
    $id = $row["id"]+1;

    $sqls = "INSERT INTO catagory_books VALUES (NULL,".$id.",'".$nameproduct."')";
		if (mysqli_query($objConnect, $sqls)) {
			echo "<script> alert('สำเร็จ'); </script>";
		}
    else {
			echo "<script>"."alert('Error: " . $sql . "<br>" . mysqli_error($objConnect)."');</script>";
		}
    ?>
</body>
</html>
