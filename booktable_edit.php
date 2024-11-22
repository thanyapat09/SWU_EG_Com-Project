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
    <link rel="stylesheet" href="css/stylebookedit.css">
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
                       <a href="booking.php" class="active">
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
                        <span><h2>EDIT Booking</h2></span>
                    </div>
                    <div class="add">
                         <a href="Booktable.php"><button>Add Booking</button></a>
                    </div>
                </div>
            <div>
        </main>  
            <?php
            if(isset($_GET['id']))
            {
                $booking_id = $_GET['id'];
                $booking = "SELECT * FROM booking WHERE id ='$booking_id'";
                $user_run = mysqli_query($conn, $booking);

                if(mysqli_num_rows($user_run) > 0)
                {
                    foreach($user_run as $bookings)
                    {
                        ?>
                            <section id="form">
                                <div class="container">   
                                    <div class="form__wrapper">
                                        <form action='booktable_edit_db.php' method="POST">
                                            <div class="fromregis__group">
                                                <input type="hidden" name="booking_id" value="<?=$bookings['id']; ?>">
                                            </div>    
                                            <div class="form__group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" id="Fname" name="fname" value="<?=$bookings['fname']; ?>">
                                            </div>
                                            <div class="form__group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" id="Lname" name="lname" value="<?=$bookings['lname']; ?>" >
                                            </div>
                                            <div class="form__group">
                                                <label for="email">Email</label>
                                                <input type="email" id="Email" name="email" value="<?=$bookings['email']; ?>" >
                                            </div>
                                            <div class="form__group">
                                                <label for="tableType">Table Type</label>
                                                <select name="tabletype" id="Tabletype" >
                                                <option selected disabled value="">Choose</option>
                                                <option value= "0" <?=$bookings['tabletype'] == '0' ? 'selected' : ''; ?>>Small (2 persons)</option>
                                                <option value= "1" <?=$bookings['tabletype'] == '1' ? 'selected' : ''; ?>>medium (4 persons)</option>
                                                <option value= "2" <?=$bookings['tabletype'] == '2' ? 'selected' : ''; ?>>large (6 persons)</option>
                                                <option value= "3" <?=$bookings['tabletype'] == '3' ? 'selected' : ''; ?>>extra (8 persons+)</option>
                                                </select>
                                            </div>
                                            <div class="form__group">
                                                <label for="phonenumber">Phone Number</label>
                                                <input type="number" id="Phonenumber" name="phonenumber" value="<?=$bookings['phonenumber']; ?>">
                                            </div>
                                            <div class="form__group">
                                                <label for="placement">Placement</label>
                                                <select name="placement" id="Placement" > 
                                                <option selected disabled>Choose</option >
                                                <option value= "0" <?=$bookings['placement'] == '0' ? 'selected' : ''; ?>>Outdoor</option>
                                                <option value= "1" <?=$bookings['placement'] == '1' ? 'selected' : ''; ?>>Indoor</option>
                                                </select>
                                            </div>
                                            <div class="form__group">
                                                <label for="date">Date</label>
                                                <input type="date" id="Datebook" name="datebook" value="<?=$bookings['datebook']; ?>">
                                            </div>
                                            <div class="form__group">
                                                <label for="time">time</label>
                                                <input type="time" id="Time" name="timebook" value="<?=$bookings['timebook']; ?>">
                                            </div>
                                            <div class="btnbook_update">
                                            <button class="btn3 primary-btn3" type="submit" name="update_book">Update Book Table</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
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