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
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/Odernowc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    <!--Page tital-->
    <section id="page_title">
        <div class="container">
            <h2 class="page_title_text">Table 2</h2>
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
    </section>
    <!--End Page tital-->
    <!--Top dishes-->
    <section id="disGrid">
        <div class="container">
            <h2 class="disGrid_title">Recommended Menu</h2>
                <div class="disGrid_wrap">
                    <?php
                        $select_menu = $con->prepare("SELECT * FROM updatemenu_recom");
                        $select_menu->execute();
                        if($select_menu->rowCount() > 0){
                            while($fetch_menur = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                            <div class="disGrid_item">
                                <div class="disGrid_item_img">
                                    <img src="images/<?= $fetch_menur['image']; ?>" alt="">
                                </div>
                                <div class="disGrid_item_info">
                                        <form action="addtocart_table_db.php" method="POST">
                                            <input type="hidden" name="user_id" value="1">
                                            <input type="hidden" name="name" value="<?= $fetch_menur['name']; ?>">
                                            <input type="hidden" name="price" value="<?= $fetch_menur['price']; ?>">
                                            <input type="hidden" name="image"  value="<?= $fetch_menur['image']; ?>">
                                            <h3 class="disGrid_item_title"><?= $fetch_menur['name']; ?></h3>
                                            <h3 class="disGrid_item_price"><?= $fetch_menur['price']; ?>฿</h3>
                                            <input type="hidden" name="pid" value="<?= $fetch_menur['id'] ?>">
                                            <input type="number" class="count" name="qty" min="1" max="100"value="1">
                                            <input type="submit" class="add" name="addtocart2" value ="Add to Cart">
                                            <!--<button class="remove" onclick="Remove ()"><i class="fa-solid fa-trash-can"></i></button>-->
                                        </form>
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
    <!--Set dishes-->
    <section id="disGrid">
        <div class="container">
            <h2 class="disGrid_title">Set Menu</h2>
            <div class="disGrid_wrap">
                    <?php
                        $select_menu = $con->prepare("SELECT * FROM updatemenu_set");
                        $select_menu->execute();
                        if($select_menu->rowCount() > 0){
                            while($fetch_menus = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <div class="disGrid_item">
                            <div class="disGrid_item_img">
                                <img src="images/<?= $fetch_menus['image']; ?>" alt="">
                            </div>
                            <div class="disGrid_item_info">
                                    <form action="addtocart_table_db.php" method="POST">
                                        <input type="hidden" name="user_id" value="1">
                                        <input type="hidden" name="image"  value="<?= $fetch_menus['image']; ?>">
                                        <input type="hidden" name="name" value="<?= $fetch_menus['name']; ?>">
                                        <input type="hidden" name="price" value="<?= $fetch_menus['price']; ?>">
                                        <h3 class="disGrid_item_title"><?= $fetch_menus['name']; ?></h3>
                                        <h3 class="disGrid_item_price"><?= $fetch_menus['price']; ?>฿</h3>
                                        <input type="hidden" name="pid" value="<?= $fetch_menus['id2'] ?>">
                                        <input type="number" class="count" name="qty" min="1" max="100"value="1">
                                        <input type="submit" class="add" name="addtocart2" value ="Add to Cart">
                                        <!--<button class="remove" onclick="Remove ()"><i class="fa-solid fa-trash-can"></i></button>-->
                                    </form>
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
    <!--End dishes-->
        <!--App dishes-->
        <section id="disGrid">
            <div class="container">
                <h2 class="disGrid_title">Appetizers</h2>
                <div class="disGrid_wrap">
                    <?php
                        $select_menu = $con->prepare("SELECT * FROM updatemenu_app");
                        $select_menu->execute();
                        if($select_menu->rowCount() > 0){
                            while($fetch_menua = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <form action="addtocart_table_db.php" method="POST">
                        <div class="disGrid_item">
                            <div class="disGrid_item_img">
                                <img src="images/<?= $fetch_menua['image']; ?>" alt="">
                            </div>
                            <div class="disGrid_item_info">
                                    <input type="hidden" name="user_id" value="1">
                                    <input type="hidden" name="image"  value="<?= $fetch_menua['image']; ?>">
                                    <input type="hidden" name="name" value="<?= $fetch_menua['name']; ?>">
                                    <input type="hidden" name="price" value="<?= $fetch_menua['price']; ?>">
                                    <h3 class="disGrid_item_title"><?= $fetch_menua['name']; ?></h3>
                                    <h3 class="disGrid_item_price"><?= $fetch_menua['price']; ?>฿</h3>
                                    <input type="hidden" name="pid" value="<?= $fetch_menua['id3'] ?>">
                                    <input type="number" class="count" name="qty" min="1" max="100"value="1">
                                    <input type="submit" class="add" name="addtocart2" value ="Add to Cart">
                                    <!--<button class="remove" onclick="Remove ()"><i class="fa-solid fa-trash-can"></i></button>-->
                            </div>
                        </div>
                        </form>
                        <?php
                            }
                        }else{
                            echo '<p class="empty">No Menu added yet!</p>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <!--End App dishes-->
        <!--miscellaneous dishes-->
        <section id="disGrid">
            <div class="container">
                <h2 class="disGrid_title">Miscellaneous</h2>
                <div class="disGrid_wrap">
                    <?php
                        $select_menu = $con->prepare("SELECT * FROM updatemenu_mis");
                        $select_menu->execute();
                        if($select_menu->rowCount() > 0){
                            while($fetch_menum = $select_menu->fetch(PDO::FETCH_ASSOC)){ 
                        ?>
                        <form action="addtocart_table_db.php" method="POST">
                        <div class="disGrid_item">
                            <div class="disGrid_item_img">
                                <img src="images/<?= $fetch_menum['image']; ?>" alt="">
                            </div>
                            <div class="disGrid_item_info">
                                    <input type="hidden" name="user_id" value="1">
                                    <input type="hidden" name="image"  value="<?= $fetch_menum['image']; ?>">
                                    <input type="hidden" name="name" value="<?= $fetch_menum['name']; ?>">
                                    <input type="hidden" name="price" value="<?= $fetch_menum['price']; ?>">
                                    <h3 class="disGrid_item_title"><?= $fetch_menum['name']; ?></h3>
                                    <h3 class="disGrid_item_price"><?= $fetch_menum['price']; ?>฿</h3>
                                    <input type="hidden" name="pid" value="<?= $fetch_menum['id4'] ?>">
                                    <input type="number" class="count" name="qty" min="1" max="100"value="1">
                                    <input type="submit" class="add" name="addtocart2" value ="Add to Cart">
                                    <!--<button class="remove" onclick="Remove ()"><i class="fa-solid fa-trash-can"></i></button>-->
                            </div>
                        </div>
                        </form>
                        <?php
                            }
                        }else{
                            echo '<p class="empty">No Menu added yet!</p>';
                        }
                    ?>
                </div>
                <div class="cart">
                    <section id="disGrid">
                        <div class="container">
                                <div class="name"> MY CART</div>
                                        <?php
                                            $grand_total = 0;
                                            $cart_item[] = '';
                                            $select_cart = $con->prepare("SELECT * FROM cart2");
                                            $select_cart->execute();
                                            if($select_cart->rowCount() > 0){
                                                while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
                                                $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
                                                $grand_total += $sub_total;
                                                $cart_item[] = $fetch_cart['name'].'('.$fetch_cart['price'].'x'.$fetch_cart['quantity'].') ';
                                                $total_oders = implode($cart_item);
                                            ?>
                                                <div class="disGrid_wrap">
                                                    <div class="disGrid_item">
                                                        <div class="disGrid_item_img" ><img src="images/<?= $fetch_cart['image']; ?>" alt=""></div>
                                                        <div class="disGrid_item_info">
                                                            <form action="oderedit_db.php" method="POST">
                                                            <input type="hidden" name="user_id" value="1">
                                                            <input type="hidden" name="cart_id" value="<?= $fetch_cart['id'] ?>">
                                                            <input type="hidden" name="image"  value="<?= $fetch_cart['image']; ?>">
                                                            <input type="hidden" name="name" value="<?= $fetch_cart['name']; ?>">
                                                            <input type="hidden" name="price" value="<?= $fetch_cart['price']; ?>">
                                                            <h3 class="disGrid_item_title"><?= $fetch_cart['name']; ?></h3>
                                                            <h3 class="disGrid_item_price"><?= $fetch_cart['price']; ?>฿</h3>
                                                            <input type="number" class="count" name="qty" min="1" max="100" value="<?= $fetch_cart['quantity']; ?>">
                                                            <input type="submit" name="editcart2" class="btn10 primary-btn10" value="Edit Cart">
                                                            </form>
                                                            <div class="delete_icon"><a href="addtocard_db.php?deletecart2=<?= $fetch_cart['id']; ?>"><button class="remove"><i class="las la-trash-alt"></i></button></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                                <div class="disGrid_wrap">
                                                    <div class="disGrid_item_info">
                                                        <form action="oderconfirm_table_db.php" method="POST">
                                                        <input type="hidden" name="user_id" value="1">
                                                        <input type="hidden" name="total_price" value="<?= $grand_total; ?>">
                                                        <input type="hidden" name="total_oders" value="<?= $total_oders; ?>">
                                                        <h3 class="disGrid_item_price2">TOTAL PRICE : <?= $grand_total ;?>฿</h3>
                                                        <div class="inputname"><input type="hidden" class="box" value="Table2" name="namebook"></div>
                                                        <input type="submit" name="oder_con2"  class="btn primary-btn" value ="order confirmation">
                                                        </form>
                                                    </div>
                                            <?php
                                            }
                                            else
                                            {
                                                echo '<p class="empty">No Menu added yet!</p>';
                                            }
  
                                        ?>
                        </div>
                    </section>
                </div>
                
            </div>
        </section>
        <!--End miscellaneous dishes-->
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