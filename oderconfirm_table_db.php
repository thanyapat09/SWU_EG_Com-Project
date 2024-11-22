<?php
    session_start();
    include('config.php');
    include('server.php');
    $errors = array();

    if(($_POST['oder_con1']))
    {
        $user_id = $_POST['user_id'];
        $namebook = $_POST['namebook'];
        $total_oders =$_POST['total_oders'];
        $total_price =$_POST['total_price'];
 
         $select_cart = $con->prepare("SELECT * FROM cart1 WHERE user_id =? ");
         $select_cart->execute([$user_id]);

            if($select_cart->rowCount() > 0)
            {
                $insert_oder = $con->prepare("INSERT INTO oders (namebook, total_oders, total_price) VALUES (?, ? , ?)");
                $insert_oder->execute([$namebook, $total_oders, $total_price]);
                $delete_cartQuery ="DELETE FROM cart1 WHERE user_id = '$user_id' ";
                $delete_cartQuery_run = mysqli_query($conn, $delete_cartQuery);
                $_SESSION['success'] = "Recieve Oder now!!";
                header('location: odertable1.php');
             }
             else
             {
                $_SESSION['error'] = "Your Cart empty!!";
                 header('location: odertable1.php');
             }
    }

    if(($_POST['oder_con2']))
    {
        $user_id = $_POST['user_id'];
        $namebook = $_POST['namebook'];
        $total_oders =$_POST['total_oders'];
        $total_price =$_POST['total_price'];
 
         $select_cart = $con->prepare("SELECT * FROM cart2 WHERE user_id =? ");
         $select_cart->execute([$user_id]);

            if($select_cart->rowCount() > 0)
            {
                $insert_oder = $con->prepare("INSERT INTO oders (namebook, total_oders, total_price) VALUES (?, ? , ?)");
                $insert_oder->execute([$namebook, $total_oders, $total_price]);
                $delete_cartQuery ="DELETE FROM cart2 WHERE user_id = '$user_id' ";
                $delete_cartQuery_run = mysqli_query($conn, $delete_cartQuery);
                $_SESSION['success'] = "Recieve Oder now!!";
                header('location: odertable2.php');
             }
             else
             {
                $_SESSION['error'] = "Your Cart empty!!";
                 header('location: odertable2.php');
             }
    }

    if(($_POST['oder_con3']))
    {
        $user_id = $_POST['user_id'];
        $namebook = $_POST['namebook'];
        $total_oders =$_POST['total_oders'];
        $total_price =$_POST['total_price'];
 
         $select_cart = $con->prepare("SELECT * FROM cart3 WHERE user_id =? ");
         $select_cart->execute([$user_id]);

            if($select_cart->rowCount() > 0)
            {
                $insert_oder = $con->prepare("INSERT INTO oders (namebook, total_oders, total_price) VALUES (?, ? , ?)");
                $insert_oder->execute([$namebook, $total_oders, $total_price]);
                $delete_cartQuery ="DELETE FROM cart3 WHERE user_id = '$user_id' ";
                $delete_cartQuery_run = mysqli_query($conn, $delete_cartQuery);
                $_SESSION['success'] = "Recieve Oder now!!";
                header('location: odertable3.php');
             }
             else
             {
                $_SESSION['error'] = "Your Cart empty!!";
                 header('location: odertable3.php');
             }
    }
?>