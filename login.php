<?php 
    session_start();
    if(!isset($_SESSION['username'])) {
        $_SESSION['username'] = "";
        $_SESSION['can_edit'] =  0;
    }
   
    //checking if a username and password was sent from a form
    //if the page just opened for the first time this won't have been sent
    if(isset($_POST['username']) && isset($_POST['password'])) {

        require 'includes/connection.inc.php';

        //search for the record for the inputted username if it exists
        $sql = sprintf("SELECT * FROM users WHERE username ='%s'",
        $db->real_escape_string($_POST['username']));

        $result = $db->query($sql);
        $row = $result->fetch_object();

        //checking if a record was return from the search
        if($row != null) {
            $hash = $row->hash;

            if(password_verify($_POST['password'], $hash)) {
                $_SESSION['username'] = $row->username;
                $_SESSION['can_edit'] = $row->can_edit;

                //check if user is allowed to edit exams
                if($_SESSION['username'] !== "" && $_SESSION['can_edit'] != 0) {
                    header('location: edit_exams.php');
                } else {
                    header('location: /exam_clock');
                } 
            } else {
                header('location: login.php');
            }
        } else {
            header('location: login.php');
        }
    
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>
<body>
<div class="sidenav">
    <div class="login-main-text">
        <?php 
            if(isset($_SESSION['can_edit']) && $_SESSION['can_edit'] == 1) {
                printf('<h2>Exams Clock<br> Logged in as %s</h2>',
                    htmlspecialchars($_SESSION['username'], ENT_QUOTES));
                printf('<br>Click to edit exams');
            } else {
                printf('<h2>Exams Clock<br> Login Page</h2>');
                printf('<p>Login to access editor page.</p>');
            }
        ?>
    </div>

    <div class="clock-button">
        <h3>Hall Exams Clock</h3>
    </div>
    <div class="clock-button">
        <h3>Enterprise Exams Clock</h3>
    </div>
    <div class="clock-button">
        <h3>Custom 1 Clock</h3>
    </div>
    <div class="clock-button">
        <h3>Custom 2 Clock</h3>
    </div>
</div>

<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
        <form action="" method="POST">
            <div class="form-group">
            <label>User Name</label>
            <input type="text" class="form-control" placeholder="User Name" name="username">
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-black">Login</button>
            </form>
            </div>
         </div>
      </div>
</body>
    <script src="./js/login.js"></script>
</html>




