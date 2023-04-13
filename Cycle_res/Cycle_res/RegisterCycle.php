<?php
session_start();
?>

<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
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
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #71717a;  
  overflow:hidden;
}  
.container {  
    padding: 50px;  
  background-color: #E4e4e7;  
  
}  
  
input[type=text], input[type=file], textarea {  
  width: 100%;  
  padding: 15px;

  margin: 5px 20px 22px 0;  
  display: inline-block;  
  border: none;  
  background: #d1d5db;  
}  
input[type=text]:focus {  
  background-color: #71717a;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
         }  
hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  
.registerbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 16px 20px;  
  
  border: none;  
  cursor: pointer;  
  width: 150px;  
  font-size: 20px; 
  opacity: 0.9;  
}  
.back {  
  background-color: white;  
  color: green;  
  padding: 10px 15px;  
  margin: 8px 0;  
  border: green solid;  
  cursor: pointer;
  font-size: 14px;  
  width: 150px;  
  opacity: 0.9;
  text-decoration:none;
  position:absolute;  
}  
.back:hover{
  background-color:green;
  color:white;
}
.registerbtn:hover {  
  opacity: 1; 
  border:solid green 2px;
  background-color:white;
  color:green;
  
}  
form{
  height:100%;
  margin:5%;
  margin-top:120px;
  
}
</style>  
</head>  
<body>  
<form method="POST">  
  <div class="container">  
  <center>  <h1> Register your cycle here!</h1> </center>  
  <hr>  
  
<label> Cycle brand: </label>
<input type="text" name="brand" placeholder="Cyclebrand" size="15"required />
<div>  
<label> Cycle color: </label>
<input type="text" name="color" placeholder="Cyclecolor" size="15"required />  
Current Address :  
<textarea cols="80" name="address" rows="5" placeholder="Current Address" value="address" required>  
</textarea>    
<label>Upload the image of your cycle:</label><br><br>
 <input type="file" id="myFile" name="filename">
 
 <div align="center">
    <button type="submit" class="registerbtn" name="btnsub">Register</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="Mainpage.php"><p class="back" >Go Back</p>   </a> 
</div>
</form> 
<?php
$con=mysqli_connect('localhost','root','','cycle_res');

if(isset($_POST['btnsub']))
{
  $reg=$_SESSION['RegNo'];
$cyclecolor = $_POST['color'];
$cyclebrand = $_POST['brand'];
$address = $_POST['address'];
$cycleid = rand(11111,33333);
$query1="select * from registercycle where ownerreg='$reg'";
$result1 = mysqli_query($con,$query1);
$count=mysqli_num_rows($result1);
if($count <1){
$query = "insert into registercycle (ownerreg,cycleid,cyclebrand,cyclecolor,address) values('$reg','$cycleid','$cyclebrand','$cyclecolor','$address')";
$result = mysqli_query($con,$query);

if($result)
{
  echo "<script> alert('Cycle details uploaded successfully')</script>";
  echo "<script> alert('Your cycle id is: $cycleid')</script>";
}
else{
  echo "<script> alert('Cycle details not uploaded successfully')</script>";
}
echo "<script> window.location.assign('Mainpage.php')</script>";
}
else{
  echo "<script>alert('You Have already Registered Your Cycle')</script>";
}
}



?> 
</body>  
</html>