<?php
$conn = mysqli_connect("localhost","root","","kmutnb_shop_database");
mysqli_set_charset($conn, "utf8");
$strSQL = "UPDATE catagory_books SET ";
$strSQL .="name_catagory = '".$_POST["txtName"]."' WHERE id_catagory_books = '".$_GET["CusID"]."' ";;
$query = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($query);
if(!$objResult)
{
		echo "<script> alert('บันทึกสำเร็จ'); </script>";
}
else
{
	  echo "<script> alert('ผิดพลาด'); </script>";
}
mysql_close($objConnect);
?>
