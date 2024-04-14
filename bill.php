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

        <div class="form">
            
        <form method="post" action="generatebill.php">
            <!-- <div class="name">

                <label for="">Product Name</label>
                <input type="text" name="pname" class="pinput">
            </div>
                
            <div class="price">

                <label for="">Product Price</label>
                <input type="number" name="pprice" class="pprice">
                
            </div>
            <div class="quantity">

                <label for="">Product quantity</label>
                <input type="number" name="pquantity" class="pquantity">
                
            </div> -->
            <div class="titleName">
                <div class="name individual">Product Name</div>
                <div class="price individual">Product Price</div>
                <div class="quantity individual">Product Quantity</div>
            </div>

            <div class="inputs">
                <div class="input">
                    <div class="inp1"></div>
                    <div class="inp2"></div>
                    <div class="inp3"></div>
                </div>
            </div>
                <button type="submit" name="" class="add">Add New Row</button>
                <input type="submit" value="submit" name="submit" class="submitBtn">
        </form>
    </div>
</div>

</body>
</html>