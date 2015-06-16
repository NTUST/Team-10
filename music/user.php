    <?php
        include("nav.php");
        include("config.php");
        $uid = $_GET["u"];
        $infosql = "SELECT * FROM user WHERE uid='$uid'";
        $inforesult = $link->query($infosql);
        $info = $inforesult->fetch_assoc();
        echo '
        <header class="titleimg">
            <div class="authorbox">
                <img class="authorimg" src="'.$info["photo"].'" alt="author01" />
                <h2 class="name">'.$info["name"].'</h2>
            </div>
        </header>
        <section class="usercontent">
            <div class="col-lg-3">
                <h4 class="mytitle"><b>關於我</b></h4>
                <ul class="infolist">';
                $show = array("intro"=>"", "goodat"=>"擅長樂器", "sex"=>"性別", "city"=>"城市", "email"=>"信箱", "tel"=>"電話");
                foreach ($show as $key => $item) {
                    if(isset($info[$key]) && !is_null($info[$key]) && !empty($info[$key]))
                        echo '<li>'.$show[$key].' '.$info[$key].'</li>';
                }
        echo '
                </ul>
            </div>
            <div class="col-lg-9">';
                $musicsql = "SELECT * FROM music WHERE uid='$uid'";
                $musicresult = $link->query($musicsql);
                while($music = $musicresult->fetch_assoc()) {
                        echo '<div class="musicitem">';
                        echo '<img src="'.$info["photo"].'">';
                        echo '<audio controls>';
                        echo '<source src="'.$music["path"].'" type="audio/mpeg">';
                        echo '</audio>';
                        echo '<h4>'.$music["name"].'</h4></div>';       
                }
            echo '</div></section>';
    ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>