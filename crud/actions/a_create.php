<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $title = $_POST['title'];
    $author_name = $_POST['author_name'];
    $author_lastname = $_POST['author_lastname'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $publish_date = $_POST['publish_date'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $uploadError = '';
    //this function exists in the service file upload.
    $picture = file_upload($_FILES['picture']);  
   
    $sql = "INSERT INTO media (title, author_name, author_lastname, code, description, publish_date, publisher_name, publisher_address, size, type, status, picture) VALUES ('$title', '$author_name', '$author_lastname', '$code', '$description', '$publish_date', '$publisher_name', '$publisher_address', '$size', '$type', '$status', '$picture->fileName')";

    if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The entry was successfully created";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <link rel="stylesheet" href="../css/style.css" />
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="fw-bold fs-4 text-<?=$class;?>" role="alert">
                <p><?= $message; ?></p>
                <p><?= $uploadError; ?></p>
                <a href='../index.php'><button class="btn my_bg" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>