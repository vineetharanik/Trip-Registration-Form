<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Traval Form</title>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.webp" alt="BVRIT" >
    <div class="container">
        <h2>WELCOME TO BVRIT TRIP FORM.</h2>
        <p>Enter the following details to confirm your participation.</p>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here..."></textarea>
           <!-- <button class="btn"> <a href="display.php">Submit<button class="btn"></button></a></button>-->
            <button class="btn" type="submit">Submit</button>

          
        </form>
      
    </div>
    <?php
    $insert=false;
    if(isset($_POST['name'])){
          $server="localhost";
          $username="root";
          $password="";

        $database = "trip";
          $con=mysqli_connect($server,$username,$password, $database);

          if(!$con){
            die("connection to this database failed due to".mysqli_connect_error());
          }

            //echo "Success connecting to the db";
        $name=$_POST['name'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $desc=$_POST['desc'];
        $sql =" INSERT INTO `trip` ( `Name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
        //echo $sql;


        //to insert data into database
        //to run we use query function
        if($con->query($sql) == true){
            //echo "Successfully inserted";
            
    header("Location: display.php");
    exit;

        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        
        $con->close();
    }
         ?>

</body>
</html>