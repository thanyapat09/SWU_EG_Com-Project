<?php
    session_start();
    

    if(!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must Log in";
        header('location: login.php');
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Nabe Camping Admin</title>
    <link rel="shortcut icon" href="images/logo_icon.ico" type="icon_logo">
    <link rel="stylesheet" href="css/dashboardadmin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3><span>Nabe Camping</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <h4>Nabe Camping</h4>
                <small>Admin</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="dashboard.php">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                       <a href="booking.php">
                            <span class="las la-clipboard-list"></span>
                            <small>BookTable</small>
                        </a>
                    </li>
                    <li>
                       <a href="Oders.php" class="active">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li>
                       <a href="aduser.php">
                            <span class="las la-user"></span>
                            <small>Users</small>
                        </a>
                    </li>
                    <li>
                       <a href="updateoder_rec.php">
                            <span class="las la-edit"></span>
                            <small>Update Oders <br>Recommended Menu </small>
                        </a>
                    </li>
                    <li>
                       <a href="updateoder_set.php">
                            <span class="las la-edit"></span>
                            <small>Update Oders <br>Set Menu</small>
                        </a>
                    </li>
                    <li>
                       <a href="updateoder_app.php">
                            <span class="las la-edit"></span>
                            <small>Update Oders <br>Appetizers</small>
                        </a>
                    </li>
                    <li>
                       <a href="updateoder_mis.php">
                            <span class="las la-edit"></span>
                            <small>Update Oders <br> Miscellaneous </small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">           
                    <div class="user">
                        <!-- logged in user information -->
                        <?php if (isset($_SESSION['username'])) : ?>
                        <p class="usernametext"><strong><?php echo $_SESSION['username'] ; ?></strong></p>
                        <a href="Oders.php?logout='1'"><span class="las la-power-off"></span></a>
                        <a href="Oders.php?logout='1'"><span class ="btnlogout">Logout</span></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </header>
        
        
        <main>
                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <span>Oder</span>
                        </div>
            
                </div>
            
        </main>

        <section class="view_oder">
            <div class="oderview">
                <h1 class="heading">View-Oder</h1>
                <p>Korean Fired Chicken</p>
                <p>Tobbokki</p>
                <p>nabe (japanese sukiyaki) (size s)</p>
                <p>สันนอกสไลด์</p>
            </div>
        </section>
        
    </div>
</body>
</html>