﻿<?php include 'template/head.php' ?>
<body>
  <?php
      require 'template/header.php';
  ?>
<?php include 'config.php'; ?>
  <style>

#custom-search-input {
    margin:0;
    margin-top: 10px;
    padding: 0;
}

#custom-search-input .search-query {
    padding-right: 3px;
    padding-right: 4px \9;
    padding-left: 3px;
    padding-left: 4px \9;
    /* IE7-8 doesn't have border-radius, so don't indent the padding */

    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

#custom-search-input button {
    border: 0;
    background: none;
    /** belows styles are working good */
    padding: 2px 5px;
    margin-top: 2px;
    position: relative;
    left: -28px;
    /* IE7-8 doesn't have border-radius, so don't indent the padding */
    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color:#D9230F;
}

.search-query:focus + button {
    z-index: 3;
}

  </style>
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
      <li class="breadcrumb-item"><a href="product">ประเภทสินค้า</a></li>
      <?php
          $c_id = @$_GET['c_id'];
          $serverName = "localhost";
          $userName = "root";
          $userPassword = "";
          $dbName = "kmutnb_shop_database";
          $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
          mysqli_set_charset($conn, "utf8");
          $sqlc = "select * from catagory_books where id_catagory_books = $c_id";
          error_reporting(0);
          $queryc = mysqli_query($conn,$sqlc);
          $result=mysqli_fetch_array($queryc,MYSQLI_ASSOC);
      ?>
          <li class="breadcrumb-item">
            <?PHP
             if($c_id==" ")
             {
               echo "";
             }
             else if ($c_id==$result['id_catagory_books'])
             {
               echo $result['name_catagory'];
             }
            ?>
          </li>

    </ol>

    <div class="row">
        <div class="col-md-3">
           <div class="list-group">
             <center><div class="panel">
                   <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Search" />
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
             </div></center>
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
                  <a href="?c_id=<?PHP echo $result['id'];?>" class="list-group-item <?php if($_GET['c_id']==$result['id']) {echo 'active';} ?>"><?PHP echo $result['name_catagory']; ?></a>
              <?php
                  }
              ?>
              <br>
              <br>
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
        $rows = 3;
        $rowcount=mysqli_num_rows(mysqli_query($conn,"select * from books"));
        $totalpage = ceil($rowcount/$rows);


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
    </div>
  <?php
      require 'template/footer.php';
  ?>
</body>
</html>
