<?php
    session_start();
    include('server.php');

    if(isset($_POST['booking_delete']))
    {
        $booking_id = $_POST['booking_delete'];

        $query = "DELETE FROM booking WHERE id = '$booking_id'" ;
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Booking deleted successfully";
            header('location: booking.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "Something Went Wrong!" ;
            header("location: booking.php");
            exit(0);
        }
    }

    
    if(isset($_POST['update_book']))
    {
        $booking_id = $_POST['booking_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $tabletype = $_POST['tabletype'];
        $phonenumber = $_POST['phonenumber'];
        $placement = $_POST['placement'];
        $datebook = $_POST['datebook'];
        $timebook = $_POST['timebook'];

        $query = "UPDATE booking SET fname ='$fname', lname = '$lname', email = '$email', tabletype = '$tabletype',  
        phonenumber = '$phonenumber', placement = '$placement', datebook = '$datebook', timebook = '$timebook' WHERE id  ='$booking_id'" ;
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['success'] = "You already change Booking";
            header('location: booking.php');
            exit(0);
        }
        else
        {
            $_SESSION['error'] = "Something Went Wrong!" ;
            header("location: booking.php");
            exit(0);
        }
    }

?>
