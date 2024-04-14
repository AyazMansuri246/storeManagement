<?php
    include 'login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

    <?php 
        $name = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST["name"];
        }   
    ?>
    <h1>Info Form</h1>
    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method = "post" >
        <pre>
            Your ID : <input type="number" name="id" id="">
            Your Name : <input type="text" name="name" id=""><br>
            
            <input type="submit" value="submit">
        </pre>
    </form>

    <?php 
        echo "Your details is : <br>";
        echo $name;

    ?>

</body>
</html>