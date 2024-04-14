<?php
    if(!empty($_POST['submit'])){
        $name = $_POST["pname"];
        $price = $_POST['pprice'];
        $quan = $_POST["pquantity"];

        include "fpdf186/fpdf.php";

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf-> SetFont("Arial", "" ,12);
        $pdf-> Cell(0,10,"Invoice",1,1,"C");  // (width,height,name,border,newline,center)
        $pdf-> Cell(50,10,"Product Name",1,0);
        $pdf-> Cell(50,10,"Product Price",1,0);
        $pdf-> Cell(50,10,"Quantity",1,0);
        $pdf-> Cell(0,10,"Product Total",1,1);


        $ptotal = $price*$quan;
        $pdf-> Cell(50,10,$name,1,0);
        $pdf-> Cell(50,10,$price,1,0);
        $pdf-> Cell(50,10,$quan,1,0);
        $pdf-> Cell(0,10,$ptotal,1,1);





        $pdf->output();

    }