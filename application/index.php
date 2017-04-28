<!DOCTYPE html>
<html ng-app="app">
  <head>
    <meta http-equiv="content-Type" content="text/html; charset=utf8">
    <title>ระบบจัดการหลังบ้าน | ศูนย์หนังสือมหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</title>
    <meta name="viewport" content="width=device-width, initial-scale:1.0 , user-scalabe=0" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.2.0.min.js">  </script>
    <script type="text/javascript" src="js/general.js">  </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body style="font-family: 'Kanit', sans-serif; font-size: 16px;">
    <div id="header">
        <div class="logo">
           <a class ="namer">BookStore @ KMUTNB</a>
        </div>
    </div>
    <a class="mobile" href="#">MENU</div>
    <div id ="container">
      <div class="sidebar">
          <ul id="nav">
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>  Dashboard</a></li>
            <li><a href="index.php?file=changeads"><i class="glyphicon glyphicon-cloud"></i>  เปลี่ยนภาพโฆษณา</a></li>
            <li><a href="index.php?file=users"><i class="glyphicon glyphicon-user"></i>  ผู้ใช้(ลูกค้า)</a></li>
            <li><a href="index.php?file=catagory"><i class="glyphicon glyphicon-list-alt"></i>  หมวดหมู่สินค้า</a></li>
            <li><a href="index.php?file=product"><i class="glyphicon glyphicon-book"></i>  สินค้า</a></li>
            <li><a href="index.php?file=order"><i class="glyphicon glyphicon-align-justify"></i>  รายการสั่งซื้อ</a></li>
            <li><a href="index.php?file=edithowtopay"><i class="glyphicon glyphicon-folder-open"></i>  แก้ไขวิธีการสั่งซื้อ </a></li>
            <li><a href="index.php?file=editcontactus"><i class="	glyphicon glyphicon-phone"></i>  แก้ไขติดต่อเรา </a></li>
            <li><a href="../index.php"><i class="glyphicon glyphicon-home"></i>  กลับไปดูหน้าเว็บไซต์ </a></li>
          </ul>
      </div>
        <div class="content">
          <?php
            $file = (! empty($_GET['file'])) ? $_GET['file'] : 'dashboard';
            if ($file=="edithowtopay")
              include ("howtopay/index.php");
            if ($file=="editcontactus")
              include ("contact/index.php");
            if ($file=="changeads")
              include ("editads/index.php");
            if ($file=="catagory")
              include ("catagory/index.php");
            if ($file=="product")
                include ("product/index.php");
          ?>
        </div>
      </div><!-- #container -->
    </div>
  </body>
</html>
