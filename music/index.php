    <?php include("nav.php");?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>樂配，越配</h1>
                <hr>
                <p>音樂人的集散地</p>
                <form action="search">
                    <input  class="form-control mysearch" type="search" placeholder="吉他手/歌手...">
                    <button class="btn mybtn" type="search">搜尋</button>
                </form>
                <div class="mypost">
                    <br>
                    <h4>立即張貼</h4>
                    <button class="btn mybtn"
                    <?php
                        if(isset($_SESSION['is_login'])) {
                            echo ' data-toggle="modal" data-target="#teamPost"';
                        }
                        else
                            echo ' data-toggle="dropdown" data-target="#loginModal"';
                    ?>
                    >我是樂團，我要找樂手！</button>
                    <button class="btn mybtn"
                    <?php
                        if(isset($_SESSION['is_login'])) {
                            echo ' data-toggle="modal" data-target="#personalPost"';
                        }
                        else
                            echo ' data-toggle="dropdown" data-target="#loginModal"';
                    ?>
                    >我是樂手，我要找樂團！</button>
                </div>          
            </div>
        </div>
    </header>
    
    <div class="modal fade" id="teamPost" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">張貼找樂手資訊</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="team" action="addpost.php?p=1&s=<?php echo $_SESSION["sn"]?>" method="post">
                        <div class="form-group">
                            <label for="title">文章標題</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="輸入張貼文章標題" required>
                        </div>
                        <div class="form-group">
                            <label>尋找樂手</label>
                            <select class="form-control" name="musician">
                                <option value="吉他手">吉他手</option>
                                <option value="鼓手">鼓手</option>
                                <option value="主唱">主唱</option>
                                <option value="貝斯手">貝斯手</option>
                                <option value="鍵盤手">鍵盤手</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">文章內容</label>
                            <textarea class="form-control" id="content" name="content" placeholder="詳細描述你們要找的樂手" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" form="team"></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="personalPost" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">張貼找樂團資訊</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="person" action="addpost.php?p=0&s=<?php echo $_SESSION["sn"]?>" method="post">
                        <div class="form-group">
                            <label for="title">文章標題</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="輸入張貼文章標題" required>
                        </div>
                        <!--<div class="form-group">
                            <label for="musician">擅長樂器</label><br>
                            <input type="checkbox" name="musician[]" value="吉他">吉他&nbsp;&nbsp;
                            <input type="checkbox" name="musician[]" value="鼓">鼓&nbsp;
                            <input type="checkbox" name="musician[]" value="唱歌">唱歌&nbsp;
                            <input type="checkbox" name="musician[]" value="貝斯">貝斯&nbsp;
                            <input type="checkbox" name="musician[]" value="keyboard">keyboard
                        </div>-->
                        <div class="form-group">
                            <label for="content">文章內容</label>
                            <textarea class="form-control" id="content" name="content" placeholder="詳細描述你的專長" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" form="person"></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
    <!--  
        <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#pie').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Browser market shares at a specific website, 2014'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                            ['Firefox',   45.0],
                            ['IE',       26.8],
                            {
                                name: 'Chrome',
                                y: 12.8,
                                sliced: true,
                                selected: true
                            },
                            ['Safari',    8.5],
                            ['Opera',     6.2],
                            ['Others',   0.7]
                        ]
                    }]
                });
            });
        </script>
        <div style="width:100%; height:500px; margin-top:50px">
        <div id="pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; background-color:#FFF; color:#123451"></div>
        
    </div>
    <section class="bg-primary" id="about">   
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">提供的服務</h2>
                    <hr class="light">
                    <p class="text-faded">介紹文字</p>
                    <a href="#" class="btn btn-default btn-xl">回首頁</a>
                </div>
            </div>
        </div>
    </section>-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">我們的服務</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>會員登入制</h3>
                        <p class="text-muted">註冊並登入會員後，即可張貼徵樂手/樂團資訊!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>個人檔案</h3>
                        <p class="text-muted">每一會員皆可編輯個人檔案，包括上傳影音作品及填寫自我介紹，並統一介面</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>關鍵字搜尋</h3>
                        <p class="text-muted">利用樂器來分門別類，亦提供搜尋引擎讓使用者以關鍵字搜索</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>資訊交流</h3>
                        <p class="text-muted">提供除了樂團配對以外的區塊，張貼音樂相關熱門影音、文章</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <h2 class="category-title">會員類別</h2>
        <!--<aside class="bg-dark">
            <div class="container text-center">
                <div class="call-to-action">
                    <h2>利用樂器分類快速找到你要的樂手！</h2>
                    <h4>吉他手/鍵盤手/主唱/貝斯手/鼓手</h4>
                </div>
            </div>
        </aside>-->
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=0" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    吉他手
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=1" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    鼓手
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=2" class="portfolio-box">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    主唱
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=3" class="portfolio-box">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    貝斯手
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=4" class="portfolio-box">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    鍵盤手
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="musician.php?c=5" class="portfolio-box">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <!--<div class="project-category text-faded">
                                    找樂手
                                </div>-->
                                <div class="project-name">
                                    其他
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="profile">
        <h2 class="our-title">製作團隊</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4  text-center">
                    <div class="our-box">
                        <img src="img/ours/1.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail writer-photo">
                        <h3>陳筠心</h3>
                        <p>colleen135792014@gmail.com</p>
                    </div>
                </div>

                <div class="col-md-4  text-center">
                    <div class="our-box">
                        <img src="img/ours/2.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail writer-photo">
                        <h3>熊悅婷</h3>
                        <p>hsiungg@gmail.com</p>
                    </div>
                </div>

                <div class="col-md-4  text-center">
                    <div class="our-box">
                        <img src="img/ours/3.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail writer-photo">
                        <h3>黃懿瑢</h3>
                        <p>g5l64jo3@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>-->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">聯絡我們</h2>
                    <hr class="primary">
                    <p>有任何問題嗎？歡迎聯絡我們</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>0912-345-678</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:bandmatch@gmail.com">bandmatch@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

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