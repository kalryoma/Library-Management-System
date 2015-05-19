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
	<!--sidebar_operations-->
	<div class="list-group" style="width:10%; text-align:center; margin-top:20px;">
  		<a href="#" class="list-group-item active">操作</a>
  		<a href="lend.php" class="list-group-item">借书</a>
  		<a href="return.php" class="list-group-item">还书</a>
  		<a href="add_a_book.php" class="list-group-item">单本入库</a>
  		<a href="add_books.php" class="list-group-item">批量入库</a>
  		<a href="add_user.php" class="list-group-item">添加借书证</a>
  		<a href="delete_user.php" class="list-group-item">删除借书证</a>
	</div>
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>删除借书证</strong></h3>
  				</a>
  			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="home">
		  		<!--content-->
		  		<form class="form-horizontal" action="delete_user.php" method="post">
			  		<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入卡号</label>
	  					<input class="form-control" id="focusedInput" name="cid" type="text">
					</div>
			  		<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入姓名</label>
	  					<input class="form-control" id="focusedInput" name="cname" type="text">
					</div>
					<div class="col-lg-10 form-group" style="padding:0px;">
						<label for="select" class="control-label">身份类别</label>
	      				<div class="col-lg-10" style="width:10%; padding:0px;">
					        <select class="form-control" id="select" name="ctype">
					          <option>我是学生</option>
					          <option>我是教师</option>
					        </select>
	        			</div>
	        		</div>
					<button type="submit" class="btn btn-info" style="width:15%; height:20%; position:fixed; left:15%; top:60%;"><h1><strong>提交</strong></h1></button>
				</form>
		  	</div>
  		</div>
	</div>
</body>
</html>
<?php header("content-type:text/html; charset=utf-8");
	$cid = $_POST['cid'];
	$cname = $_POST['cname'];
	$ctype = $_POST['ctype'];
	if (($cid!=NULL) && ($cname!=NULL) && ($ctype!=NULL)){
		$conn = mysql_connect("localhost", "root", "root");
		mysql_query("set names utf8;");
		$sql = "select cname, ctype from cards where cid='$cid'";
		$result = mysql_db_query("test", $sql, $conn);
		$row = mysql_fetch_row($result);
		if ($row[0]==$cname && $row[1]==$ctype){
			$sql = "delete from cards where cid='$cid'";
			if (mysql_db_query("test", $sql, $conn))
				echo "<button type='button' class='btn btn-success' style='width:15%; height:20%; position:fixed; left:35%; top:60%;'><h1><strong>删除成功</strong></h1></button>";
			else
				echo "<button type='button' class='btn btn-danger' style='width:15%; height:20%; position:fixed; left:35%; top:60%;'><h1><strong>删除失败</strong></h1></button>";
		}
		else 
			echo "<button type='button' class='btn btn-danger' style='width:15%; height:20%; position:fixed; left:35%; top:60%;'><h1><strong>删除失败</strong></h1></button>";
		mysql_close($conn);
	}
?>