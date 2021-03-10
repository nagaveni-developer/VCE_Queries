<?php
session_start();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
include('connect.php');
if( isset( $_POST["submit"] ) )
{

  $myfile = fopen("auth.txt", "r") or die("Unable to open file!");
  $rand=trim(fgets($myfile));
  $otp=$_POST["otp"];
  if (strcmp($rand,$otp)==0) {
    $username=trim(fgets($myfile));
    $password=trim(fgets($myfile));
    $year=trim(fgets($myfile));
    $branch=trim(fgets($myfile));
    $name=trim(fgets($myfile));
    $email=trim(fgets($myfile));
//resolved login issue
    $query = "INSERT INTO users values( NULL, '$username', '$password','$year','$branch', '$name', '$email', CURRENT_TIMESTAMP,NULL )";
        if(mysqli_error($conn)){
            echo "<script>window.alert('Something Goes Wrong. Try Again');</script>";
        }
//                echo $query;
        else if( mysqli_query( $conn, $query) ){
            alert("verification Successful");
            header( "Refresh:0; url=index.php", true, 303);
        }
        else{
//                    echo mysqli_error($conn);
            echo "<script>window.alert('Username Already Exist !! Try Again');</script>";
        }
        mysqli_close($conn);
  }
  else {

    alert("verification unsuccessful OTP invalid");
    header( "Refresh:0; url=index.php", true, 303);
  }
  fclose($myfile);

}
 ?>
