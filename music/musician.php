<?php
    include("nav.php");
    echo '<section class="usercontent">';
    include("config.php");
    $category = $_GET["c"];
    $instrument = array(
                            array("吉他", "guitar"),
                            array("鼓", "drum"),
                            array("唱", "sing"),
                            array("貝斯", "bass"),
                            array("鍵盤", "keyboard"),
                            array("violin", "作曲", "琴"));
    foreach ($instrument[$category] as $keyword) {
        $sql = "SELECT uid, name, intro, photo FROM user WHERE goodat LIKE '%$keyword%'";
        $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
            echo '<div class="musician-box">';
            echo '<a href="user.php?u='.$row["uid"].'">';
            echo '<img class="musician-photo" src="'.$row["photo"].'"/>';
            echo '<h3 class="mytitle">'.$row["name"].'</h3>';
            echo '<article class="myintro">'.$row["intro"].'</article>';
            echo '</a></div>';
        }}
    echo '</section>'
?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>
</html>