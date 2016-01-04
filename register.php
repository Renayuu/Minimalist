<!-- PHP code snippets taken from http://code.tutsplus.com/tutorials/user-membership-with-php--net-1523 -->

<?php include "lib/mysqlconnect.php"; ?>
<!DOCTYPE html>
<html>  
<meta charset="utf-8"/>  
 
<title>Minimize - Register</title>
</head>  
<body>  
<div id="main">
<?php
if(!empty($_POST['Email']) && !empty($_POST['Password']))
{
    $first_name = mysql_real_escape_string($_POST['First_Name']);
    $last_name = mysql_real_escape_string($_POST['Last_Name']);
    $email = mysql_real_escape_string($_POST['Email']);
    $password = md5(mysql_real_escape_string($_POST['Password']));
     
     $checkusername = mysql_query("SELECT * FROM Users WHERE Email = '$email'");
      
     if(mysql_num_rows($checkusername) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that email is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysql_query("INSERT INTO Users (First_Name, Last_Name, Email, Password) VALUES('$first_name', '$last_name','$email', '$password')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=\"login.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
    ?>
     
   <h1>Register</h1>
     
   <p>Please enter your details below to register.</p>
     
    <form method="post" action="register.php" name="registerform" id="registerform">
    <fieldset>
        <label for="first_name">First Name:</label><input type="text" name="First_Name" id="first_name" /><br />
        <label for="last_name">Last Name:</label><input type="text" name="Last_Name" id="last_name" /><br />
        <label for="email">Email Adress:</label><input type="text" name="Email" id="email" /><br />
        <label for="password">Password:</label><input type="password" name="Password" id="password" /><br />
        <input type="submit" name="Register" id="register" value="Register" />
    </fieldset>
    </form>
     
    <?php
}
?>
 
</div>
</body>
</html>