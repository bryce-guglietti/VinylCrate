<?php 
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
        <div class="center" id = "myForm">
            <h1>Remove Album From Your Collection</h1>
            <form action="includes/newvinyl.inc.php" method= "post" autocomplete = "off">
                <div class="txt_field">
                    <input type = "text" name = "artist" required>
                    <span></span>
                    <label>Album Name</label> 
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
