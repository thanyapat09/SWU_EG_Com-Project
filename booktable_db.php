<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['Book_table'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $tabletype = mysqli_real_escape_string($conn, $_POST['tabletype']);
        $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
        $placement = mysqli_real_escape_string($conn, $_POST['placement']);
        $datebook = mysqli_real_escape_string($conn, $_POST['datebook']);
        $timebook = mysqli_real_escape_string($conn, $_POST['timebook']);

        if (empty($fname)) {
            array_push($errors, "Plese fill in First Name");
            $_SESSION['error'] = "Plese fill in First Name" ;
            header("location: Booktable.php");
        }
        if (empty($lname)) {
            array_push($errors, "Plese fill in Last Name");
            $_SESSION['error'] = "Plese fill in Last Name" ;
            header("location: Booktable.php");
        }
        if (empty($email)) {
            array_push($errors, "Plese fill in email");
            $_SESSION['error'] = "Plese fill in email" ;
            header("location: Booktable.php");
        }
        if (empty($phonenumber)) {
            array_push($errors, "Plese fill in Phone Number");
            $_SESSION['error'] = "Plese fill in Phone Number" ;
            header("location: Booktable.php");
        }
        if (empty($datebook)) {
            array_push($errors, "Plese fill in Date");
            $_SESSION['error'] = "Plese fill in Date" ;
            header("location: Booktable.php");
        }
        if (empty($timebook)) {
            array_push($errors, "Plese fill in time");
            $_SESSION['error'] = "Plese fill in time" ;
            header("location: Booktable.php");
        }

        $booking_query = "SELECT * FROM booking WHERE fname = '$fname'" ;
        $query = mysqli_query($conn, $booking_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { //if first exists
            if ($result ['fname'] === $fname) {
                array_push($errors, "This name already booking");
                $_SESSION['error'] = "This name already booking" ;
                header("location: Booktable.php");
            }
        }

        if (count($errors) == 0) {

            $sql = "INSERT INTO booking (fname, lname, email, tabletype, phonenumber, placement, datebook, timebook ) 
            VALUES ('$fname', '$lname', '$email', '$tabletype', '$phonenumber', '$placement', '$datebook', '$timebook' )";
            mysqli_query($conn, $sql);

            $_SESSION['success'] = "You already Booking!! You can oders now!";
            header('location: Odernow.php');
        } 
    }

?> 