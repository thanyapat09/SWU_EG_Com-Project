<?php
    session_start();
    include('server.php'); 


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
    <link rel="stylesheet" href="css/styleregis.css">
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
                       <a href="Oders.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Orders</small>
                        </a>
                    </li>
                    <li>
                       <a href="aduser.php" class="active">
                            <span class="las la-user"></span>
                            <small>Users</small>
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
                        <a href="aduser.php?logout='1'"><span class="las la-power-off"></span></a>
                        <a href="aduser.php?logout='1'"><span class ="btnlogout">Logout</span></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="records table-responsive">
                <div class="record-header">
                    <div class="add">
                        <span><h2>EDIT USERS</h2></span>
                    </div>
                    <div class="add">
                         <a href="register.php"><button>Add Users</button></a>
                    </div>
                </div>
            <div>
        </main>  
            <?php
            if(isset($_GET['id']))
            {
                $user_id = $_GET['id'];
                $user = "SELECT * FROM user WHERE id ='$user_id'";
                $user_run = mysqli_query($conn, $user);

                if(mysqli_num_rows($user_run) > 0)
                {
                    foreach($user_run as $users)
                    {
                        ?>
                        <div class="regis_form">
                            <form action="aduser_edit_db.php" method="POST" >
                                <div class="fromregis__group">
                                <input type="hidden" name="user_id" value="<?=$users['ID']; ?>">
                                </div>    
                                <div class="formregis__group">
                                    <input type="text" name="username" value="<?=$users['username'];?>" placeholder="Username" required>
                                </div>
                                <div class="formregis__group">
                                    <input type="password" name="password" placeholder="Confirm Password" required>
                                </div>
                                <div class="formregis__group">
                                    <button type="submit" name="update_user" class="btn primary-btn" >Update now!</button>
                                </div>
                            </form>                                
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <h3>NO RECCORD FOUND</h3>
                    <?php
                }
            }
            ?>                  
    </div>
</body>
</html>