<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
        <form id="login-form" action="login_cntrl.php" method="post">
            <fieldset>
                <legend>Login</legend>
          <div>
            <div style="display: block;"><input  name="email" placeholder="Email" type="email"></div> <br>   
            <div style="display: block;"><input name="password" placeholder="Password" type="password"></div>

         </div>
            <input name="login" id="btn"value="Login" type="submit">
            </fieldset>
        </form>
        <div id="description">
                Mobile Money <br>
                Agent System
            </div>
        

    </div>
</body>
</html>