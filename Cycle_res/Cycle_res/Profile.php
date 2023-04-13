<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User_Profile</title>
	<style type="text/css">
		
		.top_box{
			overflow: hidden;
			
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
			font-size:20px;
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
			font-size: 30px;
		}
		.top_box nav :hover {
			background-color: black;
		}
		#img2{
			width: 180px;
    		height: 200px;
    		border-radius: 50%;
    		display: block;
    		margin-left: auto;
    		margin-right: auto;
    		margin-top: 10px;

		}
		.main{
			border: solid 2px;
			box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;margin-top: 80px;
			padding: 30px 30px 50px 30px;
			border-radius: 20px;
			color: black ;

			
		}
		fieldset{
			padding: 0px 40px 10px 40px;
		}	
		.tab{
			border-spacing: 20px;
		}
		p{
			text-align: center;
			color: black;
		}
		body{
			background-image: linear-gradient(rgba(255,255,255,0.3), rgba(255,255,255,0.3)), url(prof.png);
			height: 97%;
			width: 100%;
			margin-top: 35px;
 			background-position: center;
  			background-repeat: no-repeat;
  			background-size: cover;
  			z-index: 0.9;
			overflow : hidden;
  			
		}
		fieldset{
			border: solid 3px;
			padding-left:60px;
			padding-right:20px;
			
		}
		legend{
			font-weight: bolder;
			color: black;
			
		}
		input{
			background: transparent;
			width :170px;
			border : none;
			height : 40px;
			font-weight:600;
			font-size:20px;
		}
		
		legend{
			padding: 15px;
		}
		@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
		.button {
  background-color: black; 
  border : 1px solid;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 11px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  border-radius:5px;
  
}

#but{
	background-color: transparent; 
  border : 1px solid;
  color: black;
  border:3px solid black;
  text-align: center;
  text-decoration: none;
 
  font-size: 20px;
	height:50px;
  cursor: pointer;

			border-radius: 5px;
			
			padding: 10px 15px 15px 15px;
			margin-top:10px;
			width : 125px;
}
.button:hover {
  box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
  border:3px solid;
  background-color:white;
	color:black;
}
#but:hover{
	background-color:black;
	color:white;
}
		
	</style>
	<script type="text/javascript">
		function edit(){
				var inputs = document.getElementsByClassName("in");
				for(let i=0;i<inputs.length;i++){
					if(i !=1){
						inputs[i].disabled=false;
					}
				}
				button();
			
		}
		function button(){
			var myDiv = document.getElementById("but");
			myDiv.hidden = false;
                 
            
		}
		
	
	</script>
</head>
<body >
	<!--Install icon package-->
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<div class="top_box">
		
		<a href="#"><img src="https://www.pngitem.com/pimgs/m/560-5603874_product-image-logo-avatar-minimalist-flat-line-hd.png" id="img1"></a>
        <a href="#" id="nav">ABOUT</a>
        <a href="#" id="nav">FINDS</a>
        <a href="#" id="nav">NEWS</a>
        <a href="#" id="nav">CONTACT</a>
        <a href="Mainpage.php" id="home_btn"><ion-icon name="home" ></ion-icon></a>

		
	</div>
	<form name="form"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  

	<table class="main"  align="center">
		<tr><td><img id = "img2" src="avatar.png"></td></tr>
		
		<tr>
			<td>
			<table align="center" class="tab" >
				<tr>
				<td><fieldset>
					<legend>Name*</legend>
					<input type = "text" id="name" class="in" disabled name="name" value ="None" required >
				</fieldset>
				</td>
				<td>
					<fieldset>
						<legend >Reg_No*</legend>
						<input type = "text" id="reg" class="in" disabled name="reg" value ="None" required>
					</fieldset>
				</td>
				</tr>
				<tr>
				<td>
					<fieldset>
						<legend>Gender*</legend>
						<input type = "text" id="gen" class="in" disabled name="gen" value ="None"required >
					</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>Mobile*</legend>
						<input type = "tel" id="mobile" class="in" disabled  name="mobile" value ="None"required >
					</fieldset>
				</td>
				</tr>
			
			</table>
			</td>
		</tr>
		<tr>
		<td>

		<table align="center" class="tab">
				<tr>
				<td><fieldset>
					<legend>Hostel Block*</legend>
					<input type = "text" id="hostel" class="in" disabled name="hostel" value ="None"required >
				</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>Department*</legend>
						<input type = "text" id="dep" class="in" disabled name="dep" value ="None" required>
					</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>Branch*</legend>
						<input type = "text" id="branch" class="in" disabled name="branch" value ="None"required>
					</fieldset>
				</td>
				
			</tr>
			<tr>
				<div ><td colspan="3" align="center"><button class="button" type="button" onclick="edit()" style="font-size:28px"><ion-icon name="create"></ion-icon>&nbsp;Edit</button></div>
				<div  >
				<input type="submit"  id="but" hidden name="sub" value="Submit">
				</div>
				
			</tr>
		
		</table>
	</td>

		</tr>
	</table>
	</form>
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
			$reg = $row['RegNo'];
			$gen = $row['Gender'];
			$mobile = $row['Mobile'];
			$hostel = $row['Hostel'];
			$dep = $row['Department'];
			$branch = $row['Branch'];
			
			echo "<script> document.getElementById('name').value = '$name' 
			document.getElementById('reg').value = '$req_reg '
			document.getElementById('gen').value = '$gen'
			document.getElementById('mobile').value = '$mobile'
			document.getElementById('hostel').value = '$hostel'
			document.getElementById('dep').value = '$dep'
			document.getElementById('branch').value = '$branch'
			
			</script>";
			break;

			
		
		}
		
		if (isset($_POST['sub'])) {
			
			$name1 = $_POST['name'];
			$reg1 = $_POST['reg'];
			$gen1 = $_POST['gen'];
			$mobile1 = $_POST['mobile'];
			$hostel1 = $_POST['hostel'];
			$dep1 = $_POST['dep'];
			$branch1 = $_POST['branch'];
			$sql = "UPDATE student SET  Gender='$gen1' , Mobile=$mobile1 ,names='$name1', Hostel ='$hostel1' , Department ='$dep1'  , Branch = '$branch1'   WHERE RegNo='$req_reg' ";
			$conn->query($sql);
			echo("<meta http-equiv='refresh' content='1'>");
			

		}
		
	?>
	

</body>
</html>