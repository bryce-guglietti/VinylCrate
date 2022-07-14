<?php 
    include_once 'header.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';
?>
            <section class="index-intro">
                <h1>Home</h1>
                <?php
                    if (isset($_SESSION["useruid"])){
                        echo "<h2>Hello, " . $_SESSION["useruid"] . "!</h2>";
                        $userid = $_SESSION["usersid"];
                        countAlbums($conn, $userid);
                        echo "<h3>Search through your collection, add to it, or remove from it</h3>";
                    }
                    else{
                        echo "<p>This Website uses a fully functional login system to keep an inventory of 
                        vinyl record collections. <br><br><br>Start by signing up, logging in, 
                        and adding your collection in.</p>";
                    }
                ?>
                
            </section>
        </div>
    </body>
</html>
