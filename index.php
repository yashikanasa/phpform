<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['other'];
    $sql = "INSERT INTO 'us trip'.'us trip' ('name', 'age', 'gender', 'email', 'phone', 'other', `Date Time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href = "style.css"> 
</head>
<body>
    <img class="bg" src="bg.jpg" alt="VIT-Bhopal">
    <div class="container">
        <h3>Welcome to VIT Bhopal US Trip form </h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input class="door" type="text" name="name" id="name" placeholder="Enter your name "><br>
            <input class="door" type="text" age="age" id="age" placeholder="Enter your age "><br>
            <input class="door" type="text" gender="gender" id="gender" placeholder="Enter your gender "><br>
            <input class="door" type="text" email="email" id="age" placeholder="Enter your email "><br>
            <input class="door" type="text" phone="phone" id="phone" placeholder="Enter your phone "><br>
            <textarea class="door" type="desc" id="desc" placeholder="Enter any description" cols="30" rows="10"></textarea><br>
            <button class="btn">submit</button>
       
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>