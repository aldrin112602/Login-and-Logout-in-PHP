<?php

// Database connection
require_once( '../database/config.php' );

// check if user is logged in
if(! $_SESSION['login']) {
    header('../index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Home</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
        integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- CSS style -->
    <link rel='stylesheet' href='../assets/css/style.css'>

</head>

<body class='p-3'>
    <a class="btn btn-primary p-1 text-decoration-none" href="../logout.php" style="text-decoration: none;">Logout now</a>
    <h1>
        Welcome <?php echo $_SESSION['username'] ?> !
    </h1>
</body>

</html>