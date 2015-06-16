<?php
//$uid = $_SESSION["user_id"];
        include("config.php");
echo $target_dir = "music/";
echo '<br>'.$target_name = basename($_FILES["fileToUpload"]["name"]);
echo '<br>'.$target_file = $target_dir.$target_name;
echo '<br>'.$uid = $_GET["uid"];
echo '<br>'.$uploadOk = 1;
echo '<br>'.$musicFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo '<be>'.$_FILES["fileToUpload"]["tmp_name"];
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($musicFileType != "mp3" && $musicFileType != "ogg" && $musicFileType != "wav") {
    echo "Sorry, only mp3, ogg, wav files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], iconv("UTF-8", "big5", $target_file ))) {
        $sql = "INSERT INTO music (name, type, path, uid)
                    VALUES ('$target_name', '$musicFileType', '$target_file', '$uid')";
        $result = $link->query($sql);
        header("location: userinfo.php");
        echo "The file ". $target_name. " has been uploaded.";
    } else {
        echo '<br>ERROR: '.$_FILES['fileToUpload']['error'];
        echo "<br>Sorry, there was an error uploading your file.";
    }
}
?>