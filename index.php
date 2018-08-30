<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="script.js"></script>

        <link rel="shortcut icon" type="image/png" href="img/favicon2.png">
        
        <title>GOTAXI | Your traveling companion</title>
    </head>
    <body>
        <header class="header">
           <a id="home"></a>
            <div class="header__logo-box">
                <a href="/Trial/"><img src="img/favicon2.png" alt="logo" class="header__logo"></a>
            </div>


            <?php
              if(isset($_SESSION['adminlogged'])) {   //check if admin logged in
                  echo '<a href="includes/logout.inc.php" class="btn btn--white btn--animated header-btn-1"><p class="log-btn">LogOut</p></a>';

                  echo '<a href="#" class="btn btn--white btn--animated header-btn-1"><p class="log-btn">Admin</p></a>';
                  echo '<a href=panel.php class="btn btn--white btn--animated header-btn-1"><p class="log-btn">Options</p></a>';


              }else{
                if(isset($_SESSION['username'])) {   //check if user logged in
                echo '<a href="#" class="btn btn--white btn--animated header-btn-1"><p class="log-btn">'.$_SESSION['username'].'</p></a>';
                echo '<a href="includes/logout.inc.php" class="btn btn--white btn--animated header-btn-1"><p class="log-btn">LogOut</p></a>';

              }else{
                if(isset($_SESSION['usersigned'])){   //check if user signed in
                echo '<div>' . $_SESSION['usersigned'] . '</div>';
                echo '<script> alert("User SignedUp Successfully! Please Login! "); </script>';
                session_unset();
                session_destroy(); // user signup sessions destroyed 

                echo '<a href="#" class="btn btn--white btn--animated header-btn-1" onclick="document.getElementById(\'id02\').style.display=\'block\'"><p class="log-btn">Login</p></a>';
                }else{
                  echo '<a href="#" class="btn btn--white btn--animated header-btn-1" onclick="document.getElementById(\'id01\').style.display=\'block\'"><p class="log-btn">Sign up</p></a>';

                  echo '<a href="#" class="btn btn--white btn--animated header-btn-1" onclick="document.getElementById(\'id02\').style.display=\'block\'"><p class="log-btn">Login</p></a>';
                }
              }
              }
              
              
            ?>
            
            <div class="header__text-box">
                <h1 class="heading-primary">
                <span class="heading-primary--main"><span class="go">GO</span>TAXI</span>
                <span class="heading-primary--sub">Your traveling companion</span>
                </h1>
                <?php     //if anyone hasn't logged, it shows a alert when user tries to book a ride
                  if (isset($_SESSION['username']) || isset($_SESSION['adminlogged']) ) {   
                    echo '<a href="booking.php" class="btn btn--white btn--animated">Book your ride!</a>';
                  }else{
                    echo '<a onclick="alertpopup()" href="#" class="btn btn--white btn--animated" >Book your ride!</a>';

                  }
                ?>  
                
                
            </div>
            
            
        </header>
        <?php
          if (isset($_SESSION['username']) || isset($_SESSION['adminlogged'])) {
            include_once 'sections.php';        // if a user or admin logged in show this. 
          }
        ?>
        
          
        
        
<div id="id07" class="modal cu" style="text-align:center;">
  <span onclick="document.getElementById('id07').style.display='none'" 
   class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  
  <div class="container-cu">         <!--  contact us form -->
  <div style="text-align:center;">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row-cu">
    <div class="column-cu">
      <div id="map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d962.0363720001681!2d79.86059707412099!3d6.901995942721271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25963120b1509%3A0x2db2c18a68712863!2sUniversity+of+Colombo+School+of+Computing+(UCSC)!5e0!3m2!1sen!2slk!4v1531653969866" style="width: 100%; border:5px solid white ; height:30rem;" allowfullscreen></iframe></div>
    </div>
    <div class="column-cu">
      <form action="/Trial/?contact=submited" method="POST">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="lanka">Sri Lanka</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
          <option value="australia">Australia</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit" >
      </form>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
  </div>
</div>
</div>      
        
        
        
        <!-- Button to open the modal -->

<!-- The Modal (contains the Sign Up form) -->
<?php
  include_once('signup.php');  //sign up form 
  include_once('login.php');   //login form
?>  
   

</body>
</html>

