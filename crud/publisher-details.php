<?php
require_once 'actions/db_connect.php';

if ($_GET['publisher']) {
    $id = $_GET['publisher'];
    $sql = "SELECT * FROM media WHERE id = '{$id}'";
    $result = $connect->query($sql);
    $tbody='';
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $publish_date = $data['publish_date'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $size = $data['size'];
    } else {
        header("location: error.php");
    }
    $tbody = "
            <div class='row col-12 my-4'>
                <div class='col-12'>
                    <a href='publisher-details.php?publisher=" .$id."'>
                        <div class='fs-5 fw-bold'>" .$publisher_name."</div>
                    </a>
                    <div class='my-2'><span class='text-secondary fw-bold'>Publish date:</span> " .$publish_date."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Size:</span> " .$size."</div>
                </div>
            </div>
            ";
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publisher details</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">    
            <div class='h2 my-3'>About publisher</div>
            <div class="row">
                <?= $tbody;?>
            </div>
        </div>
    </body>
</html>