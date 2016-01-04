<!-- PHP code snippets taken from http://code.tutsplus.com/tutorials/user-membership-with-php--net-1523 -->

<?php include "lib/mysqlconnect.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta charset="utf-8"> 
<title>Minimize - Login</title>

</head>  
<body>  
<div id="main">
    
<body>
   <?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Email']))
{
     ?>
 
     <h1>Member Area</h1>
     <p>Thanks for logging in! You are <code><?=$_SESSION['First_Name']?></code> and your email address is <code><?=$_SESSION['Email']?></code>.</p>
      
     <?php
}
elseif(!empty($_POST['Email']) && !empty($_POST['Password']))
{
    $email = mysql_real_escape_string($_POST['Email']);
    $password = md5(mysql_real_escape_string($_POST['Password']));
     
    $checklogin = mysql_query('SELECT * FROM `Users` WHERE `Email`="'.$email.'" AND `Password` ="'.$password.'";');
     
    if(mysql_num_rows($checklogin) == '1')
    {
        $row = mysql_fetch_array($checklogin);
        $email = $row['Email'];
         
        $_SESSION['Email'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>
     
   <h1>Member Login</h1>
     
   <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>
     
    <form method="post" action="login.php" name="loginform" id="loginform">
    <fieldset>
        <label for="Email">Email:</label><input type="text" name="Email" id="Email" /><br />
        <label for="password">Password:</label><input type="password" name="Password" id="password" /><br />
        <input type="submit" name="Login" id="login" value="Login" />
    </fieldset>
    </form>
     
   <?php
}
?>

      
    
</body>
</html>