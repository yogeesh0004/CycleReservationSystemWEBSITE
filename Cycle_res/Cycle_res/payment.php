<?php
session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>
    <head>
        <title>Payment </title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
    <style>
       
       .top_box{
      overflow: hidden;
      
      position: absolute;
     
      top :0;
      left: 0;
      margin: 0px;
      width: 100%;
      background-color: #d9edf7;
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
      color:black;
      font-size: 28px;
      cursor:pointer;
    }
    ion-icon:hover{
      color:white;
    }
.body {
 overflow: hidden;
 background-color:#31708;
}

.jumbotron-flat {
 
  
  border: 1px solid #4DB8FF;
  background: white;
  width: 100%;
  float:left;
text-align: center;
overflow: auto;
}
.container{
  margin-top:20px;
}

.paymentAmt {
    font-size: 80px; 
}

.centered {
    text-align: center;
}

.title {
 padding-top: 15px;   
}
.form-row{
  margin-top: 20px;
}
#hist{
  margin-top:40px;
  border : #428bca 2px solid;
  background-color:white;
  color:#428bca;
  padding:10px;
  border-radius:5px;
}

#hist:hover{
  background-color:#428bca;
  color:white;
}
    </style>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <div class="top_box">
    <nav >
    
        <a href="Mainpage.php" id="home_btn"><ion-icon name="home" ></ion-icon></a>

    </nav>
  </div>
        <div class="container">
        <div class="centered title"><h1>Make Your Payment</h1></div>
     </div>
     <hr class="featurette-divider"></hr>
         <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <div class="tab-content">
  <div id="stripe" class="tab-pane fade in active">
                       <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
          <form  class="require-validation"  id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
            </div>
                <label class='control-label'>Your Name</label>
                <input class='form-control' size='4' type='text'required>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
                  <label class='control-label'>Your UPI</label>
                <input autocomplete='off'  name="upi" class='form-control card-number' size='20' type='text'required>
              </div>
            </div>
             <div class='form-row'>
              <div class='form-group card required'>
                <label class='control-label' >Billing Address</label>
                <input autocomplete='off' name="address" class='form-control' size='20' type='text'required>
              </div>
            </div>
            <div class='form-row'>
              <div class='form-group cvc required'>
                <label class='control-label'  >Amount You wish to pay</label>
                <input autocomplete='off' name="amt" class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' required>
              </div>
              
              <div  class='form-group expiration required' id="hide" >
                <label class='control-label' >password</label>
                <input class='form-control card-expiry-year'name="pass" placeholder='******' size='4' type='password'required>
              </div>
            </div>
    
           
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                      
               <button class='form-control btn btn-primary' name="subpay"type='submit'> Pay Now</button>
          
              
                
              </div>
            </div>    
            
              </div>
            </div>
            
            </form>   
          
        </div>   
     
        <div class="col-sm-6">
           <label class='control-label'></label><!-- spacing -->
        
          <div class="alert alert-info">Please pay your balance dues by entering your UPI Number. You will be asked for your password .</div>
       <br>
         
          
          <br><br><br>
         
         <div class="jumbotron jumbotron-flat">
    <div class="center"><h2><i>BALANCE DUE:</i></h2></div>
           <div class="paymentAmt" id="payAmt"></div>
           
                 
          
        </div>
        
     
          
            <br><br><br>
        </div>
                    
                    
                    
                </div>
                
                
                
            </div>
        </div>
        <div align="center" id="hisdiv">
          <a href="paymentHistory.php"><button id="hist">Show Payment History</button></a>
        </div>
        
        
    </body>
    <?php
      $reg=$_SESSION['RegNo'];
      $con=mysqli_connect('localhost','root','','cycle_res');
      $query1 = "select * from login where RegNo='$reg'";
      $result1 = mysqli_query($con, $query1);
      while ($row = $result1->fetch_assoc()) {
        $totcost = $row['TotalDue'];
        $pass1=$row['password'];
      
      }
      date_default_timezone_set("Asia/Calcutta");
      $date=  date('Y\-F\-j');
      echo $date;
      $disp=(string)$totcost;
      $disp = "₹".$disp;
      echo "<script>document.getElementById('payAmt').textContent ='$disp';</script>";
      if(isset($_POST['subpay'])){
        $upi = $_POST['upi'];
        $address = $_POST['address'];
        $amnt = $_POST['amt'];
        $pass = $_POST['pass'];
        $invoice = rand(11111,55555);
        if($amnt <=0 or ($totcost -$amnt)<0){
          echo "<script> alert('You Are making an invalid Payment')</script>";

        }
        else{
        if($pass1 ==$pass){
      $query = "insert into payment (invoiceno,RegNo,date,address,upi,amnt) values('$invoice','$reg','$date','$address','$upi','$amnt')";
      $result = mysqli_query($con,$query);
      
      $up = $totcost- $amnt;
      $query2 = "update login set TotalDue='$up' where RegNo='$reg'";
      $result2 = mysqli_query($con, $query2);
      if($result)
      {
        echo "<script> alert('Payment Successfully')</script>";
        echo("<meta http-equiv='refresh' content='1'>");
      }
    }
    else{
      echo "<script> alert('Password Entered Incorrect')</script>";
    }
    }
    
  }
    ?>
</html>