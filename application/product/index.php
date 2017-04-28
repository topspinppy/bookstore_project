﻿<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-Type" content="text/html; charset=utf8">
    <title>ระบบจัดการหลังบ้าน | ศูนย์หนังสือมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <SCRIPT TYPE="text/javascript"> function popup(mylink, windowname) { if (! window.focus)return true; var href; if (typeof(mylink) == 'string') href=mylink; else href=mylink.href; window.open(href, windowname, 'width=400,height=200,scrollbars=yes'); return false; } </SCRIPT>
  </head>
  <body>
    <div>
      <h2>จัดการข้อมูลสินค้า/จัดการคลังสินค้า</h2>
 	      <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
        <a role="button" class="btn btn-default btn-xs" onclick="location.reload();">
                    <i class="glyphicon glyphicon-refresh"></i>
                    โหลดหน้าจอใหม่
                </a>
        <button class="btn btn-default btn-xs"  title="Click to show/hide" type="submit"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูล </button>
    </div>
    <hr>
    <?php
   ini_set('display_errors', 1);
   error_reporting(~0);
   $conn = mysqli_connect("localhost","root","","kmutnb_shop_database");
   mysqli_set_charset($conn, "utf8");
	$sql = "select * from stockbook join (select * from books join catagory_books using (id_catagory_books)) AS stockca using (isbn_id)";
	$query = mysqli_query($conn,$sql);

	$num_rows = mysqli_num_rows($query);

	$per_page = 2;   // Per Page
	$page  = 1;

	if(isset($_GET["Page"]))
	{
		$page = $_GET["Page"];
	}

	$prev_page = $page-1;
	$next_page = $page+1;

	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{
		$num_pages =1;
	}
	else if(($num_rows % $per_page)==0)
	{
		$num_pages =($num_rows/$per_page) ;
	}
	else
	{
		$num_pages =($num_rows/$per_page)+1;
		$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{
		$row_end = $num_rows;
	}


	$sql .= " ORDER BY name_books ASC LIMIT $row_start ,$row_end ";
	$query = mysqli_query($conn,$sql);

?>
<table width="600" border="0" class="table table-striped table-responsive">
  <tr>
    <th width="91"> <div align="center">ชื่อหนังสือ</div></th>
    <th width="98"> <div align="center">ราคา</div></th>
    <th width="97"> <div align="center">ผู้แต่ง</div></th>
    <th width="97"> <div align="center">หมวด</div></th>
    <th width="97"> <div align="center">จำนวนสินค้า</div></th>
    <th width="97"> <div align="center">จัดการหนังสือ</div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><?php echo $result["name_books"];?></td>
    <td><?php echo $result["price_books"];?></td>
    <td><?php echo $result["author_books"];?></td>
    <td><?php echo $result["name_catagory"];?></td>
    <td><?php echo $result["stockbook_amount"];?></td>
    <td><center><a class="btn btn-info btn-xs load_data" title="" href="../view?p_id=<?php echo $result["isbn_id"]; ?>" target="_blank"><i class="glyphicon glyphicon-zoom-in"></i> รายละเอียด</a> <a class="btn btn-warning btn-xs load_data" title="" onClick="return popup(this, 'notes')" href="catagory/edit.php?CusID=<?php echo $result["id_catagory_books"];?>"><i class="glyphicon glyphicon-edit"></i> แก้ไข</a> <a class="btn btn-danger btn-xs confirm"  href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='catagory/delete.php?CusID=<?php echo $result["id_catagory_books"];?>';}"  data-toggle="modal" data-target="#deleteModal12"><i class="glyphicon glyphicon-remove" target="iframe_target"></i> ลบ</a></center></td>
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
  </tr>
<?php
}
?>
</table>
<br>
ทั้งหมด <?php echo $num_rows;?> จำนวน : <?php echo $num_pages;?> หน้า :
<?php
if($prev_page)
{
	echo " <a href='index.php?file=product&Page=$prev_page'><< Back</a> ";//*****
}

for($i=1; $i<=$num_pages; $i++){
	if($i != $page)
	{
		echo "[ <a href='index.php?file=product&Page=$i'>$i</a> ]";//*****
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($page!=$num_pages)
{
	echo " <a href ='index.php?file=product&Page=$next_page'>Next>></a> ";//*****
}
$conn = null;
?>
  </body>
</html>
