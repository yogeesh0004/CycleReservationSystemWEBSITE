<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Run Time</title>
    <style>
        .container{
            margin-left: 100px;
            margin-right:100px;
            margin-top: 40px;
        }
        th{
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
            width: 200px;
            color:black;
            background:#A0A0A7;
            height:20px;
        }
        body{
            background-image: url(timerslideshow.jpeg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.7);
            background-blend-mode: darken;
            opacity:0.8;
        }
        table{
            border-color: white;
            color:azure;
            text-align: center;
        }
        h1{
            color:white;
        }
        p{
         color:white;
         text-align:center;
         
         font-size:30px;
        }

        .n{
            width:80%;
            height:100px;
            text-align:center;
            

        }
        .n1{
            border:double black 6px;
            width:200px;
            padding:1.5%;
            color:black;
            background:#A0A0A7;
        }
        .n2{
            border:solid white 2px;
            width:120px;
            padding:0.5%;
            font-size:18px;
            border-radius:9px;
            text-decoration:none;
            color:white;
            
        }
        .n2:hover{
            color:black;
            background-color:#A0A0A7;
            border:solid black 2px;
            font-weight:bold;
           
        }
    </style>
</head>
<body>
    <div class="container">

        <h1 align="center" style="margin-bottom:60px;"> HISTORY OF CYCLE RUN </h1>

        <table border="2px" align="center" >
        <?php
		$server = "localhost";
		$username = "root";
		$reg = $_SESSION['RegNo'] ;
		$conn = new mysqli($server,$username,'','cycle_res');
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$reg = $_SESSION['RegNo'];
		$query1 = "select * from registercycle where ownerreg='$reg'";
        $result1 = mysqli_query($conn, $query1);
        while($row = $result1->fetch_assoc()){
            $cycleid = $row['cycleid'];
        }

		$cnt =1;
		echo "
        <tr>
        <th>
            SNO
        </th>
        <th>
            CUSTOMER ID
        </th>
        
        <th>
            TOTAL RUN TIME
        </th>
        <th>
            TOTAL REVENUE EARNED
        </th>
        <th>
            PARKED LOCATION
        </th>
    </tr>
			";
		$cost=0;
       
        $query1 = "select * from cycle where ID='$cycleid' and status=0";
        $result1 = mysqli_query($conn, $query1);
        $tot = 0 ;
		while($row = $result1->fetch_assoc()){
			$regnos = $row['RegNo'];
			$run = $row['MinsRun'];
			$reven = ($run * 0.25)* 0.5;
            $tot = (float)$tot + (float)$reven;
			$locn = $row['Location'];
            
			echo "
			<tr class='n'>
				<td>".$cnt."</td>
				<td>".$regnos."</td>
				<td>".$run."</td>
				<td>".$reven."</td>
				<td>".$locn."</td>
				
			</tr>
			";
			$cnt++;
            
			
		}
        $tot = "₹ ".$tot;

		?>
            

        </table>

    </div>
        <div align="center" style="margin-top:100px;">
            <h1>Total Revenue</h1>
    <p class="n1" id="tot"> n1</p> 
    </div>
    <div align="center" style="margin-top:100px;">
    <a href="Mainpage.php">      
    <p class="n2"> Go Back</p> 
    </a>
    </div>
    </div>
    <?php
        echo "<script>document.getElementById('tot').innerHTML='$tot'</script>";
    ?>
    
</body>
</html>