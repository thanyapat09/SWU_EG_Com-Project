<?php
    session_start();
    include('server.php');

    if(isset($_POST['user_delete']))
    {
        $user_id = $_POST['user_delete'];

        $query = "DELETE FROM user WHERE id = '$user_id'" ;
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "User deleted successfully";
            header('location: aduser.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "Something Went Wrong!" ;
            header("location: aduser.php");
            exit(0);
        }
    }

    if(isset($_POST['update_user']))
    {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);

        $query = "UPDATE user SET username='$username', password = '$password' WHERE id='$user_id'" ;
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "You already change username/password";
            header('location: aduser.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "Something Went Wrong!" ;
            header("location: aduser.php");
            exit(0);
        }
    }

?>