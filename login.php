<!-- contains the login form  -->

<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="includes/login.inc.php" method="POST">
    <div class="container">
      <h1>Login</h1>
      <p>Please Enter User Details.</p>
      <hr>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
        <button type="submit" class="login" name="login"><p class="sig-t">Login</p></button>
      </div>
    </div>
  </form>
</div>