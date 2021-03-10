<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> VCE Queries </title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
    </head>
    <body id="_4">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                        <div id="i">i</div><div id="cir">.</div><div id="ntro">VCE Queries</div>
                    </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="contacts.php"><li id="home">Contact</li></a>
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
        <div id="content" class="clearfix">

            <div id="box-1">
                <div class="heading">
                    <center>
                    <h1 class="logo"><div id="i">i</div><div id="cir">.</div><div id="ntro">VCE Queries</div></h1>
                    <p id="tag-line">Ask Clarify Explore</p>
                    </center>
                </div>
            </div>
            <div id="box-2">
                <div id="text">
                    <h1>Contact us:</h1>
                    <p>
                        vcequeries82@gmail.com<br></p>
                 </div>
            </div>
           </div>
            <div class="button-block">
                <center>

                 <a id="sug-button" href="#pop" ><div class="buttons" > <input name="submit" type="submit" value="Suggestions" class="up-in" ></div></a><br>
<form  action="suggestions.php" method="post">
                 <div id="pop">

                        <a id="sug-close" href="#">X</a>
                          <textarea style="width:40vw;" name="data"></textarea>
                      <div class="buttons" >

                          <input name="submit" type="submit" value="Submit" class="up-in" > </div>
                        </form>

                 </div>
                </center>

             </div>

        <!-- Footer -->
        <div id="footer">
            &copy; 2020 &bull; VCE Queries.
        </div>

    </body>

</html>
