<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:elogin.php");
    exit;
}

?>
<!-- PHP ENDS -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NANNY SEARCH</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
    <!-- External CSS -->
    <link rel="stylesheet" href="welcome.css">

</head>
<body>




    <!-- Background Image -->
    <Body style="background-position: center; background-repeat: no-repeat; background-size: cover;"
        background="./images/nanny8.jpg"></Body>


<div class="heading">
    <!-- First Heading -->
    <h1> WELCOME - <?php echo $_SESSION['username']?> </h1>

    <h2> FIND THE BEST NANNY JOBS FOR YOU </h2>
</div>

<form action="" method="POST" enctype="multipart/form-data">
        <table width="100%"  cellpaddding="5" cellspacing="20"  style = "background-color:aqua;color:crimson;text-align: center;">
            <thead>
                <tr>
                    <th> SR NO </th>
                    <th> NAME </th>
                    <th> LOCALITY </th>
                    <th> EMAIL-ID </th>
                    <th> CONTACT 1 </th>
                    <th> CONTACT 2 </th>
                    <th> SKILLS REQURED </th>

                </tr>
            </thead>
            <?php

            //Connecting to the Database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "rohan";

            $conn = MySqLi_connect($servername,$username,$password,$database);

            $sql = "SELECT * FROM `nanny` ";
    
            $result = MySqli_query($conn, $sql);   

            $i = 0;
            while($row = MySqLi_fetch_array($result) )
            {
                $i = $i + 1;
                ?>
                
                <div class="container">
                    <tr>
                        <td> <?php echo $i ?> </td>
                        <td> <?php echo $row['name']; ?> </td>
                        <td> <?php echo $row['locality']; ?> </td>
                        <td> <?php echo $row['username']; ?> </td>
                        <td> <?php echo $row['contact1']; ?> </td>
                        <td> <?php echo $row['contact2']; ?> </td>
                        <td> <?php echo $row['skillsrequired']; ?> </td>
                    </tr>
                </div> 

                <?php
            }

            ?>
        </table>
    </form>

    
    <!-- Button Edit -->
    <a href="./eupdate.php"><button style="width: 50%;margin-top: 40px;margin-left: 320px" class="btn btn-primary" id="b2">Edit Profile</button></a>

    <!-- Button Back -->
    <a href="./elogin.php"><button style="width: 50%;margin-top: 40px;margin-left: 320px" class="btn btn-primary" id="b1">Back</button></a>

</body>
</html>