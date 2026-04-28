<?php
$useremail= $_POST['email'];
$password= $_POST['password'];
$fullname = $_POST['fullname'];

$conn= new mysqli('localhost','root','','user');
if($conn ->connect_error){
    die('Connection Failed: '. $conn->connect_error);
}else{
    $stmt= $connect->prepare("INSERT INTO credentials(fullname,email,password) value(?,?,?)");
    $stmt-> bind_param("sss",$fullname, $useremail,$password);
    $stmt-> excute();
    echo "Login Successfull....";

    $stmt-> close();
    $conn-> close();
}

?>