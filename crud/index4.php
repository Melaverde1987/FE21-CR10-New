<?php 
session_start();
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM media WHERE type = 'DVD'";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){      
        $buttons='';
        if ( isset($_SESSION['adm']) ) {
            $buttons = "
                <div class='col-12'>
                    <a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                    <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
                </div>";
        }    
        $tbody .= "
            <div class='row col-12 col-lg-6 my-4'>
                <div class='col-12 col-md-4 mb-3 image_height'>
                    <img src='pictures/" .$row['picture']."'>
                </div>
                <div class='col-12 col-md-8'>
                    <div class='fs-5 fw-bold'>" .$row['title']."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Author:</span> " .$row['author_name']. ' ' . $row['author_lastname']."</div>
                    <div class='my-2'><span class='text-secondary fw-bold'>Type:</span> " .$row['type']."</div>
                    <a href='publisher-details.php?publisher=" .$row['id']."'>
                        <div class='my-2'><span class='text-secondary fw-bold'>Publisher:</span> " .$row['publisher_name']."</div>
                    </a>
                    <a href='details.php?id=" .$row['id']."'>
                        <button class='btn btn-light my-2' type='button'>Show media</button>
                    </a>
                </div>
                ". $buttons."
            </div>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Library</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">    
            <div class="h2 my-4">Media</div>
            <div class="row">
                <?= $tbody;?>
            </div>
        </div>
    </body>
</html>