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
                <a href="editAcc.php" name = "editAcc" class="button">Edit</a>
            </section>
        </div>
    </body>
</html>
