<?php 
    include_once 'header.php';
?>
    <section class="signup-form">
        <h1>Sign Up</h1>
        <div class="sign-up-form">
            <form action="includes/signup.inc.php" method= "post" autocomplete = "off">
                <div class="signup-text">
                    <input type = "text" name = "name" required>
                    <span></span>
                    <label>Full Name</label> 
                </div>
                <div class="signup-text">
                    <input type = "text" name = "email" required>
                    <span></span>
                    <label>Email</label> 
                </div>
                <div class="signup-text">
                    <input type = "text" name = "uid" required>
                    <span></span>
                    <label>Username</label> 
                </div>
                <div class="signup-text">
                    <input type = "password" name = "pwd" required>
                    <span></span>
                    <label>Password</label> 
                </div>
                <div class="signup-text">
                    <input type = "password" name = "rpwd" required>
                    <span></span>
                    <label>Repeat Password</label> 
                </div>
                <button type="submit" name = "submit">Sign Up</button>
            </form>
        </div>
        <?php 
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Please Fill All Fields</p>";
            }
            else if ($_GET["error"] == "invaliduid"){
                echo "<p>Invalid Username</p>";
            }
            else if ($_GET["error"] == "invalidemail"){
                echo "<p>Email Is Not Valid</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords Do Not Match</p>";
            }
            else if ($_GET["error"] == "usernametaken"){
                echo "<p>Username Already Taken!</p>";
            }
            else if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something Went Wrong, Try Again!</p>";
            }
            else if ($_GET["error"] == "none"){
                echo "<p>You Have Signed Up!</p>";
            }
        }
        ?>
    </section>
    </div>
    </body>
</html>
