<?php
session_start();
?>

<html>
<head>
  <title>Timer</title>
  

  <style>
    
    .top_box{
			overflow: hidden;
			
			position: absolute;
			border: 2px solid #52525b;
			top :0;
			left: 0;
			margin: 0px;
			width: 100%;
			background-color: #71717a;
			height: 35px;
			float: left;
			
		}
		#nav{
			padding-left: 20px;
			text-decoration: none;
			color: white;
			padding-bottom: 20px;
		}
		#img1{
			padding-top: 7px;
			padding-left: 8px;
    		border-radius: 50%;
    		margin-left: 0px;
    		margin-right: 0px;
    		height: 20px;
    		width: 20px;
		}
		#home_btn{
			position: fixed;
			right: 0;
			padding-top:8px ;
			padding-right: 5px;
			padding-bottom: 10px;
			color: whitesmoke;
		}
		ion-icon{
			font-size: 23px;
		}
		.top_box nav a :hover {
			color: black;
		}
  
body{
  /*background-image:url("timerslideshow2.jpeg") ;*/
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: rgba(0, 0, 0, 0.7);
  background-blend-mode: darken;
  opacity:0.8;
}

.column {
  width: 100%;
  padding: 0 1em 1em 1em;
  text-align: center;
  margin-top:100px;
  flex: 0 0 33.33%;
    max-width: 33.33%;
}



  .card {
  width: 100%;
  height: 30%;
  padding: 2em 1.5em;
  background: linear-gradient(gray 50%, white 50%);
  background-size: 100% 200%;
  background-position: 0 2.5%;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
  display: flex;
  text-align: left;
  color: white;

}


p {
  
  font-weight: 600;
  font-size: 27px;
  letter-spacing: 0.03em; 
  color: white;
  
}

.a{
    color: white;
    font-size: xx-large;
}
.c{
  color: white;
  background-color: green;
  width: 7%;
  height: 6%;
  margin-top:20px;
  border-radius: 7px;
  cursor:pointer;
}
.avatar {
		align-content: center;
  		vertical-align: middle;
  		width: 90px;
  		height: 90px;
  		border-radius: 50%;
  		margin-left: 35px;
	}
  .search_categories{
  font-size: 13px;
  padding: 10px 18px 10px 28px;
  margin-left:-2px;
  background: #fff;
  border: none;
  width:260px;
  border-radius: 6px;
  position: relative;
}
.search_categories:focus{
  border:2px black solid;
}
body{
  overflow:hidden;
}
.mainTime{
  border: white solid 2px;
  width :250px;
 margin-bottom:40px;
  
}
p{
  margin:20px 0px 20px 0px;
  height:35px;
}


  </style>
  <script language="javascript" type="text/javascript">
function parkedLocation(){
  
  var pk= prompt("Where did you park the cycle : ");

}
  </script>
</head>
<body>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="top_box">
		<nav >
		<a href="#"><img src="https://www.pngitem.com/pimgs/m/560-5603874_product-image-logo-avatar-minimalist-flat-line-hd.png" id="img1"></a>
        <a href="#" id="nav">ABOUT</a>
        <a href="#" id="nav">FINDS</a>
        <a href="#" id="nav">NEWS</a>
        <a href="#" id="nav">CONTACT</a>
        <a href="Mainpage.php" id="home_btn"><ion-icon name="home" ></ion-icon></a>

		</nav>
	</div>
<center>
 <div class="column">
    <div class="card">
  <ul type="disc" style="margin-left:30px ;" >
    <li><p>Cycling is good for your body and  mind </p></li>
    <li><p>Beat your daily routine with your cycle</p></li>
    <li><p>Save your time by renting a cycle</p></li>
  </ul>
  </div>
  </div>
