<?php


if(isset($_POST['sunmit']) && $_POST['g-recaptcha-response'] != ""){
    //Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rohan";

    // Create a connection 
    $conn = MySqLi_connect($servername,$username,$password,$database);

    if(!$conn){
        die('Could not Connect MySql Server:'.mysql_error());
    }

    $secret = '6LeUqEscAAAAAGncuiwA8L5R5WNpI_P_lNfcsGYl';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success){
        $name = $_POST['name'];
        $locality = $_POST['locality'];
        $contact1 = $_POST['contact1'];
        $contact2 = $_POST['contact2'];
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $sql = "INSERT INTO `nanny` (`name`, `locality`, `contact1`, `contact2`, `username`, `password`, `cpassword`) VALUES ('$name', '$locality', '$contact1', '$contact2', '$uname', '$pass', '$cpassword')";
        $result = MySqli_query($conn, $sql);
    }
    else{
        echo "NOT THERE YET ROHAN";
    }

}

?>