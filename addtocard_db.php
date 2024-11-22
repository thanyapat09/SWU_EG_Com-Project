<?php
    session_start();
    include('config.php');
    include('server.php');


    if(isset($_POST['addtocart']))
    {
        $user_id = $_POST['user_id'];
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $select_cart = $con->prepare("SELECT * FROM cart WHERE name = ?");
        $select_cart->execute([$name]);

            if($select_cart->rowCount() > 0)
            {
                $_SESSION['success'] = "already added to cart";
                header('location: Odernow.php');
            }
            else
            {
                $insert_cart = $con->prepare("INSERT INTO cart (user_id, pid, name, price, quantity, image) VALUES(?, ? , ?, ?, ?, ?)");
                $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
                $_SESSION['success'] = "added to cart!";
                header('location: Odernow.php');
            }
    }

    if(($_GET['deletecart'])){

        $delete_id = $_GET['deletecart'];
        $delete_cart = $con->prepare("DELETE FROM cart WHERE id = ?");
        $delete_cart->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: Odernow.php');

     
    }
    if(($_GET['deletecart1'])){

        $delete_id = $_GET['deletecart1'];
        $delete_cart = $con->prepare("DELETE FROM cart1 WHERE id = ?");
        $delete_cart->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: odertable1.php');

     
    }

    if(($_GET['deletecart2'])){

        $delete_id = $_GET['deletecart2'];
        $delete_cart = $con->prepare("DELETE FROM cart2 WHERE id = ?");
        $delete_cart->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: odertable2.php');

     
    }
    if(($_GET['deletecart3'])){

        $delete_id = $_GET['deletecart3'];
        $delete_cart = $con->prepare("DELETE FROM cart3 WHERE id = ?");
        $delete_cart->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: odertable3.php');

     
    } 

?>