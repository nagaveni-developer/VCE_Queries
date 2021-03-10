<?php
    session_start();
    include("connect.php");
    if(! isset($_SESSION['user']))
        header("Location: login.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title> VCE Queries </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link rel="icon" href="images/icon1.png" >
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
    </head>
    <body id="pro">
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
            <a href="ask.php"><li>Ask Question</li></a>
	    <a href="all.php"><li>All Posts</li></a>
            <a href="profile.php"><li id="home">Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
        </ul>

        <!-- content -->
        <div id="content">


            <h1 id="hea"><?php echo "Welcome ".$_SESSION["user"]; ?></h1>

            <div class="clearfix">
                <div id="hea-det">
		     <div id="s">
			 <div class ="prof_row">
                              <div class="prof_column">
                                   <div id="pic"></div>
                              </div>
			  <div class="prof_column">
                               <p id="first">N</p><p class="tit">ame: </p>
                               <p class="det"><?php echo $_SESSION["name"]; ?></p><br>
                               <p id="first">E</p><p class="tit">mail: </p>
                    		<p class="det"><?php echo $_SESSION["email"]; ?></p><br>
                    		<p id="first">Y</p><p class="tit">ear: </p>
                    		<p class="det"><?php echo $_SESSION["year"]; ?></p><br>

		                <p id="first">B</p><p class="tit">ranch: </p>
                	        <p class="det"><?php echo $_SESSION["branch"]; ?></p><br>
               			<p id="first">J</p><p class="tit">oin Date: </p>
                  		<p class="det"><?php echo $_SESSION["date"]; ?></p><br>
			   </div>
			</div><br>
			 <p id="first">N</p><p class="tit">otifications: </p><br>
       <form action="notifications.php" method="post">
       <input type="checkbox" name="check_list[]" value="CSE"><label>CSE</label><br/>
       <input type="checkbox" name="check_list[]" value="ECE"><label>ECE</label><br/>
       <input type="checkbox" name="check_list[]" value="IT"><label>IT</label><br/>
       <input type="checkbox" name="check_list[]" value="Mech"><label>Mech</label><br/>
       <input type="checkbox" name="check_list[]" value="Civil"><label>Civil</label><br/>
       <input type="checkbox" name="check_list[]" value="EEE"><label>EEE</label><br/>
       <input type="checkbox" name="check_list[]" value="Soft Skills"><label>Softskills</label><br/>
       <input type="checkbox" name="check_list[]" value="Placement"><label>Placements</label><br/>
<br>
              <div class="buttons" > <input name="submit" type="submit" value="Submit" class="up-in" ></div></a><br>
<br>
      </form>
                    <div class="question"><p id="first">Q</p><p class="tit">uestions Asked: </p><br></div><br>
                    <p class="det">
                    <?php
                    $p=$_SESSION["user"];
                    $query = "select question from quans where askedby='$p'";
                    $result = mysqli_query( $conn, $query);
                    if(mysqli_error($conn)){
                      echo "<script>window.alert('Something Went Wrong. Try Again');</script>";
                      }
                      else if( mysqli_num_rows($result) > 0 )
                      {
                        $count=1;
                        while( $row = mysqli_fetch_assoc($result) ){
                          echo $count.". ".$row['question']."\n";
			  echo "<br>";
                          $count=$count+1;
                        }
			echo "<br>";
                      }
                     ?>
                     </p>
                     <br>
                     <div class="question"><p id="first">Q</p><p class="tit">uestions Answered: </p><br></div><br>
                     <p class="det">
                     <?php
                     $p=$_SESSION["user"];
                     $query = "select question from quans where answeredby like '%$p%'";
                     $result = mysqli_query( $conn, $query);
                     if(mysqli_error($conn)){
                       echo "<script>window.alert('Something Went Wrong. Try Again');</script>";
                       }

                       else if( mysqli_num_rows($result) > 0 )
                       {
                         $count=1;
                         while( $row = mysqli_fetch_assoc($result) ){
                           echo $count.". ".$row['question']."\n";
			   echo "<br>";
                           $count=$count+1;
                         }
			echo "<br>";
                       }
                      ?>
                      </p>

                </div>
		</div>

            </div>

        </div>


        <!-- Footer -->
        <div id="footer">
            &copy; 2020 &bull;VCE Queries.
        </div>

    </body>

</html>
