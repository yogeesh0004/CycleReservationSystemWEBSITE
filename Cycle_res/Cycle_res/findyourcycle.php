<?php
session_start();
?>

<DOCTYPE html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Find your cycle</title>
		<style type="text/css">

			html{
				background: #CECECE;
			}

		.nith{
			padding-left: 250px;

		}
		.jai{
			border-style: groove;
			background: white;
			text-align: center;
			box-shadow: 0px 0px 0px 0px;
			font-size: 15px;
			border-width: 20px;
			padding: 5px 40px 5px 40px;
			margin-left: 20px;
			font-family: Chalkduster;
			border-radius: 20PX;
		}
        p{
        	border: 20px 10px 10px 10px;
        	

        }
        .sri {
        	margin: 0px 0px 0px 0px;
           border-color: #8D918D;
           border-style: solid;
           border-width: 80px 50px 50px 50px;
           height: 80%;
           width: 94%;
           font-weight: bold;
           text-align: center;
           font-family:Snell Roundhan;
         
           font-size: 28px;
   }
   body{
   	overflow: hidden;
   }

   .jey{
   	        border-style: groove;
			background: white;
			text-align: center;
			box-shadow: 0px 0px 0px 0px;
			font-size: 15px;
			border-width: 20px;
			padding: 5px 45px 5px 45px;
			margin-left: 200px;
			font-family: Chalkduster;
			border-radius: 20PX;
			width: 60%;


   }
   img{
   	padding-left: 100px;
   	padding-right: 80px;
   }
   x-sign {
  --interval: 1s;
  display: block;
  text-shadow: 
    0 0 10px var(--color1),
    0 0 20px var(--color2),
    0 0 40px var(--color3),
    0 0 80px var(--color4);
  will-change: filter, color;
  filter: saturate(60%);
  animation: flicker steps(100) var(--interval) 1s infinite;
}
   x-sign:nth-of-type(8) {
  color: yellow;
  --color1: yellow;
  --color2: lime;
  --color3: green;
  --color4: darkgreen;
  font-family: Monoton;
}
@keyframes flicker {
  50% {
    color: white;
    filter: saturate(200%) hue-rotate(20deg);
  }
}
		</style>
	</head>
	<body>
		<div class="top_box">
    <nav >
    
        <a href="Mainpage.php" id="home_btn"><ion-icon name="home" ></ion-icon></a>

    </nav>
  </div>
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

		<x-sign>
		<div class="sri" align="center" style="text-align:center;"><h3>Now your cycle is at</h3>
		</x-sign>
		<div id="place" class="jey"><ion-icon name="location-outline"></ion-icon>Silver Jublie Tower</div>	
		<table  class="nith" cellpadding="0px" style="margin-top: 40px;">
       	<tr>
       		<td rowspan="3"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwnYmnuFWp1zMN8zF-q9IrlKHrtdQGWdU7FA&usqp=CAU"</td>
       		<td>BRAND NAME:
       			<div id="brand" class="jai">xyzabc</div></td>
       		
       	</tr>
       	<tr>
       		<td> ID:
       			<div id="id" class="jai">7890-0987</div>
       		</td>
       	</tr>
       	<tr>
       		<td> LAST CUSTOMER:
       			<div id="lastcustomer" class="jai">user name</div>
       		</td>
       	</tr>
       </table></td></tr>
	   <?php
	   $reg=$_SESSION['RegNo'];
	   $con=mysqli_connect('localhost','root','','cycle_res');
	   $query="select * from registercycle where ownerreg='$reg'";
	   $result=mysqli_query($con,$query);
	   $cycleid="";
	   $cyclebrand="";
	   while($row=mysqli_fetch_assoc($result))
	   {
		$cycleid=$row['cycleid'];
		$cyclebrand=$row['cyclebrand'];
	   }
	   $query1="select * from registercycle where cycleid='$cycleid'";
	   $result1=mysqli_query($con,$query1);
	   $lastcustomer="";
	   $lastloc="";
	   while($row=mysqli_fetch_assoc($result1))
	   {
		$lastcustomer=$row['Lastcust'];
		$lastloc = $row['Lastlocn'];
	   }
	   ?>

	   <script>
		document.getElementById('brand').innerHTML="<?php echo $cyclebrand?>";
		document.getElementById('id').innerHTML="<?php echo $cycleid?>";
		document.getElementById('lastcustomer').innerHTML="<?php echo $lastcustomer?>";
		document.getElementById('place').innerHTML="<?php echo $lastloc?>";
	   </script>












	</body>
	</html>