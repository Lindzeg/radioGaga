async function hello(event) {
    // sets the image with id of album_image to the image variable
    let image = document.getElementById("album_image")
    // gets the link of the photo from getSongInfo.php using the id on hello event in playlist doc on audio tag
    let imageData = await fetch("getSongInfo.php?id=" + event.target.attributes.data_id.value).then(data => data.text())
    //sets the link from the database on the image
    image.src = imageData

    let videoLink = event.target.getAttribute("data_video");
    let videoPlayer = document.getElementById("video_player");
    videoPlayer.src = videoLink;
    videoPlayer.contentWindow.location.reload();

    
}
