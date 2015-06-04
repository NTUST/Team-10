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
			<a class="grid__item" href="#">
				<h2 class="title title--preview">徵樂手</h2>
				<div class="loader"></div>
				<div class="meta meta--preview">
					<img class="meta__avatar" src="img/authors/1.png" alt="author01" />
					<span class="meta__date"><i class="fa fa-calendar-o"></i> 9 Apr</span>
					<!--<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>-->
				</div>
			</a>
			<a class="grid__item" href="#">
				<h2 class="title title--preview">The Things we Lost in the Fire</h2>
				<div class="loader"></div>
				<div class="meta meta--preview">
					<img class="meta__avatar" src="img/authors/2.png" alt="author02" /> 
					<span class="meta__date"><i class="fa fa-calendar-o"></i> 7 Apr</span>
					<!--<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 5 min read</span>-->
				</div>
			</a>
			<!--<footer class="page-meta">
				<span>Load more...</span>
			</footer>-->
		</section>
		<section class="content">
			<div class="scroll-wrap">
				<article class="content__item">
					<span class="category category--full">Stories for humans</span>
					<h2 class="title title--full">On Humans &amp; other Beings</h2>
					<div class="meta meta--full">
						<img class="meta__avatar" src="img/authors/1.png" alt="author01" />
						<span class="meta__author">Matthew Walters</span>
						<span class="meta__date"><i class="fa fa-calendar-o"></i> 9 Apr</span>
						<!--<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>-->
					</div>
					<p>I am fully aware of the shortcomings in these essays. I shall not touch upon those which are characteristic of first efforts at investigation. The others, however, demand a word of explanation.</p>
				</article>
				<article class="content__item">
					<span class="category category--full">Love &amp; Hate</span>
					<h2 class="title title--full">The Things we Lost in the Fire</h2>
					<div class="meta meta--full">
						<img class="meta__avatar" src="img/authors/2.png" alt="author02" />
						<span class="meta__author">Christian Belverde</span>
						<span class="meta__date"><i class="fa fa-calendar-o"></i> 7 Apr</span>
						<!--<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 5 min read</span>-->
					</div>
					<p>Faulty psychic actions, dreams and wit are products of the unconscious mental activity, and like neurotic or psychotic manifestations represent efforts at adjustment to one’s environment. </p>
				</article>
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
