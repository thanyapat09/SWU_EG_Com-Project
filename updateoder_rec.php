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
                       <a href="updateoder_rec.php" class="active">
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
                       <a href="updateoder_mis.php" >
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
                            <span>Update Oders Recommended Menu</span>
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
        <section class="add_menu">
            <h1 class="heading">Add Recommended Menu</h1>
            <form action="updateoder_db.php" method="POST" enctype="multipart/form-data">
                <input type="text" class="box" required maxlenght="100" placeholder="enter menu name" name="name">
                <input type="number" min="0" class="box" required max="999999999" placeholder="enter menu price" onkeypress="if(this.value.length == 10) return false;" name="price">
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/PNG , image/JPG, image/JPEG, image/png" class="box" required>
                <div class="add_menu_btn"><input type="submit" value="Add Menu" class="btn3 primary-btn3" name="add_menur"></div>
            </form>
        </section>

        <section class="showmenu">
            <h1 class="heading">Menus added</h1>
            <div class="box-container">
                <?php
                    $select_menu = $con->prepare("SELECT * FROM updatemenu_recom");
                    $select_menu->execute();
                    if($select_menu->rowCount() > 0){
                        while($fetch_menu = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                    <div class="box">
                    <img src="images/<?= $fetch_menu['image']; ?>" alt="">
                    <div class="name"><?= $fetch_menu['name']; ?></div>
                    <div class="price"><span><?= $fetch_menu['price']; ?></span>฿</div>
                    <div class="menuadd_btn">
                        <a href="updateoder_rec_edit.php?updater=<?= $fetch_menu['id']; ?>" class="btn4 primary-btn4">update</a>
                        <a href="updateoder_db.php?deleter=<?= $fetch_menu['id']; ?>" class="btn5 primary-btn5" onclick="return confirm('delete this menu?');" >delete</a>
                    </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<p class="empty">No Menu added yet!</p>';
                    }
                ?>

            </div>
        </section>
</body>
</html>