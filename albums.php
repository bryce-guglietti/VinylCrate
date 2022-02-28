<?php
include_once 'header.php';

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

?>
            <section class="vinyl">
                <?php 
                    if (isset($_SESSION["useruid"])){
                        echo "<h1>",$_SESSION["useruid"], "'s Albums</h1>";
                    }
                    else{
                        echo "<h1>Your Albums</h1>";
                    }
                ?>
            </section>
            <section class="album-b">
                <button type="submit" name="sortyear">Sort By Year</button>
                <button type="submit" name="sortartist">Sort By Artist</button>
                <script>
                    <input type="button" onclick="location.href='newvinyl.php';" value = "Add an Album"/>
                </script>

            </section>
            <section class="albums">
                <?php
                    if (isset($_SESSION["useruid"])){
                        $userid = $_SESSION["usersid"];
                        $sort = "sortartist";
                        getAlbums($conn, $userid,$sort);
                    }
                    else{
                        echo "<h3> Your albums will go here </h3>";
                    }
                ?>
            </section>
        </div>
    </body>
</html>
