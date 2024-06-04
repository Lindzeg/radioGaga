<?php
include ("functions.php");

if($_SERVER["REQUEST_METHOD"] == "GET") {
  //echo's the function getAlbum-, specific the id of table songs where album_path is linked.
  //javascript uses this function to store the link in the imageData
  echo getAlbumPathForSong($_GET["id"])['album_path'];
}

