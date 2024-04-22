<?php

    include_once 'connection.php';
    // session_start();
    $id = $_SESSION["userid"];
    $email = $_SESSION["email"];
    if(!empty($_SESSION["userid"])){
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
    <link rel="stylesheet" href="main.css?p=4">
    <link rel="stylesheet" href="css/profile.css?p=400">
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
                <div class="navigation_bar"><a href="profile.php">Profile</a></div>
                <div class="navigation_bar"><a href="logout.php">logout</a></div>

            </div>

        </nav>
    </div>
    <br><br>
    <div class="twoboxes">


        <div class="card">
            <div class="image">
                <img src="images/img2.png" alt="this is your image">
                <div class="">
                    <button>Add Photo</button>
                </div>
            </div>
            <div class="userData">
                <div class="userContent">
                    <b>Username : </b> <?php echo $row["username"]; ?>
                </div>
                <div class="userContent">
                    <b>Mobile Number :</b> <?php echo $row["number"]; ?>
                </div>
                <div class="userContent">
                    <b>Email :</b> <?php echo $row["email"]; ?>
                </div>
            </div>
            <button>Edit</button>
        </div>


        <div class="stockData">
            <div class="stockDate">
                Date : Today is <?php echo date("d/m/y"); ?>
            </div>

            <table id="table">
                <tr>
                    <th>Product</th>
                    <!-- <th>Stock Arrival Date</th> -->
                    <th>Todays_Sales</th>
                </tr>
                
                <?php
                    
                    $currDate = date("Y-m-d");
                    $result1 = mysqli_query($conn ,  "SELECT * from `inventory` where email='$email' and `date`='$currDate'");
                    if(mysqli_num_rows($result1)){
                    while($inv = mysqli_fetch_assoc($result1)){
                ?> 

                <tr>
                    <td> <?php echo $inv["name"]; ?> </td> 
                    <td><?php echo $inv["quantity"]; ?></td> 
                </tr>

                <?php 
                       
                    // break;
                    }
                }
                    
                    // }} / 
                ?>

            </table>
        </div>

    </div>

    <div class="productStock">
    <table id="table">
        <tr>
            <th>Product_Name</th>
            <th>Stock_Entered_On</th>
            <th>Stock_Remaining</th>
        </tr>

        <?php
                    
                $getProduct=mysqli_query($conn,"SELECT * from `product` where `email`='$email' ");
                if(mysqli_num_rows($getProduct)){
                    while($getDetail = mysqli_fetch_assoc($getProduct)){
                        $stockRemaining = $getDetail["quantity"] -$getDetail["currStock"];
                    
                ?> 

                <tr>
                    <td> <?php echo $getDetail["name"]; ?> </td> 
                    <td> <?php echo $getDetail["date"]; ?> </td> 
                    <td><?php echo $stockRemaining; ?></td> 
                </tr>

                <?php 
                       
                    // break;
                    }
                }
                    
                    // }} / 
                ?>

    </table>
    </div>
</body>

</html>