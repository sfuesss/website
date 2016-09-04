<!DOCTYPE html>
<?php include 'functions.php';?>
<html>
    <?php _header('Merchandise');?>
		<main>
			<div class="section grey lighten-4" id="index-banner">
				<div class="container">
					<div class="row">
						<div class="col s12 m10">
							<h3 class="light center-on-small-only black-text">Merchandise</h3>
							<h5 class="light center-on-small-only blue-text darken-1">Visit our office hours to view stock and purchase SFU engineering swag.</h5>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col s12">
						<h3 class="header light">T-shirts and apparel</h3>
					</div>
					<div class="col s12 m9 offset-m1">
						<p>Look cool at school. There are limited sizes available, visit the ESSS office to try out a size!</p>
					</div>
				</div>
				<div class="row">
					<?php 
						$result = $db->query("SELECT Photo,Name FROM merch WHERE Type='Apparell'");
						while ($row = mysqli_fetch_array($result)){
							echo "
								<div class='col s12 m4'>
									<div class='row center'>
										<img src='".$row['Photo']."' class='responsive-img circle' width='200'></img>
										<h5 class='light'>".$row['Name']."</h5>
									</div>
								</div>
							";
						}
					?>
				</div>

				<div class="row">
					<div class="col s12">
						<h3 class="header light">Beer steins and mugs</h3>
					</div>
					<div class="col s12 m9 offset-m1">
						<p>Drink up! Here&#8217;s some cool looking contraptions for your beverages.</p>
					</div>
				</div>
				<div class="row">
					<?php 
						$result = $db->query("SELECT Photo,Name FROM merch WHERE Type='Mugs'");
						while ($row = mysqli_fetch_array($result)){
							echo "
								<div class='col s12 m3'>
									<div class='row center'>
										<img src='".$row['Photo']."' class='responsive-img circle' width='200'></img>
										<h5 class='light'>".$row['Name']."</h5>
									</div>
								</div>
							";
						}
					?>
				</div>

				<div class="row">
					<div class="col s12">
						<h3 class="header light">Accessories</h3>
					</div>
					<div class="col s12 m9 offset-m1">
						<p>Time to accessorize. Swag up with these engineering extras.</p>
					</div>
				</div>
				<div class="row">
					<?php 
						$result = $db->query("SELECT Photo,Name FROM merch WHERE Type='Accessories'");
						while ($row = mysqli_fetch_array($result)){
							echo "
								<div class='col s12 m4'>
									<div class='row center'>
										<img src='".$row['Photo']."' class='responsive-img circle' width='200'></img>
										<h5 class='light'>".$row['Name']."</h5>
									</div>
								</div>
							";
						}
					?>
				</div>
			</div>
		</main>

		<?php _footer();?>
	</body>
</html>
