<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = $connect->query($sql);
    $tbody='';
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $title = $data['title'];
        $author_name = $data['author_name'];
        $author_lastname = $data['author_lastname'];
        $code = $data['code'];
        $description = $data['description'];
        $publish_date = $data['publish_date'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $size = $data['size'];
        $type = $data['type'];
        $status = $data['status'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    $tbody = "
            <div class='row col-12 my-4'>
                <div class='col-12 col-md-4 mb-3'>
                    <img src='pictures/" .$picture."'>
                </div>

                <div class='col-12 col-md-8'>
                    <div class='fs-5 fw-bold'>" .$title."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Author:</span> " .$author_name. ' ' . $author_lastname."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>ISBN code:</span> " .$code."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Description:</span> " .$description."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Publish date:</span> " .$publish_date."</div>
                    <a href='publisher-details.php?publisher=" .$id."'>
                        <div class='my-2'><span class='text-secondary fw-bold'>Publisher:</span> " .$publisher_name."</div>
                    </a>
                    <div class='my-2'><span class='text-secondary fw-bold'>Size:</span> " .$size."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Type:</span> " .$type."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Status:</span> " .$status."</div>
                </div>
                
                <div class='col-12'>
                    <a href='update.php?id=" .$id."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                    <a href='delete.php?id=" .$id."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
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
        <title>Details</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">    
            <div class='h2 my-3'>Details</div>
            <div class="row">
                <?= $tbody;?>
            </div>
        </div>
    </body>
</html>