<?php

function emptyInputSignup($name, $email, $username, $pwd, $rpwd){
    $results;
    if (empty($name)|| empty($email) || empty($username) || empty($pwd) || empty($rpwd)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}

function invalidUid($username){
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}

function invalidEmail($email){
    $results;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}

function pwdMatch($pwd, $rpwd){
    $results;
    if ($pwd !== $rpwd){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $results = false;
        return $results;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $results;
    if (empty($username) || empty($pwd)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}

function loginUser($conn, $username, $pwd){
    $uidExists =  uidExists($conn, $username, $username);


    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];

    $checkPwd = password_verify($pwd, $pwdHashed);


    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["usersid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        $_SESSION["name"] = $uidExists["userName"];

        header("location: ../index.php");
        exit();

    }
}

function getAlbums($conn, $userid, $sort){
    $type = sortBy($sort);
    $query = "SELECT albums.artist, albums.album FROM albums 
    LEFT OUTER JOIN users ON albums.userId=users.usersId WHERE users.usersId = '$userid'";
    $query .= " $type";
    $run = mysqli_query($conn,$query) or die(mysqli_error('error'));

    if (mysqli_num_rows($run) > 0 ) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($run)){
            echo "<p>$i. " . $row["artist"]. " - " . $row["album"]. "<br>";
            $i = $i +1;
        }
        echo "</p";
    }
    else{
        echo "<h3>Your Albums Will Be Shown Here</h3>";
    }
}

function sortBy($peram){
    if ($peram === "sortyear"){
        $result = "ORDER BY year";
    }
    else if ($peram === "sortartist"){
        $result = "ORDER BY IF(albums.artist LIKE 'The %', substr(albums.artist, 5), albums.artist), albums.album";
    }
    return $result;
}
function countAlbums($conn, $userid){
    $query = "SELECT albums.artist, albums.album FROM albums 
    INNER JOIN users ON albums.userId=users.usersId WHERE users.usersId = '$userid'";

    $run = mysqli_query($conn,$query) or die(mysqli_error('error'));

    if (mysqli_num_rows($run) > 0 ) {
        echo "<h3>You Currently Have: ", mysqli_num_rows($run), " Vinyl Albums</h3>";

    }
    else{
        echo "<h3>You Don't Have Any Vinyl Albums Logged Yet</h3>";
    }
}

function addNewVinyl($conn, $artist, $album, $year, $rating, $userid){
    $query = "SELECT albums.album FROM albums 
    INNER JOIN users ON albums.userId=users.usersId 
    WHERE users.usersId = '$userid' AND albums.album = '$album'";
    
    $run = mysqli_query($conn,$query) or die(mysqli_error('error'));


    if (mysqli_num_rows($run)>0){
        echo "<script type='text/javascript'>alert('Album already in Library');</script>";
    }
    else{
        $query = "INSERT INTO albums (artist, album, year, rating, userId) VALUES ('$artist', '$album', '$year', '$rating', '$userid');";

        $run = mysqli_query($conn,$query);

        if ($run){
            header("location: ../albums.php");
            $message = "Album submitted successfully";
            echo "<script>alert('$message')</script>";
        }
        else{
            echo "Failed";
        }
    }
}
