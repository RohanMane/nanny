<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>REGISTRATION</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="eregister.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

<!-- PHP BEGINS   -->
<?php

//To not display warnings
error_reporting(0);
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $profile = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $name = $_POST['name'];
    $locality = $_POST['locality'];
    $contact1 = $_POST['contact1'];
    $contact2 = $_POST['contact2'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $cpassword = $_POST['cpassword'];


  
//Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "rohan";

// Create a connection 
$conn = MySqLi_connect($servername,$username,$password,$database);



if($pass == $cpassword && $profile != "" && $name != "" && $locality != "" && $contact1 != "" && $contact2 != "" && $experience != "" && $skills != ""  && $uname != "" && $pass != "" && $cpassword != ""){
    $sql = "INSERT INTO `enanny` (`profile`, `name`, `locality`, `contact1`, `contact2`, `experience`, `skills`, `username`, `password`, `cpassword`) VALUES ('$profile', '$name', '$locality', '$contact1', '$contact2', '$experience', '$skills', '$uname', '$pass', '$cpassword')";


$result = MySqli_query($conn, $sql);

if($result){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> Your details are successfully submitted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';


}
else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>OOPS!!!!</strong> Your details are not successfully submitted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

}

//No field should remain empty
if($profile == "" || $name == "" || $locality == "" || $contact1 == "" || $contact2 == "" || $experience == "" || $skills == "" || $uname == "" || $pass == "" || $cpassword == ""){
?>
    <script>
        alert('FILL IN THE DETAILS');
    </script>
<?php
}

//Password should be equal to confirm
if($pass != $cpassword){
?>
    <script>
        alert('PASSWORD MISMATCH');
    </script>
<?php
    
}

}

//Submit to data base
?>

<!-- PHP ENDS -->


    <!-- Background Image -->

    <Body style="background-position: center; background-repeat: no-repeat; background-size: cover;"
        background="./images/nanny2.jpg"></Body>

    <div class="container my-4">

        <!-- Heading of the Page -->
        <h1 class="text-center">REGISTRATION FORM</h1>

        <!-- Form of the Page -->
        <form action="./eregister.php" method="post" enctype="multipart/form-data">
            <div class="form-group">

                <!-- PROFILE PICTURE -->
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="name"
                        placeholder="Enter your full name">
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Locality</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="locality"
                        placeholder="Enter your address along with your apartment no.">
                </div>

                <br>

                <!-- Contact information -->
                <label for="formGroupExampleInput2" class="form-label">Contact no</label>
                <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Contact-1" maxlength=10 minlength=10 name="contact1" aria-label="First name" >
                    </div>
                    
                    <div class="col">
                      <input type="text" class="form-control" placeholder="Contact-2" maxlength=10 minlength=10 name="contact2" aria-label="Last name" >
                    </div>
                  </div>

                <br>

                <!-- Work Experience -->
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Work Experience</label>
                    <input type="number" class="form-control" id="formGroupExampleInput" name="experience"
                        placeholder="Enter your the amount of time in years">
                </div>

                <!-- Skills -->
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Skills</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="skills"
                        placeholder="Enter your skills">
                </div>

                

                <!-- Username -->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Username</label>
                    <input type="email" class="form-control" id="formGroupExampleInput2" name="username"
                        placeholder="Email-id">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" minlength="8" maxlength="15" name="password"
                        placeholder="Maximum length should be 8 to 15 characters">
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="formGroupExampleInput2" minlength="8" maxlength="15" name="cpassword"
                        placeholder="Make sure it is the same as your Password above">
                </div>

                    <!-- Captcha google -->
                    <div class="g-recaptcha" data-sitekey="6LeUqEscAAAAAFKGHptWcsA45aDq2YeU3Tmr_fRn"></div>


                    <!-- Button Register -->
                    <button style="width: 50%;" type="submit" name="submit" class="btn btn-primary" id="b2">Register</button>                    

            </div>

        </form>

        <!-- Button Back -->
        <a href="./elogin.php"><button style="width: 50%;" class="btn btn-primary" id="b1">Back</button></a>

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