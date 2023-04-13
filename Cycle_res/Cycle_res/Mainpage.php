<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cycle reservation main</title>
	<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>
	<style type="text/css">
		.top_box{
			
			position: absolute;
			border: 2px solid #52525b;
			top :0;
			left: 0;
			margin: 0px;
			font-weight: 100;
			width: 100%;
			background-color: #A8a29e ;
			height: 45px;
			float: left;
			
		}

		.top_box_content{
			padding-left: 50px;
			font-size: 18px;
			text-align: left;
		}
		.sidenav {
  			height: 100%; /* 100% Full-height */
  			width: 0; /* 0 width - change this with JavaScript */
  			position: fixed; /* Stay in place */
  			z-index: 1; /* Stay on top */
  			top: 0; /* Stay at the top */
  			left: 0;
  			background-color: #A8a29e ; 
  			overflow-x: hidden; /* Disable horizontal scroll */
  			padding-top: 60px; /* Place content 60px from the top */
  			transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

		/* The navigation menu links */
		.nav_a {
 			padding: 8px 0px 8px 70px;
  			text-decoration: none;
  			font-size: 25px;
  			color: #45454A;
			justify-content:center;
  			display: block;
  			transition: 0.3s;
		}
		.nav_ {
 			padding: 8px 0px 8px 40px;
  			text-decoration: none;
  			font-size: 25px;
  			color: #45454A;
			justify-content:center;
  			display: block;
  			transition: 0.3s;
		}

		/* When you mouse over the navigation links, change their color */
		.sidenav a:hover {
  			color: #f1f1f1;
		}

		/* Position and style the close button (top right corner) */
		.sidenav .closebtn {
  			position: absolute;
  			top: 0;
  			right: 25px;
  			font-size: 36px;
  			margin-left: 50px;
		}


		#main {
  			transition: margin-left .5s;
  			padding: 20px;
		}


		@media screen and (max-height: 450px) {
  			.sidenav {padding-top: 15px;}
  			.sidenav a {font-size: 18px;}
		}
	
	.avatar {
		align-content: center;
  		vertical-align: middle;
  		width: 90px;
  		height: 90px;
  		border-radius: 50%;
  		margin-left: 44px;
	}
	.user_name{
		padding-top: 0px;
		padding-bottom: 0px;

		align-content: center;
		font-style: italic;
		margin-left: 30px;
		
	}
	.nav_user{
		font-family: Georgia;
		font-size: 21px;
  		color:#45454A;
		display: block;
		padding-top: 0px;
		padding-left:-60px;
		text-decoration: none;
	}
	
	.it{
		padding: 45px 75px 45px 75px;
		border: solid 2px;
		box-shadow: 0 0 5px 5px;
		border-color: #A1a1aa;
		background-color: #A8a29e ;
		border-radius: 35px;
		opacity:0.7;
		cursor:pointer;
		
	}
	.get_ride{
		
		font-family: "Brush Script MT", cursive;
		position: relative;
		align-content: center;
		margin-top: 0px;
		margin-bottom: -15px;
		color: grey;
		font-size: 50px;
		font-weight: bolder;
	}
	.logout{
		
		position: fixed;
		right: 0;
		padding-top:8px ;
		padding-right: 25px;
		

	}
	.logout a{
		text-decoration: none;
		font-size: 25px;
		color: black;

		margin-right:15px;
	}

	.logout_btn{
		position: fixed;
		right: 0;
		padding-top:8px ;
		padding-right: 5px;
		color: black;
		
	}
	.logout a:hover{
		color:white;
	}
	ion-icon{
		color: black;
		font-size:25px;
		cursor:pointer;
	}
	ion-icon:hover{
		color:white;
	}
	body, html {
  		height: 100%;
  		margin: 0;
  		overflow: hidden;
	}
	.bg{
		background-image: url(mainbg3.png);
		background-color: rgba(0, 0, 0, 0.4);
  background-blend-mode: darken;
	
		height: 100%;
		width: 100%;
		
 		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
		

	}
	td:hover{
		transform: scale(1.055);
		border: 3px solid white;
		transition-delay: 0.15s;
		opacity:1;
		
	}
	h4{
		margin-left:10px;
	}


.container {
  margin-top:50px;
  color:black;
  align-items: center;
}

