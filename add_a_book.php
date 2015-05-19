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
  					<h3><strong>单本入库</strong></h3>
  				</a>
  			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="home">
		  		<!--content-->
		  		<form class="form-horizontal" action="add_a_book.php" method="post">
			  		<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入书号</label>
	  					<input class="form-control" id="focusedInput" name="bid" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入类别</label>
	  					<input class="form-control" id="focusedInput" name="btype" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入书名</label>
	  					<input class="form-control" id="focusedInput" name="bname" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入出版社</label>
	  					<input class="form-control" id="focusedInput" name="publisher" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入年份</label>
	  					<input class="form-control" id="focusedInput" name="year" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入作者</label>
	  					<input class="form-control" id="focusedInput" name="author" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入价格</label>
	  					<input class="form-control" id="focusedInput" name="price" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">输入数量</label>
	  					<input class="form-control" id="focusedInput" name="number" type="text">
					</div>
					<button type="submit" class="btn btn-info" style="width:15%; height:20%; position:fixed; left:65%; top:45%;"><h1><strong>提交</strong></h1></button>
				</form>
		  	</div>
  		</div>
	</div>
</body>
</html>
<?php header("content-type:text/html; charset=utf-8");
	$bid = $_POST['bid'];
	$btype = $_POST['btype'];
	$bname = $_POST['bname'];
	$publisher = $_POST['publisher'];
	$year = $_POST['year'];
	$author = $_POST['author'];
	$price = $_POST['price'];
	$number = $_POST['number'];
	$flag = $bid==NULL || $btype==NULL || $bname==NULL || $publisher==NULL || $year==NULL || $author==NULL || $price==NULL || $number==NULL;
	if (!$flag){
		$conn = mysql_connect("localhost", "root", "root");
		mysql_query("set names utf8;");
		$sql = "insert into books values('$bid', '$btype', '$bname', '$publisher', '$year', '$author', '$price', '$number')";
		if (mysql_db_query("test", $sql, $conn))
			echo "<button type='button' class='btn btn-success' style='width:15%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>入库成功</strong></h1></button>";
		else
			echo "<button type='button' class='btn btn-danger' style='width:15%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>入库失败</strong></h1></button>";
		mysql_close($conn);
	}
?>