<?php
    session_start();
?>
<?php include 'template/head.php' ?>
<?php
    $shipping = 0;
?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

  <body>
    <?php
        include 'template/header.php';
    ?>
    <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
          <li class="breadcrumb-item"><a href="#">ตะกร้า</a></li>
          <li class="breadcrumb-item active">ตรวจสอบข้อมูล</li>
        </ol>
        <p id="demo"></p>
        <h4>ที่อยู่จัดสั่งและตรวจสอบรายการสั่งซื้อ</h4>
        <hr>
        <form name="form1" method="post" action="save_checkout.php" class="form-horizontal">
          <div class="form-group">
                             <label class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                             <div class="col-sm-6">
                                 <input type="text" class="form-control" name="txtName" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">อีเมล์</label>
                             <div class="col-sm-6">
                                 <input type="email" class="form-control" name="txtEmail" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">เบอร์โทรศัพท์</label>
                             <div class="col-sm-6">
                                 <input type="number" class="form-control" name="txtTel" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">ที่อยู่</label>
                             <div class="col-sm-6">
                                 <input type="text" class="form-control" name="txtAddress" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">ช่องทางการจัดส่ง</label>
                             <div class="col-sm-6" style="text-align: left; padding:5px;">
                                 <input type="radio" class="radio-inline" name="shipping" id="name" value="50" required> EMS (+50 บาท)
                                 <input type="radio" class="radio-inline" name="shipping" id="name" value="80" required> Kerry Express (+80 บาท)
                                 <input type="radio" class="radio-inline" name="shipping" id="name" value="0" required> ลงทะเบียน (ฟรี)
                             </div>
                         </div>

    <?php
    if(!isset($_SESSION["intLine"]))
    {
    	echo "Cart Empty";
    	exit();
    }

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
    ?>

    <table class="table table-bordered table-striped" width="400"  border="1">
      <tr>
        <td width="70">รูปสินค้า </td>
        <td width="101">รหัส ISBN</td>
        <td width="82">ชื่อสินค้า</td>
        <td width="82">ราคา/หน่วยe</td>
        <td width="79">จำนวน</td>
        <td width="79">จำนวนเงินรวม</td>
      </tr>
      <?php
      $Total = 0;
      $SumTotal = 0;
      for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
      {
    	  if($_SESSION["strProductID"][$i] != "")
    	  {
    		$strSQL = "SELECT * FROM books where isbn_id='".$_SESSION["strProductID"][$i]."' ";
    		$objQuery = mysqli_query($objCon,$strSQL);
    		$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    		$Total = $_SESSION["strQty"][$i] * $objResult["price_books"];
    		$SumTotal = $SumTotal + $Total;
    	  ?>
    	  <tr>
        <td><a id="example" href="<?php echo $objResult['images']; ?>"><?php echo "<img src='".$objResult["images"]."' width='50'></img>";?></a></td>
    		<td><?=$_SESSION["strProductID"][$i];?></td>
    		<td><?=$objResult["name_books"];?></td>
    		<td><?=$objResult["price_books"];?></td>
    		<td><?=$_SESSION["strQty"][$i];?></td>
    		<td><?=number_format($Total,2);?></td>
    	  </tr>
    	  <?php
    	  }
      }
      ?>
      <script>
      $(document).ready(function () {
        $('#result').html(<?php echo str_replace(',', '', number_format($SumTotal));?>)
      })
      $('input[name=shipping]').click(function () {
        $('#result').html(<?php echo str_replace(',', '', number_format($SumTotal));?>+ parseInt($(this).val()))
      })
      </script>
      <td colspan="6" style="text-align: right;">
                                    <h4>จำนวนเงินรวมทั้งหมด <div id="result"></div> บาท</h4>
                                </td>
      <tr>

                                <td colspan="6" style="text-align: right;">
                                    <a href="cart.php"<button href="cart.php" type="button" class="btn btn-danger goback">
                                        <span class="glyphicon glyphicon-circle-arrow-left"></span>
                                        ย้อนกลับ
                                    </button></a>
                                    <button type="submit" class="btn btn-success saveform">
                                        <span class="glyphicon glyphicon-floppy-save"></span>
                                        บันทึกการสั่งซื้อสินค้า
                                    </button>
                                </td>
                            </tr>
    </table>
    <br><br>
    </form>
  </div>
    <?php
    mysqli_close($objCon);
    ?>
      <?php     require 'template/footer.php'; ?>
  </body>
</html>
