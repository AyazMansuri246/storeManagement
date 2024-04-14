<?php
    require 'connection.php';

    if(!empty($_SESSION["userid"])){
        $id = $_SESSION["userid"];
        $result = mysqli_query($conn,"SELECT * FROM `useraccount` WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        
    }
    else{
        header("location: mainLogin.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bill.css">
    <script src="bill.js"></script>

</head>
<body>
<div className="navbar">
        <nav class="navbar">
            <div class="heading">
                Store Manager
            </div>
            <div class="links">

                <div class="navigation_bar"><a href="home.php">Home</a></div>
                <div class="navigation_bar"><a href="product.php">Product</a></div>
                <div class="navigation_bar"><a href="inventory.php">Inventory</a></div>
                <div class="navigation_bar"><a href="bill.php">Bill</a></div>
                <div class="navigation_bar"><a href="#">Profile</a></div>
                <div class="navigation_bar"><a href="logout.php">logout</a></div>

            </div>

            
        </nav>
    </div>

    <div class="title">Generate Bill</div>

    <div class="container">
        <?php
            $email = $_SESSION["email"];
            $sql2 = "SELECT id, name, quantity FROM product where email='$email'";
            $result = mysqli_query($conn, $sql2);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "data is " . $row["name"];
                }
            }
        ?>
    </div>
</div>

</body>
</html>