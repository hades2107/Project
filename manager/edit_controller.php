<?php
$conn = new mysqli('localhost', 'root', '', 'tracking_system');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
else{
        if (isset($_POST['edit'])){ {
        $username = $_POST['username'];
        $email = $_POST['email'];

    $checkEmail = $conn->query("SELECT * FROM users WHERE email ='$email' AND username='$username'")
                        or die($conn->error);
    if ($checkEmail->num_rows == 0) {
        echo "Email not found in the database.";
    }
        }
        }
   
}