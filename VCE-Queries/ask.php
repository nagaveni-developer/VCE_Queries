<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
require_once 'mailer/class.phpmailer.php';
 $mail = new PHPMailer(true);
    session_start();
    include('connect.php');
    if(!isset($_SESSION['user']))
        header("location: login.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> VCE Queries </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
    </head>
    <body id="ask">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">.</div><div id="ntro">VCE Queries</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="contacts.php"><li>Contact</li></a>

            <a href="ask.php"><li id="home">Ask Question</li></a>
	    <a href="all.php"><li>All Posts</li></a>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
        </ul>

        <!-- content -->
        <div id="content">
            <div id="sf">
                <center>
                    <div class="heading ask">
                        <h1 class="logo"><div id="i">i</div><div id="cir"> .</div><div id="ntro">VCE Queries</div></h1>
                        <p id="tag-line">ask clarify explore</p>
                    </div>

                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">

                        <input name="question" type="text" title="Your Question..." placeholder="Ask Your question on our Community for greatest user expereince..." id="question">

                        <select name="cat">
                            <option valus="Category">Category</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EEE</option>
                            <option value="Mech">MECH</option>
                            <option value="Civil">CIVIL</option>
                            <option value="IT">IT</option>
			    <option value="Soft Skills">Soft Skills</option>
			    <option value="Placements">Placements</option>
                            <option value="Others">Other</option>
                        </select>
                        <input name="submit" type="submit" class="up-in" id="ask_submit">
                    </form>
                </center>
            </div>
        </div>

        <div id="ask-ta">
            <h1>Thank You.<br>Stay tunned for updates.</h1>
        </div>

        <?php

            if( isset( $_POST["submit"] ) )
            {

                function valid($data){
                    $data=trim(stripslashes(htmlspecialchars($data)));
                    return $data;
                }
                $question = valid( $_POST["question"] );
                $remove[]="'";
                $remove[]='"';
                $question=str_replace($remove,"",$question);
                $no = valid( $_POST["cat"]);
                $question = addslashes($question);
                $q = "SELECT * FROM quans WHERE question = '$question'";
                $result = mysqli_query($conn,$q);
                if(mysqli_error($conn))
                    echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                else if( $no == "Category"){
                    echo "<script>window.alert('Choose a Category.');</script>";
                }
                else if( mysqli_num_rows($result) == 0 ){
                    $query = "INSERT INTO quans(id,question,answer,askedby,answeredby) VALUES(NULL, '$question', NULL,'".$_SESSION['user']."',NULL)";
                    $query1 = "INSERT INTO quacat SELECT q.id, c.name FROM quans as q, category as c WHERE q.question = '".$question."' AND c.name = '".$_POST['cat']."'";
                    mysqli_query( $conn, $query);
                    if(mysqli_query( $conn, $query1)){
                        echo "<style>#sf{display: none;} #ask-ta{display:block;}</style>";

                        $cat=$_POST['cat'];
                        $query = "SELECT username,email FROM users WHERE category like '%$cat%'";
                        $result = mysqli_query( $conn, $query);
                        if(mysqli_error($conn)){
                          echo "<script>window.alert('Something Went Wrong. Try Again');</script>";
                          }
                          else if( mysqli_num_rows($result) > 0 )
                          {

                            while( $row = mysqli_fetch_assoc($result) )
                            {
                              if ($row["username"]!=$_SESSION["user"])
                               {
                                 //echo $row["username"]." ".$row["email"]."\n";

                                 try
                                    {
                                      $mail = new PHPMailer(true);
                                      $email=$row["email"];
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
                                     $mail->AddReplyTo('vcequeries82@gmail.com','VCE Discussions forum team');
                                     $mail->Subject    = "VCE Forum Notifications";
                                     $mail->Body    = "Hello ".$row["username"].", there is a new question posted in category: ".$cat.".\nThe question is as follows : ".$question."\nPlease visit http://vcequeries.ml/";
                                     //$mail->AltBody    = $txt;

                                     if($mail->Send())
                                     {

                                      $msg ="Stay tuned!";
                                      // echo $msg;
                                      // #echo "<script>alert(mail sent)</script>";
                                      //alert($msg);


                                     }
                                     else {
                                       //echo "Mail not sent";
                                      // alert("Something went wrong");
                                       // code...
                                     }
                                    }
                                    catch(phpmailerException $ex)
                                    {
                                     $msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
                                     alert($msg);
                                    }




                              }

                            }
                    }
                    else{
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    }
                }
                else{
                    echo "<script>window.alert('Question was already Asked. Search it on Home Page.');</script>";
                }

                mysqli_close($conn);
            }
          }
    ?>

        <!-- Footer -->
        <div id="footer" style="padding:30px;">
            &copy; 2020 &bull; VCE Queries.
        </div>

        <!-- Sripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-3.2.1.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/script.js"></script>

    </body>

</html>
