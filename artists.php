<!DOCTYPE html>
<?php
include("functions.php");
htmlHead();
?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Gothic+A1&family=Pixelify+Sans&display=swap');
</style>

<body id="bodyArtists">
  
 <?php
     htmlNav();
    ?>

<section id="sectionTopArtists">
    <?php foreach(getArtists() as $artists):?>
        <img src="<?php echo $artists['artist_image_path']?>" class="imgArtists">
        <?php endforeach;?>
</section>

<section id="sectionMidArtistInfo">
<?php foreach(getArtists() as $artists):?>
    <div class="artistInfoContainer">
            <h1 class="h1Artist"> <?php echo $artists['artist_heading']?> </h1>
            <h2 class="h2Artist"> <?php echo $artists['artist_subheading']?>  </h2>
            <p1 class="p1Artist"> <?php echo $artists['artist_paragraph']?> </p1>   
            <br>
            <br>     
            <ul class="ulArtist"> 
            <?php $songList = explode(',', $artists['artist_song_list']);
             foreach($songList as $song):?>
            <li class="liArtist"><?php echo $song?> </li>
            <?php endforeach; ?> 
        </ul>
    </div> 
<?php endforeach; ?> 
</section>
