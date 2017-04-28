<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $conn = mysqli_connect("localhost","root","","kmutnb_shop_database");
      $strSQL = "DELETE FROM catagory_books ";
      $strSQL .="WHERE id_catagory_books = '".$_GET["CusID"]."' ";
      echo "ลบข้อมูลออกเรียบร้อย";
      $objQuery = mysqli_query($conn, $strSQL);
      mysqli_close($conn);
    ?>
  </body>
</html>
