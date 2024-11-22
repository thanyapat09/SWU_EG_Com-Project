<?php
    session_start();
    include('config.php');

    if(isset($_POST['add_menur']))
    {
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
     
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'images/'.$image;
     
        $select_menu = $con->prepare("SELECT * FROM updatemenu_recom WHERE name = ? ");
        $select_menu->execute([$name]);

        if($select_menu->rowCount() > 0){
            $_SESSION['error'] = "Menu name already exist!";
            header('location: updateoder_rec.php');
         }
         else{
            if($image_size > 2000000000000)
            {
                $_SESSION['error'] = "image size is too large!";
                header('location: updateoder_rec.php');
            }
            else
            {
               $insert_menu = $con->prepare("INSERT INTO updatemenu_recom(name, price, image) VALUES(?,?,?)");
               $insert_menu->execute([$name, $price, $image]);
               move_uploaded_file($image_tmp_name, $image_folder);
               $_SESSION['success'] = "New menu added!";
               header('location: updateoder_rec.php');
            }
         }
      
    }

    if(isset($_POST['add_menua']))
    {
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
     
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'images/'.$image;
     
        $select_menu = $con->prepare("SELECT * FROM updatemenu_app WHERE name = ? ");
        $select_menu->execute([$name]);

        if($select_menu->rowCount() > 0){
            $_SESSION['error'] = "Menu name already exist!";
            header('location: updateoder_app.php');
         }
         else{
            if($image_size > 2000000000000)
            {
                $_SESSION['error'] = "image size is too large!";
                header('location: updateoder_app.php');
            }
            else
            {
               $insert_menu = $con->prepare("INSERT INTO updatemenu_app(name, price, image) VALUES(?,?,?)");
               $insert_menu->execute([$name, $price, $image]);
               move_uploaded_file($image_tmp_name, $image_folder);
               $_SESSION['success'] = "New menu added!";
               header('location: updateoder_app.php');
            }
         }
      
    }
    if(isset($_POST['add_menum']))
    {
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
     
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'images/'.$image;
     
        $select_menu = $con->prepare("SELECT * FROM updatemenu_mis WHERE name = ? ");
        $select_menu->execute([$name]);

        if($select_menu->rowCount() > 0){
            $_SESSION['error'] = "Menu name already exist!";
            header('location: updateoder_mis.php');
         }
         else{
            if($image_size > 2000000000000)
            {
                $_SESSION['error'] = "image size is too large!";
                header('location: updateoder_mis.php');
            }
            else
            {
               $insert_menu = $con->prepare("INSERT INTO updatemenu_mis(name, price, image) VALUES(?,?,?)");
               $insert_menu->execute([$name, $price, $image]);
               move_uploaded_file($image_tmp_name, $image_folder);
               $_SESSION['success'] = "New menu added!";
               header('location: updateoder_mis.php');
            }
         }
      
    }
    if(isset($_POST['add_menus']))
    {
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
     
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'images/'.$image;
     
        $select_menu = $con->prepare("SELECT * FROM updatemenu_set WHERE name = ? ");
        $select_menu->execute([$name]);

        if($select_menu->rowCount() > 0){
            $_SESSION['error'] = "Menu name already exist!";
            header('location: updateoder_set.php');
         }
         else{
            if($image_size > 2000000000000)
            {
                $_SESSION['error'] = "image size is too large!";
                header('location: updateoder_set.php');
            }
            else
            {
               $insert_menu = $con->prepare("INSERT INTO updatemenu_set(name, price, image) VALUES(?,?,?)");
               $insert_menu->execute([$name, $price, $image]);
               move_uploaded_file($image_tmp_name, $image_folder);
               $_SESSION['success'] = "New menu added!";
               header('location: updateoder_set.php');
            }
         }
      
    }
    if(isset($_GET['deleter'])){

        $delete_id = $_GET['deleter'];
        $delete_product_image = $con->prepare("SELECT image FROM updatemenu_recom WHERE id = ?");
        $delete_product_image->execute([$delete_id]);
        $delete_product = $con->prepare("DELETE FROM updatemenu_recom WHERE id = ?");
        $delete_product->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: updateoder_rec.php');

     
     }
     if(isset($_GET['deletea'])){

        $delete_id = $_GET['deletea'];
        $delete_product_image = $con->prepare("SELECT image FROM updatemenu_app WHERE id3 = ?");
        $delete_product_image->execute([$delete_id]);
        $delete_product = $con->prepare("DELETE FROM updatemenu_app WHERE id3 = ?");
        $delete_product->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: updateoder_app.php');

     
     }
     if(isset($_GET['deletem'])){

        $delete_id = $_GET['deletem'];
        $delete_product_image = $con->prepare("SELECT image FROM updatemenu_mis WHERE id4 = ?");
        $delete_product_image->execute([$delete_id]);
        $delete_product = $con->prepare("DELETE FROM updatemenu_mis WHERE id4 = ?");
        $delete_product->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: updateoder_mis.php');

     
     }
     if(isset($_GET['deletes'])){

        $delete_id = $_GET['deletes'];
        $delete_product_image = $con->prepare("SELECT image FROM updatemenu_set WHERE id2 = ?");
        $delete_product_image->execute([$delete_id]);
        $delete_product = $con->prepare("DELETE FROM updatemenu_set WHERE id2 = ?");
        $delete_product->execute([$delete_id]);
        $_SESSION['success'] = "Delete menu successfully!";
        header('location: updateoder_set.php');

     
     }

?>