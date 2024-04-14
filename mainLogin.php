<?php 
    include 'connection.php';
    if(!empty($_SESSION["userid"])){
        header("location: home.php");
    }

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = mysqli_query($conn , "SELECT * FROM `useraccount` WHERE email='$email' ");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["userid"] = $row["id"];
                $_SESSION["email"] = $row["email"]; 
                $_SESSION["name"] = $row["username"];
                echo $_SESSION["name"];
                header("location: home.php");
            }
            else{
                echo "<script> alert('Password not correct'); </script>";
            }
        }
        else{
            echo "<script> alert('User not Registered'); </script>";
        }

    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="mailnogin.css">
</head>

<body>


<div class="container mt-5 mb-5 col-md-4 justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="registrationForm">
                    <h3 class="card-title mb-3 d-flex justify-content-center">Register</h3>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group form-floating">
                                <input class="form-control" type="text" id="email" placeholder="Email ID" name="email" required>
                                <label for="email">Email ID</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group form-floating">
                                <input class="form-control pword" type="password"  name="password" required>
                                <label for="name">Password</label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="d-flex justify-content-center">
                    <input type="submit" value="login" name="submit" class="submitBtn">
                    </div>
                </form> 

                <div class="login">Had no Account !! <a href="user.php">Create Account</a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>

