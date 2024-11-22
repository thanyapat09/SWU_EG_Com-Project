<?php
    session_start();
    include('server.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nabe Camping Admin</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="shortcut icon" href="images/logo_icon.ico" type="icon_logo">
</head>
<body>
    <div class="admiinall">
        <div class="admintop">
            <div class="logo">
                <img src="images/logo.svg" width="200px" alt="logo">
            </div>
            <div class="admintext">
                <h1>Please Login</h1>
            </div>
            <?php if (isset($_SESSION['success'])) : ?>
                    <div class="success">
                        <h3>
                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
            <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
            <?php endif ?>
        </div>
        <div class="admin_form">
            <form action="login_db.php" method="post">
                <div class="form__group">
                    <input type="text" name="username"  placeholder="Username">
                </div>
                <div class="form__group">
                    <input type="password" name="password"  placeholder="Password">
                </div>
                <div class="regis">
                    <div class="container">
                    <a href="register.php" class="regis_text" >Register now!</a>
                    </div>
                </div>
                <div class="form__group">
                <button type="submit" name="login_user" class="btn primary-btn" >Login</button>
                </div>
            </form>
        </div>
    </div>
    <div id="coppyright">
        <div class="container">
            <p class="coppyrighttext">© copyright Srinakharinwirot University</p>
        </div>
    </div>
</body>
</html>