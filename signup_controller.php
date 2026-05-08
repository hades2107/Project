<?php
session_start();

$conn= new mysqli("localhost", "root", "", "tracking_system");

if($conn -> connect_error){
    die("error connecting to database". $conn->connect_error);
}else{

    if (isset($_POST['signup'])){
    $name =$_POST['username'];
    $email =$_POST['email'];
    $role = $_POST['role'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = $conn->query("SELECT email FROM users WHERE email ='$email'")
                        or die($conn->error);

    if ($checkEmail->num_rows > 0){
        echo "Email is Already Registered to Another User";
        exit();
        
    }else {
        $stmt= $conn-> prepare("INSERT INTO users (username, email, password,role) 
                                 VALUES(?,?,?,?)");
        
        $stmt ->bind_param("ssss", $name, $email, $password,$role);
        $stmt ->execute();

        $stmt->close();
        $conn->close();

        header("Location:login.php");          
        
    }
  
    }
 
}

?>