<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration system using PHP and MySQL </title>
     <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="main">
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
    <?php include('errors.php');?>
    <div class="input-group">
        <label>Username :</label>
        <input type="text" name="username">
    </div>
    <div class="input-group">
        <label>Password :</label>
        <input type="password" name="Password_1">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        don't have an account? <a href="register.php">Sign Up</a>
    </p>
    </div>

</body>
</html>