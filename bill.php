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
            $sql2 = "SELECT id, name, quantity FROM product where `email`='$email' and `bill_present`='no'";
            $result = mysqli_query($conn, $sql2);
            
            if(mysqli_num_rows($result)>0){

                while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <form action='bill.php' method='post'>
                        <div class='row' style=' display:flex; margin:50px 0; border: 1px solid whitesmoke; height:60px; font-size:1.3rem; align-items:center ' > 
                            <div class='fsection' style='width:80%'>" . $row["name"] . "</div> 
                                <div class='ssection'>
                                    <input type='number' name='" .$row["id"] . "' /> <input type='submit' value='Add' name='add' />
                                </div> 
                         </div>
                    </form>
                    ";
                }
            }
        ?>
    </div>
    <form action="generatebill.php" method="post"> 
        <input type="submit" value="Generate Bill" name="submit">
    </form>
</div>

</body>
</html>

<?php   

    if(isset($_POST["add"])){
        foreach($_POST as $key => $value){
            if($key!="add"){
                // echo $key . " has ". $value;
                
                // $sql = "UPDATE `product` SET `bill_present`='yes', `bill_quantity` = '$value' WHERE `id`='$key'";
                (mysqli_query($conn,"UPDATE `product` SET `bill_present`='yes', `bill_quantity` = '$value' WHERE `id`='$key'"));

                // I have to refresh the page
            }
        }
    }


?>