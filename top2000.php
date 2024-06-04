<!DOCTYPE html>
<?php
include("functions.php");
htmlHead();
?>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Gothic+A1&family=Pixelify+Sans&display=swap');
</style>

<body id="bodyTop2000">

<?php
    htmlNav();
?>

<section id="section2000">
<table id="table2000">
    <thead>
        <h1 id="tableHeading2000">Top 2000</h1>
    </thead>
        <tbody>
         <!-- loop through array tracks -->
            <?php foreach (getTop2000() as $songsTop): ?>
                <tr class="rows2000">
                    <td class="td2000"><?php echo $songsTop['songPosition'] ?></td>
                    <td class="td2000"><?php echo $songsTop['songTitle'] ?></td>
                    <td class="td2000"><?php echo $songsTop['songArtist'] ?></td>
                    <td class="td2000"><?php echo $songsTop['songYear'] ?></td>
                 </tr>
                <?php endforeach; ?>
         </tbody>
     <tfoot>
     </tfoot>
 </table>
 </section>














<footer id="footer2000">
    
</footer>

</html>