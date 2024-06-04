<?php
session_start();
function db_connect()
{
    $serverName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $dbName = 'radiogaga';

    $conn = new mysqli($serverName, $userName, $passWord, $dbName);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    return $conn;
}

function getNav(){
    $conn = db_connect();
    $sql = "SELECT * FROM navigation";
    $resource = $conn->query($sql) or die($conn->error);
    $navigation = $resource->fetch_all(MYSQLI_ASSOC);
    return $navigation;
}
function htmlNav()
{
    ?>
    <header>
        <nav>
            <ul id="ulNav">
                <li id="navList"><a href="index.php"><img src="images/logo radios.svg" id="logoIndex"></a></li>

                <?php foreach(getNav()as $navigation):?>
                <li id="navList"><a href="<?php echo $navigation['page_link']?>"><?php echo $navigation['page_title']?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <?php
}
function htmlHead()
{
    ?>

    <head>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <script src="script.js"></script>
        <title> RadioGaga 73717 </title>
        <meta charset='Utf-8'>
        </meta>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <meta name='author' content='Lindsay van Heugten' />
    </head>
    <?php
}

function htmlFoot()
{
    ?>
    <footer id='footerPlaylist'></footer>
    <?php
}

function getSongs()
{
    //connect database 
    $conn = db_connect();
    //define sql statement
    //select tab songs and join video tab when clicking song, video is linked to songid
    $sql = "SELECT * FROM songs INNER JOIN videos ON songs.video_id = videos.video_id"; 
    //run query 
    $recourse = $conn->query($sql) or die($conn->error);
    //Fetch the result as an associative array
    $songs = $recourse->fetch_all(MYSQLI_ASSOC);
    //return array songs
    return $songs;
}

function getAlbumPathForSong($songId)
{
    $conn = db_connect();
    //select tab songs and join album tab when clicking song, album is linked to songid
    $sql = "SELECT albums.album_path FROM songs INNER JOIN albums ON songs.albumId = albums.album_id WHERE song_id=$songId";
    $recourse = $conn->query($sql) or die($conn->error);

    $songs = $recourse->fetch_assoc();
    return $songs;
}

function getArtists(){
    $conn = db_connect();
    $sql = "SELECT * FROM artists";
    $resource = $conn->query($sql) or die($conn->error);
    $artists = $resource->fetch_all(MYSQLI_ASSOC);
    return $artists;
}

function postForm(){
    $FirstName = $LastName = $Email = $Subject = $YourGenderSelect = '';
    $FirstNameErr = $LastNameErr = $EmailErr ='';
    $SubmitMessage = '';
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // Check if the reset button is pressed
        if (isset($_POST["reset"])) {
            // Reset all values to empty strings
            $FirstName = $LastName = $Email = $Subject = $YourGenderSelect = '';
        } else {
            // Validate First Name
            if (empty($_POST["FirstName"])) {
                $FirstNameErr = "First Name is required";
            } else {
                $FirstName = $_POST["FirstName"];
            }

            // Validate Last Name
            if (empty($_POST["LastName"])) {
                $LastNameErr = "Last Name is required";
            } else {
                $LastName = $_POST["LastName"];
            }

            // Validate Email
            if (empty($_POST["Email"])) {
                $EmailErr = "Email is required";
            } else {
                $Email = $_POST["Email"];
            }
            if (empty($_POST["Subject"])) {
                $SubjectErr = "";
            } else {
                $Subject = $_POST["Subject"];
            }
            //select your gender
            $YourGenderSelect = $_POST["YourGenderSelect"]; 
            
            if(isset($_POST["Submit"])){
                $SubmitMessage = "Thank you, " . $FirstName . " " . $LastName . ", for contacting RadioGaGa";
            }
        } 
    }  
    
    //Show message in showFormInput when pressing submit button
 

    ?>
    <main id="registrationFormContainer">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <label id="firstName"> First Name </label>
            <br>
            <input type="text" id="FirstName" name="FirstName" placeholder="Your name..">
            <br>
            <div class="showFormInput">
                <p><?php echo $FirstNameErr; ?></p>
                <p><?php echo $FirstName; ?></p>
            </div>
            <br>

            <label id="LastName"> Last Name</label>
            <br>
            <input type="text" id="LastName" name="LastName" placeholder="Your last name..">
            <br>
            <div class="showFormInput">
                <p><?php echo $LastNameErr; ?></p>
                <p><?php echo $LastName; ?></p>
            </div>
            <br>
            <label id="YourGender">Gender</label>
            <br>
            <select name="YourGenderSelect" id="YourGenderSelect">
                <option value="Female"> Female </option>
                <option value="Male"> Male </option>
                <option value="Neither"> Neither</option>
                <option value="Helicopter"> Helicopter </option>
            </select>
            <br>
            <div class="showFormInput">
                <p><?php echo $YourGenderSelect; ?></p>
            </div>
            <br>

            <label id="Email">Email</label>
            <br>
            <input type="Email" id="Email" name="Email" placeholder="Your email..">
            <br>
            <div class="showFormInput">
                <p><?php echo $EmailErr; ?></p>
                <p><?php echo $Email; ?></p>
            </div>
            <br>

            <label id="Subject"> Subject </label>
            <br>
            <textarea id="Subject" name="Subject" placeholder="Write something.."></textarea>
            <div class="showFormInput"><p><?php echo $Subject; ?></p>
            </div>
            <br>
            <input type="submit" id="Submit" name ="Submit" value="Submit">
            <input type="submit" id="reset" value="reset">
            <br>
            <div id="showMessageInput"><p><?php echo $SubmitMessage; ?></p>
            </div>
        </form>
    </main>
    <?php
}

function getTop2000(){
    $conn = db_connect();
    //define sql statement
    $sql = "SELECT * FROM brpj_top2000_2023"; 
    //run query 
    $recourse = $conn->query($sql) or die($conn->error);
    //Fetch the result as an associative array
    $songsTop = $recourse->fetch_all(MYSQLI_ASSOC);
    //return array songs
    return $songsTop;
}





