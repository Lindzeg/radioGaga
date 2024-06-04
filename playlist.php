<!DOCTYPE html>
<?php
include("functions.php");
htmlHead();
?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Gothic+A1&family=Pixelify+Sans&display=swap');
</style>

<body id="bodyPlaylist">

<?php
    htmlNav();
?>

<section id="sectionPlaylist">
    <!--Set containers, empty, container for dynamically loading images & video's-->
    <div class="videoContainer"><video src="" id="video_player" type="video/mp4" width="500" , height="300" autoplay muted></video></div>
    <div class="albumContainer"><img src="" id="album_image" alt="" width="320" , height="290"></div>

    <table id="trackInfo">
        <thead>
        </thead>
            <tbody>
            <!-- loop through array tracks -->
                <?php foreach (getSongs() as $song): ?>
                    <tr class="rows">
                        <td>  <?php echo $song['song_title'] ?></td>
                        <td><?php echo $song['song_duration'] ?></td>
                        <td class="audio">
                            <audio controls style="width:200px;" onplay="hello(event)"
                                data_id="<?php echo $song['song_id'] ?>" data_video="<?php echo $song['video_link'] ?>">
                                <source src="<?php echo $song['audio_path'] ?>">
                            </audio>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        <tfoot>
        </tfoot>
    </table>
 </section>

<?php
    htmlFoot()
?>

</html>