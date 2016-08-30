<?php
	error_reporting(E_ALL);

	function _header($title){
		
		echo "<head>
				<!--Import materialize.css-->
				<link type=\"text/css\" rel=\"stylesheet\" href=\"css/materialize.css\"  media=\"screen,projection\"/>
				<!--Import my CSS file-->
				<link type=\"text/css\" rel=\"stylesheet\" href=\"css/my.css\"/>
				<!--Import material icons-->
				<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
				<!--Let browser know website is optimized for mobile-->
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" charset=\"UTF-8\"/>
				<!-- Favicon -->
				<link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\" >
				<title>$title</title>
			</head>
			<body>
				<header>
					<!--Navbar-->
					<div class=\"navbar-fixed\">
						<nav>
							<div class=\"nav-wrapper blue darken-1\">
								<div class=\"container\">
									<div class=\"col s12\">
										<a href=\"http://esss.ca/\" class=\"brand-logo hide-on-med-and-down\"><img src=\"img/logowhite.png\" style=\"padding-top:7px;\"></a>
										<a href=\"#\" data-activates=\"mobile-demo\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
										<ul id=\"nav-mobile\" class=\"right hide-on-med-and-down\">
											<li><a href=\"events.php\">Events</a></li>
											<li><a href=\"about.php\">About us</a></li>
											<li><a href=\"involved.php\">Get involved</a></li>
											<li><a href=\"essef.php\">ESSEF</a></li>
											<li><a href=\"opfair.php\">opFair</a></li>
											<li><a href=\"merch.php\">Merchandise</a></li>
											<li><a href=\"documentation.php\">Documents</a></li>
										</ul>
										<ul class=\"side-nav\" id=\"mobile-demo\">
											<li class=\"active\"><a href=\"#!\">Home</a></li>
											<li><a href=\"events.html\">Events</a></li>
											<li><a href=\"about.html\">About us</a></li>
											<li><a href=\"involved.html\">Get involved</a></li>
											<li><a href=\"essef.html\">ESSEF</a></li>
											<li><a href=\"opfair.html\">opFair</a></li>
											<li><a href=\"merch.html\">Merchandise</a></li>
											<li><a href=\"documentation.html\">Documents</a></li>
										</ul>
									</div>
								</div>
							</div>
						</nav>
					</div>
				</header>";
	}
	
	function _footer(){
		
		echo "
			<footer class=\"page-footer blue darken-1\">
			<div class=\"container\">
				<div class=\"row\">
					<div class=\"col l6 s12\">
						<h5 class=\"white-text text-lighten-4\">SFU ESSS</h5>
						<p class=\"grey-text text-lighten-4\">Engineering Science Student Society (ESSS)<br>
						School of Engineering Science<br>
						Simon Fraser University<br>
						8888 University Drive<br>
						V5A 1S6, Burnaby BC<br>
						Canada</p>
					</div>
					<div class=\"col l4 offset-l2 s12\">
						<h5 class=\"white-text text-lighten-4\">Fall Office Hours</h5>
						<ul>
							<li><a class=\"grey-text text-lighten-4\" href=\"#!\">Monday 2:30-3:30</a></li>
							<li><a class=\"grey-text text-lighten-4\" href=\"#!\">Tuesday 9:30-10:30</a></li>
							<li><a class=\"grey-text text-lighten-4\" href=\"#!\">Wednesday 10:30-11:30, 1:30-2:30</a></li>
							<li><a class=\"grey-text text-lighten-4\" href=\"#!\">Thursday 9:30-10:30, 2:30-3:30</a></li>
							<li><a class=\"grey-text text-lighten-4\" href=\"#!\">Friday 10:30-12:30</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class=\"footer-copyright\">
				<div class=\"container\">
					&#169; 2016 Engineering Science Student Society. All rights reserved.
					<a class=\"grey-text text-lighten-4 right\" href=\"#!\">esss.ca</a>
				</div>
			</div>
        </footer>
		
		<!--SCRIPTS - Import jQuery before materialize.js-->
		<script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-2.1.1.min.js\"></script>
		<script type=\"text/javascript\" src=\"js/materialize.js\"></script>
		<script type=\"text/javascript\" src=\"js/script.js\"></script>
		</body>
		";
		
	}
?>