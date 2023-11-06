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
    <form  id="form" method="POST" enctype="multipart/form-data">
     
         <h1>registration here</h1>
            <input type="text" name="username" placeholder="enter your username"><br><br>
            <input type="text" name="phone" placeholder="enter your phone no" ><br><br>
            <input type="text" name="email" placeholder="enter your email id"><br><br>
            <input type="password" name="password" id="" placeholder="enter your password"><br><br>
            Select your gender:
            <br>
            <div class="h1">

                <input  type="radio" name="gender" value="female">female
                <input  type="radio" name="gender" value="male">male
                <input  type="radio" name="gender" value="others">others
                <br><br>
            </div>
            
            <input type="number" name="age"  placeholder="select your age"><br><br>
            select your photo:<br>
            <input type="file" name="image"><br><br>
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
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        echo "<script>alert('Gender is required.')</script>";
        exit; 
    }
    

    
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imageName = basename($image['name']);
        
        $uploadPath = 'uploads/' . $imageName;
        
        if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
            
            $sql = "INSERT INTO modelsdata (username, phone, email, password, gender, age, image) 
                    VALUES ('$name', '$phone', '$email', '$password','$gender','$age', '$imageName')";
     } else {
       echo "<script>alert('Image upload failed.')</script>";
     }
    }
    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($gender) || empty($age) || empty($image)) {
        echo "<script>alert('Sorry, all fields are required.')</script>";
    } else {
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