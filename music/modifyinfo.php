<?php
    session_id($_GET["s"]);
    session_start();
    include("config.php");

    $uid = $_SESSION["user_id"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $intro = $_POST["introduction"];
    $goodat = $_POST["instrument"];
    $tel = $_POST["telephone"];
    $area = $_POST["area"];

    $sql = "UPDATE user SET name='$name', email='$email', pass='$pass', tel='$tel',
         city='$area', goodat='$goodat', sex='$sex', intro='$intro'
         WHERE uid='$uid'";
    $result = $link->query($sql);

    $target_file = basename($_FILES["fileToUpload"]["name"]);    
    $uploadOk = 1;
    define('notimg', '0');
    $notimg = 0;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $target_dir = "img/authors/";
    $target_file = $target_dir.$uid.'.'.$imageFileType;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    $imgtype = array('jpg', 'png', 'jpeg', 'gif');
    foreach ($imgtype as $type) {
        if(strcasecmp($imageFileType, $type)!=0)
            $notimg += 1;
        if(notimg == 4)
            $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if(uploadOk) {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "UPDATE user SET photo='$target_file' WHERE uid='$uid'";
            $result = $link->query($sql);
        }}
    header("location: userinfo.php");
?>