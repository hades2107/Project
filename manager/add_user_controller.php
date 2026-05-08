<?php
$conn= new mysqli('localhost','root','','tracking_system');
if($conn ->connect_error){
    die('Error Connecting with Database'. $conn->connect_error);
}else{
        
        if (isset($_POST['add'])){
                $name =$_POST['username'];
                $email =$_POST['email'];
                $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
                $role=$_POST['role'];

        $checkemail = $conn->query("SELECT email FROM users WHERE email='$email'") 
                or die($conn->error);

        if($checkemail->num_rows > 0){
            echo "Email Is Already Registered to Another User";
            exit();
        }else{
                $stmt= $conn->prepare("INSERT INTO users(username,email,password,role) VALUES(?,?,?,?)");
                $stmt-> bind_param("ssss",$name, $email,$password,$role);
                $stmt-> execute();
                echo "New User Added Successfully";
        }
    $stmt-> close();
    $conn-> close();
}
}
?>
