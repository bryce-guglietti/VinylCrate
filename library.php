<?php
$server = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "vinyl";


$conn = mysqli_connect($server , $username , $password , $dbname) ;


if(isset($_POST['submit'])){
    if(!empty($_POST['artist']) && !empty($_POST['album']) && !empty($_POST['year']) && !empty($_POST['rating'])){
        $artist = $_POST['artist'] ;
        $album = $_POST['album'] ;
        $year = $_POST['year'] ;
        $rating = $_POST['rating'] ;

        $query = "SELECT album FROM albums WHERE album = '$album'";
        $run = mysqli_query($conn,$query) or die(mysqli_error('error'));

        if (mysqli_num_rows($run)>0){
            //echo "Album already in Library";
        }
        else{
            $query = "insert into albums(artist,album,year,rating) values('$artist' , '$album' , '$year' , '$rating')";

            $run = mysqli_query($conn,$query) or die(mysqli_error('error'));

            if ($run){
                $message = "Form submitted successfully";
                header("refresh: 0.5; url= http://localhost/cp476/Library/");
                echo "<script>alert('$message')</script>";
            }
            else{
                $message = "Form could not be submitted";
                //echo "<script>alert('$message')</script>";
            }
        }
    }
    else{
        //echo " all fields are required " ;
    }
}
if (isset($_POST['GET'])){
    $query = "SELECT artist, album FROM albums ORDER BY IF(artist LIKE 'The %', substr(artist, 5), artist)";

    $run = mysqli_query($conn,$query) or die(mysqli_error('error'));

    if (mysqli_num_rows($run) > 0 ) {
        echo "<h2>Vinyl Collection</h2>";
        while ($row = mysqli_fetch_assoc($run)){
            echo "Artist: " . $row["artist"]. " - Album: " . $row["album"]. "<br>";
        }
    }
    else{
        echo "0 results";
    }
}
?>
