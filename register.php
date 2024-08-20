<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration system using PHP and MySQL </title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="main">
    <div class="header">
        <h2>Sign Up</h2>
    </div>
    <form method="post" action="register.php">
    <?php include('errors.php');?>
    <div class="input-group">
        <label>Username :</label>
        <input type="text" name="username" value="<?php echo $username;?>">
    </div>
    <div class="input-group">
        <label>Email :</label>
        <input type="email" name="email" value="<?php echo $email;?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Sign Up</button>
    </div>
    <p>
        Already have an account? <a href="login.php">Sign In</a>
    </p>
    </div>
</body>
</html>