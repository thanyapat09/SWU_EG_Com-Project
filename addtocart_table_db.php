<?php
    session_start();
    include('config.php');
    include('server.php');


    if(isset($_POST['addtocart1']))
    {
        $user_id = $_POST['user_id'];
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $select_cart = $con->prepare("SELECT * FROM cart1 WHERE name = ?");
        $select_cart->execute([$name]);

            if($select_cart->rowCount() > 0)
            {
                $_SESSION['success'] = "already added to cart";
                header('location: odertable1.php');
            }
            else
            {
                $insert_cart = $con->prepare("INSERT INTO cart1 (user_id, pid, name, price, quantity, image) VALUES(?, ? , ?, ?, ?, ?)");
                $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
                $_SESSION['success'] = "added to cart!";
                header('location: odertable1.php');
            }
    }

    if(isset($_POST['addtocart2']))
    {
        $user_id = $_POST['user_id'];
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $select_cart = $con->prepare("SELECT * FROM cart2 WHERE name = ?");
        $select_cart->execute([$name]);

            if($select_cart->rowCount() > 0)
            {
                $_SESSION['success'] = "already added to cart";
                header('location: odertable2.php');
            }
            else
            {
                $insert_cart = $con->prepare("INSERT INTO cart2 (user_id, pid, name, price, quantity, image) VALUES(?, ? , ?, ?, ?, ?)");
                $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
                $_SESSION['success'] = "added to cart!";
                header('location: odertable2.php');
            }
    }

    if(isset($_POST['addtocart3']))
    {
        $user_id = $_POST['user_id'];
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);

        $select_cart = $con->prepare("SELECT * FROM cart3 WHERE name = ?");
        $select_cart->execute([$name]);

            if($select_cart->rowCount() > 0)
            {
                $_SESSION['success'] = "already added to cart";
                header('location: odertable3.php');
            }
            else
            {
                $insert_cart = $con->prepare("INSERT INTO cart3 (user_id, pid, name, price, quantity, image) VALUES(?, ? , ?, ?, ?, ?)");
                $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
                $_SESSION['success'] = "added to cart!";
                header('location: odertable3.php');
            }
    }


?>