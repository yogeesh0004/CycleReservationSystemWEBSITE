<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check_Todays_Bills</title>
	<style type="text/css">
      .top_box{
      
      
      position: absolute;
      border: 2px solid #52525b;
      top :0;
      left: 0;
      margin: 0px;
      width: 100%;
      background-color: #71717a;
      height: 45px;
      float: left;
      
    }
    #nav{
      padding-left: 20px;
      text-decoration: none;
      color: white;
      padding-bottom: 20px;
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
      font-size: 30px;
    }
    th,td{
    	text-align: center;
    }
    .center_box{
    	margin-top: 100px;
		
    	border-width: 1px;
    	box-shadow: 5px 0px 8px 3px;
    	margin-right: 400px;
    	margin-left: 400px;
    	border-radius: 10px;
		padding:3% 3% 3% 5%;
    	background-color: transparent;

    }
    h3{
    	padding-left: 10px;
    	padding-top: 10px;
    }
    button{
    	background-color: lightblue;
    	padding: 10px;
		font-size:14px;
    	margin-bottom: 30px;
    }
    .detailsbtn {
		background-color: black;
		color: white;
		padding: 12px;
		font-size: 12px;
	}
	.details{
		position:fixed;
		display: block;
	}
	.detailslist-content {
		display: none;
		position: absolute;
		background-color: greenyellow;
		min-width: 120px;
		z-index: 1;
	}
	.detailslist-content a {
		color: darkblue;
		padding: 14px 18px;
		display: block;
	}
	.detailslist-content a:hover {background-color: lightcyan;}
	.details:hover .detailslist-content {display: block;}
	.details:hover .detailsbtn {background-color: blue;}
	.amtpay{
		width: 120px;
		padding-left: 30px;
		position: absolute;
		margin-left:400px;
		

	}
	
	.amtpays{
		width: 500px;
		padding-left: 13px;
		position: absolute;
		margin-left:350px;
		font-size: 23px;
		font-weight:bolder;
	}
	.amtpays1{
		font-size: 23px;
		font-weight:bolder;
		padding-left:13px;
	}
	#pay{
		position: absolute;
		float: right;

	}
	body{
		background-image: url('invoice.jpg');
		height: 100%;
		background-size: cover;
		width: 100%;
 		background-position: center 43px;
  		background-repeat: no-repeat;
  	
  		
	}
	table {
		font-size:18px;
		
  border-collapse: collapse;
}
	tr.n {
border: 1pt solid black;
margin-top:10px;
}
tr.n:hover{
	border: 2pt solid black;
	
}
td:hover{
	padding:20px 70px;
	
}
td.t:hover{
	
	border:3px solid skyblue;
}
td,th{
	padding:15px 60px;
}
tr.head{
	font-weight:120px;
	background:lightblue ;
	margin-bottom:10px;
	border:black 2px solid;

}
button:hover{
		background:white;
		border:solid 2px skyblue;
		cursor:pointer;
	}
body{
	overflow-x: hidden;
}
.amttot{
	border: skyblue 3px solid;
	padding:10px;
	font-weight:bolder;
	font-size:25px;
	width :200px;
	margin-left: 380px;
}
    </style>
</head>
<body>
	 <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <div class="top_box">
    <nav >
    
        <a href="Mainpage.php" id="home_btn"><ion-icon name="home" ></ion-icon></a>

    </nav>
  </div>
  
  		<div class="center_box">
		<h3 id="day" ></h3>
		<br><br><br>
		<table align="center" id="tab"  cellpadding="10px" >
			
			
		<?php
			date_default_timezone_set("Asia/Calcutta");
			$date=  date('l \t\h\e jS \o\f F Y');
			$date  = "Bills for , ".$date;
			echo "<script>document.getElementById('day').innerHTML = '$date'</script>";
		$server = "localhost";
		$username = "root";
		
		$conn = new mysqli($server,$username,'','cycle_res');
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$reg = $_SESSION['RegNo'];
		$query1 = "select * from cycle where RegNo='$reg'";
        $result1 = mysqli_query($conn, $query1);
		$tot = 0;
		$cnt =1;
		echo "
			<tr class='head'>
				<th>S.No</th>
				<th>Cycle_id</th>
				<th>Run Time(mins)</th>
				<th>Cost(Rs)</th>
			</tr>
			";
		$tot=0;
		while($row = $result1->fetch_assoc()){
			$id = $row['ID'];
			$run = $row['MinsRun'];
			$cost = $run * 0.25;
			$tot += $cost;
			echo "
			<tr class='n'>
				<td>".$cnt."</td>
				<td>".$id."</td>
				<td>".$run."</td>
				<td>".$cost."</td>

				
			</tr>
			";
			$cnt++;
			
		}
		echo "
			<tr >
				<td ></td>
				<td ></td>
				<td ><b>Total</b></td>
				<td class='t'>".$tot."</td>
			</tr>
			";
		$query2 = "select * from login where RegNo='$reg'";
		$result2 = mysqli_query($conn, $query2);
		while($rows = $result2->fetch_assoc()){
			$pdue = $rows['TotalDue'];
		}
		

		if($pdue<0){
			$pdue = 0;
		}
		$totdue = "TOTAL : ₹ ".((string)$tot+$pdue);
		$tot = "Amount for Today : ₹ ".((string)$tot);
		$pdue ="Your Past Dues   : ₹ ".((string)$pdue);
		?>

			
		</table>
		
		<div class="amtpays" align="center"><p id="pay">150</p> </div>
		<br>
		<br>
		<div class="amtpays1" align="center"><p id="pay1">150</p> </div>
		
		<br>
		<div class="amttot" align="center"><p id="pay2"></p> </div>
		
		<br>
		<div class="amtpay" align="center"><a href="payment.php"><button>Pay Now</button></a></div>
		
	</div>
	<?php
		echo "
		<script>
		document.getElementById('pay').innerHTML= '$tot';
		</script>
		<script>
		document.getElementById('pay1').innerHTML= '$pdue';
		</script>
		<script>
		document.getElementById('pay2').innerHTML= '$totdue';
		</script>
		";
	?>
</body>
</html>