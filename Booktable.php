<?php
    session_start();
    include('server.php');
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ร้านอาหารนาเบะ แคมปิ้ง (Nabe Camping) สั่งอาหาร และ จองโต๊ะอาหาร">
    <meta name="author" content="Thanyapat Prommoon,Kitsana Kathinsummit">
    <meta name="keywords" content="Nabe Camping องครักษ์ นครนายก">
    <title>Nabe Camping</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="images/logo_icon.ico" type="icon_logo">
</head>

<body>
    <!-- Nav Bar -->
    <div class="nav">
        <div class="container">
            <div class="navtop">
                <a href="index.php" class="logo"> <img src="images/logo.svg" alt= "nabe camping" > </a>
                <nav>
                    <div class="navicon">
                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-menu">
                          <line x1="3" y1="12" x2="21" y2="12" />
                          <line x1="3" y1="6" x2="21" y2="6" />
                          <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </div>
                    <div class="navbgOverlay"></div>
                    <ul class="navlist">
                        <div class="navclose">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                          </svg>
                        </div>
                        <div class="navheadlist">
                            <li> <a class="navlink" href="index.php">Home</a> </li>
                            <li> <a class="navlink" href="Menu.php">Menu</a> </li>
                            <li> <a class="navlink" href="Aboutus.php">About Us</a> </li>
                            <li> <a href="Booktable.php" class="btn primary-btn">Book Table</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--End nav-->
    <!-- Booking Section -->
        <section id="form">
            <div class="container">
            <h3 class="form__title">Book Table</h3>
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
            <div class="form__wrapper">
                <form action='booktable_db.php' method="POST">
                <div class="form__group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="Fname" name="fname" >
                </div>
                <div class="form__group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="Lname" name="lname" >
                </div>
                <div class="form__group">
                    <label for="email">Email</label>
                    <input type="email" id="Email" name="email" >
                </div>
                <div class="form__group">
                    <label for="tableType">Table Type</label>
                    <select name="tabletype" id="Tabletype" >
                    <option selected disabled>Choose</option>
                    <option value="0">Small (2 persons)</option>
                    <option value="1">medium (4 persons)</option>
                    <option value="2">large (6 persons)</option>
                    <option value="3">extra (8 persons+)</option>
                    </select>
                </div>
                <div class="form__group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="number" id="Phonenumber" name="phonenumber" >
                </div>
                <div class="form__group">
                    <label for="placement">Placement</label>
                    <select name="placement" id="Placement" > 
                    <option selected disabled>Choose</option >
                    <option value="0">Outdoor</option>
                    <option value="1">Indoor</option>
                    </select>
                </div>
                <div class="form__group">
                    <label for="date">Date</label>
                    <input type="date" id="Datebook" name="datebook" >
                </div>
                <div class="form__group">
                    <label for="time">time</label>
                    <input type="time" id="Time" name="timebook" >
                </div>
                <button class="btn primary-btn" Type="submit" name="Book_table">Book Table</button>
                </form>
            </div>
            </div>
        </section>
    <!-- End Booking Section -->
    <!--footer-->
    <footer class="footer">
        <div class="container">
            <div class="footerend">
                <div class="footercol1">
                    <div class="footerlogo">
                        <a href="index.php" class="logo"> <img src="images/logo.svg" alt= "nabe camping" > </a>
                    </div>
                    <p class="footerdesc">นาเบะ Camping <br> By Marom-Matom</p>
                    <div class="footersocial">
                        <h4 class="footersocial_title">Follow Us</h4>
                        <ol>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100083792171067"><img src="images/icon-faccebook.svg" alt="facebook"></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="footercol2">
                    <h3 class="footertexttitle">Links</h3>
                    <ol class="footertext">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Menu.php">Menu</a></li>
                        <li><a href="Aboutus.php">About Us</a></li>
                        <li><a href="Booktable.php">Book Table</a></li>
                    </ol>
                </div>
                <div class="footercol3">
                    <h3 class="footertexttitle">Contact</h3>
                    <ol class="footertext">
                        <li><a href="#">+66925194164</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </footer>
    <div id="coppyright">
        <div class="container">
            <p class="coppyrighttext">© copyright Srinakharinwirot University</p>
        </div>
    </div>
    <!--footer end-->
<script src="js/main.js"></script>
</body>

</html>