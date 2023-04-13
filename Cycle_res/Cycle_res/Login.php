<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <h1> </h1>


    <link rel="stylesheet"type="text/css"href="style.css">
    <style type="text/css">
        body{
            margin:0%;
            padding: 0%;
            background-image: url("profilebg.jpeg");
            background-position: center;
            background-size:cover;
            background-attachment: fixed;
            background-color:rgba(0,0,0,0.7);
            background-blend-mode: darken;
            font-family: sans-serif;
            opacity: 0.8;
            }
        .logininbox{
    
            text-align: center;
            width: 500px;
            height:450px;
            background: rgb(154, 152, 156);
            color: #fff;
            top: 50%;
            left:50%;
            position: absolute;
            transform: translate(-50%,-50%);
            box-sizing: border-box;
            padding: 70px 100px 120px 100px;
        }
        .bi{
            
            width:100px;
            height:100px;
            border-radius: 50px;
            position:absolute;
            top:-50px;
            left: 30px;
            left:calc(50%-50px);


            
        }
        h2{
            color:rgb(0, 0, 0);
            margin:0;
            padding:0 0 20px;
            text-align: center;
            font-size: 30px;
        }
        .logininbox input{
            border:none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline:none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .logininbox input[type="submit"]
        {
            border:none;
            outline: none;
            height:40px;
            background: rgb(104, 110, 104);
            color:#fff;
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
   

        }

        a{
            text-decoration: none;
            color: white;
        }
        label{
            padding-right: 180px;
            
        }
        .login{
            padding: 11px;
            border: solid black 2px;
            cursor:pointer;
        }
        
        .login:hover{
            background-color: black;
            color:white;
            
        }

        
    </style>  
</head>
<body>
    

    <div class="logininbox">
        <img src="bi.jpg"class="bi">
        
        <h2>LOGIN</h2><br>
        <form method="POST">
            <label for="E-mail">REG-NO:</label><br>
            <input type="text" id= "E-mail"placeholder="Enter your REG-No"  title = "You should enter REG-NO Given by VIT" required name="regno">
            <br>
            <br>
            <label for="pass">Password:</label><br> 
            <input type="Password" id="pass" placeholder="****" name="password">
            <br>
            <br>
            <button type="submit" class="login" name="btnsub">LOGIN</button>
            <br>
            <br>
            <br>
            <a href="#">Forget Password?</a><br>
            <br>
            <a href="signup.php">Don't have an account- Register</a>
        </form>
    </div>
    <?php
         $con=mysqli_connect('localhost','root','','cycle_res');
        if(isset($_POST['btnsub']))
        {
          $reg = $_POST['regno'];
          $password = $_POST['password'];
          $query="select RegNo,password from login where RegNo='$reg' and 
          password='$password';";
          $result=mysqli_query($con,$query);
          $count=mysqli_num_rows($result);
          if($count==1)
          {
            $_SESSION['RegNo']=$reg;
            echo "<script> window.location.assign('Mainpage.php')</script>";
          }
          else{
            echo "<script> alert('Password or RegNo is incorrect. Re-enter Password or Click forgot password option')</script>"; 
          }
        }
    ?>   
</body>