<?php
session_start();
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (isset($_POST["submit"])) {
  if (isset($_SESSION["user"])) {

    require_once 'mailer/class.phpmailer.php';

     try
        {
          $mail = new PHPMailer(true);
          $username=$_SESSION["user"];
          $email=$_SESSION["email"];
          $txt="Thank you ".$username.". Your respose has been recored. Our team will reach you soon";
         $mail->IsSMTP();
         $mail->isHTML(true);
         $mail->SMTPDebug  = 0;
         $mail->SMTPAuth   = true;
         $mail->SMTPSecure = "ssl";
         $mail->Host       = "smtp.gmail.com";
         $mail->Port        = '465';
         $mail->AddAddress($email);
         $mail->Username   ="vcequeries82@gmail.com";
         $mail->Password   ="VceQueries@123";
         $mail->SetFrom('vcequeries82@gmail.com','VCE Discussion forums team');
         $mail->AddReplyTo('vcequeries82@gmail.com','VCE Discussions forums team');
         $mail->Subject    = "VCE Forum Team";
         $mail->Body    = $txt;
         //$mail->AltBody    = $txt;

         //acknowldge mail to user
         if($mail->Send())
         {

          $msg = "Thank you ".$username.". Your respose has been recored.";
          //echo $msg;
          alert($msg);
        }
         else {
           alert("Something Went wrong please try again");
           //echo "Something Went wrong please try again";
         }


         $mail = new PHPMailer(true);
         $mail->IsSMTP();
         $mail->isHTML(true);
         $mail->SMTPDebug  = 0;
         $mail->SMTPAuth   = true;
         $mail->SMTPSecure = "ssl";
         $mail->Host       = "smtp.gmail.com";
         $mail->Port        = '465';
         //mail to admin from users
         $txt=$username." has an issue or a suggestion regarding website. Which is as follows :\n".$_POST["data"];
         $email="vcequeries82@gmail.com";
         $mail->AddAddress($email);
         $mail->Username   ="vcequeries82@gmail.com";
         $mail->Password   ="VceQueries@123";
         $mail->SetFrom($_SESSION["email"],'USER');
         $mail->AddReplyTo($_SESSION["email"],$_SESSION["user"]);
         $mail->Subject    = "MAIL from ".$_SESSION["user"];
         $mail->Body    = $txt;
           if($mail->Send())
           {
            $msg = "Thank you ".$username.". mail sent to admins.";
            alert($msg);
            //echo $msg;
           }
           else {
             alert("Something Went wrong please try again");
             //echo "Something Went wrong please try again";
           }


        }
        catch(phpmailerException $ex)
        {
         $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
         alert($msg);
        }



        header( "Refresh:0; url=contacts.php", true, 303);


  }
  else {
    echo "<script>window.alert('Please Login to submit your Suggestion/Issue. Redirecting to login page');</script>";
    header( "Refresh:0; url=login.php", true, 303);
  }
  // code...
} ?>
