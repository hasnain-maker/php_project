<?php



$insert = false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password  = "";


$con = mysqli_connect( $server, $username, $password );
if(!$con){
    die("connection to this database failde due to". mysqli_connect_error());
}
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `collage trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";


// echo $sql;

if($con->query($sql) ==true){
    // echo "successfully inserted style= color:white";
    $insert = true;
}
else{
    echo  "ERROR: $sql <Br> $con->error";

}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travle form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="img">
        <img src="images (21).jpeg" alt="">
    </div>
    <div class="container">
        <h1>Welcome to travle form</h1>
        <p>Enter your details and submit this formto confirm your participation in the trip</p>
        <?php
        if($insert ==true){
           echo  "<P class = 'submitMsg'>Thanks for submiting you form. we are happay to see you joining us for trip </P>";
       }
        ?>
        <form action="index.php" method="post">
            <input type="name" name="name" id="name" placeholder="Enter your name">
            <input type="age" name="age" id="age" placeholder=" Enter your age">
            <input type="gender" name="gender" id="gender" placeholder=" Enter your gender">
<input type="email" name="email" id="email" placeholder="Enter your email">
<input type="phone" name="phone" id="phone" placeholder="Enter your phone">

<textarea name="desc" id="desc" cols="30" rows="10"placeholder="Enter any other information here"></textarea>
<button class="btn">Submit</button>
<!-- <button class="btn">Reset</button> -->

        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>