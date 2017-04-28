<?php include 'template/head.php' ?>

<?php     include 'template/header.php'; ?>
<?php     include 'template/slideshow.php'; ?>
  <div class="container">
    <div class="row">
        <div class="col-md-3">
          <div class="list-group">
             <?php
                 $serverName = "localhost";
                 $userName = "root";
                 $userPassword = "";
                 $dbName = "kmutnb_shop_database";
                 $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
                 mysqli_set_charset($conn, "utf8");
                 $sqlc = "select * from catagory_books";
                 $queryc = mysqli_query($conn,$sqlc);
                 while($result=mysqli_fetch_array($queryc,MYSQLI_ASSOC))
                 {
             ?>
                 <a href="product?c_id=<?PHP echo $result['id'];?>" class="list-group-item <?php if($_GET['c_id']==$result['id']) {echo 'active';} ?>"><?PHP echo $result['name_catagory']; ?></a>
             <?php
                 }
             ?>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel">
          <div class="product-head">
              <h4><b>Latest Products | สินค้าล่าสุด</b></h2>
          </div>
          <div class="panel-body">
              <div class="row">
                <?php
                $serverName = "localhost";
                $userName = "root";
                $userPassword = "";
                $dbName = "kmutnb_shop_database";
                $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
                        mysqli_set_charset($conn, "utf8");
                error_reporting(0);
                $c_id = $_GET['c_id'];
                $str = !empty($c_id)? "where id_catagory_books=$c_id" : " ";
                $sqlc = "select * from books join catagory_books using (id_catagory_books) $str order by id_catagory_books desc";
                $queryc = mysqli_query($conn,$sqlc);
                while($result=mysqli_fetch_array($queryc,MYSQLI_ASSOC))
                {
                ?>
                                <div class="col-sm-6 col-md-4">
                                      <div class="thumbnail" style="height: 330px!important;">
                                        <a href="view?p_id=<?PHP echo $result['isbn_id'];?>">
                                              <img src="<?php echo $result['images'];?>" width="120" border="0" class="img-responsive img-rounded">
                                        </a>
                                        <div class="caption">
                                            <a href="view?p_id=<?PHP echo $result['isbn_id'];?>" style="font-size: 13px;"><?php echo $result['name_books'];?></a>
                                            <p style="font-size: 13px;font-weight: bold;color: red;">ราคา : <?php echo $result['price_books'];?> บาท</p>
                                            <p style="font-size: 13px;">หมวดหมู่ :   <?php echo $result['name_catagory']; ?></p>
                                                <p>
                                                     <a href="view?p_id=<?PHP echo $result['isbn_id'];?>" class="btn btn-default" role="button">รายละเอียด</a>
                                                </p>
                                        </div>
                                       </div>
                                 </div>
                <?php
                 }
                ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
      require 'template/footer.php';
  ?>




</body>
</html>
