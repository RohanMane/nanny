<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>LOGIN</title>

    <!-- External CSS  -->
    <link rel="stylesheet" href="elogin.css">

    <!-- External JS -->
    <script src = "login.js"></script>

    
</head>

<body>


<!-- PHP BEGINS -->
<?php

$login = false;
$showError = false;


if ($_SERVER['REQUEST_METHOD']=='POST'){
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    
    //Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rohan";


    // Create a connection 
    $conn = MySqLi_connect($servername,$username,$password,$database);

    $sql = "Select * from enanny where username='$uname' AND password='$pass' ";

    $result = MySqli_query($conn,$sql);

    $num = MySqli_num_rows($result);

    if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$uname;
        header("location:ewelcome.php");

    }

    else{
        $showError = "INVALID CREDENTIALS";
    }

    
    
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your details are successfully logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    
    
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>INVALID CREDENTIALS</strong> Please enter the correct details.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }


    //No field should remain empty
    if ($uname == "" || $pass == "") {
?>
        <script>
            alert('FILL IN THE DETAILS');
        </script>
<?php

    }

} 

?>

<!-- PHP ENDS -->


    <!-- Background Image -->

    <Body style="background-position: center; background-repeat: no-repeat; background-size: cover;"
        background="./images/nanny3.jpg"></Body>

    <div class="container my-4">

        <!-- Heading of the Page -->
        <h1 class="text-center">WELCOME TO OUR MAMA-CARE</h1>

        <!-- Paragraph of the Page --> 
        <p>FIND THE BEST NANNY JOBS IN NO TIME</p>

        <!-- Form of the Page -->
        <form action="./elogin.php" method="post">
            <div class="form-group">

                <!-- Username -->
                <div class="container1">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>

                <!-- Password -->
                <div class="container2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="password">
                </div>

                <div class="container1">
                    <label><input type="checkbox" onclick="myFunction()">  Show Password</label>
                </div>

                <button style="width: 50%;" class="btn btn-primary" id="b1">Login</button>

            </div>

        </form>

            <a href="./eregister.php"><button style="width: 50%;" class="btn btn-primary" id="b2">Register</button></a>

            <a href="./first.php"><button style="width: 50%; margin-top: 50px;" class="btn btn-primary" id="b3">Back</button></a>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


</body>

</html>