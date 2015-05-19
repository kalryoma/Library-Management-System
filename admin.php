<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>柯豪的图书管理系统</title>
</head>
<body>
	<!--topbar-->
	<div class="navbar navbar-inverse">
  		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
				<span class="icon-bar"></span>
    		</button>
    	<a class="navbar-brand" href="#">图书管理系统</a>
	  	</div>
  		<div class="navbar-collapse collapse navbar-inverse-collapse">
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="login.html">登出</a></li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="admin.php">管理员</a></li>
 		<?php
 			$aid = $_COOKIE['id'];
 			echo "<li><a>ID: ".$aid."</a></li>";
 		?>
	</ul>
	<!--operations-->
	<div class="alert alert-dismissable alert-warning" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="lend.php" style="text-decoration: none;"><strong><h1>借书</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-success" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="return.php" style="text-decoration: none;"><strong><h1>还书</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="add_a_book.php" style="text-decoration: none;"><strong><h1>单本入库</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="add_books.php" style="text-decoration: none;"><strong><h1>批量入库</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-success" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="add_user.php" style="text-decoration: none;"><strong><h1>添加借书卡</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-danger" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="delete_user.php" style="text-decoration: none;"><strong><h1>删除借书卡</h1></strong></a>
	</div>
</body>
</html>