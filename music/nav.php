<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>樂配 - 音樂人的集散地 BandMatch.com</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- Post CSS -->
    <link rel="stylesheet" href="css/style1.css" type="text/css">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/my.css" type="text/css">

    <!-- common styles -->
    <link rel="stylesheet" type="text/css" href="css/dialog.css" />
    <!-- individual effect -->
    <link rel="stylesheet" type="text/css" href="css/dialog-don.css" />
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <script src="js/modernizr.custom.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
  
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">樂配</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="index.php">首頁</a>
                    </li>
                    <li class="musician">
                        <a class="dropdown" href="findmusician.php?m=全部">找樂手</a>
                        <ul class="dropdown-menu">
                            <li><a href="findmusician.php?m=吉他手">吉他手</a></li>
                            <li><a href="findmusician.php?m=鼓手">鼓手</a></li>
                            <li><a href="findmusician.php?m=主唱">主唱</a></li>
                            <li><a href="findmusician.php?m=貝斯手">貝斯手</a></li>
                            <li><a href="findmusician.php?m=鍵盤手">鍵盤手</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="findteam.php">找樂團</a>
                    </li>
                    <?php
                        if(isset($_SESSION["is_login"])) {
                            echo '<li><a class="page-scroll"  href="userinfo.php">修改資料</a></li>';
                            echo '<li><a class="page-scroll"  href="logout.php">登出</a></li>';
                        }
                        else
                            echo '
                                  <!--<li><a href="https://127.0.0.1/music/index.html">註冊</a></li>-->
                                  <li><a data-dialog="somedialog" class="trigger">註冊</a></li>
                                  <div id="somedialog" class="dialog">
                                      <div class="dialog__overlay"></div>
                                      <div class="dialog__content">
                                          <form class="form" role="form" method="post" action="signup.php" accept-charset="UTF-8">
                                              <div class="form-group">
                                                  <label class="sr-only" for="name">User name</label>
                                                  <input type="text" class="form-control" id="name" name="name" placeholder="姓名" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="email">Email address</label>
                                                  <input type="email" class="form-control" id="email" name="email" placeholder="信箱" required>
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="pass">Password</label>
                                                  <input type="password" class="form-control" id="pass" name="password" placeholder="密碼" required>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-success">註冊</button>
                                                  <button  type="button" class="btn btn-success" data-dialog-close>取消</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                                  <script src="js/classie.js"></script>
                                  <script src="js/dialogFx.js"></script>
                                  <script>
                                      (function() {
                                          var dlgtrigger = document.querySelector( "[data-dialog]" ),
                                          somedialog = document.getElementById( dlgtrigger.getAttribute( "data-dialog" ) ),
                                          dlg = new DialogFx( somedialog );

                                          dlgtrigger.addEventListener( "click", dlg.toggle.bind(dlg) );
                                        })();
                                  </script>
                                  <li class="dropdown" id="loginModal">
                                     <a class="dropdown-toggle" data-toggle="dropdown">登入 <b class="caret"></b></a>
                                     <ul class="dropdown-menu" style="padding: 15px;min-width: 200px;">
                                        <li>
                                           <div class="row">
                                              <div class="col-md-12">
                                                 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                       <label class="sr-only" for="email">Email address</label>
                                                       <input type="email" class="form-control" id="email" name="email" placeholder="信箱" required>
                                                    </div>
                                                    <div class="form-group">
                                                       <label class="sr-only" for="pass">Password</label>
                                                       <input type="password" class="form-control" id="pass" name="password" placeholder="密碼" required>
                                                    </div>
                                                    <!--<div class="checkbox">
                                                       <label>
                                                       <input type="checkbox"> Remember me
                                                       </label>
                                                    </div>-->
                                                    <div class="form-group">
                                                       <button type="submit" class="btn btn-success btn-block">登入</button>
                                                    </div>
                                                 </form>
                                              </div>
                                           </div>
                                        </li>
                                        <li class="divider"></li>
                                        <!--
                                        <li>
                                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Google 帳號登入">
                                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                                        </li>-->
                                     </ul>
                                  </li>';
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>