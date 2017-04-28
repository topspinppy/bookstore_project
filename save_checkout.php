<?php
session_start();

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "kmutnb_shop_database";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
              mysqli_set_charset($objCon, "utf8");
if (!$objCon) {
	echo $objCon->connect_error;
	exit();
}
  $Total = 0;
  $SumTotal = 0;
  $ship = $_POST['shipping'];
  $emregiskeery = "";

  if ($ship == 50)
  {
    $emregiskeery = "EMS";
  }
  else if ($ship == 80)
  {
    $emregiskeery = "Kerry Express";
  }
  else
  {
    $emregiskeery = "Register";
  }
  $strSQL = "
	INSERT INTO orders (OrderDate,Name,Address,shipping,Tel,Email)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtName"]."','".$_POST["txtAddress"]."','".$emregiskeery."','".$_POST["txtTel"]."','".$_POST["txtEmail"]."')
  ";
  $objQuery = mysqli_query($objCon,$strSQL);
  if(!$objQuery)
  {
	echo $objCon->error;
	exit();
  }

  $strOrderID = mysqli_insert_id($objCon);

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO orders_detail (OrderID,ProductID,Qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."')
			  ";
			  mysqli_query($objCon,$strSQL);
	  }
  }

//////////////////////////////////


	$strTo = $_POST["txtEmail"];
	$strSubject = "Test Send Email";
	$strHeader = "Content-type: text/html; charset=windows-874\r\n"; // or UTF-8 //
	$strHeader .= "From: Mr.Weerachai Nukitram<webmaster@thaicreate.com>\r\nReply-To: thaicreate@hotmail.com";
	$strVar = "My Message";
	$strMessage = "
	<h1>My Message</h1><br>
	<table width='285' border='1'>
	 <tr>
	 <td><div align='center'><strong>My Message </strong></div></td>
	 <td><div align='center'><font color='red'>My Message</font></div></td>
	 <td><div align='center'><font size='2'>My Message</font></div></td>
	 </tr>
	 <tr>
	 <td><div align='center'>My Message</div></td>
	 <td><div align='center'>My Message</div></td>
	 <td><div align='center'>My Message</div></td>
	 </tr>
	 <tr>
	 <td><div align='center'>".$strVar."</div></td>
	 <td><div align='center'>".$strVar."</div></td>
	 <td><div align='center'>".$strVar."</div></td>
	 </tr>
	</table>";

	 @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //

/////////////////////////////////

mysqli_close($objCon);

session_destroy();

header("location:finish_order.php?OrderID=".$strOrderID);
?>
