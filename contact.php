<?php include 'template/head.php' ?>
  <body>
    <?php     include 'template/header.php'; ?>
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
        <li class="breadcrumb-item active">ติดต่อเรา</li>
      </ol>
    </div>
    <div class="row">
      <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <?php
                    $fp=fopen("./application/contact/editcontactus.txt","r");
                    fpassthru($fp);
                  ?>
                </div>
            </div>
        </div><!-- /.blog-main -->
      </div>
    </div><!-- /.row -->
    <?php     require 'template/footer.php'; ?>
  </body>
</html>
