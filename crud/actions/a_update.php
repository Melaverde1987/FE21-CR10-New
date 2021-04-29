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
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $picture = file_upload($_FILES['picture']);//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="product.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE media SET title = '$title', author_name = '$author_name', author_lastname = '$author_lastname', code = '$code', description = '$description', publish_date = '$publish_date', publisher_name = '$publisher_name', publisher_address = '$publisher_address', size = '$size', type = '$type', status = '$status', picture = '$picture->fileName' WHERE id = {$id}";
    }else{
        $sql = "UPDATE media SET title = '$title', author_name = '$author_name', author_lastname = '$author_lastname', code = '$code', description = '$description', publish_date = '$publish_date', publisher_name = '$publisher_name', publisher_address = '$publisher_address', size = '$size', type = '$type', status = '$status' WHERE id = {$id}";
    }    
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
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
        <title>Update</title>
        <?php require_once '../components/boot.php'?> 
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="fw-bold fs-4 text-<?php echo $class;?>" role="alert">
                <p><?= $message; ?></p>
                <p><?= $uploadError; ?></p>
                <a href='../index.php'><button class="btn my_bg" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html> 