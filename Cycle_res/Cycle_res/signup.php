<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <h1> </h1>
</head>

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
            height: 600px;
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
            padding: 0 0 20px;
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
            padding-right: 210px;
            
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

<body>


    <div class="logininbox">
        <img src="bi.jpg"class="bi">
        
        <h2>WELCOME TO SIGNUP PAGE</h2><br>
        <form method="POST">
            <label for="E-mail">E-mail id:</label><br>
            <input type="emailid" id= "E-mail"placeholder="Enter your VIT Mail id" pattern=".+@vitstudent.ac.in" title = "You should enter Mail_id Given by VIT" required name="email">
            <br>
            <br>
            <label for="pass">Password:</label><br> 
            <input type="Password" id="pass" placeholder="****" name="password">
            <br>
            <br>
            <label for="repass">RetypePassword:</label><br>
            <input type="password" id="repass" placeholder="****" name="password2"> 
            <br>
            <label for="phone">RegNo:</label><br>
            <input type="tel" id="phone" placeholder="11XXX0000" name="RegNo">
            <br>
            <br>
            <button type="submit" class="login" name="btnsub">SignUp</button>
            <br>
            <br>
            <br>
            <a href="login.php">Already have an account?Signin<a href>


            <?php
            $con=mysqli_connect('localhost','root','','cycle_res');
          
          if(isset($_POST['btnsub']))
          {
            $reg = $_POST['RegNo'];
            $query1="select * from login where RegNo='$reg' ;";
            $result1=mysqli_query($con,$query1);
            $count=mysqli_num_rows($result1);
            if($count>0)
            {
                echo "<script> alert('REGNO already exists')</script>"; 
                echo "<script> window.location.assign('Login.php')</script>";
            }
            else{
            $password = $_POST['password'];
            $password1= $_POST['password2'];
            $email = $_POST['email'];
            $reg = $_POST['RegNo'];
            if($password==$password1)
            {
                
            $query = "insert into login (email,password,RegNo) values('$email','$password','$reg') ";
            
            $result = mysqli_query($con,$query);
            $query2 = "insert into student (RegNo) values('$reg');";
            $result2 = mysqli_query($con,$query2);
            if($result2)
            {
                $_SESSION['RegNo']=$reg;
                echo "<script> window.location.assign('Profile.php')</script>";
            }
            else{
                echo "False entry";
            }
            }
            else{
                echo "Password Doesn't match ";
            }
        }
      }


        ?>
            
        </form>
    </div>
</body>