</center>
<center>
    <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5">
                    <p class="a">Total Ride Time:</p>
                    <div id="clock-c" class="countdown py-4"></div>

                    <!-- Call to actions -->
                    <center>
                        <div id="mainstopwatch" align="center">
                        <div class="mainTime">
                        <p class="a" id="time">00:00:00</p>
                        </div>
                        <br>
                        <form method="post">
                        <select name="pk" class="search_categories" placeholder="Pickup Location"required>
                <option disabled selected>--SELECT DROP LOCATION--</option>
                <option value="SILVER JUBLEE TOWER">SILVER JUBLEE TOWER</option>
                <option value="TECHNOLOGY TOWER">TECHNOLOGY TOWER</option>
                <option value="MAIN BUINDING">MAIN BUILDING</option>
                <option value="MAIN GATE">MAIN GATE</option>
                <option value="MENS HOSTEL">MENS HOSTEL</option>
                <option value="LADIES HOSTEL">LADIES HOSTEL</option>
                </select><br>
                        
                        <input class="c" type="submit" name="btn"  id="stop" value="End Ride">
                        </form>
                        
                        <br><br><br><br></center>

                </div>
</center>

  <?php
    

    $server = "localhost";
    $username = "root";
    $reg = $_SESSION['RegNo'];
    $conn = new mysqli($server,$username);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $query1 = "select * from cycle where RegNo='$reg' AND status=1";
    $db = mysqli_select_db( $conn, 'cycle_res' );
    $result= mysqli_query($conn, $query1);
    $cycleid;
    $datetime1;
    while($row = $result->fetch_assoc()){
      $datetime1 = $row['TIimestamp'];
      $cycleid = $row['ID'];
    }
    $count=mysqli_num_rows($result);
    $mins=0;
    
    if($count>0){
      date_default_timezone_set("Asia/Calcutta");
    $datetime1 = strtotime($datetime1);
    $h1 = (float)(date('h',$datetime1));
    $m1 = (float)(date('i',$datetime1));
    $s1 = (float)(date('s',$datetime1));
    $h2 = (float)(date('h'));
    $m2 = (float)(date('i'));
    $s2 = (float)(date('s'));
    $h = ($h2 - $h1);
    $m = ($m2 - $m1);
    $s = ($s2 - $s1);
    if($m<0){
      $m = 60+$m;
      $h -=1;
    }
    if($s<0){
      $s +=60;
      $m -=1;
    }
      
    
    $mins += ($h*60 + $m);
    $h = (string)$h;
    $m = (string)$m;
    $s = (string)$s;
   
    $res = $h.":".$m.":".$s;
    echo "<script>document.getElementById('time').innerHTML= '$res'  </script>";
      
    }
    
    if(isset($_POST['btn'])){
      $locn = $_POST['pk'];
      $que = "UPDATE cycle set   status = 0, TIimestamp = default,Location='$locn',MinsRun='$mins'  WHERE RegNo ='$reg' and status=1 ";
      mysqli_query($conn, $que);
      $query1 = "select * from login where RegNo ='$reg' ";
      $result= mysqli_query($conn, $query1);
      $pasttime;
      $pastdue;
      
    while($row = $result->fetch_assoc()){
      $pasttime = $row['Timerun'];
      $pastdue = $row['TotalDue'];
    }
    $cost = 0.25;
    $pasttime += $mins;
    $pastdue += ($mins*$cost);
    
   
    $que1 = "select * from registercycle where cycleid ='$cycleid' ";
    $res1 = mysqli_query($conn, $que1);
    while($row = $res1->fetch_assoc()){
      $reven = $row['revenue'];
      
    }
    $reven += ($mins*$cost);
    $que = "UPDATE login set   Timerun = '$pasttime',TotalDue	 = '$pastdue',Lastcycle='$cycleid' WHERE RegNo ='$reg'  ";
    mysqli_query($conn, $que);
    $que = "UPDATE registercycle set   Lastlocn = '$locn'	,Lastcust='$reg',revenue='$reven' WHERE cycleid ='$cycleid'  ";
    mysqli_query($conn, $que);
    
    echo "<script> window.location.assign('CheckBills.php')</script>";
    }
    

  ?>  
</div>
</body>
</html>