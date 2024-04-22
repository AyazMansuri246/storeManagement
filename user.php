<?php
 include_once 'connection.php';
 
 if(!empty($_SESSION["userid"])){
    header("location: home.php");
}
 
 function Validate(){
     if(isset($_POST["submit"])){
         $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];
         if($password != $cpassword){
             echo "<script> alert('Password not same')</script>";
             return false;
         }
     }
     return true;
 }


 if($_SERVER["REQUEST_METHOD"]=="POST"){
     
    
    if(($_POST["submit"] == "submit") && Validate()){
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $number = $_POST['number'];

        $duplicate = mysqli_query($conn , "SELECT * FROM `useraccount` WHERE username='$username' OR email='$email'");
        if(mysqli_num_rows($duplicate) > 0){
            echo "<script> alert('Username or Email has been already used'); </script>";
        }
        else{
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO `useraccount`(`username`, `email`, `number`, `password`) VALUES ('$username','$email','$number','$hash')";
                if(mysqli_query($conn,$query)){
                    
                    echo "<script> alert('Registration done'); </script>";
                }
                else{
                    echo "<script> alert('Registration not done'); </script>";
                }
            }
            else{
                echo "<script> alert('password does not match'); </script>";
            }
        }

        // $sql = "INSERT INTO `useraccount` ( `username`, `email`, `number`, `password`) VALUES ('$username', '$email','$number','$password')";

        // if (mysqli_query($conn, $sql)) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        // }

    }

    // if($username == ""){
        
    //     echo "<script> alert('Enter username')</script>";
    // }


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

</head>

<body>
    <div class="container mt-5 mb-5 col-md-4 justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="registrationForm">
                    <h3 class="card-title mb-3 d-flex justify-content-center">Register</h3>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group form-floating d-flex">
                                <input class="form-control" type="text" id="name" placeholder="Name" name="username" required>
                                <label for="name">UserName</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group form-floating">
                                <input class="form-control" type="number" id="number" placeholder="Number"
                                    name="number" required>
                                <label for="number">Number</label>
                            </div>
                        </div>
                    </div>                                      

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
                                <input class="form-control pword" type="password" placeholder="Name" name="password" required>
                                <label for="name">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group form-floating">
                                <input class="form-control cpword" type="password" placeholder="Name" name="cpassword" required>
                                <label for="name">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                    <input type="submit" value="submit" name="submit" class="submitBtn">
                    </div>
                </form> 

                <div class="login">Already had an account ! <a href="mainLogin.php">Login</a></div>
            </div>
        </div>
    </div>


    <!-- <script>
    console.log("hii");

    function ValidateForm(){

        console.log("hi")
        // e.preventDefault();
        let pword = document.querySelector(".pword").value;
        let cpword = document.querySelector(".cpword").value;
        let signUp = document.querySelector(".signUp");
        console.log(pword);
        console.log(cpword);
        // console.log(e);
        if(pword !== cpword){
            alert("Password and Confirm Pasword does not match");
            return ;
        }

        document.getElementById('registrationForm').submit();
    }



    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>