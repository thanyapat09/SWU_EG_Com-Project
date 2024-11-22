<?php
    session_start();
    include('config.php');


    if(isset($_POST['update_menur'])){

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    $update_product = $con->prepare("UPDATE updatemenu_recom SET name = ?, price = ? WHERE id = ?");
    $update_product->execute([$name, $price, $pid]);

    $_SESSION['success'] = "menu Update Now!";
    header('location: updateoder_rec.php');

        if(!empty($image)){
        if($image_size > 2000000000000){
            $message[] = 'image size is too large!';
        }else{
            $update_image = $con->prepare("UPDATE updatemenu_recom SET image = ? WHERE id = ?");
            $update_image->execute([$image, $pid]);
            $message[] = 'image updated successfully!';
        }
        }
}

if(isset($_POST['update_menus'])){

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    $update_product = $con->prepare("UPDATE updatemenu_set SET name = ?, price = ? WHERE id2 = ?");
    $update_product->execute([$name, $price, $pid]);

    $_SESSION['success'] = "menu Update Now!";
    header('location: updateoder_set.php');

        if(!empty($image)){
        if($image_size > 2000000000000){
            $message[] = 'image size is too large!';
        }else{
            $update_image = $con->prepare("UPDATE updatemenu_set SET image = ? WHERE id2 = ?");
            $update_image->execute([$image, $pid]);
            $message[] = 'image updated successfully!';
        }
        }
}

if(isset($_POST['update_menua'])){

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    $update_product = $con->prepare("UPDATE updatemenu_app SET name = ?, price = ? WHERE id3 = ?");
    $update_product->execute([$name, $price, $pid]);

    $_SESSION['success'] = "menu Update Now!";
    header('location: updateoder_app.php');

        if(!empty($image)){
        if($image_size > 2000000000000){
            $message[] = 'image size is too large!';
        }else{
            $update_image = $con->prepare("UPDATE updatemenu_app SET image = ? WHERE id3 = ?");
            $update_image->execute([$image, $pid]);
            $message[] = 'image updated successfully!';
        }
        }
}

if(isset($_POST['update_menum'])){

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'images/'.$image;

    $update_product = $con->prepare("UPDATE updatemenu_mis SET name = ?, price = ? WHERE id4 = ?");
    $update_product->execute([$name, $price, $pid]);

    $_SESSION['success'] = "menu Update Now!";
    header('location: updateoder_mis.php');

        if(!empty($image)){
        if($image_size > 2000000000000){
            $message[] = 'image size is too large!';
        }else{
            $update_image = $con->prepare("UPDATE updatemenu_mis SET image = ? WHERE id4 = ?");
            $update_image->execute([$image, $pid]);
            $message[] = 'image updated successfully!';
        }
        }
}

?>
