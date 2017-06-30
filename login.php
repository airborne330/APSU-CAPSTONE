<?php
//session_start();
if (isset($_SERVER['HTTP_COOKIE'])) //Destroys all cookies upon visiting the page whether through logging out or, in conjunction with the above code, hitting the back button.
	{
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body id="login">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Central Concessions,Inc.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
	  <div class="page-wrap" id="content">

        <div class="form-container">
          <img class="logo" src="images/Central_Concessions.jpg" alt="Logo">

          <form id="login-form" action="decision.php" method="post">
            <h2>Login</h2>
            <label>Employee ID</label>
            <input type="text" name="username" id="username" /><!--gets username-->
            <br>
            <label>Password</label>
            <input type="password" name="password" id="password" /><!--gets password-->
            <br>
            <input type="submit" value="Login" id="login-button"/>
            <p>Created by Accurate Information Systems</p>
          </form>
        </div>
</div><br> <!-- END class="page-wrap" -->	
<footer id="login_footer">
	
	<p>Accurate Information Systems &copy;2017</p>
</footer>
   <script type="text/javascript">
        // Set focus to first form input when the page loads
        window.onload = function() {
          document.getElementById("username").focus();
        };
        
    </script>
</body>
</html>
