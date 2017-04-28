<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  	<script type="text/javascript" src="http://www.kmutnb.ac.th/fb/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
  	<script type="text/javascript" src="http://www.kmutnb.ac.th/fb/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  	<link rel="stylesheet" type="text/css" href="http://www.kmutnb.ac.th/fb/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f072e3a2326528"></script>
    <script>
    $("#share").jssocials({
      shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
    });
    </script>
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript">
                         $(document).ready(function() {

			$("#example").fancybox(); // เรียกใช้ fancy box

                             });
    </script>

  </head>
  <body>
    <?php     include 'template/header.php'; ?>
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
        <li class="breadcrumb-item active">  <a href="product">ประเภทสินค้า</a></li>
        <li class="breadcrumb-item active">รายละเอียดสินค้า</li>
        <li class="breadcrumb-item active"><?php echo " " ?></li>
      </ol>
    </div>
    <?php
    $p_id = @$_GET['p_id'];
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "kmutnb_shop_database";
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
    mysqli_set_charset($conn, "utf8");
    $sqlc = "select * from books where isbn_id = $p_id";
    error_reporting(0);
    $queryc = mysqli_query($conn,$sqlc);
    $result=mysqli_fetch_array($queryc,MYSQLI_ASSOC);
    ?>
    <div class="row">
      <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-sm-5">
                          <a href="http://localhost/ecproduct/upload/product/201412101739141.png" data-imagelightbox="a">
                              <center><a id="example" href="<?php echo $result['images']; ?>"><img src="<?php echo $result['images']; ?>" width="60%"  class="img-responsive img-rounded" alt="Responsive image"></a></center>
                          </a>
                      </div>
                      <div class="col-sm-7">
                          <h3><?php echo $result['name_books']; ?></h3>
                          <dl class="dl-horizontal">
                              <dt>ผู้แต่ง</dt>
                              <dd><?php echo $result['author_books']; ?></dd>
                              <dt>ราคา</dt>
                              <dd><?php echo $result['price_books']; ?> บาท</dd>
                              <dt>ปีที่พิมพ์</dt>
                              <dd><?php echo $result['Year_books']; ?></dd>
                          </dl>

                        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                        <br>
                        <br>
                          <form class="form-inline has-validation-callback" role="form" action="order.php?p_id=<?PHP echo $result['isbn_id'];?>" method="post">
                              <button type="submit" class="btn btn-success">หยิบใส่ตะกร้า</button>
                          </form>
                      </div>
                  </div>
                  <br>
                  <div class="row" style="font-size: 14px;">
                      <div class="col-sm-12">
                          <ul class="nav nav-tabs">
                              <li role="presentation" class="active"><a href="#" onclick="return false;">รายละเอียด</a></li>
                          </ul>
                          <div>
                              <br>
                              <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$result['descriptions']; ?>
                          </div>
                  </div>
              </div>
          </div>


            </div>
        </div><!-- /.blog-main -->
      </div>
    </div><!-- /.row -->
    <?php     require 'template/footer.php'; ?>
  </body>
</html>
