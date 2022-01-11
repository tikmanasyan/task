<?php

function email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = [
            'status' => 'fail',
            'content' => "Invalid email format"
        ] ;
        return true;
    } else {
        return false;
    }
}