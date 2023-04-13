<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Ride</title>
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
      font-size: 28px;
      cursor:pointer;
    }
    ion-icon:hover{
      color:black;
    }
    :root{
      --font-light: #808080;
      --primary-color: #4c5cbb;
    }
    body{
      font-family: 'Roboto', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3% 0;
      overflow: hidden;
      background-image: url("BookCycle.jpg");
      background-position: center;
      background-attachment: fixed;
      background-size: cover;
      background-color:rgba(0,0,0,0.7);
      
    }
    .container {
      width: 80%;
      margin: 40px auto;
      background-color: rgb(247, 247, 244);
      opacity: 0.9;
    }
    .book {
      box-shadow: 0px 5px 13px -3px rgba(0,0,0,0.75);
      display: flex;
      flex-wrap: wrap;
    }
    .description , .form{
      width: 100%;
      padding: 5%;
      
    }
    .description h1 {
      text-transform: uppercase;
      color: var(--font-light);
      font-weight: 400;
      margin-top: 0;
    }
    .description h1 strong{
      font-weight: 700;
      color: #000;
    }
    .description ul {
      padding-left: 16px;
      list-style: circle;
    }
    .description ul li{
      margin: 10px 0;
    }
.form{
  background-color: #71717a;
  
}
.form form{
  color: var(--font-light);
    display: flex;
  flex-wrap: wrap;
}
.inpbox.full {
    width: 100%;
    background: #fff;
    padding: 3%;
    margin-bottom: 20px;
    display: flex;
    flex-wrap: wrap;
}
.inpbox span::before {
    margin-left: 0;
}
.inpbox span {
    padding-right: 5px;
    border-right: 2px solid var(--font-light);
}
form input {
    border: 0;
    width: 74%;
    color: var(--font-light);
    padding: 0 4%;
}
.form input {
  outline: none;
}
.inpbox {
    width: 42%;
    background: #fff;
    padding: 2%;
    margin-bottom: 20px;
    margin:2%;

}
#inps{
  margin-left:18px;
  width:150px;
  height:40px;

  
}
#inps:focus{
  border:solid black 2px;
  border-radius: 6px;
}
.subt{
  font-weight: 700;
  text-transform: uppercase;
  border: 0;
  padding : 0px 10px;
  width:100px;
  height:60px;
  margin-top:20px;
  margin-left:622px;
  cursor:pointer;
  color:black;
  border:2px black solid;
  background: #fff;
}
.subt:hover{
  color:white;
  background:black;
}
.search_categories{
  font-size: 13px;
  padding: 10px 18px 10px 33px;
  margin-left:13px;
  width:170px;
  background: #fff;
  border: none;
  border-radius: 6px;
  position: relative;
}
.search_categories:focus{
  border:2px black solid;
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
    <div class="container">
      <div class="book">
        <div class="description">
          <h1><strong>Book</strong> your Ride</h1>
          <p></p>
          <ul>
            <li>Super reliable service</li>
            <li>24/7 customer service</li>
            <li>Cycle location identification</li>
          </ul>
        </div>
        <div class="form" >
        <form name="form"  method="post">
            <div class="inpbox">
                <span class="flaticon-globe"></span>
                <input type="text" id="inps"name="id"placeholder="Cycle Id" required>
              </div>
            
            <div class="inpbox">
              <span class="flaticon-globe"></span>
              
              
              <select name="locn" class="search_categories" placeholder="Pickup Location"required>
                <option disabled selected>--select--</option>
                <option value="SILVER JUBLEE TOWER">SILVER JUBLEE TOWER</option>
                <option value="TECHNOLOGY TOWER">TECHNOLOGY TOWER</option>
                <option value="MAIN BUINDING">MAIN BUILDING</option>
                <option value="MAIN GATE">MAIN GATE</option>
                <option value="MENS HOSTEL">MENS HOSTEL</option>
                <option value="LADIES HOSTEL">LADIES HOSTEL</option>
                </select><br>
            </div>
            <div style="text-align:center;">
            <input name="submit" type="submit"class="subt" value="Submit"required>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php
      $server = "localhost";
      $username = "root";
      
      $conn = new mysqli($server,$username,'','cycle_res');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      if (isset($_POST['submit'])) {
        $cycleid = $_POST['id'];
        $reg = $_SESSION['RegNo'];
        $locn = $_POST['locn'];
        $query1 = "select* from cycle where ID='$cycleid'";
        $result1 = mysqli_query($conn, $query1);
        $count=mysqli_num_rows($result1);
        date_default_timezone_set("Asia/Calcutta");
        $time = date('h:i:s');
        $queryof = "select* from registercycle where cycleid='$cycleid'";
        $resultof = mysqli_query($conn, $queryof);
        $countof=mysqli_num_rows($resultof);
        if($countof<1){
          echo "<script> alert('You Have Entered a wrong Cycle_ID!!!')</script>";
        }
        else{

        
        if($count>0)
        {
           $val = 0;

           while($row = $result1->fetch_assoc()){
          $val = $row['status'];
          }
            if($val ==0){
           
            
            $_SESSION['cycle_id']=$cycleid;
            echo "<script> alert('Cycle Booked successfully!!!!')</script>";
            echo "<script> window.location.assign('timer1.php')</script>";
            $query = "insert into cycle (RegNo,ID,Location,status,TIimestamp) values('$reg','$cycleid','$locn',1,'$time')";
            $result = mysqli_query($conn, $query);
            echo "<script> alert('Cycle Booked successfully!!!!')</script>";
           }
           else{
            echo "<script> alert('OOPS This is cycle is not available! Select another cycle')</script>";
           }
          }
        else
        {
          $query = "insert into cycle (RegNo,ID,Location,status,TIimestamp) values('$reg','$cycleid','$locn',1,'$time')";
          $result = mysqli_query($conn, $query);
          
            if ($result) {
               echo "<script> alert('Cycle Booked successfully!!!!')</script>";
               $_SESSION['cycle_id']=$cycleid;
               echo "<script> window.location.assign('timer1.php')</script>";
             } 
             else {
               echo "Error updating record: " . $conn->error;
             }
            
           }
        }
      }

      


    ?>
  </body>
</html>