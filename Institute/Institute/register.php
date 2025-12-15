<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $Address = $_POST['address'];
    $username = $_POST['email'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);

    }

    $select  = "SELECT * FROM login WHERE username = '$username' AND password ='$password'";

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0) {
        echo "<script>alert('Already registered!');</script>";
        exit();
    }
    else
    { 
      $query = "insert into login (fname,lname,gender,address,username,password) values ('$firstname','$lastname','$Gender','$Address','$username','$password')";
      mysqli_query($conn, $query);
      header('location:index.html');
      exit();
    }
    $conn->close();

}


?>