<?php 
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture =="product.png")?: unlink("../pictures/$picture");

    $sql = "DELETE FROM media WHERE id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
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
        <title>Delete</title>
        <?php require_once '../components/boot.php'?>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="fw-bold fs-4 text-<?php echo $class;?>" role="alert">
                <p><?= $message; ?></p>
                <a href='../index.php'><button class="btn my_bg" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>