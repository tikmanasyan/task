<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/App/lib/message.php";
    if(isset($_SESSION['checked_user'])) {
        if($_SESSION['checked_user'][0]['role_id'] == 1) {
            header("location:http://task.loc/views/admin/dashboard.php");
        } else if($_SESSION['checked_user'][0]['role_id'] == 2) {
            header("location:http://task.loc/views/user/home.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php require_once './../includes/bootstrap.php'; ?>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="register-form">
                    <div class="register-form-header">
                        <h2>Create account</h2>
                    </div>
                    <div class="register-form-messages">
                        <?php if(isset($_SESSION['msg'])) {
                            $message = $_SESSION['msg'];
                            message($message['status'], $message['content']);
                            unset($_SESSION['msg']);
                        } ?>
                    </div>
                    <div class="register-form-body">
                        <form action="http://task.loc/routes/web.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First name</label>
                                <input name="fn" type="text" class="form-control" id="first_name" placeholder="John">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last name</label>
                                <input name="ln" type="text" class="form-control" id="last_name" placeholder="Smith">
                            </div>

                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Birth date</label>
                                <input name="bd" type="date" class="form-control" id="birth_date">
                            </div>

                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input name="avatar" type="file" class="form-control" id="avatar" >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input name="prd" type="password" class="form-control" id="password">
                            </div>

                            <button name="action" value="register" class="btn btn-success">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    
</body>
</html>