<?php
session_start();

if(isset($_POST['logout'])){
    session_destroy();
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Webiste Ilham</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>sudah masuk</h1>
    <?php
        print_r($_SESSION);
    ?>
    <form action="home.php" method="post">
    <input type="submit" value="logout" name="logout">
    </form>
</body>
</html>