
<header>
   <center>
     <img class="logo img-responsive" src="img/logo.png" alt="BOOKSTORE">
   </center>
</header>
<nav class="navbar navbar-inverse bg-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./">หน้าแรก</a></li>
        <li><a href="product">ประเภทสินค้า</a></li>
        <li><a href="cart">ตะกร้าสินค้า</a></li>
        <li><a href="howto">วิธีซื้อสินค้า</a></li>
        <li><a href="contact">ติดต่อร้านค้า</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
</div>
</nav>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ </h4>
      </div>
      <div class="modal-body">
      <form name="test" method="post" action="application/check.php">
          username : <input type="text" name="username" id="username"> <br>
          password : <input type="password" name="password" id="password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="login_button" id="login_button"class="btn btn-primary">Login </button>
      </div>
</form>

    </div>
  </div>
</div>
<script>
   $(document).ready(function()
   {
       $('#login_button').click(function(){
         var username = $('#username').val();
         var password = $('#password').val();
         if (username != '' && password != '')
         {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{username:username, password:password},
                success:function(data){}
            });
         }
         else
         {
            alert("กรอกให้ครบ")
         }
       })
   });
</script>
