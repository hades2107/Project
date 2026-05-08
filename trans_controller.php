<?php
session_start();
require_once 'login.php';
$transaction = $_POST['commission'];
$password = $_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'tracking_system');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])){
                $commission=$transaction*5/100;
                $insert_query=mysqli_query($conn, "INSERT INTO transactions (email, date,commission) 
                                                    VALUES ('$email', NOW(), '$commission')");
                $new_commission=$commission + $row['commission'];
                $users_query=mysqli_query($conn, "UPDATE users SET commission='$new_commission' WHERE email='$email'");
                
                if($insert_query && $users_query){
                    echo "Transaction Recorded successfully";
                    header("Location: history.php");
                }
                    }else{
                    echo "Error Recording transaction:" . $conn->error;
                }
            }else{
                echo "Incorrect password";
            }
            $conn->close();
        }

?>