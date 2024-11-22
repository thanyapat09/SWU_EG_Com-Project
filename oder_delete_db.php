<?php
    session_start();
    include('server.php');
    include('config.php');

    if(isset($_GET['delete_oders']))
    {
        $oder_id = $_GET['delete_oders'];

        $query = "DELETE FROM oders WHERE id = '$oder_id'" ;
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Oder deleted successfully";
            header('location: Oders.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "Something Went Wrong!" ;
            header("location: Oders.php");
            exit(0);
        }
    }