<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment history</title>
    <style>
		.container{
			border-radius:7px;
			margin:5%;
			background-color:#CFCFD3;
			
		}
		.head{
			background-color:black;
			color:white;
			padding:20px;
		}
		.n{
			color:#45454A;
			padding:20px;
			background-color:white;
			text-align:center;
		}
		#tab{
			width:60%;
			
		}
		a{
			text-decoration:none;
			

		}
		button{
			color :white;
			background-color:black;
			padding :10px;
			font-size:18px;
			cursor:pointer;
			
		}
		button:hover{
			color :black;
			background-color:white;
		}
		body{
			background-color:#CFCFD3;
		}
    </style>
</head>
<body>
	<h1 align="center" >Your Payment History</h1>
<div align="center" class="container">

	<table align="center" cellpadding="20px" id="tab">
	<?php
		$server = "localhost";
		$username = "root";
		
		$conn = new mysqli($server,$username,'','cycle_res');
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$reg = $_SESSION['RegNo'];
		$query1 = "select * from payment where RegNo='$reg'";
        $result1 = mysqli_query($conn, $query1);
		$cnt =1;
		echo "
			<tr class='head'>
				<th>S.No</th>
				<th>Invoice No</th>
				<th>Payment Date</th>
				<th>UPI_Id</th>
				<th>Amount(₹)</th>
			</tr>
			";
		$cost=0;
		while($row = $result1->fetch_assoc()){
			$invoice = $row['invoiceno'];
			$date = $row['date'];
			$upi = $row['upi'];
			$amount = $row['amnt'];
			echo "
			<tr class='n'>
				<td>".$cnt."</td>
				<td>".$invoice."</td>
				<td>".$date."</td>
				<td>".$upi."</td>
				<td>".$amount."</td>
				

				
			</tr>
			";
			$cnt++;
			
		}
		?>
	</table>
</div>
<div  align="center">
<a href="payment.php"><button>Go Back</button></a>
	</div>
</body>
</html>