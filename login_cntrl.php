<?php
session_start();
$conn= new mysqli('localhost','root','','tracking_system');
 if($conn->connect_error){
    die("error connecting to database". $conn->connect_error);
 }else{
        if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result= $conn->query("SELECT * FROM users WHERE email= '$email'");
    if ($result -> num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            if ($user['role']=== 'Manager'){
             header("Location:manager/manager_home.html");
             } else{
              header("Location: home.html");
              exit();
          }
          }else{
            header("Location: login.php");
            exit();
          }
    }
    }
 }

?>