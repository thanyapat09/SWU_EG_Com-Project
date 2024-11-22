<?php
    session_start();
    include('config.php');

    if(($_POST['editcart']))
    {
        $cart_id = $_POST['cart_id'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $con->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $update_qty->execute([$qty, $cart_id]);

        $_SESSION['success'] = "Update quantity menu successfully!";
        header('location: Odernow.php');
    }
    if(($_POST['editcart1']))
    {
        $cart_id = $_POST['cart_id'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $con->prepare("UPDATE cart1 SET quantity = ? WHERE id = ?");
        $update_qty->execute([$qty, $cart_id]);

        $_SESSION['success'] = "Update quantity menu successfully!";
        header('location: odertable1.php');
    }

    if(($_POST['editcart2']))
    {
        $cart_id = $_POST['cart_id'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $con->prepare("UPDATE cart2 SET quantity = ? WHERE id = ?");
        $update_qty->execute([$qty, $cart_id]);

        $_SESSION['success'] = "Update quantity menu successfully!";
        header('location: odertable2.php');
    }

    if(($_POST['editcart3']))
    {
        $cart_id = $_POST['cart_id'];
        $qty = $_POST['qty'];
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $con->prepare("UPDATE cart3 SET quantity = ? WHERE id = ?");
        $update_qty->execute([$qty, $cart_id]);

        $_SESSION['success'] = "Update quantity menu successfully!";
        header('location: odertable3.php');
    }
?>