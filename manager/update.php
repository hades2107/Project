<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Update</title>
    <link rel="stylesheet" href="theme.css">
    <script defer src="nav-bar.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Playwrite+NZ+Guides&display=swap" rel="stylesheet">

<style>
    table {
        width: 50rem;
        border-collapse: collapse;
        text-align: left;
        margin: 0 auto;
    }

    th {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 25px;
        font-weight: bold;
        color: #333;
        position: sticky;
        top:0;
        background:aliceblue;
        z-index: 1;
    }

    td {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 20px;
        font-weight: normal;
        color: #333;
        border-bottom: 1px solid #bbbbbb;
        height:40px;
        }
    h1{
        font-family: 'Changa One', cursive;
        font-size: 30px;
        color: #E64833;
        font-weight: normal;
        margin-left: 10%;
    }

    .container{
        height: 30rem;
        width:70rem;
        background-color: aliceblue;
        margin: 0 auto;
        border-radius: 10px;
        overflow-y:auto;
    }
    button{
    background-color: #E64833;
    color:white;
    border: none;
    padding: 5px 10px;
    position: relative;
    left: 10px;
    border-radius: 2px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

#edit-btn{
    background-color:#416387;

} 
button:hover{
    opacity: 80%;
    cursor: pointer;
}
.add-btn{
    position:relative;
    left:15rem;
    bottom:1rem;
    height:40px;
    width:80px;
    border-radius:5px;
    background-color:#416387;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size:17px;
}
    #logout-btn{
    background-color:transparent;
    color:red;
    border: none;
    position: relative;
    left: 65rem;
    top:1.5rem;
    height:50px;
    width:90px;
    border-radius:5px;
    text-shadow: .5px .5px 1px black;
    box-shadow: none;
    font-family: 'Changa One', cursive;
    font-size:25px;
}
#logout-btn:hover{
    cursor: pointer;
    
}
    </style>


</head>
<body>

    <div class = "menu">
        <ul>
            <a href="manager_home.html" ><li class="nav-bar">Home</li></a>
            <a href="update.php" ><li class="nav-bar">Update</li></a>
            <a href="statistics.php" ><li class="nav-bar">Statistics</li></a>
        </ul>

            <a href="../index.php" method="post"><button id="logout-btn">Logout</button></a>
    </div>
    <h1> Users List</h1>
     <a href="add_user.html"><button class="add-btn">Add</button></a>

    <div class="container">
        
        <table> 
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
                $conn= new mysqli('localhost','root','','tracking_system')
                 or die($conn->error);
                 $query = mysqli_query($conn, "SELECT * FROM users") 
                 or die($conn->error);
                 while($row = mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['role']; ?></td>

                <td>
                    <a href="edit_form.php?edit=<?php echo $row['email'];?>"><button id="edit-btn" name="edit">Edit</button></a>
                    <a href="?delete=1&email=<?php echo $row['email'];?>"><button id="del-btn" name="delete">Delete</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php
    if(isset($_GET['delete'])){
        $email = $_GET['email'];
        $delete_query = mysqli_query($conn, "DELETE FROM users WHERE email = '$email'");
        if($delete_query){
            echo "User deleted successfully.";
            header("refresh:0");
        }else{
            echo "Error deleting user.";
        }
    }
    ?>
 
    </div>

</body>
</html>