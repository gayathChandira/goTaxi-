<?php
  session_start();
  if(!isset($_SESSION['adminlogged'])  && !isset($_SESSION['username']) ){
        header("Location:http://localhost/Trial/");   //if someone try to access this page by address bar
    }                                                 //this will redirect them in main page.

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
        <header class="header" style=" clip-path: polygon(0 0, 100% 0, 100% 75% , 0 85%)">
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
                
            <!--    <a href="#" class="btn btn--white btn--animated">Book your ride!</a> -->
                
            </div>
            
            
        </header>
        
        
    <main>
       
<div class="container book" style="width: 80% ;text-align: center;"> <!--  book your ride form -->
  <form action="#" method="POST">

    <label for="fname">Your Location</label>
    <input type="text" id="fname" name="firstname" placeholder="Your location..">

    <label for="lname">Your Destination</label>
    <input type="text" id="lname" name="lastname" placeholder="Your destination..">

    <label for="type">Vehicle Type</label>
    <select id="type" name="type">
      <option value="australia">Car</option>
      <option value="canada">Tuk</option>
      <option value="usa">Van</option>
      <option value="usa">Bus</option>
      <option value="usa">Bike</option>
      <option value="usa">Nano</option>
      <option value="usa">Mini</option>
    </select>


    <input onclick="bookalert()" type="submit" value="Book" style="font-size: 1rem;font-weight: 400; width: 50%">

  </form>
</div>
       
       
       
        
    </main>
    <section class="bottom">   <!-- bottom bar of the page  -->
    <footer class="footer">
        <div class="footer-logo">
            <img src="img/favicon2.png" class="footer-logo-img">
            <h2 class="heading-primary">
            <span class="heading-primary--main"><span class="go">GO</span>TAXI</span>
            </h2>
        </div>
        
        <div class="row">
            <div class="cols">
                <div class="footer-nav">
                    <ul class="footer-list">
                        <li class="footer-item"><a href="#home" class="footer-link">HOME</a></li>
                        <li class="footer-item"><a href="#options" class="footer-link">OPTIONS</a></li>
                        <li class="footer-item"><a href="#tours" class="footer-link">PACKAGES</a></li>
                        <li class="footer-item"><a href="help.php" class="footer-link">HELP</a></li>
                        <li class="footer-item"><a href="#" class="footer-link" onclick="document.getElementById('id03').style.display='block'">CONTACT US</a></li>
                        
                    </ul>
                </div>
            </div>
            
            
            <div class="cols">
                <p class="footer-copyright right">
                    Copyright &copy; Himansa Gayath Dineesha Reshani 
                </p>
            </div>
        </div>
        
           <!-- <div class="cols right">
                <p class="footer-copyright">
                    Copyright &copy; Himansa Samarakoon 
                </p>
            </div> -->
    </footer>
    </section>   
        
        
        
        
        
        
        
        
        
        
        <!-- Button to open the modal -->

<!-- The Modal (contains the Sign Up form) -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
        <button type="submit" class="signup"><p class="sig-t">Sign Up</p></button>
      </div>
    </div>
  </form>
</div>
   

<!-- The Modal -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content-log animate" action="/action_page.php">
    <div class="imgcontainer">
      <img src="img/av.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="" name="psw" required>

      <button type="submit"><p class="sig-t">Login</p></button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container-log" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
    </body>
</html>



<div id="id03" class="modal cu" style="text-align:center;">
  <span onclick="document.getElementById('id03').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  
  <div class="container-cu">          <!--  contact us form -->
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row-cu">
    <div class="column-cu">
      <div id="map"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d962.0363720001681!2d79.86059707412099!3d6.901995942721271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25963120b1509%3A0x2db2c18a68712863!2sUniversity+of+Colombo+School+of+Computing+(UCSC)!5e0!3m2!1sen!2slk!4v1531653969866" style="width: 100%; border:5px solid white ; height:30rem;" allowfullscreen></iframe></div>
    </div>
    <div class="column-cu">
      <form action="/action_page.php">
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
