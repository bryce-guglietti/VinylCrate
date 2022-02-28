<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Vinyl Crate</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/reset.css">
    </head>
    <body>
        <nav>
            <div class= "logo">
                <ul>
                    <li><a href="index.php">Vinyl Crate</a></li>
                </ul>
            </div>
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="albums.php">Vinyl</a></li>
                    <?php
                        if (isset($_SESSION["useruid"])){
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                        }
                        else{
                            echo "<li><a href='signup.php'>Sign Up</a></li>";
                            echo "<li><a href='login.php'>Login</a></li>";
                        }
                    ?>                  
                </ul>
            </div>
        </nav>
        <div class="wrapper">