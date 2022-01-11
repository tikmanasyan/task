<?php
session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/App/lib/database.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/App/lib/message.php';
class User {
    protected $db; 
    public function __construct() {
        $connect = new  Database();
        $this->db = $connect->connect();
    }

    public function unique_email($email) {
        $result = $this->db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        return ($result->num_rows > 0) ? true : false;  
    }

    public function verify_email_sender($email) {
        $result = $this->db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch_all(MYSQLI_ASSOC)[0];
        $user_id = md5($user['id']);
        $user_email = $user['email'];
        $url = "http://task.loc/App/lib/email_verify.php?user_id=$user_id&user_email=$user_email";
        $message = "";
        echo $message;
        $subject = "Verification Email";
        $msg = "For activate your profile enter on link please. <a href='$url'>$url</a>";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($user_email, $subject, $msg, $headers);
    }

    public function register($f_name, $l_name, $b_date, $avtr, $email, $password) {
        if($this->unique_email($email)) {
            return 1;
        } else {
            $password = md5($password);
            $result = $this->db->query("INSERT INTO `users` VALUES (null, '$f_name', '$l_name', '$b_date', '$avtr', '$email', 0, '$password', NOW(), 1)");
            if($result) {
                $this->verify_email_sender($email);
            }

            header("location:http://task.loc/views/register_verify_msg.php");
        }
    }

    public function login($email, $password) {
        $result = $this->db->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ");
        if($result->num_rows > 0) {
            $_SESSION['checked_user'] = $result->fetch_all(MYSQLI_ASSOC);
            if($_SESSION['checked_user'][0]['email_verified'] == 1) {
                if($_SESSION['checked_user'][0]['role_id'] == 1) {
                    header("location:http://task.loc/views/admin/dashboard.php");
                } else {
                    header("location:http://task.loc/views/user/home.php");
                }
            } else {
                header("location:http://task.loc/views/register_verify_msg.php");
            }

        }
    }

    public function logout() {
        session_destroy();
        header("location:http://task.loc/views/auth/login.php");
    }

}

