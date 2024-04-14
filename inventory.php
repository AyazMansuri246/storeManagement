<?php

    include_once 'connection.php';

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

    <div class="data">

        <div>
            <div class="name">
            <form action="inventory.php" method="post">
                <?php
                $email = $_SESSION["email"];
                $sql2 = "SELECT id, name, quantity FROM product where email='$email'";
                $result = mysqli_query($conn, $sql2);
        
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo  " <div class='row' style='display: flex;
                                flex-direction: row;
                                margin: 12px 2px;
                                padding: 15px;
                                font-size: 1.3rem;
                                font-family: system-ui;
                                justify-content: space-between;
                                align-items:center; border:2px solid black ' >
                            <div class='nameContent'>"
                            . $row["name"]. "</div> 
                
                            <div style='display: flex; flex-direction: row; justify-content: center;
                            align-items: center;
                        ' >   
                                <div class='add btn' style= 'width: 85px;
                                height: 46px;
                                border: 2px solid rgb(220, 162, 38);
                                color: rgb(255, 255, 255);
                                font-size: 1.8rem;
                                font-weight: 300;
                                display:flex;
                                justify-content:center;
                                align-items:center;
                                background-color: rgb(173, 102, 236);
                                border-radius: 25px;' >+
                                </div>
                                <input type='text' value='0' name='".$row["name"]."' class='counting' style='margin:0 10px' >
                                
                                <div class='sub btn' style= 'width: 85px;
                                height: 46px;
                                border: 2px solid rgb(220, 162, 38);
                                color: rgb(255, 255, 255);
                                font-size: 1.8rem;
                                font-weight: 300;
                                display:flex;
                                justify-content:center;
                                align-items:center;
                                background-color: rgb(173, 102, 236);
                                border-radius: 25px;' >-
                                </div>   
                            </div>   
                        </div>
                <br>";

                
                }
                } else {
                echo "0 results";
                }
                
                ?>
                <input type="submit" name="submit" value="submit">
            </form>
            </div>
            <div class="other"></div>
        </div>
    </div>

    <script>
    let rows = document.querySelectorAll('.row');
    console.log("hi")
    console.log(rows);
    for (let i = 0; i < rows.length; i++) {
        let data = 0;

        let Add = rows[i].querySelector('.add');
        let sub = rows[i].querySelector('.sub');

        Add.addEventListener('click', () => {
            data++;
            counting = rows[i].querySelector('.counting').value = data;
        })

        sub.addEventListener('click', () => {
            if (data > 0) {
                data--;
            }
            counting = rows[i].querySelector('.counting').value = data;
        })

    }
    </script>

    <?php if(isset($_POST["submit"])){

        $currDate = date("d");
        // echo "the date is ". date("d");

        $filename = "inventory"."$currDate".".txt";

        $email = $_SESSION["email"];
        $myfile = fopen($filename, "w") or die("Unable to open file!");
        $date = "The Sales on ". date("d/m/y") . " is \n\n";
        fwrite($myfile, $date);
        foreach($_POST as $key => $value){

            // echo "$key = $value<br>";
            if($key != "submit"){

                $sql = "INSERT INTO `inventory`(`name`, `quantity`,`email`) VALUES ('$key','$value','$email')";
                if (mysqli_query($conn, $sql)) {
                    // echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                
                $txt = str_pad($key, 20) . "" . $value . "\n";  // str_pad(string , width ) for the right padding txt
                fwrite($myfile,$txt);
            }
            


        }
        fclose($myfile);

} ?>
</body>

</html>