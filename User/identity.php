<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="css/common.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
	<div class="topbar-inner clearfix">
		<div class="topbar-logo-wrap clearfix">
			<ul class="navbar-list clear">
				<li><a class="on" href="index.php">Home</a></li>
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
			<div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>Welcome</span></div>
		</div>

		<div class="result-wrap">
			<div class="result-title">
				<h1>Detailed Information</h1>
			</div>
			<div class="result-content">
				<ul class="sys-info-list">
					<li>
						<label class="res-lab">UserName</label>
						<span class="res-info">
							<input type="text" id="name">
						</span>
					</li>
					<li>
					<label class="res-lab">Age</label>
						<span class="res-info">
							<input type="text" id="age">
						</span>
				    </li>
					<li>
						<label class="res-lab">Sex</label>
						<span class="res-info">
							<select>
								<option value ="Male">Male</option>
                                <option value ="Female">Female</option>
							</select>
						</span>
					</li>
					<li>
						<label class="res-lab">University</label>
						<span class="res-info">
							<input type="text" id="university">
						</span>
					</li>
					<li>
					<label class="res-lab">Signature</label>
						<span class="res-info">
							<textarea id="signature"></textarea>
						</span>
				    </li>
					<li>
						<button class="save">Save</button>
					</li>

				</ul>
			</div>
		</div>

	</div>
	<!--/main-->
</div>
</body>
</html>
