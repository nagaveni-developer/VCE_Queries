<?php
session_start();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
include("connect.php");
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
  $data="";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
//echo $selected."</br>";
$data.=$selected.",";
}
//echo $data;
$user=$_SESSION["user"];
$query = "UPDATE users SET category ='$data' WHERE username ='$user'";
mysqli_query( $conn, $query);
if(mysqli_query( $conn, $query)){
    echo "<style>#sf{display: none;} #ask-ta{display:block;}</style>";
    alert("You will receive mails whenever questions related to these categories are asked");
    header( "Refresh:0; url=profile.php", true, 303);
}
else{
    echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
}
}
}
?>
