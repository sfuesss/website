<!DOCTYPE html>
<?php include 'functions.php';?>
<html>
    <?php _header('About');?>
		<main>
			<div class="section grey lighten-4" id="index-banner">
				<div class="container">
					<div class="row">
						<div class="col s12 m9">
							<h3 class="light center-on-small-only black-text">Learn more about who we are.</h3>
							<h5 class="light center-on-small-only blue-text darken-1">Get to know your society, your council, and your space.</h5>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row grey lighten-4">
				<div class="col s12">
					<div class="container">
						<ul class="tabs grey lighten-4">
							<li class="tab col s4 truncate"><a href="#general-info" class="blue-text">Info</a></li>
							<li class="tab col s4 truncate"><a href="#exec" class="blue-text">Executive</a></li>
							<li class="tab col s4 truncate"><a href="#office" class="blue-text">Space</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="container">
				<div class="row" id="general-info">
					<div class="col s12 m9 l10">
						<div id="general" class="section scrollspy">
							<h3 class="header light">General information</h3>
							<p>The Engineering Science Student Society is established to serve and represent the interests of its members to the School of Engineering Science, throughout Simon Fraser University, and beyond to industry and other engineering societies. If your declared major/minor is in engineering, or you’re taking any engineering science course, then you are automatically a member of the ESSS.</p>
							<p>The ESSS, run entirely by students like yourself, promotes school spirit and fosters community building by providing opportunities for you to interact with fellow students, faculty, staff and industry. Social events take place throughout the year, and the Student Society also organizes career fairs and sends members to conferences including the Western Engineering Competition and the Canadian Engineering Competition. The Student Society also has cheap pop and snacks in the undergraduate lounge, and sells branded merchandise for you to show off your engineering pride.</p>
						</div>
					</div>
					<div class="col s12 m9 l10">
						<div id="memberships" class="section scrollspy">
							<h3 class="header light">Memberships</h3>
							<p>The SFU Engineering Science Student Society is part of the following larger organizations. They hold many events year round that SFU Engineering Students are therefore eligible to attend. These events include conferences, professional development sessions, and engineering competitions. Consult their individual webpages or your e-mail inbox (as events are announced) for more information.</p>
							<p>As per Article 1.1 of the Engineering Science Student Society (ESSS) Constitution, automatic membership in the ESSS shall be extended to all students within the School of Engineering Science at Simon Fraser University and shall include:</p>
							<ol>
								<li>Current SFU students who in one of the previous three consecutive semesters were:</li>
								<ul>
									<li>Declared majors</li>
									<li>Declared minors</li>
								</ul>
								<li>Any current SFU student that is enrolled in any course offered by the School of Engineering Science.</li>
							</ol>
							<p>You are automatically a member if you fall into one of these groups of students. There are NO FEES associated with being a member of ESSS – being a member is absolutely free!</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="container" id="exec">
				<div class="row">
					<div class="col s12 m9">
						<h3 class="header light">Executives</h3>
					</div>
				</div>
				<div class="row">
					<?php 
						$res = $db->query("Select * from members where isExec");
						while($row = mysqli_fetch_array($res)){
							$name = $row['Name'];
							$position = $row['Position'];
							$email = $row['Email'];
							$photo = $row['Photo'];
							
							echo "
								<div class=\"col s12 m4\">
									<div class=\"row center\">
										<img src=\"$photo\" class=\"responsive-img circle\" width=\"200\"></img>
										<h5 class=\"light\">$name</h5>
										<h6 class=\"light blue-text darken-1\">$position</h5>
										<h6 class=\"light blue-text darken-1\">$email</h5>
									</div>
								</div>
							";
						}
					?>
					
				<!-- directors -->
				<div class="row">
					<div class="col s12 m9">
						<h3 class="header light">Directors</h3>
					</div>
				</div>
				<div class="row">
					<?php 
						$res = $db->query("Select * from members where NOT isExec");
						while($row = mysqli_fetch_array($res)){
							$name = $row['Name'];
							$position = $row['Position'];
							$photo = $row['Photo'];
							
							echo "
								<div class=\"col s12 m4\">
									<div class=\"row center\">
										<img src=\"$photo\" class=\"responsive-img circle\" width=\"200\"></img>
										<h5 class=\"light\">$name</h5>
										<h6 class=\"light blue-text darken-1\">$position</h5>
									</div>
								</div>
							";
						}
					?>
				</div>
			</div>
			</div>
			
			<div class="container">
				<div class="row" id="office">
					<div class="col s12 m9 l10">
						<div id="general" class="section scrollspy">
							<h3 class="header light">Office and common room</h3>
							<p class="flow-text">Our common room and office are located on the 10000 level of the Applied Science Building. Our executives can be found during their office hours in ASB 10868.</p>
							<p class="flow-text">Here&#8217;s a map to get you through it.</p><br><br>
							<div class="center">
								<img class="responsive-img" src="http://esss.ca/wp-content/uploads/2014/11/ASBMap.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		
		<?php _footer();?>
	</body>
</html>
