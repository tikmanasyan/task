<?php
function message($status, $message) {
    if($status == "success") {
        echo "<div class='alert alert-success'>$message</div>";
    } else if($status == 'fail') {
        echo "<div class='alert alert-danger'>$message</div>";
    } else if( $status == 'info') {
        echo "<div class='alert alert-info'>$message</div>";
    }
}