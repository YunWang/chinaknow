<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ChinaKnow Admin</title>
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
	<div class="topbar-inner clearfix">
		<div class="topbar-logo-wrap clearfix">
			<ul class="navbar-list clear">
				<li><a class="on" href="index.html">Home</a></li>
				<li><a href="../index.php" target="_blank">ChinaKnow</a></li>
			</ul>
		</div>

	</div>
</div>
<div class="container clear">
	<div class="sidebar-wrap">
		<div class="sidebar-title">
			<a href="#"> <img src="images/avatar.jpg"/> </a>
		</div>
		<div class="sidebar-content">
			<ul class="sidebar-list">
				<li>
					<a href="index.php"><i class="icon-font">&#xe003;</i>Management</a>
					<ul class="sub-menu">
						<li><a href="mypost.php">My Post</a></li>
						<li><a href="mycomment.php">My Comment</a></li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="icon-font">&#xe018;</i>Information</a>
					<ul class="sub-menu">
						<li><a href="identity.php">Modify</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!--/sidebar-->
	<div class="main-wrap">

		<div class="crumb-wrap">
			<div class="crumb-list"><i class="icon-font"></i><a href="index.php">Home</a><span class="crumb-step">&gt;</span><span class="crumb-name">Management</span><span class="crumb-step">&gt;</span>My Comment</div>
		</div>

		<div class="result-wrap">
			<form name="myform" id="myform" method="post">

				<div class="result-content">
					<table class="result-tab" width="100%">
						<tr>

							<th>Time</th>
							<th>New Comment</th>
							<th>Operate</th>
						</tr>
						<tr>
							<td>2014/1/1</td>
							<td>qwqwertyu</td>
							<td> <a class="link-update" href="#">Check</a>
							</td>

						</tr>
						<tr>
							<td>2014/2/1</td>
							<td>Would you like to have an ice-cream?</td>
							<td> <a class="link-update" href="#">Check</a>
							</td>
						</tr>
					</table>
					<div class="list-page">Total 2  Page 1/2</div>
				</div>
			</form>
		</div>
	</div>
	<!--/main-->
</div>
</body>
</html>