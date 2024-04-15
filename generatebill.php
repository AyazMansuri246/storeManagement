<?php
    if(!empty($_POST['submit'])){
        
        include "fpdf186/fpdf.php";
        include "connection.php";
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf-> SetFont("Arial", "" ,12);
        $pdf-> Cell(0,10,"Invoice",1,1,"C");  // (width,height,name,border,newline,center)
        $pdf-> Cell(50,10,"Product Name",1,0);
        $pdf-> Cell(50,10,"Product Price",1,0);
        $pdf-> Cell(50,10,"Quantity",1,0);
        $pdf-> Cell(0,10,"Product Total",1,1);


        $billquery = "SELECT `id`, `name`, `quantity`, `price`, `email`, `bill_present`, `bill_quantity` FROM `product` WHERE `bill_present`='yes'";
        $billresult = mysqli_query($conn , $billquery);
        if(mysqli_num_rows($billresult) > 0){
            while($row = mysqli_fetch_assoc($billresult)){
                $ptotal = $row["price"]*$row["bill_quantity"];
                $pdf-> Cell(50,10,$row["name"],1,0);
                $pdf-> Cell(50,10,$row["price"],1,0);
                $pdf-> Cell(50,10,$row["bill_quantity"],1,0);
                $pdf-> Cell(0,10,$ptotal,1,1);
            }
        }



        $pdf->output();
        mysqli_query($conn , "UPDATE `product` SET `bill_present`='no'");

        mysqli_close();


    }