<?php

// Database connection
require_once( 'database/config.php' );

// create global variable
$username = null;
$password = null;

// for error message to be display
$error_msg = null;
$success_msg = null;


// handle Login attempts
if ( isset( $_POST[ 'login_btn' ] ) ) {

    // get username and password
    $username = trim( $_POST[ 'username' ] );
    $password = trim( $_POST[ 'password' ] );

    // sql to check if the username and password is correct
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";

    if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
        // Login successfully
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        $success_msg = 'Congratulations, login successfully!';

        // now change the page location of the user, meaning show your main page after login
        header('location: home/');


    } else {
        // incorrect useraname or password
        $error_msg = 'Incorrect useraname or password, please try again!';
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Signin your account</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
        integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- CSS style -->
    <link rel='stylesheet' href='assets/css/style.css'>

    <!-- main javascript -->
    <script src='assets/js/main.js'></script>

    <style>
    body {
        background: #2b32b2;
        background: -webkit-linear-gradient(191deg, #2b32b2 0%, #1488cc 100%);
        background: linear-gradient(191deg, #2b32b2 0%, #1488cc 100%);
    }
    </style>
</head>

<body class='p-3'>
    <form action='' method='POST' class='container mx-auto border bg-white rounded'>
        <h2 class='p-2'>Sign-in your account</h2>
        <hr>
        <!-- error message container -->
        <div
            class="<?php echo !isset($error_msg) ? 'd-none' : null ?> p-1 alert-danger rounded d-flex items-center justify-content-start">
            <i class="fas fa-warning" style="color: #dc3545;"></i>&nbsp;&nbsp;
            <span style="color: #dc3545;">
                <?php echo $error_msg ?>
            </span>
        </div>

        <!-- success message container -->
        <div
            class="<?php echo !isset($success_msg) ? 'd-none' : null ?> p-1 alert-success rounded d-flex items-center justify-content-start">
            <i class="fas fa-check"></i>&nbsp;&nbsp;
            <span>
                <?php echo $success_msg ?>
            </span>
        </div>

        <div class='my-3'>
            <label for='username' class='form-label'>Username</label>
            <input type='text' value="<?php echo $username ?>" id='username' name='username' class='form-control'
                required>
        </div>

        <div class='my-3'>
            <label for='password' class='form-label'>Password</label>
            <div class='position-relative'>
                <input type='password' value="<?php echo $password ?>" id='password' name='password'
                    class='form-control' required>
                <i id='eye' class='fa fa-eye-slash position-absolute top-50% right-20px transform-translate-y-N50%'></i>
            </div>

        </div>

        <div class='d-flex align-items-center justify-between'>
            <div class='d-flex align-items-center justify-center'>
                <input id='checkbox1' type='checkbox'>&nbsp;
                <label for='checkbox1' class='fs-6'>Remember login</label>
            </div>
            <a href='#' class='fs-6'>Forgot password?</a>
        </div>

        <div class='my-3'>
            <button type='submit' class='btn-primary' name='login_btn'>Sign-in &nbsp;
                <i class='fas fa-sign-in text-white'></i></button>
        </div>

        <p class='text-center fs-6'>
            Don't have an account? <a href='./signup.php' class='text-secondary'>Sign-up now</a>
        </p>

    </form>

</body>

</html>