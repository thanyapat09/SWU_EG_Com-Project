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
    <link rel="stylesheet" href="css/styleuser.css">
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
                            <span>users</span>
                        </div>
                        <div class="add">
                            <a href="register.php"><button>Add Users</button></a>
                        </div>
                    </div>
                    <div> 
                    <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> username</th>
                                    <th> passwoard</th>
                                    <th> Edit</th>
                                </tr>
                            </thead>
                        <tbody>
                                <div class="adminusertop">
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
                                    <?php 
                                        $query = "SELECT * FROM user";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {   
                                                ?>
                                                <tr>
                                                    <td><?= $row['ID']; ?></td>
                                                    <td><?= $row['username']; ?></td>
                                                    <td><?= $row['password']; ?></td>
                                                    <td>
                                                        <div class="btnuser">
                                                            <a href="aduser_edit.php?id=<?= $row['ID'];?>"><button class="btn1 primary-btn1">edit</button></a>
                                                            <form action="aduser_edit_db.php" method="POST">
                                                                <button class="btn2 primary-btn2" name="user_delete" value="<?= $row['ID']; ?>" type="submit">delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="3">No Record not Found</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                        </tbody>
                    </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>
</body>
</html>