.heading {
  font-size: 30px;
  
  color:black;
  margin-bottom:0px;
  
  animation: fadeIn 2.5s linear forwards;
}

@keyframes fadeIn {
    0% {
        opacity: 0
    }

    100% {
        opacity: 1;
    }
}
	
	</style>
</head>
<body >
	
	<div class="bg">
	<!--Top_Box-->
	<div class="top_box">	
	<div>
	<!--Install icon package-->
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<!--Create a Push navigation bar-->
	<div id="mySidenav" class="sidenav">
  	<a  href="javascript:void(0)" class="closebtn" onclick="closeNav()"><ion-icon style="padding-left: 7px;font-size:27px;" name="arrow-round-back" size="small"></ion-icon></a>
  	<a href="Profile.php" class="nav_"><img src="avatar.png"class="avatar" alt="avatar" ></a>
  	<a href="Profile.php" class="nav_user" ><p align="center" class="user_name" style="width:200px">User_Name</p></a>
  	<br><br><br>
  	<a href="1.html" class="nav_a">About</a>
  	<a href="service1.html" class="nav_a">Services</a>
  	
	</div>

	<!-- Use any element to open the sidenav -->
	<span onclick="openNav()"><ion-icon name="menu" size="large" style="padding-bottom: 5px; position: fixed;"></ion-icon></span>

	<a href="#" class="log"><b>
	<div class="logout"><a href="Login.php" name="logout">Logout</a></div>
	<div class="logout_btn"><span onclick=""  ><a href="logout.php"><ion-icon name="log-out" ></ion-icon></a></span></div></b>
	</a>
	
	</div>

	<div class="container">
  <h1 class="heading" style="color:white;margin-left:10px;" id="wel">Jamie Hammond</h1>
</div>
	<br>
	<br>
	<h4 class="get_ride" align="left"><b>Get an Ride</b></h4>
	<div class="background">
	<div class="table_1" >
		<table align="center" style="border-spacing: 60px 30px;">

			<tr>
				<td class="it"><a href="BookCycle.php"><img src="bookcycle.png" height="100px" width="100px" alt="cycle"></a><br><b>Book Your cycle</b></td>
				<td class="it"><a href="timer1.php"><img src="runningpng.png" height="100px" width="100px" alt="cycle" ></a><div align="center"><br><b>Cycle Run Time</b><br> <b>Status</b></div></td>
				<td class="it"><a href="CheckBills.php"><img src="bill.png" height="100px" width="100px" alt="cycle"></a><div align="center"><br><b>Check your bills</b></div></td>
				<!--<td class="it"><a href="pickuppoints.html"><img src="location1.png" height="100px" width="120px" alt="cycle"  ></a><div align="center"><br><b>Find Drop and pick</b> <br><b>up points</b></div></td>-->
			</tr>
		</table>
	</div>
	<h4 class="get_ride" align="left" style="margin-top:5px;"><b>Give a Ride</b></h4>
	<div class="table_2" style="margin-top: 0px;">
		<table align="center" style="border-spacing: 60px 30px;">
			<tr>
				<td class="it"><a href="RegisterCycle.php"><img src="Bicycle-give.jpg" height="100px" width="100px" alt="cycle"></a><div align="center"><br><b>Register your</b> <br><b>cycle</b></div></td>
				<td class="it"><a href="revenue.php"><img src="clock1.png" height="100px" width="100px" alt="cycle"></a><div align="center"><br><b>Revenue Earned</b></div></td>
				<td class="it"><a href="findyourcycle.php"><img src="find.png" height="100px" width="100px" alt="cycle"></a><div align="center"><br><b>Find Your cycle</b></div></td>
				
			</tr>
		</table>
	</div>
	</div>
	</div>
</body>

<?php 
	$server = "localhost";
	$username = "root";
	
	
	$conn = new mysqli($server,$username);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$db = mysqli_select_db( $conn, 'cycle_res');
	
	$req_reg = $_SESSION['RegNo'];

	$query = "SELECT * from student where RegNo='$req_reg' ";
	$result = mysqli_query($conn, $query);
	while ($row = $result->fetch_assoc()) {

		$name = $row['names'];
		
	}
	$name = "Welcome ".$name;
	
	echo "<script>document.getElementById('wel').textContent ='$name';
	</script>";
	
?>
</html>