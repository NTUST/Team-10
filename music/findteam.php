    <?php include("nav.php");?>

    <div class="container">
	<!--<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
	<div id="theSidebar" class="sidebar">
		<button class="close-button fa fa-fw fa-close"></button>
		<div class="codrops-links">
			<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Tutorials/MotionBlurEffect/" title="Previous Demo"><span>Previous Demo</span></a>
			<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=23872" title="Back to the article"><span>Back to the Codrops article</span></a>
		</div>
		<h1><span>Animated<span> Grid Layout</h1>
		<nav class="codrops-demos">
			<a class="current-demo" href="index.html">Demo 1</a>
			<a href="index2.html">Demo 2</a>
		</nav>
		<div class="related">
			<h3>Related Demos</h3>
			<a href="http://tympanus.net/Development/BookPreview/">Book Preview</a>
			<a href="http://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/">Thumbnail Grid</a>
			<a href="http://tympanus.net/Development/3DGridEffect/">3D Grid Effect</a>
		</div>
	</div>-->
	<div id="theGrid" class="main">
		<section class="grid">
			<!--<header class="top-bar">
				<h2 class="top-bar__headline">Latest articles</h2>
				<div class="filter">
					<span>Filter by:</span>
					<span class="dropdown">Popular</span>
				</div>
			</header>-->
			<?php
				include("config.php");
				$sql = "SELECT * FROM post WHERE p='0'";
				$result = $link->query($sql);

				while($row = $result->fetch_assoc()) {
					$uid = $row["uid"];
					$photosql = "SELECT photo FROM user WHERE uid='$uid'";
					$photoresult = $link->query($photosql);
					$photo = $photoresult->fetch_assoc();
					echo '<a class="grid__item" href="#">';
					echo '<h2 class="title title--preview">'.$row["title"].'</h2>';
					echo '<div class="loader"></div>';
					echo '<div class="meta meta--preview">';
					echo '<div class="team-box">';
					echo '<img class="meta__avatar" src="'.$photo["photo"].'" alt="author01" />
							</div>
							<span class="meta__date"><i class="fa fa-calendar-o"></i>'.date('j M', strtotime($row["date"])).'</span>
							<!--<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>-->
						</div>
					</a>';
				}

				$sql = "SELECT * FROM post WHERE p='0'";
				$result = $link->query($sql);

				echo '</section><section class="content"><div class="scroll-wrap">';
				while($row = $result->fetch_assoc()) {
					//Get the author's name
					$uid = $row["uid"];
					$infosql = "SELECT name, goodat, photo FROM user WHERE uid='$uid'";
					$inforesult = $link->query($infosql);
					$info = $inforesult->fetch_assoc();
					echo '<article class="content__item">';
					echo '<h2 class="title title--full">'.$row["title"].'</h2>';
					echo '<div class="meta meta--full">';
					echo '<img class="meta__avatar" src="'.$info["photo"].'" alt="author01" />';
					echo '<span class="meta__author">'.$info["name"].'</span>';
					echo '<span class="meta__date"><i class="fa fa-calendar-o"></i>'.date('j M', strtotime($row["date"])).'</span><br>';
					echo '<span class="category category--full">擅長樂器: '.$info["goodat"].'</span>';
					echo '</div><p></p><p>'.$row["content"].'</p></article>';
				}
			?>
			<!--<footer class="page-meta">
				<span>Load more...</span>
			</footer>-->

			</div>
			<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
		</section>
		<div id="theSidebar" class="sidebar"></div>
	</div>
    </div><!-- /container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/classie.js"></script>
    <script src="js/main.js"></script>

</body>

</html>