<?php 
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
        <div class="center" id = "myForm">
            <h1>Add Record to Library</h1>
            <form action="includes/newvinyl.inc.php" method= "post" autocomplete = "off">
                <div class="txt_field">
                    <input type = "text" name = "artist" required>
                    <span></span>
                    <label>Artist</label> 
                </div>
                <div class="txt_field">
                    <input type = "text" name = "album" required>
                    <span></span>
                    <label>Album</label>
                </div>
                <div class="txt_field">
                    <input type = "text" name = "year" required>
                    <span></span>
                    <label>Release Year</label> 
                </div>
                <div class="txt_field">
                    <input type = "text" name = "rating" required>
                    <span></span>
                    <label>Rating</label> 
                </div>
                <?php 
                    if (isset($_SESSION["useruid"])){
                        $userid = $_SESSION['usersid'];
                    }             
                ?>
                <input type = "hidden" name = "userid" value = <?php echo $userid; ?>>

                <button type= "submit" name = "submitvinyl">Submit</button>
                
                <button type = "reset" name = "reset">Clear Form</button>

                <a href="albums.php" name = "gobackalbum" class="button">Back</a>


            </form>

        </div>
        </div>
    </body>
</html>
