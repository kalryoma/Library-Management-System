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
				<span class="icon-ba%6r"></span>
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
 		<li class="active"><a href="user.php">用户</a></li>
 		<?php
 			$cid = $_COOKIE['id'];
 			echo "<li><a>借书卡号: ".$cid."</a></li>";
 		?>
	</ul>
	<!--operations-->
	<div class="alert alert-dismissable alert-warning" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="borrow.php" style="text-decoration: none;"><strong><h1>借书历史</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="search.php" style="text-decoration:none;"><strong><h1>图书查询</h1></strong></a>
	</div>
</body>
</html>