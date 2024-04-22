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
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/starter.css">
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

    <div class="mainpage">
        <div class="mpcontent">
            <div class="mptitle">
            Finally, a modern inventory system
            </div>

            <div class="mpdetail">
                Detailed item cards, batches, quick stock reports,<br>and accurate inventory cost calculations <br> <br>
                <div class="mpextradetail">
                    Keep a record of different product
                    variants and prices <br><br>
                    Sell goods by pieces or by kilos, sacks, packs, bundles <br> <br>
                    Monitor stock level using <strong> detailed reports </strong>
                </div>
            </div>

            <div class="button">
                <button class="btn">Try Now for FREE</button>
            </div>
        </div>
        <div class="image">
            <img src="images/img2.png" alt="this">
        </div>
    </div>


    
    <section class="secondsection" id="aboutme">
        <div class="secondcontent">
            <hr>

          
            <div class="heading">
                <h1>
                    Modules Provided by Us
                </h1>
                <hr />
            </div>

        <div class="box">
          <div class="vertical ver1">
            <div class="topic">Product <br> Module</div>
            <div class="description">
                It Allows u to enter the Stocks that is you can enter the Name of the Product, the quantity of the Product and the Price of the Product.
            </div>
          </div>
          <div class="vertical ver2">
            <div class="topic">Inventory <br>Management</div>
            <div class="description">
              This module includes the detail of per day sales, i.e the user have to increment the number when the product is saled and at the end of the day the user have to submit the data by clicking on submit button 
              and the data will be stored in the file. 
            </div>
          </div>
          <div class="vertical ver3">
            <div class="topic">Bill <br> Generator</div>
            <div class="description">
              This module includes the bill generating, the user have to add the quantity for thr product that should be included
              in the bill and the bill is generated in the pdf form that can be downloaded.
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
      </section>


      <section class="footer">
        <!-- ===== BOX ICONS ===== -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!--===== FOOTER =====-->
<footer class="footer">
  <div class="footer__container bd-container">
    <h2 class="footer__title">Clay Doe</h2>
    <p class="footer__description">I am Clay Doe and this is my personal website, consult me here.</p>

    <div class="footer__social">
      <a href="#" class="footer__link"><i class="bx bxl-linkedin"></i></a>
      <a href="#" class="footer__link"><i class="bx bxl-github"></i></a>
      <a href="#" class="footer__link"><i class="bx bxl-codepen"></i></a>
    </div>
    <p class="footer__copy">&#169; 2024 Clay Doe. All right reserved</p>
  </div>
</footer>
      </section>
</body>
</html>