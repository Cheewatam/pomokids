<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

<div class="iphone_5s">
	<div class="head-menu">
			<div class="username">
				<?php
					echo "<b>First name</b> = ".$row['first_name'];
				}
				?>
			</div>
			<div class="nameapp">
				<p>POMO Kids</p>
			</div>
			<?php
				if(isset($_SESSION['id'])){
					echo "<a href=\"logout.php\">Logout</a>";
				}else{
					echo "<a href=\"fb-login.php\">Login</a>";
				}
			?>
	</div> <!-- head-menu -->

	<div class="banner-img">

	</div> <!-- banner-img -->

	<div class="smart-watch">
			<div class="cartoon">

			</div>
			<p>Smart watch</p>
			<div class="img-watch">

			</div>
			<div class="bt-add">

			</div>
	</div> <!-- smart-watch -->

	<div class="bt-function-1">
			<a href="smartlocator.php"><div class="sub-menu-1">

			</div></a>
			<div class="sub-menu-2">

			</div>
			<div class="sub-menu-3">

			</div>
	</div>

	<div class="bt-function-2">
		<div class="sub-menu-4">

		</div>
		<div class="sub-menu-5">

		</div>
		<a href="voicemessage.php"><div class="sub-menu-6">

		</div></a>
	</div>

	<div class="bt-function-3">
		<div class="sub-menu-7">

		</div>
		<div class="sub-menu-8">

		</div>
		<div class="sub-menu-9">

		</div>
	</div>
	<div class="bt-function-4">
		<div class="sub-menu-10">

		</div>
		<div class="sub-menu-11">

		</div>
		<div class="sub-menu-12">

		</div>
	</div>

	<div class="bt-function-5">
		<div class="sub-menu-13">

		</div>
		<div class="sub-menu-14">

		</div>
		<div class="sub-menu-15">

		</div>

	</div>

	<div class="menubar">
			<div class="menu_home">
				<div class="tabbar">

				</div>
				<p>Home</p>
			</div>
			<div class="menu_my">
				<div class="tabbar2">

				</div>
				<p>My</p>
			</div>

	</div> <!-- menubar -->


</div><!-- iphone_5s -->


</body>
</html>
