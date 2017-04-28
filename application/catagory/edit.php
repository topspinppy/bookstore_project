<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body style="font-family: 'Kanit', sans-serif;">
<form action="saveedit.php?CusID=<?php echo $_GET["CusID"];?>" name="frmEdit" method="post" target="iframe_target">
  <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<?php
$conn = mysqli_connect("localhost","root","","kmutnb_shop_database");
mysqli_set_charset($conn, "utf8");
$strSQL = "SELECT * FROM catagory_books WHERE id_catagory_books = '".$_GET["CusID"]."' ";
$query = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($query);
if(!$objResult)
{
	echo "Not found CustomerID=".$_GET["CusID"];
}
else
{
?>
<table width="600" border="1" class="table table-responsive">
  <tr>
    <th width="160"> <div align="center">แก้ไขชื่อ </div></th>
  </tr>
  <tr>
    <td><input type="text" name="txtName" size="20" value="<?php echo $objResult["name_catagory"];?>"></td>
  </tr>
  </table>
  <input type="submit" name="submit" value="submit">
  <?php
  }
  mysqli_close($conn);
  ?>
  </form>
</body>
</html>
