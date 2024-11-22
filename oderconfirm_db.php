<?php
    session_start();
    include('config.php');
    include('server.php');
    $errors = array();

    if(($_POST['oder_con']))
    {
        $user_id = $_POST['user_id'];
        $namebook = $_POST['namebook'];
        $total_oders =$_POST['total_oders'];
        $total_price =$_POST['total_price'];
 
         $select_cart = $con->prepare("SELECT * FROM cart WHERE user_id = ? ");
         $select_cart->execute([$user_id]);

            if($select_cart->rowCount() > 0)
            {
                $insert_oder = $con->prepare("INSERT INTO oders (namebook, total_oders, total_price) VALUES (?, ? , ?)");
                $insert_oder->execute([$namebook, $total_oders, $total_price]);
                $delete_cartQuery ="DELETE FROM cart WHERE user_id = '$user_id' ";
                $delete_cartQuery_run = mysqli_query($conn, $delete_cartQuery);
                $_SESSION['success'] = "Recieve Oder now!!";
                header('location: Odernow.php');
             }
             else
             {
                $_SESSION['error'] = "Your Cart empty!!";
                 header('location: Odernow.php');
             }
    }
?>