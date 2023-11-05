<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
           margin: 0px;
           padding: 0px;
           background-image: url('img/background.jpg');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: 100% 100%;    
       }
       
       .maincontainer{
           border: 2px solid black;
           display: block;
           width: 30%;
           padding: 10px;
           text-align: center;
           margin:15% auto;
           margin-bottom: 5%;
           background-color: rgb(129, 66, 76);
           background-color:rgb(96, 49, 58);
       }
       h2{
           text-align: center;
           color: white;
           }
       .btn{
           padding: 3px;
           width: 26%;
           border: 2px solid black;
           border-radius: 5px;
           font-size: 15px;
       }
       input{
           width: 45%;
           text-align: center;
           border: 2px solid black;
           border-radius: 5px;
           padding: 4px;
       }
       .login{
           color: white;
       }
       .btn:hover{
           color:white;
           background-color: rgb(161, 102, 113);
           border:2px solid white;
       }
       .btn1:hover{
           color:white;
           background-color: rgb(161, 102, 113);
           border:2px solid white;
       }
       .btn1{
           padding: 3px;
           width: 48%;
           border: 2px solid black;
           border-radius: 5px;
           font-size: 15px;
           margin-left:2px;
       }
       .partner{
           text-align: center;
       }
       input::placeholder{
           font-size: 15px;
           color: rgb(52, 51, 51);
       }
       
   </style>
</head>
<body>
         <div class="maincontainer">
           <h2>LOGIN HERE</h2>
           <div class="container">
               <div class="login">
                   <form method="POST">
                   
                   <input type="text" name="email" placeholder="enter your email"><br><br>
                   
                   <input type="text" name="password" placeholder="enter your password" ><br><br>
                   <button class="btn" name="b1">LOGIN</button><br><br>
               </div>
               </form>
               <div class="newaccount">
               <a href="register.php" >
                   <button class="btn">REGISTER</button><br><br>
               </a>
               </div><br>
           </div>
       </div>


   <?php
   $servername="localhost";
   $username="root";
   $password="";
   $databasename="mydb";
   
   $conn= new mysqli($servername,$username,$password,$databasename);
   
   if($conn->connect_error)
   {
       echo"not connect with database";
   }
   
   if(isset($_POST["b1"]))
   {
       $email=$_POST["email"];
       $password=$_POST["password"];

       if ($email == "" || $password == "") {
           echo"<script>alert('Sorry, all fields are required')</script>";
       } 
       else 
       {
   
       $sql="select * from  modelsdata  where email='$email' and password='$password'";
   
       $result=$conn->query($sql);
   
       $cnt=$result->num_rows;
       if($cnt==0){
           echo"<script> return false; </script>";
           echo"<script>alert('sorry invalid user name and password')</script>";
          
       }
       else
       {
           echo" <script>
                  document.location.href='home1.html'</script>";
   }
   }
 }
?>

    
</body>
</html>