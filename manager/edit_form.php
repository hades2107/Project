<?php
$conn = new mysqli('localhost','root','','tracking_system');

if(isset($_GET['edit'])){
    $email = $_GET['edit'];
    
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($result->num_rows > 0){
        $fetch = $result->fetch_assoc();
    }else{
        die("Error finding user");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="register_form.css">
</head>
<body>
    <form action="edit_controller.php" method="post">
        <fieldset>
            <legend>Edit User Info.</legend>
            <input name="username" placeholder="Fullname" type="text" value="<?php echo $fetch['username']?? ''; ?>">
            <input name="email" placeholder="Email" type="email" value="<?php echo $fetch['email']?? ''; ?>">
             <select name="role" id="role" required placeholder="select role">
                 <option value="">--Select Role--</option>
                 <option value="Manager">Manager</option>
                 <option value="Agent">Agent</option>
                </select>
            <input id="btn" name="edit" value="Edit" type="submit">
        </fieldset>
    </form>

</body>
</html>