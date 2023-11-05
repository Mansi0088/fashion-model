<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <style>
       body{
            margin: 0px;
            padding: 0px;
            background-image: url('img/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;    
        }
        
        .container{
            border: 2px solid black;
            display: block;
             width: 30%;
            padding: 20px;
            text-align: center;
            margin: auto;
            margin-top: 10%;
            background-color: rgb(129, 66, 76);
            background-color:rgb(96, 49, 58);
            color:white;
            height: 20%;
        }
        .btn{
            padding: 3px;
            width: 30%;
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
        .btn:hover{
            color:white;
            background-color: rgb(161, 102, 113);
            border:2px solid white; 
        }    
        input::placeholder{
            font-size: 15px;
            color:rgb(52, 51, 51);
        }
         .h1 input{
            width: 10%; 
             
        }
        
       
    </style>
</head>
<body>
    <div class="container">
    <form  id="form" method="POST">
     
         <h1>registration here</h1>
            <input type="text" name="username" placeholder="enter your username"><br><br>
            <input type="text" name="phone" placeholder="enter your phone no" ><br><br>
            <input type="text" name="email" placeholder="enter your email id"><br><br>
            <input type="password" name="password" id="" placeholder="enter your password"><br><br>
            Select your gender:
            <br><br>
            <div class="h1">

                <input  type="radio" name="gender" value="female">female
                <input   type="radio" name="gender" value="female">male
                <input   type="radio" name="gender" value="female">others<br><br>
            </div>
            
            <input type="number" name="age" placeholder="select your age"><br><br>
            <input type="submit" class="btn"  name="b1" value="submit">
    </form>
    </div>
    
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "mydb";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["b1"])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    if ($username == "" || $phone == "" || $email == "" || $password == "" || $gender == "" || $age == "") {
        echo "<script>alert('Sorry, all fields are required')</script>";
    } else {
        $sql = "INSERT INTO modelsdata (username, phone, email, password, gender, age) VALUES ('$name', '$phone', '$email', '$password','$gender','$age')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful');</script>";
            echo "<script>window.location.href='home1.html'</script>";
        } else {
            echo "<script>alert('Registration failed');</script>";
        }
    }
    
}

$conn->close();
?>

       
</body>
</html>