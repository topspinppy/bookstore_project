<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				อัพโหลดไฟล์ เปลี่ยนภาพ Slide
        ขนาด 1366x275 px
			</h3>
			<form role="form" method="post" action = "" enctype="multipart/form-data">
				<div class="form-group">
					ภาพที่ 1 : <input type="file" name="filUpload[]" />
				</div>
        <div class="form-group">
					ภาพที่ 2 : <input type="file" name="filUpload[]" />
				</div>
        <div class="form-group">
					ภาพที่ 3 : <input type="file" name="filUpload[]" />
				</div>
				<button type="submit" class="btn btn-default">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>

<?php
$imageupload = $_FILES['imageupload']['tmp_name'];
$imageupload_name = $_FILES['imageupload']['name'];

if(isset($_POST['submit'])){
if($imageupload){
$arraypic = explode(".",$imageupload_name);//แบ่งชื่อไฟล์กับนามสกุลออกจากกัน
$lastname = strtolower($arraypic);
$filename = $arraypic[0];//ชื่อไฟล์
$filetype = $arraypic[1];//นามสกุลไฟล์

if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png"
|| $filetype=="gif"){

$newimage = $filename.".".$filetype;//รวมชื่อไฟล์กับนามสกุลเข้าด้วยกัน
copy($imageupload,"uploads/".$newimage); //โฟลเดอร์สำหรับเก็บรูป/ไฟล์รูป
}else {
echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
}
}

}
$showpic = "uploads/".$newimage;
?>
