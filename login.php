<?php 
    include_once 'header.php';
?>
    <section class="login-form">
        <div class="login-form">
            <h1>Log In</h1>
            <form action="includes/login.inc.php" method= "post" autocomplete = "off">
                <div class="login-text">
                    <input type = "text" name = "uid" required>
                    <span></span>
                    <label>Username/Email</label> 
                </div>
                <div class="login-text">
                    <input type = "password" name = "pwd" required>
                    <span></span>
                    <label>Password</label> 
                </div>
                <button type="submit" name = "submitlogin">Log In</button>
            </form>
        </div>
        <?php 
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Please Fill All Fields</p>";
            }
            else if ($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect username or password</p>";
            }
        }
        ?>
    </section>
    </div>
    </body>
</html>
