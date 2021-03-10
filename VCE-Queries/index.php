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
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            textarea{
                display: none;
                width: 300px;
                height: 50px;
                background: #333;
                color: #ffffff;
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
                margin: 151.5px auto;
                font-size: 12px;
            }
        </style>
    </head>
    <body id="_1">
         <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">i</div><div id="cir">.</div><div id="ntro">VCE Queries</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li id="home">Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
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
            <div id="searchbox">
		    <div class="scroll"><marquee  id= "scroll" behavior="scroll" direction="left"><b>VCE Queries : As a student, daily many questions strike our mind.
                                                            Many of us try a lot to find answers.
                                                            Don't worry, we are with you to help you connect with VCE.
                                                            Entire college is with you now, to help you out.
                                                            Atleast one from entire college will surely help you...!!
			    Then why late go ahead...!!</b></marquee></div>
                <center>
                    <div class="heading">
                        <h1 class="logo"><div id="i">i</div><div id="cir"> .</div><div id="ntro">VCE Queries</div></h1>
                        <p id="tag-line">Ask Clarify Explore</p>
                    </div>
                    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data" >
                        <input name="text" id="search"  type="text" title="Question your Answers" placeholder="Looking for Answers to Some Question, simply just search here... ">
                        <i class="material-icons" id="sign">search</i>
                        <input name="submit" type="submit" value="Search" class="up-in" id="qsearch">
                    </form>
                </center>
            </div>
           <div class="home_row">
                 <div class="home_column">
                       <div class="card">
                     <center>
			     <h3 style="color:#F5F294;"><b>Ask</b></h3>
                     <p style="color:white;"><b>Do you have lots of questions in your mind. <br>Don’t know whom to ask. <br>Even Google didn’t give you exact results.<br> waiting for someone to clarify your doubts.<br> Then why late, post your queries in this forum.
					</b></p>
                    </center>
		      </div>
                 </div>
                 <div class="home_column">
                        <div class="card">
                       <center>
			       <h3 style="color:#F5F294;"><b>Clarify</b></h3>
                       <p style="color:white;"><b>Once you post your query, within minutes <br>your query will be answered.<br> And we help you move forward in your path. <br>Entire VCE is with you.
			       </b></p><br>
                      </center>
                        </div>
                </div>
                 <div class="home_column">
		 <div class="card">
                 <center>
			 <h3 style="color:#F5F294;"><b>Explore</b></h3>
                     <p style="color:white;"><b>Posted query, got clarified then what next start exploring more. We are here to help in getting queries solved.
			     </b></p><br><br>
                 </center>
		 </div>
                 </div>
                </div>
            <div class="pop" id="ta">
                <h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:(</b>Sorry, Your search didn't match any documents.</h1>
            </div>
            <div class="pop" id="tb">
                <center><h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:)</b>Thank You For Your Answer.</h1></center>
            </div>
            <?php

                if(isset($_POST["submit"])) {
                    function valid($data){
                        $data = trim(stripslashes(htmlspecialchars($data)));
                        return $data;
                    }

                    function check($data){
                        $data = strtolower($data);
                        if( $data != "what" && $data != "how" && $data != "who" && $data != "whom" && $data != "when" && $data != "why" && $data != "which" && $data != "where" && $data != "whose" && $data != "is" && $data != "am" && $data != "are" && $data != "do" && $data != "don't" && $data != "does" && $data != "did" && $data != "done" && $data != "was" && $data != "were" && $data != "has" && $data != "have" && $data != "will" && $data != "shall" && $data != "the" && $data != "i" && $data != "a" && $data != "an" && $data != "we" && $data != "he" && $data != "she" && $data != "")
                            return 1;
                        return 0;
                    }
                    $text = valid($_POST["text"]);
                    if($text == NULL){
                        echo "<script>window.alert('Please Enter something to search.');</script>";
                    }
                    else{
                        $text = preg_replace("/[^A-Za-z0-9]/"," ",$text);
                        $words = explode(" ",$text);
                        $format = "select * from quans where question like '%";
                        $query = "";
                        foreach($words as $word){
                            if(check($word)){
                                if($query == "")
                                    $query = $format.$word."%'";
                                else
                                    $query .= " union ".$format.$word."%'";
                            }
                        }
                        if(!$query){
                            echo "<script>window.alert('Search appropriate question.');</script>";
                        }
                        else{
                            $r = mysqli_query($conn, $query);
                            if(mysqli_error($conn))
                                echo "<script>window.alert('Some Error Occured. Try Again or Contact Us.');</script>";
                            else if(mysqli_num_rows($r)>0) {
            ?>
                <style>.open{display: block;} </style>
                <center>
                    <div class='open' style='height: auto; margin: 60px auto -135px;'>

                        <div id='topic'>
                            <h2 id='topic-head' style="font-weight: normal; border:none; font-size: 22px;">Your Search Results for '<?php echo $text; ?>' are :</h2>
                        </div>

            <?php $n = 1; $nul=0; while( $row = mysqli_fetch_assoc($r) ) { ?>

                        <div id="qa-block">
                            <div class="question">
                                <div id="Q">Q.</div><?php echo $row["question"]."<br><small id='sml'>Asked By: @".$row['askedby']."</small>"; ?>
                            </div>
                            <div class="answer">
                                <?php
                                    if($row["answer"]){
                                        $nul=0;
                                        echo $row["answer"]."<br><small id='ans'>Answered By: @".$row['answeredby']."</small>";
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
                                             $trows = $tutorial->get_rows($row["id"]);
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
                                    <input style="display: none;" name="question" value="<?php echo $row['question'] ?>">
                                    <input style="display: none;" name="nul" value="<?php echo $nul ?>">
                                    <input style="display: none;" name="preby" value="<?php echo $row['answeredby'] ?>">
                                    <br>
                                    <input type="submit" name="ansubmit" value="Submit" class="up-in ans_sub" id="ar<?php echo $n; ?>">

                                </form>


                            </div>
                        </div>
                            <?php $n++; } ?>
                    </div>
                </center>
            <?php
                        } // if for no. of rows
                        else{
                            echo "<style>#searchbox{display: none;} #ta{display: block;}</style>";
                        }
                        }
                    } // a non null if
                } // isset for submit
            ?>
        </div>
        <!-- Footer -->
        <div id="footer">
            &copy; 2020 &bull; VCE Queries.<br><br>
            <!-- LikeBtn.com BEGIN -->
<span class="likebtn-wrapper" data-theme="custom" data-identifier="item_1"></span>
<script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
<!-- LikeBtn.com END -->
        </div>

    </body>

</html>
