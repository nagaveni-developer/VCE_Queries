<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
    session_start();
    include('connect.php');
        if(isset($_POST["ansubmit"])){
          if(! isset($_SESSION['user']))
          {
                echo "<script>window.alert('Please Login to submit your answer. Redirecting to login page');</script>";
              header( "Refresh:0; url=login.php", true, 303);

          }
          else {


        function valid($data){
            $data = trim(stripslashes(htmlspecialchars($data)));
            return $data;
        }
        $answer = valid($_POST["answer"]);
        $remove[]="'";
        $remove[]='"';
        $answer=str_replace($remove,"",$answer);
        //echo $answer;
        if($answer == NULL){
            echo "<script>window.alert('Please Enter something.');</script>";
        }
        else{
            $que = "";
            if($_POST["nul"]==0){
                if(strpos($_POST["preby"],$_SESSION["user"]) === false)
                    $que = "update quans set answer=CONCAT(answer,'<br>or<br>".$answer."'), answeredby=CONCAT(answeredby,', @ ".$_SESSION["user"]."') where question like '%".$_POST["question"]."%'";
                else
                    $que = "update quans set answer=CONCAT(answer,'<br>or<br>".$answer."'), answeredby = '".$_SESSION["user"]."' where question like '%".$_POST["question"]."%'";
            }
            else
                $que = "update quans set answer='".$answer."', answeredby = '".$_SESSION["user"]."' where question like '%".$_POST["question"]."%'";
            if(mysqli_query($conn,$que))
            {
                echo "<style>#searchbox{display: none;} #tb{display: block;}</style>";
                  $format = "SELECT askedby from quans where question like '%".$_POST["question"]."%'";
                  $r = $conn->query($format);
                  if(mysqli_error($conn))
                        echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                  else {
                    $row = mysqli_fetch_assoc($r);
                    $format = "SELECT username,email from users where username like '%".$row["askedby"]."%'";
                    $r = $conn->query($format);
                    if(mysqli_error($conn))
                          echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                    else
                    {
                      $row = mysqli_fetch_assoc($r);
                      require_once 'mailer/class.phpmailer.php';


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
                                                            $mail->Body    = "Hello ".$row["username"].", there is a new answer posted in forum for your question: ".$_POST["question"].". Please visit https://vcequeries.ml/";
                                                            //$mail->AltBody    = $txt;

                                                            if($mail->Send())
                                                            {

                                                             $msg ="Stay tuned!";
                                                             // echo $msg;
                                                             // #echo "<script>alert(mail sent)</script>";
                                                             alert($msg);


                                                            }
                                                            else {
                                                              echo "Mail not sent";
                                                              alert("Something went wrong");
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
            else
                echo mysqli_error($conn);


        }
      }
    }
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Sripts -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <style>
            textarea{
                display: none;
                width: 300px;
                height: 50px;
                background: #333;
                color: #ddd;
                padding: 10px;
                margin: 5px 0 -14px;
            }
            .ans_sub{
                display: none;
                padding: 0 10px;
                height: 30px;
                line-height: 30px;
            }
            .pop{
                display: none;
                text-align: center;
                margin: 195.5px auto;
                font-size: 12px;
            }
        </style>
    </head>
    <body id="_3">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">.</div><div id="ntro">VCE Queries</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li id="home">Categories</li></a>
            <a href="contacts.php"><li>Contact</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="all.php"><li>All Posts</li></a>
            <?php
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>

        <!-- content -->
        <div id="content">
            <h4>
                <a id="title-head" href="categories.php">Categories</a>
            </h4>
            <div id="box0">
                <center>
                    <a id="ada" href="#box1">
                        <div id="algo" class="img">
                            <div id="p" title="Open">Computer Science</div>
                        </div>
                    </a>
                    <a id="cso" href="#box2">
                        <div id="archi" class="img">
                            <div id="p" title="Open">Electronics</div>
                        </div>
                    </a>
                    <a id="t" href="#box3">
                        <div id="toc" class="img">
                            <div id="p" title="Open">Electrical</div>
                        </div>
                    </a>

                </center>
                <center>
	             <a id="db" href="#box4">
                        <div id="database" class="img">
                            <div id="p" title="Open">Civil</div>
                        </div>
                    </a>
                    <a id="pqt" href="#box5">
                        <div id="prob" class="img">
                            <div id="p" title="Open">Mechanical</div>
                        </div>
                    </a>
                    <a id="se" href="#box6">
                        <div id="soft" class="img">
                            <div id="p" title="Open">Information Technology</div>
                        </div>
                    </a>
		    </center>
		    <center>
                    <a id="ss" href="#box7">
                        <div id="skills" class="img">
                            <div id="p" title="Open">Soft Skills</div>
                        </div>
                    </a>
      		    <a id="pl" href="#box8">
                        <div id="place" class="img">
                            <div id="p" title="Open">Placements</div>
                        </div>
                    </a>
			<a id="ot" href="#box9">
                        <div id="others" class="img">
                            <div id="p" title="Open">Others</div>
                        </div>
                    </a>
                </center>
            </div>

            <div class="pop" id="tb">
                <center><h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:)</b>Thank You For Your Answer.</h1></center>
            </div>
            <center>
                <?php
                    $no = 1;
                    $n = 1;
                    $nul=0;
                    while($no < 10){
                ?>
                <div id="box<?php echo $no; ?>" class="open" style='height: auto; margin: 60px auto -135px;'>
                    <a href=""><div id="close">X</div></a>
                    <div id="topic">
                        <?php
                            echo "<h2 id='topic-head'>";
                            $q = 'select name, description from category where id='.$no;
                            $r = mysqli_query($conn,$q);

                            $d = mysqli_fetch_assoc($r);
                            echo $d['name'].'</h2><p id="topic-desc">'.$d['description']."<br>Explore our home page for more questions.</p>";
                        ?>
                    </div>

                    <center>
                        <?php
                            $qu = "select q.id, q.question, q.answer, q.askedby, q.answeredby from quans as q, quacat as r, category as c where q.id=r.id and r.category=c.name and c.id='$no'";
                            $re = mysqli_query($conn,$qu);
                            while($da = mysqli_fetch_assoc($re)){
                        ?>
                        <div id="qa-block">
                            <div class="question">
                                <div id="Q">Q.</div>
                                <?php echo $da['question']."<small id='sml'>Asked By: @".$da['askedby']."</small>"; ?>
                            </div>
                            <div class="answer">
                                <?php
                                    if($da["answer"]){
                                        $nul=0;
                                        echo $da["answer"]."<br><small id='ans'>Answered By: @".$da['answeredby']."</small>";
                                    }
                                    else{
                                        $nul=1;
                                        echo "<em>*** Not Answered Yet ***</em>";
                                    }
                                ?>

                                <?php
                                include_once("like_class.php");
                                $tutorial = new like_class();

                                //get tutorials data from database
                                $trows = $tutorial->get_rows($da["id"]);
                                ?>

                                <script type="text/javascript" src="js/jquery.js"></script>
                                <script type="text/javascript">
                                /**
                                * Function Name: cwRating()
                                * Function Author: semicolonworld
                                * Description: cwRating() function is used for implement the rating system. cwRating() function insert like or dislike data into the database and display the rating count at the target div.
                                * id = Unique ID, like or dislike is based on this ID.
                                * type = Use 1 for like and 0 for dislike.
                                * target = Target div ID where the total number of likes or dislikes will display.
                                **/
                                function cwRating(id,type,target){
                                    $.ajax({
                                        type:'POST',
                                        url:'rating.php',
                                        data:'id='+id+'&type='+type,
                                        success:function(msg){
                                            if(msg == 'err'){
                                                alert('Some problem occured, please try again.');
                                            }else{
                                                $('#'+target).html(msg);
                                            }
                                        }
                                    });
                                }
                                </script>

                                <!-- Tutorials listing -->

                                    <div class="thumbnail">
                                        <!-- <img src="<?php //echo 'images/'.$trow['image']; ?>" alt="" /> -->
                                        <!-- <div class="caption">
                                            <h4><a href="javascript:void(0);"><?php// echo $trow['title']; ?></a></h4>
                                            <p><?php //echo $trow['details']; ?></p>
                                        </div> -->
                                        <div class="ratings">
                                            <p class="pull-right"></p>
                                            <p>
                                                <!-- Like Icon HTML -->
                                                <span class="glyphicon glyphicon-thumbs-up" onClick="cwRating(<?php echo $trows['id']; ?>,1,'like_count<?php echo $trows['id']; ?>')"></span>&nbsp;
                                                <!-- Like Counter -->
                                                <span class="counter" id="like_count<?php echo $trows['id']; ?>"><?php echo $trows['likes']; ?></span>&nbsp;&nbsp;&nbsp;

                                            </p>
                                        </div>
                                    </div>


                                <form id="f<?php echo $n; ?>" style="margin-bottom: -25px;" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
<!--                                    <input type="button" value="Click here to answer." id="ans_b" >-->
                                    <label style="margin-bottom: -25px;"><a id="ans_b<?php echo $n; ?>" href="#area<?php echo $no; ?>"><u style="color:green;">Submit your answer</u></a></label>
                                    <br>
                                    <script>
                                        $(function(){
                                            $('#ans_b<?php echo $n; ?>').click(function(e){
                                                e.preventDefault();
                                                $('#area<?php echo $n; ?>').css("display","block");
                                                $('#ar<?php echo $n; ?>').css("display","block");
                                                $('#f<?php echo $n; ?>').css("margin-bottom","0px");
                                            });
                                        });
                                    </script>
                                    <textarea id="area<?php echo $n; ?>" name="answer" placeholder="Your Answer..."></textarea>
                                    <input style="display: none;" name="question" value="<?php echo $da['question'] ?>">
                                    <input style="display: none;" name="nul" value="<?php echo $nul ?>">
                                    <input style="display: none;" name="preby" value="<?php echo $da['answeredby'] ?>">
                                    <br>
                                    <input type="submit" name="ansubmit" value="Submit" class="up-in ans_sub" id="ar<?php echo $n; ?>">

                                </form>



                            </div>
                        </div>
                        <?php $n++; } ?>
                    </center>

                </div><!-- box1 -->
                <?php
                    $no++;
                }
                ?>
            </center>

        </div><!-- content -->

        <!-- Footer -->
        <div id="footer">
            &copy; 2020 &bull; VCE Queries.
        </div>


    </body>

</html>
