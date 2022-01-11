<?php
session_start();
if(!isset($_SESSION['checked_user'])) {
    $_SESSION['msg'] = [
        'status' => 'info',
        'content' => 'Login please'
    ];
    header("location:http://task.loc/views/auth/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require_once './../includes/bootstrap.php'; ?>
</head>
<body>
<?php require("./../includes/navbar.php"); ?>
<div class="container">

</div>

</body>
</html>"