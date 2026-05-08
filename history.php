<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>

    <link rel="stylesheet" href="theme.css">
    <script defer src="nav-bar.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Playwrite+NZ+Guides&display=swap" rel="stylesheet">

    <style>
.history-section{
    overflow-y:auto;
    height: 35rem;
    width: 60rem;
    font-size: 20px;
    border-radius:10px ;
    background-color: aliceblue;
    margin-left: 20rem;
    margin-top: 3rem;
}
th{
    position: sticky;
    top:0;
    background:aliceblue;
    z-index: 1;
}
tr{
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 20px;
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
    <nav>
        <div class = "menu">
            <ul>
                <a href="home.html" ><li class="nav-bar">Home</li></a>
                <a href="transaction.html" ><li class="nav-bar">Transaction</li></a>
                <a href="history.php" ><li class="nav-bar">History</li></a>
            </ul>
            <a href="index.php" method="post"><button id="logout-btn">Logout</button></a>

    </div>
    </nav>

    </div>

    <div class="history-section">
    <table style="width: 80%; border-collapse: collapse; text-align: left;  margin: 0 auto;" >
        <tr style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    font-size: 25px; font-weight: bold; color: #333;"  >
            <th>TRANS.ID</th>
            <th>DATE</th>
            <th>COMMISSION</th>
        </tr>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'tracking_system');
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        }else{
            $sql = "SELECT id, date, commission FROM transactions WHERE email = '".$_SESSION['email']."' ORDER BY date DESC";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr style='font-family: \"Trebuchet MS\", \"Lucida Sans Unicode\", \"Lucida Grande\", \"Lucida Sans\", Arial, sans-serif; font-size: 20px; font-weight: normal;'>
                            <td style='width: 20%;'>".$row['id']."</td>
                            <td style='width: 20%;'>".date("d-m-Y", strtotime($row['date']))."</td>
                            <td style='width: 50%;'>" . "K " . $row['commission']."</td>
                         </tr>";
                }
            }else{
                echo "<tr ><td colspan='3'>No transactions found.</td></tr>";
            }
            $conn->close();
        }
        ?>
    </table>
    </div>
</body>
</html>