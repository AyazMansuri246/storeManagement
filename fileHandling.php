<?php

   include_once 'connection.php';
   $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//    $txt = "hii bro\n";
//    fwrite($myfile,$txt);
//    fwrite($myfile,"this is Ayaz");
//    fwrite($myfile,$txt);

echo "Today is " . date("d/m/y") . "<br>";
date_default_timezone_set("Asia/Calcutta");
$x = date("h:i:sa");
// var_dump($x);

// for comparing the time when the day ends and to refresh the daily inventory page to default and making daily db empty after
//storing its data to file.
if($x >= '10:54:31am'){

    echo "The time is " . $x;
}


$sql2 = "SELECT id, name, quantity FROM product";
$result = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {

    $txt = str_pad($row["name"], 20) . "" . $row["quantity"] . "\n";  // str_pad(string , width ) for the right padding txt
    fwrite($myfile,$txt);

}
} else {
echo "0 results";
}

   fclose($myfile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hey</h1>
</body>
</html>