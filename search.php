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
 		<li class="active"><a href="user.php">用户</a></li>
 		<?php
 			$cid = $_COOKIE['id'];
 			echo "<li><a>借书卡号: ".$cid."</a></li>";
 		?>
	</ul>
	<!--sidebar_operations-->
	<div class="list-group" style="width:10%; text-align:center; margin-top:20px;">
  		<a href="#" class="list-group-item active">操作</a>
  		<a href="borrow.php" class="list-group-item">借书历史</a>
  		<a href="search.php" class="list-group-item">图书查询</a>
	</div>
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>图书查询</strong></h3>
  				</a>
  			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="home">
		  		<!--content-->
		  		<form class="form-horizontal" action="search.php" method="post">
			  		<div class="col-lg-10 form-group" style="padding:0px;">
				  		<label class="control-label"><h4><strong>输入信息</strong></h4></label>
	      				<div class="col-lg-10" style="width:12%; padding:0px;">
					        <select class="form-control" id="select" name="select">
					          	<option>按类别查询</option>
					          	<option>按书名查询</option>
					          	<option>按出版社查询</option>
					          	<option>按作者查询</option>
					        </select>
	        			</div>
	        		</div>
	        		<div class="form-group" style="width:30%">
		  				<div class="input-group">
		    				<input type="text" class="form-control" name="message">
		    				<span class="input-group-btn">
		      					<button class="btn btn-default" type="submit">提交</button>
		    				</span>
		  				</div>
					</div>
				</form>
				<!--tables-->
				<?php header("content-type:text/html; charset=utf-8");
					$select = $_POST['select'];
					$msg = $_POST['message'];
					if ($select!=NULL && $msg!=NULL){
						$conn = mysql_connect("localhost", "root", "root");
    					mysql_query("set names utf8;");
    					if ($select=="按类别查询")
    						$sql = "select * from books where btype='$msg'";
    					if ($select=="按书名查询")
    						$sql = "select * from books where bname='$msg'";
    					if ($select=="按出版社查询")
    						$sql = "select * from books where publisher='$msg'";
    					if ($select=="按作者查询")
    						$sql = "select * from books where author='$msg'";
    					$result = mysql_db_query("test", $sql, $conn);
        				if (mysql_fetch_row($result)){
    						$result = mysql_db_query("test", $sql, $conn);
    						echo "<table class='table table-striped table-hover'>";
    						echo "<thead><tr><th>";
    						echo "书号";
    						echo "</th><th>";
    						echo "类别";
    						echo "</th><th>";
    						echo "书名";
    						echo "</th><th>";
    						echo "出版社";
    						echo "</th><th>";
    						echo "年份";
    						echo "</th><th>";
    						echo "作者";
    						echo "</th><th>";
    						echo "价格";
    						echo "</th><th>";
    						echo "数量";
    						echo "</th></tr></thead><tbody>";
    						$styles = ['', 'info', 'success', 'warning', 'danger', 'active'];
    						$count = 0;
    						while ($row=mysql_fetch_row($result)){
    							$style = $styles[$count%6];
    							echo "<tr class='$style'>";
    							for ($i=0;$i<mysql_num_fields($result);$i++){
    								echo "<td>";
    								echo $row[$i];
    								echo "</td>";
    							}
    							echo "</tr>";
    							$count = $count+1;
    						}
    						echo "</tbody></table>";
        				}
        				else
        					echo "<button type='button' class='btn btn-danger' style='width:15%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>查询失败</strong></h1></button>";
        				mysql_close($conn);
					}
				?>
		  	</div>
  		</div>
	</div>
		
</body>
</html>