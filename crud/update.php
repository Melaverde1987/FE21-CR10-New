<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}";
    $result = $connect->query($sql);
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
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
        <title>Edit media</title>
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">  
            <div class="row my-3">
                <div class="col-12 h2">Edit media</div>
                <img class='img-thumbnail my-3' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
            </div>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data" class="my-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Title</span>
                    <input class='form-control col-12 col-md-9' type="text" name="title" value="<?php echo $title ?>" placeholder="Insert title" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Author name</span>
                    <input class='form-control col-12 col-md-9' type="text" name="author_name" value="<?php echo $author_name ?>" placeholder="Insert author name" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Author lastname</span>
                    <input class='form-control col-12 col-md-9' type="text" name="author_lastname" value="<?php echo $author_lastname ?>" placeholder="Insert author lastname" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">ISBN code</span>
                    <input class='form-control col-12 col-md-9' type="number" name="code" value="<?php echo $code ?>" placeholder="Insert ISBN code" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Description</span>
                    <input class='form-control col-12 col-md-9' type="text" name="description" value="<?php echo $description ?>" placeholder="Insert description" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publish date</span>
                    <input class='form-control col-12 col-md-9' type="date" name="publish_date" value="<?php echo $publish_date ?>" placeholder="Insert publish date" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publisher name</span>
                    <input class='form-control col-12 col-md-9' type="text" name="publisher_name" value="<?php echo $publisher_name ?>" placeholder="Insert publisher name" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publisher address</span>
                    <input class='form-control col-12 col-md-9' type="text" name="publisher_address" value="<?php echo $publisher_address ?>" placeholder="Insert publisher address" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Size</span>
                    <input class='form-control col-12 col-md-9' type="text" name="size" value="<?php echo $size ?>" placeholder="Big,medium or small" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Type</span>
                    <input class='form-control col-12 col-md-9' type="text" name="type" value="<?php echo $type ?>" placeholder="Book, CD or DVD" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Status</span>
                    <input class='form-control col-12 col-md-9' type="text" name="status" value="<?php echo $status ?>" placeholder="available or reserved" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Picture</span>
                    <input class='form-control col-12 col-md-9' type="file" name="picture"/>
                </div>

                <input type= "hidden" name="id" value="<?php echo $data['id'] ?>" />
                <input type= "hidden" name="picture" value="<?php echo $data['picture'] ?>" />

                <button class='btn my_bg border-secondary' type="submit">Save changes</button>
            </form>
        </div>
    </body>
</html>