<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (isset($_POST["submitvinyl"])){

        $artist = $_POST["artist"];
        $album = $_POST["album"];
        $year = $_POST["year"];
        $rating = $_POST["rating"];
        $userid = $_POST["userid"];


        addNewVinyl($conn, $artist, $album, $year, $rating, $userid);

    }
    else{
        header("location: ../albums.php");
        exit();
    }