<?php
session_start();
require_once 'actions/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome - <?php echo $row['first_name']; ?></title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="hero">
                <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
                <div class="text-white p-2" >Hi <?php echo $row['first_name']; ?></div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="p-2 my-1 my_bg">
                    <a href="index.php">View products</a>
                </div>
                <div class="p-2 my-1 my_bg">
                    <a href="update_profile.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
                </div>
                <div class="p-2 my-1 my_bg">
                    <a href="logout.php?logout">Sign Out</a>
                </div>
            </div>
        </div>
    </body>
</html>