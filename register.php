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
    <link rel="stylesheet" href="css/styleregis.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="shortcut icon" href="images/logo_icon.ico" type="icon_logo">
</head>
<body>
    <div class="regisall">
        <div class="registop">
            <div class="logo">
                <img src="images/logo.svg" width="200px" alt="logo">
            </div>
            <div class="registext">
                <h1>Please Register</h1>
            </div>
        </div>
        <div class="regis_form">
            <form action="register_db.php" method="post">
                <?php include('errors.php'); ?>
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
                <div class="formregis__group">
                    <input type="text" name="username"  placeholder="Username">
                </div>
                <div class="formregis__group">
                    <input type="password" name="password_1"  placeholder="Password">
                </div>
                <div class="formregis__group">
                    <input type="password" name="password_2"  placeholder="Confirm Password">
                </div>
                <div class="formregis__group">
                <button type="submit" name="reg_user" class="btn primary-btn" >Submit</button>
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