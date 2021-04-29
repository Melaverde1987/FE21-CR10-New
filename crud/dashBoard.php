<?php
session_start();
require_once 'actions/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['adm']);
$row_adm = mysqli_fetch_array($res, MYSQLI_ASSOC);

$id = $_SESSION['adm'];
$status = 'adm';
$sqlSelect = "SELECT * FROM user WHERE status != ? ";
$stmt = $connect->prepare($sqlSelect);
$stmt->bind_param("s", $status);
$work = $stmt->execute();
$result = $stmt->get_result();

//this variable will hold the body for the table
$tbody = ''; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "
            <div class='col-12 col-md-2 p-2'>
                <img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . ">
            </div>
            <div class='col-12 col-md-2 p-2 fw-bold'>" . $row['first_name'] . " " . $row['last_name'] . "</div>
            <div class='col-12 col-md-2 p-2'>" . $row['date_of_birth'] . "</div>
            <div class='col-12 col-md-3 p-2'>" . $row['email'] . "</div>
            <div class='col-12 col-md-3 p-2 mb-4'>
                <a href='update_profile.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                <a href='delete_profile.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </div>
        ";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adm-DashBoard</title>
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="hero">
                <img class="userImage" src="pictures/<?php echo $row_adm['picture']; ?>" alt="<?php echo $row_adm['first_name']; ?>">
                <div class="text-white p-2" >Hi <?php echo $row_adm['first_name']; ?></div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-2">
                    <div class="fw-bold">Administrator</div>
                    <div class="p-2 my-1 my_bg">
                        <a href="index.php">View products</a>
                    </div>
                    <div class="p-2 my-1 my_bg">
                        <a href="create.php">Add product</a>
                    </div class="p-2 my_bg">
                    <div class="p-2 my-1 my_bg">
                        <a href="update_profile.php?id=<?php echo $_SESSION['adm'] ?>">Update your profile</a>
                    </div>
                    <div class="p-2 my-1 my_bg">
                        <a href="logout.php?logout">Sign Out</a>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mt-2">
                    <p class='h2'>Users</p>
                    <div class="row bg-secondary text-white text-center">
                        <div class="col-12 col-md-2 p-2">Picture</div>
                        <div class="col-12 col-md-2 p-2">Name</div>
                        <div class="col-12 col-md-2 p-2">Date of birth</div>
                        <div class="col-12 col-md-3 p-2">Email</div>
                        <div class="col-12 col-md-3 p-2">Action</div>
                    </div>
                    <div class="row text-center align-items-center">
                        <?=$tbody?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>