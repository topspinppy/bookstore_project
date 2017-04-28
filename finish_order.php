<?php     require 'template/head.php'; ?>
<?php     require 'template/header.php'; ?>

<body>
  <div class="container">
  <div class="alert alert-success" role="alert" style="margin:15px;">
                      <p><strong>ทำรายการสั่งซื้อสำเร็จ!</strong></p>
                      <p>หมายเลขสั่งซื้อของคุณคือ <strong><?php echo $_GET['OrderID']; ?></strong> กรุณาเช็คอีเมล์อีกครั้งเพื่อทวนการสั่งซื้อสินค้า</p>
                      <p>หากต้องการกลับหน้าแรก
                          <a href="product" class="alert-link">คลิกที่นี้</a></p>
                  </div>
  </div>
</body>
<?php     require 'template/footer.php'; ?>
