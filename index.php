<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
        <form id="login-form" action="signup_controller.php" method="post">
            
            <fieldset>
                <legend>Sign Up</legend>

          <div id="form-elements">
               
            <div style="display: block;"><input name="username" placeholder="Fullname" type="text"></div> <br>
            <div style="display: block;"><input  name="email" placeholder="Email" type="email"></div> <br>
            <div style="display: block;"><input name="password" placeholder="Password" type="password"></div>
            <div><select name="role" id="role"><option value="Manager">Manager</option></select></div>
            <input id="btn" name="signup" value="Sign Up" type="submit">
        </div>
            </fieldset>
        </form>
        <div id="description">
                Mobile Agent <br>
                Tracking System
            </div>
        

    </div>
    
</body>
</html>