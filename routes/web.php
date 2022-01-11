<?php
//    session_start();
    require("../App/models/User.php");
    require("../App/lib/file_upload.php");
    require("../App/lib/password.php");
    require("../App/lib/email.php");
    require("../App/lib/input_mysql.php");
    $action = "";
    $user = new User();

    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    } else if($action = $_POST['action']) {
        $action = $_POST['action'];
    }

    if($action == 'register') {
        if(empty($_POST['fn'])) {
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter First name please'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else if(empty($_POST['ln'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter Last name please'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else if(empty($_POST['bd'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter Birth date please'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else if(empty($_FILES['avatar'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Choose avatar please'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else if(empty($_POST['email'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter email please'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else if(empty($_POST['prd'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter password'
            ];
            header("location:http://task.loc/views/auth/register.php");
        } else {
            $file_upload = upload($_FILES['avatar']);
            if($file_upload) {
                $user->register(
                    sqlinp($_POST['fn']),
                    sqlinp($_POST['ln']),
                    sqlinp($_POST['bd']),
                    $file_upload,
                    sqlinp($_POST['email']),
                    hash_password(sqlinp($_POST['password']))
                );
            }
        }
    } else if($action == 'login') {

        if(empty($_POST['email'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter email please'
            ];
            header("location:http://task.loc/views/auth/login.php");
        } else if(empty($_POST['prd'])){
            $_SESSION['msg'] = [
                'status' => 'fail',
                'content' => 'Enter password'
            ];
            header("location:http://task.loc/views/auth/login.php");
        } else {
            $user->login(sqlinp($_POST['email']), sqlinp(hash_password($_POST['prd'])));
        }
    } else if($action == 'logout'){
        $user->logout();
    }

