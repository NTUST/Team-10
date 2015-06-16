    <?php
        include("nav.php");
        include("config.php");
        if(isset($_SESSION["is_login"])) {
            $uid = $_SESSION["user_id"];
            $infosql = "SELECT * FROM user WHERE uid='$uid'";
            $inforesult = $link->query($infosql);
            $info = $inforesult->fetch_assoc();
            echo '
            <header class="titleimg">
                <div class="authorbox">
                    <img class="authorimg" src="'.$info["photo"].'" alt="author01" />
                </div>
            </header>
            <section>
                <div class="tabs tabs-style-bar">
                    <div class="list col-lg-2  col-sm-3">
                        <ul>
                            <li><a href="#section-bar-1"><span>修改個人資料</span></a></li>
                            <li><a href="#section-bar-2"><span>上傳音樂</span></a></li>
                        </ul>
                    </div>
                    <div class="content-wrap col-log-10  col-sm-9">
                        <section id="section-bar-1" class="content bgcolor-4">
                            <form action="modifyinfo.php?s='.$_SESSION["sn"].'" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    <label class="input-title">信箱
                                        <input type="email" class="myinput" name="email" value="'.$info["email"].'" onClick="this.select();"  required="required">
                                    </label>
                                    <label class="input-title">密碼
                                        <input type="password" class="myinput" name="password" value="'.$info["pass"].'" onClick="this.select();"  required="required">
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <label class="input-title">姓名
                                        <input type="text" class="myinput" name="name" value="'.$info["name"].'" onClick="this.select();"  required="required">
                                    </label>
                                    <label class="input-title radiobox">性別<br>';
                                    if(is_null($info["sex"])) {
                                        echo '
                                        <input type="radio" name="sex" value="M">男&nbsp;&nbsp;&nbsp;&nbsp;                 
                                        <input type="radio" name="sex" value="F">女';
                                    }
                                    else {
                                        if($info["sex"]=='M') {
                                            echo '
                                            <input type="radio" name="sex" value="M" checked>男&nbsp;&nbsp;&nbsp;&nbsp;                 
                                            <input type="radio" name="sex" value="F">女';
                                        }
                                        else {
                                            echo '
                                            <input type="radio" name="sex" value="M">男&nbsp;&nbsp;&nbsp;&nbsp;                 
                                            <input type="radio" name="sex" value="F" checked>女';
                                        }                                
                                    }
                                    echo '
                                    </label>
                                    <label class="input-title">關於我
                                        <textarea class="myinput" name="introduction" onClick="this.select();">'.$info["intro"].'</textarea>
                                    </label>
                                    <label class="input-title">擅長樂器
                                        <textarea class="myinput" name="instrument" onClick="this.select();">'.$info["goodat"].'</textarea>
                                    </label>
                                    <label class="input-title">電話
                                        <input type="tel" class="myinput" name="telephone" value="'.$info["tel"].'" onClick="this.select();">
                                    </label>
                                    <label class="input-title">地區
                                        <input type="text" class="myinput" name="area" value="'.$info["city"].'" onClick="this.select();">
                                    </label>
                                    <label class="input-title">上傳大頭照
                                        <div>
                                            <div class="upload-img col-lg-8">
                                                <input type="text" id="uploadFile" class="myinput" disabled="disabled">
                                            </div>
                                            <div class="pickimg-btn col-lg-3">
                                                <span>選擇檔案</span>
                                                <input type="file"  name="fileToUpload" id="fileToUpload">
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            document.getElementById("fileToUpload").onchange = function () {
                                                document.getElementById("uploadFile").value = this.value;
                                            };
                                        </script>
                                    </label>
                                    <label class="input-submit">
                                        <input type="submit" class="submitbtn" value="修改">
                                    </label>
                                </div>             
                            </form>
                        </section>
                        <section id="section-bar-2">
                            <div class="upload-bar">
                                <form action="uploadmusic.php?uid='.$_SESSION["user_id"].'" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-8">
                                        <input type="text" id="uploadMusic" class="myinput" disabled="disabled">
                                    </div>
                                    <div class="pickmusic-btn col-lg-2">
                                        <span>選擇檔案</span>
                                        <input type="file" name="fileToUpload" id="musicToUpload">
                                    </div>
                                    <div class="submitmusic-btn col-lg-2">
                                        <input type="submit" class="submitbtn" value="上傳音樂">
                                    </div>
                                    <script type="text/javascript">
                                        document.getElementById("musicToUpload").onchange = function () {
                                            document.getElementById("uploadMusic").value = this.value;
                                        };
                                    </script>
                                </form>
                            </div>
                            <div class="user-music">';
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
                  echo '</div>
                        </section>
                    </div>
                </div>
            </section>';
        }
        else {
            echo '<section style="text-align:center;"><h3>Can not modify info without login ! ! !</h3></section>';
        }
    ?>
    
    <script src="js/cbpFWTabs.js"></script>
    <script src="js/classie.js"></script>
    <script>
        (function() {
                [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                    new CBPFWTabs( el );
                });
            })();
    </script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>