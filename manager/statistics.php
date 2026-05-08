<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Statistics</title>
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="stats.css">
    <script defer src="nav-bar.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Playwrite+NZ+Guides&display=swap" rel="stylesheet">


    <style>
.stat-section{
    overflow-y:auto;

}
th{
    position: sticky;
    top:0;
    background:aliceblue;
    z-index: 1;
}
td{

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
   opacity: 80%;
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

    <div class="stat-section">
    <h1>Statistics</h1>
    <table style="width: 80%; border-collapse: collapse; text-align: left;  margin: 0 auto;" >
        <tr style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    font-size: 25px; font-weight: bold; color: #333;"  >
            <th >ID</th>
            <th >NAME</th>
            <th >COMMISSION</th>

        </tr>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'tracking_system');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }else{
            $sql = "SELECT id, username, commission FROM users WHERE role='Agent'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr style='font-family: \"Trebuchet MS\", \"Lucida Sans Unicode\", \"Lucida Grande\", \"Lucida Sans\", Arial, sans-serif; font-size: 20px; font-weight: normal;'>
                    <td style='width: 20%;'>".$row['id']."</td>
                    <td style='width: 30%;'>".$row['username']."</td>
                    <td style='width: 50%;'>" . "K " . $row['commission'] . "</td>
                </tr>";
                }
            }else{
                echo "0 results";
            }
            $conn->close();
        }
        ?>
    </table>
    </div>

</body>
</html>