<?php 
    include_once 'header.php';
?>
        <div class="center" id = "myForm">
            <h1>Add Record to Library</h1>
            <form action="library.php" method= "POST" autocomplete="off">
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
                <button type= "submit" name = "submit">Submit</button>
                
                <button type = "reset" name = "reset">Clear Form</button>

                <button type = "menu" name = "close" onclick="closeForm()">Close</button>

            </form>

        </div>
        <div class = "opening-scene">
            <h1>Bryce's Records</h1>
            <button type = "menu" class= "open-button" name = "addRec" onclick="openForm()">Add A Record</button>
            <form action="library.php" method="POST">
                <button class= "records-button"type = "submit" name = "GET">Get Records</button>
            </form>
        </div>
        </div>
    </body>
</html>
