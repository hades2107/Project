<?php
$conn = new mysqli('localhost', 'root', '', 'tracking_system');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
else{
        if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $sql = "DELETE FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "User Successfully Deleted";
            exit();
        } else {
            echo "Error Occured Deleting User" . $conn->error;
        }
    }}
?>