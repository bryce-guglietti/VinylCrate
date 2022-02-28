<?php 
    include_once 'header.php';
?>
            <section class="profile">
                <?php
                    if (isset($_SESSION["useruid"])){
                        echo "<h1>". $_SESSION["useruid"] . "'s Profile</h1>";
                        echo "<h3>Name: ". $_SESSION["name"] . "</h3>";
                        echo "<h3>Username: ". $_SESSION["useruid"] . "</h3>";

                    }

                ?>
                <button type="submit" name = "edit">Edit</button>
            </section>
        </div>
    </body>
</html>
