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
    <!--intro section-->
    <section id="intro">
        <div class="container">
            <div class="introtop">
                <div class="introleft">
                    <div class="introleftall">
                        <h1 class="introheading">Nabe Camping <br> By Marom-Matom</h1>
                        <p class="introinfo">ปิ้งย่าง ชาบู สุกี้ยากี้ญี่ปุ่น หมาล่า แจ่วฮ้อน</p>
                        <div class="buttonleft">
                            <a href="Menu.php" class="btn primary-btn">Menu</a>
                            <a href="Booktable.php" class="btn">Book Table</a>
                        </div>
                    </div>
                </div>
                <div class="introright">
                    <div class="introimgall">
                        <img src="images/nb.png" alt="nb">
                    </div>
                </div>
            </div>
        </div>     
    </section>
    <!--End intro section-->
    <!--restaurant information-->
    <section id="resinfo">
        <div class="container">
            <div class="resinfoall">
                <div class="resinfo_item">
                    <div class="infoicon">
                        <img src="images/time.svg" alt="time icon">
                    </div>
                    <h3 class="resinfo_title">15:00 - 21:00</h3>
                    <p class="resinfo_text">Opening Hour</p>
                </div>
                <div class="resinfo_item">
                    <div class="infoicon">
                        <a href="https://goo.gl/maps/wTUms5Sfix2KNY1R7?coh=178572&entry=tt"><img src="images/map.svg" alt="map icon"></a>
                    </div>
                    <h3 class="resinfo_title">องครักษ์ <br> นครยายก</h3>
                    <a href="https://goo.gl/maps/wTUms5Sfix2KNY1R7?coh=178572&entry=tt" class="textaddress"><p class="resinfo_text">Address <br> Click Here</p></a>
                </div>
                <div class="resinfo_item">
                    <div class="infoicon">
                        <img src="images/call.svg" alt="call icon">
                    </div>
                    <h3 class="resinfo_title">+66925194164</h3>
                    <p class="resinfo_text">Phone Number</p>
                </div>
            </div>
        </div>
    </section>
    <!--End restaurant information-->
    <!--Top dishes-->
    <section id="disGrid">
        <div class="container">
            <h2 class="disGrid_title">Recommended Menu</h2>
            <div class="disGrid_wrap">
                <?php
                    $select_menu = $con->prepare("SELECT * FROM updatemenu_recom");
                    $select_menu->execute();
                    if($select_menu->rowCount() > 0){
                        while($fetch_menu = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                    <div class="disGrid_item">
                        <div class="disGrid_item_img">
                            <img src="images/<?= $fetch_menu['image']; ?>" alt="">
                        </div>
                        <div class="disGrid_item_info">
                            <h3 class="disGrid_item_title"><?= $fetch_menu['name']; ?></h3>
                            <h3 class="disGrid_item_price"><?= $fetch_menu['price']; ?>฿</h3>
                        </div>
                    </div>
                    <?php
                        }
                    }else{
                        echo '<p class="empty">No Menu added yet!</p>';
                    }
                ?>
            </div>
        </div>
    </section>
    <!--End Top dishes-->
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