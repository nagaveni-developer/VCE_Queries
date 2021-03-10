<?php
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
    session_start();
    include("connect.php");
    if(  (!isset($_SESSION['user']))  && (!isset($_GET["user"])))
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


          <center>  <h1 id="hea"><?php echo "Welcome ".$_SESSION["user"]; ?></h1></center>

            <div class="clearfix">
                <div id="hea-det">
		     <div id="s">
			 <div class ="prof_row">
                              <div class="prof_col_l">
                                   <div id="pic"></div>
                              </div>
			  <div class="prof_col_r">
<?php
$name=trim(rtrim($_GET["each"],','));
$query = "select * from users where username like '%$name%'";
$result = mysqli_query( $conn, $query);
if(mysqli_error($conn)){
  echo "<script>window.alert('Something Went Wrong. Try Again');</script>";
  }

  else if( mysqli_num_rows($result) > 0 )
  {

    $row = mysqli_fetch_assoc($result);

}
else {
  echo "<script>window.alert('Something Went Wrong. Try Again');</script>";
  //header("Location: index.php");
}
 ?>


                               <p id="first">N</p><p class="tit">ame: </p>
                               <p class="det"><?php echo $name; ?></p><br>
                               <p id="first">E</p><p class="tit">mail: </p>
                    		<p class="det"><?php echo $row["email"]; ?></p><br>
                    		<p id="first">Y</p><p class="tit">ear: </p>
                    		<p class="det"><?php echo $row["year"]; ?></p><br>

		                <p id="first">B</p><p class="tit">ranch: </p>
                	        <p class="det"><?php echo $row["branch"]; ?></p><br>
               			<p id="first">J</p><p class="tit">oin Date: </p>
                  		<p class="det"><?php echo $row["join_date"]; ?></p><br>
			   </div>
			</div><br>
                    <div class="question"><p id="first">Q</p><p class="tit">uestions Asked: </p><br></div><br>
                    <p class="det">
                    <?php
                    $p=$name;
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
