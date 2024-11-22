<?php
    session_start();
    include('server.php');
    include('config.php');


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
    <link rel="stylesheet" href="css/updatemenu.css">
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
                       <a href="aduser.php">
                            <span class="las la-user"></span>
                            <small>Users</small>
                        </a>
                    </li>
                    <li>
                       <a href="updateoder_rec.php">
                            <span class="las la-edit"></span>
                            <small>Update Oders <br>Recommended Menu</small>
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
                       <a href="updateoder_mis.php" class="active">
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
                            <span>Update Oders Miscellaneous</span>
                        </div>
                    </div>
                </div>
        </main>
        <div>
        <?php if (isset($_SESSION['success'])) : ?>
                    <div class="success">
                        <h3>
                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success'])
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
        <section class="updatemenu">

            <h1 class="heading">Update Miscellaneous</h1>

                <?php
                    $update_id = $_GET['updatem'];
                    $select_products = $con->prepare("SELECT * FROM updatemenu_mis WHERE id4 = ?");
                    $select_products->execute([$update_id]);
                    if($select_products->rowCount() > 0){
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
                ?>
                <form action="updateoder_edit_db.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="pid" value="<?= $fetch_products['id4']; ?>">
                    <input type="hidden" name="old_image" value="<?= $fetch_products['image']; ?>">
                    <img src="images/<?= $fetch_products['image']; ?>" alt="">
                    <input type="text" class="box" required maxlength="100" placeholder="enter menu name" name="name" value="<?= $fetch_products['name']; ?>">
                    <input type="number" min="0" class="box" required max="9999999999" placeholder="enter menu price" onkeypress="if(this.value.length == 10) return false;" name="price" value="<?= $fetch_products['price']; ?>">
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
                    <div class="menuadd_btn">
                        <input type="submit" value="update Menu" class="btn6 primary-btn6" name="update_menum">
                        <a href="updateoder_mis.php" class="btn7 primary-btn7">go back</a>
                    </div>
                </form>

                <?php
                        }
                    }else{
                        echo '<p class="empty">no Menu found!</p>';
                    }
                ?>

</section>
</body>
</html>