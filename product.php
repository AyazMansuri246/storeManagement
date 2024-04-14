<!-- <div className="box">
                <div className="title">{props.title}</div>
                <div className="content">{props.content}</div>
                <div className="del">
                    <div className="delicon" style={ {cursor : "pointer"}}>
                   <DeleteIcon onClick={del}/>
                    </div>
                </div>
            </div> -->
            <!-- .box{
    border: 2px solid rgb(250, 250, 155);
    width: 300px;
    height: 130px;
    border-radius: 10px;
    box-shadow: 1px 2px 2px 0px;
}

.title{
    margin-top: 5px;
}

.content{
    margin-top: 20px;
}

.del{
    margin-top: 22px;
    display: flex;
    justify-content: end;
}
.delicon{
    border: 2px solid rgb(222, 222, 117);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
} -->


<?php

    include_once 'connection.php';
    // session_start();
    if(!empty($_SESSION["userid"])){
        $id = $_SESSION["userid"];
        $result = mysqli_query($conn,"SELECT * FROM `useraccount` WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        
    }
    else{
        header("location: mainLogin.php");
    }

    function validate(){
        if(isset($_POST["submit"])){
            // echo "done";
            if(empty($_POST["pname"])){
                echo "<script>alert('Please enter product name')</script>";
                return false;
            }
            else{
                $pname = $_POST["pname"];
            }
            if(empty($_POST["pquantity"])){
                echo "<script>alert('Please enter quantity')</script>";
                return false;
            }
            else{
                $pquantity = $_POST["pquantity"];
            }

    }
    return true;

    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $pname=$pquantity=$pprice="";
        $email = $_SESSION["email"];

            if(($_POST["submit"]== "submit") && validate()){
                $pname = $_POST["pname"];
                $pquantity = $_POST["pquantity"];
                $pprice = $_POST["pprice"];

                $duplicate = mysqli_query($conn , "SELECT * FROM `product` WHERE name='$pname' and email='$email'");
                if(mysqli_num_rows($duplicate) > 0){
                    echo "<script> alert('Product is already present'); </script>";
                }
                
                else{

                    $sql = "INSERT INTO `product`(`name`, `quantity`,`price`,`email`) VALUES ('$pname','$pquantity','$pprice','$email')";
                    if (mysqli_query($conn, $sql)) {
                        // echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
        
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="smallcard.css">
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
    <br><br>
    <div class="stock">
        <h2>Enter the stock of the Product and its quantity</h2>
        <div class="addstock">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="">Product Name</label>
                <input type="text" name="pname" class="pinput">

                <label for="">Product quantity</label>
                <input type="number" name="pquantity" class="pquantity">
                <label for="">Product price</label>
                <input type="number" name="pprice" class="price">

                <input type="submit" value="submit" name="submit" class="submitBtn">
            </form>
        </div>
        <div class="viewstock" style="display: flex;flex-direction: row;flex-wrap: wrap; margin:30px 30px">
            <?php
                $email = $_SESSION["email"];
                // echo $email;
                $sql2 = "SELECT id, name, quantity,price FROM product where email='$email'";
                $result = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo  "<div class='row box' style='margin: 20px 11px;' >
                <div class='title' style='display: flex;
                justify-content: space-between;'><span>Product</span><span>quantity</span><span>price</span></div>
                
                <div class='content' style='display: flex;
                justify-content: space-between;'>
                <div class='nameContent'>"
                . $row["name"]. "</div> <div class='quantityContent'> " . $row["quantity"].
                "</div> <div class='priceContent'> " . $row["price"] . 
                " </div>
                </div>
                <div class='btns del'>
                    <input class='btn update' type='button' style='height: 24px;
                        width: 91px;
                        border-radius: 4px;
                        font-size: 1.2rem;
                        font-family: math;
                        background: aliceblue;
                        color: black;
                        border: 2px solid #b5975f;' value='Update' name='update'/>
                    <input class='btn delete' type='button' style='height: 24px;
                        width: 91px;
                        border-radius: 4px;
                        font-size: 1.2rem;
                        font-family: math;
                        background: aliceblue;
                        color: black;
                        border: 2px solid #b5975f;' value='Delete' />
                </div>
                </div>" 
                ."<br>";

                // echo " 
                // <div class='row' style='display: flex; flex-direction: row; flex-wrap:wrap'>
                //     <div class='box'>
                //     <div class='title'> ".$row["name"]. "</div>
                //     <div class='content'> " . $row["quantity"]. " </div>
                //     <div class='btns'>
                //     <div class='del'>
                //         <div class='delicon' style={cursor : 'pointer'}>
                //         <input class='btn update' type='button' value='Update' name='update'/>
                //         </div>
                    
                //     </div>
                //     </div> 
                // </div>
                //     ";

                }
                
                } else {
                echo "0 results";
                }

                // $id ="";
                // for deletion after passing the link 
                if(isset($_GET["name2"]) && isset($_GET["quantity"]) && isset($_GET["button"])){
                    $name = $_GET["name2"];
                    $quantity = $_GET["quantity"];
                    $email = $_SESSION["email"];


                    $sql = "SELECT id FROM `product` WHERE name='$name' and quantity='$quantity' and email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $_SESSION['deleteid'] = $row["id"];
                        //   echo "id: " . $row["id"];
                        }
                      } else {
                        echo "0 results";
                      }
                    
                      $id = $_SESSION['deleteid'];
                      echo "the id $id ";
                      $sql = "DELETE FROM product WHERE id='$id' and email='$email'";
                      if (mysqli_query($conn, $sql)) {
                        echo "Record deleted successfully";
                        header("location: product.php");
                      } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                        }
                    
                    
                      

                }
                
                if(isset($_GET["name"]) && isset($_GET["quantity"])){
                    $name = $_GET["name"];
                    $quantity = $_GET["quantity"];
                    $email = $_SESSION["email"];
                    
                    echo "<script>  
                        console.log('h');
                        let Pinput = document.querySelector('.pinput');
                        let Pquantity = document.querySelector('.pquantity');
                        let submitBtn = document.querySelector('.submitBtn');
                        Pinput.value = '$name';
                        Pquantity.value = '$quantity';
                        submitBtn.value = 'Edit';
                        console.log(submitBtn.value); 
                        
                        </script>";

                        // echo "hii";
                    
                    $sql = "SELECT id FROM `product` WHERE name='$name' and quantity='$quantity' and email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                              $_SESSION['updateid'] = $row["id"];
                        //   echo "id: " . $row["id"];
                        }
                      } else {
                        echo "0 results";
                      }

                    // echo " hii $id";
                        

                    
                }
                
                // echo $_SESSION['id'];
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    // $pname=$pquantity="";
                    
                    // echo "THe id id " . $_SESSION['id'];
                if(($_POST["submit"]== "Edit") && validate()){
                    $pname = $_POST["pname"];
                    $pquantity = $_POST["pquantity"];
                    $email = $_SESSION["email"];
                    // echo "new $pname $pquantity the id is $id";
                    $id =$_SESSION['updateid'];
                    
                    $sql = "UPDATE `product` SET `name`='$pname',`quantity`='$pquantity' WHERE `id`='$id' and email='$email' ";
                    if (mysqli_query($conn, $sql)) {
                        // echo "Updated successfully";
                        header("location:product.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                
                    
                }
            }
            
        
                mysqli_close($conn);
            ?>
        </div>
    </div>

    <script>
    // console.log("hii");
    // <?php echo "hey"; ?>
    // e.target.textContent.trim().toLowerCase() === 'update'       // if to compare then do trim() and toLowerCase()
    let rows = document.querySelectorAll('.row')
    // let Pinput = document.querySelector('.pinput');
    // let Pquantity = document.querySelector('.pquantity');
    // let submitBtn = document.querySelector('.submitBtn');

    for (let i = 0; i < rows.length; i++) {
        let updateButton = rows[i].querySelector('.update'); // Select update button within the clicked row
        updateButton.addEventListener('click', () => {
            console.log("Update button clicked");
            // console.log(rows[i].firstChild.nextElementSibling.textContent);
            let b = rows[i].firstChild.nextElementSibling.textContent;
            // Pinput.value = rows[i].firstChild.nextElementSibling.textContent;
            // console.log(rows[i].firstChild.nextElementSibling.nextElementSibling.textContent);
            // Pquantity.value = rows[i].firstChild.nextElementSibling.nextElementSibling.textContent.trim(); // imp
            let q = rows[i].firstChild.nextElementSibling.nextElementSibling.textContent.trim();
            // console.log(submitBtn.value)
            // submitBtn.value = "Edit";
            location.replace("product.php?name=" + b + "&quantity=" + q);


        });
    }

    for (let i = 0; i < rows.length; i++) {
        let deleteButton = rows[i].querySelector('.delete'); // Select update button within the clicked row
        deleteButton.addEventListener('click', () => {
            let b = rows[i].firstChild.nextElementSibling.textContent;
            let q = rows[i].firstChild.nextElementSibling.nextElementSibling.textContent.trim();
            let d = "delete";

            if (confirm(`you want to delete ${b} item `)) {

                location.replace("product.php?name2=" + b + "&quantity=" + q + "&button=" +
                d); // name2 because if i dont d it then update process also works
            }
        })

    }
    </script>
</body>

</html>