<?php 
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM media WHERE id = {$id}" ;
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
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
        <title>Delete media</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">  
            <div class="row my-3">
                <div class="col-12 h2">Delete media</div>
                <h5 class="my-3">You have selected the media:</h5>
                <img class='img-thumbnail' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
                <div class='fs-5 fw-bold'><?php echo $title?></div>
                <div class='my-2'><?php echo $type?></div>

                <h3 class="my-4">Do you really want to delete this media?</h3>
                <form action ="actions/a_delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                    <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                    <a href="index.php"><button class="btn my_bg" type="button">No, go back!</button></a>
                </form>
            </div>
        </div>
    </body>
</html>