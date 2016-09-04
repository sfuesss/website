<?php
	error_reporting(E_ALL);
   ini_set('display_errors', '1');
   include 'session.php';
   
   //Handling all of the updates to the database:
   
   //--Updating Members
   if (isset($_POST['update'])){
	   //updating photos
		if (isset($_FILES['picture'])){
			if (isset($_POST['uploadDest'])){
				$target_dir = "../".$_POST['uploadDest'];
			}
			else{
				$target_dir = "../img/";
			}
			
			$filePath = $target_dir . basename($_FILES['picture']['name']);

			if(move_uploaded_file($_FILES['picture']['tmp_name'],$filePath )){
				$success = true;
			}
			else {
				$sucess= false;
			}

			if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes(basename($_FILES['picture']['name']));
				$filePath = addslashes($filePath);
			}
			//$db->query("UPDATE members SET Photo='".explode("../",$filePath)[1]."' WHERE Name='".$_POST['name']."'");
		}
		if (isset($_POST['Memb_name'])){
			if ($_POST['type'] == "Member"){
				$db->query("UPDATE members SET Name='".$_POST['Memb_name']."' WHERE id='".$_POST['id']."'");
			}
			elseif ($_POST['type'] == "Accessories" || $_POST['type'] == "Apparell" || $_POST['type'] == "Mugs"){
				$db->query("UPDATE merch SET Name='".$_POST['Memb_name']."' WHERE id='".$_POST['id']."'");
			}
			
		}
		
		if (isset($_POST['photo'])){
			if ($_POST['type'] == "Member"){
				$photoPath = "img/members/".$_POST['photo'];
				$db->query("UPDATE members SET Photo='".$photoPath."' WHERE id='".$_POST['id']."'");
			}
			elseif ($_POST['type'] == "Accessories"){
				$photoPath = "img/merch/accessories/".$_POST['photo'];
				$db->query("UPDATE merch SET Photo='".$photoPath."' WHERE id='".$_POST['id']."'");
			}
			elseif ($_POST['type'] == "Apparell"){
				$photoPath = "img/merch/apparell/".$_POST['photo'];
				$db->query("UPDATE merch SET Photo='".$photoPath."' WHERE id='".$_POST['id']."'");
			}
			elseif ($_POST['type'] == "Mugs"){
				$photoPath = "img/merch/mugs/".$_POST['photo'];
				$db->query("UPDATE merch SET Photo='".$photoPath."' WHERE id='".$_POST['id']."'");
			}
		}
		
   }
	
?>
<?php //if (isset($photoPath)){echo $photoPath;} else{ echo "hu";} ?>
<html>
<head>
	  <title>Admin HUB</title>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="../js/materialize.js"></script>
	  <script type="text/javascript" src="../js/script.js"></script>
	  <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
      <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" >
</head>
   
   
   <body bgcolor = "#1E88E5">
      <!-- Hub main panel-->
	  <div align = "center">
         <div style = "width:900px; ">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="card grey lighten-4">
							<div class="card-content black-text">
								<div align="right">
									<h6><a class="btn waves-effect waves-light blue darken-1" href="logout.php">Sign Out</a></h6>
									<h6 class="blue-text">Signed in as <span class="black-text"><b><?php echo $login_session; ?><b/></span></h6>
								</div>
								<span class="card-title black-text darken-1"><img src="../img/Logo.png"/><br/><b>ESSS Admin Hub</b></span>
								
								<div class="row grey lighten-4">
									<div class="col s12">
										<div class="container">
											<ul class="tabs grey lighten-4">
												<li class="tab col s4 truncate"><a href="#members" class="blue-text">Members</a></li>
												<li class="tab col s4 truncate"><a href="#merch" class="blue-text">Merch</a></li>
												<li class="tab col s4 truncate"><a href="#other" class="blue-text">Other</a></li>
											</ul>
										</div>
									</div>
								</div>
								<form id='LeForm' action = 'admin.php' method = 'post' enctype='multipart/form-data'>													  
									  <!--<label class='blue-text darken-2' style='font-size:18px'>Upload a Photo:</label>-->
									  <div class='caption center-align'>
										  <label class='blue-text darken-2' style='font-size:18px'>Upload Files:</label><br/>
										  <input type='file' name='picture' class='center-align'>
										  <select name="uploadDest" style="display:block;">
											<option disabled selected value> -- Upload to Path -- </option>
											<option value="img/">img/</option>
											<option value="img/members/">img/members/</option>
											<option value="img/merch/accessories/">img/merch/accessories/</option>
											<option value="img/merch/apparell/">img/merch/apparell/</option>
											<option value="img/merch/mugs/">img/merch/mugs/</option>
										  </select>
										  <button style='cursor: pointer;' class='btn waves-effect waves-light blue darken-1' name='update' type='submit'>Upload</button><br />
									  </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	  
      <!-- Details to edit (will be written out in PHP after configured statically)-->
	  <div align = "center">
         <div style = "width:700px; ">
			<div class="container">
				<!-- Member admin section -->
				<div class="row" id="members">
					<div class="col s12">
						<div class="card grey lighten-4">
							<div class="card-content black-text">
								<span class="card-title blue-text darken-1">ESSS Members</span>
								<!--<h6><b>Executives</b></h6>-->
								<?php
									$result = $db->query("SELECT * FROM members WHERE isExec");
								?>
								
								<table class="striped centered">
									<thead>
										<tr>
											<th data-field="name">Executives</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$count = 0;
										$photos = scandir('../img/members');
										while($row = mysqli_fetch_array($result)){
											echo "
											<tr><td>".$row['Name']."
											<br><span style='font-size: 17px;' class='card-title blue-text darken-1'>".$row['Position']."<br>
											<!-- Modal Trigger -->
											  <a class='waves-effect waves-light blue btn modal-trigger' href='#modal_exec".$count."'>Edit</a>

											  <!-- Modal Structure -->
											  <div id='modal_exec".$count."' class='modal modal-fixed-footer'>
												<div class='modal-content'>
												  <h4>Edit ".$row['Position']." Role</h4>
												  <img src='../".$row['Photo']."' class='responsive-img circle' width='200'></img>
												  
												  <form id='LeForm' action = 'admin.php' method = 'post' enctype='multipart/form-data'>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Name:</label>
													  <input width='50%' type = 'text' name='Memb_name' class = 'box' value='".$row['Name']."'/><br /><br />
													  <input type='hidden' name='id' value='".$row['id']."'/>
													  <input type='hidden' name='type' value='Member'/>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Photo:</label>
													  <select style='display:block;' name='photo'>";?>
													     <option disabled selected value> -- Select a Picture -- </option>
													<?php 
														for ($i = 0; $i < count($photos); $i++){
															if (strpos($photos[$i], '.png') !== false || strpos($photos[$i], '.jpg') !== false){
																	echo "<option value='".$photos[$i]."'>".$photos[$i]."</option>";
																}
															}
													echo "
													  </select>
													  <br/>
													  <div class='caption center-align'>
														<button style='cursor: pointer;' class='btn-large waves-effect waves-light blue darken-1' name='update' type='submit'>Update</button><br />
													  </div>
												  </form>

												</div>
												<div class='modal-footer'>
												  <a href='#' class=' modal-action modal-close btn waves-effect blue darken-1 waves-blue'>Cancel</a>
												</div>
											  </div>
											</span></td></tr>
											";
											$count = $count+1;
										}
									?>
									</tbody>
								</table>
								
								<br/><br/><br/>
								<?php 
									$result = $db->query("SELECT * FROM members WHERE NOT isExec");
								?>
								<table class="striped centered">
								<thead>
										<tr>
											<th data-field="name">Directors</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$count = 0;
										while($row = mysqli_fetch_array($result)){
											echo "
											<tr><td>".$row['Name']."
											<br><span style='font-size: 17px;' class='card-title blue-text darken-1'>".$row['Position']."<br>
											<!-- Modal Trigger -->
											  <a class='waves-effect waves-light blue btn modal-trigger' href='#modal_director".$count."'>Edit</a>

											  <!-- Modal Structure -->
											  <div id='modal_director".$count."' class='modal modal-fixed-footer'>
												<div class='modal-content'>
												  <h4>Edit ".$row['Position']." Role</h4>
												  <img src='../".$row['Photo']."' class='responsive-img circle' width='200'></img>
												  
												  <form action = 'admin.php' method = 'post' enctype='multipart/form-data'>
													  <label class='center-align blue-text darken-2' style='font-size:18px'>Update Name  :</label>
													  <input type = 'text' name = 'Memb_name' class = 'box' value='".$row['Name']."'/><br /><br />
													  <input type='hidden' name='id' value='".$row['id']."'/>
													  <input type='hidden' name='type' value='Member'/>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Photo:</label>
													  <select style='display:block;' name='photo'>";?>
													     <option disabled selected value> -- Select a Picture -- </option>
													<?php 
														for ($i = 0; $i < count($photos); $i++){
															if (strpos($photos[$i], '.png') !== false || strpos($photos[$i], '.jpg') !== false){
																	echo "<option value='".$photos[$i]."'>".$photos[$i]."</option>";
																}
															}
													echo "
													  </select>
													  <br/>
													  <div class='caption center-align'>
														<button style='cursor: pointer;' class='btn-large waves-effect waves-light blue darken-1' name='update' type='submit'>Update</button><br />
													  </div>
												  </form>
												</div>
												<div class='modal-footer'>
												  <a href='#' class=' modal-action modal-close btn waves-effect blue darken-1 waves-blue'>Cancel</a>
												</div>
											  </div>
											</span></td></tr>
											";
											$count = $count+1;
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Merch admin section -->
				<div class="row" id="merch">
					<div class="col s12">
						<div class="card grey lighten-4">
							<div class="card-content black-text">
								<span class="card-title blue-text darken-1">ESSS Merchandise</span>
								<!-- TODO: Make the merch section a PHP function to reduce code-->
								<!-- ACCESSORY SECTION-->
								<?php 
									$result = $db->query("SELECT * FROM merch WHERE Type='Accessories'");
								?>
								<table class="striped centered">
								<thead>
										<tr>
											<th data-field="name">Accessories</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$count = 0;
										while($row = mysqli_fetch_array($result)){
											echo "<tr><td>".
												$row['Name']."<br/>
												<!-- Modal Trigger -->
												  <a class='waves-effect waves-light blue btn modal-trigger' href='#modal_merch".$count."'>Edit</a>
												  
												<!-- Modal Structure -->
											  <div id='modal_merch".$count."' class='modal modal-fixed-footer'>
												<div class='modal-content'>
												  <h4>Edit ".$row['Name']." Accessory</h4>
												  <img src='../".$row['Photo']."' class='responsive-img circle' width='200'></img>
												  
												  <form action = 'admin.php' method = 'post' enctype='multipart/form-data'>
													  <label class='center-align blue-text darken-2' style='font-size:18px'>Update Name  :</label>
													  <input type = 'text' name = 'Memb_name' class = 'box blue-text darken-2' value='".$row['Name']."'/><br /><br />
													  <input type='hidden' name='id' value='".$row['id']."'/>
													  <input type='hidden' name='type' value='".$row['Type']."'/>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Photo:</label>
													  <select style='display:block;' name='photo'>";?>
													     <option disabled selected value> -- Select a Picture -- </option>
													<?php
														$photos = scandir('../img/merch/accessories');
														for ($i = 0; $i < count($photos); $i++){
															if (strpos($photos[$i], '.png') !== false || strpos($photos[$i], '.jpg') !== false){
																	echo "<option value='".$photos[$i]."'>".$photos[$i]."</option>";
																}
															}
													echo "
													  </select>
													  <br/>
													  <div class='caption center-align'>
														<button style='cursor: pointer;' class='btn-large waves-effect waves-light blue darken-1' name='update' type='submit'>Update</button><br />
													  </div>
												  </form>
												</div>
												<div class='modal-footer'>
												  <a href='#' class=' modal-action modal-close btn waves-effect blue darken-1 waves-blue'>Cancel</a>
												</div>
											  </div>
												</td></tr>";
												$count = $count+1;
										}
										?>
										<!--<img src='../".$row['Photo']."' class='responsive-img circle' width='20%' height='25%'></img><br/>-->
									</tbody>
								</table>
								
								<br/><br/><br/>
								<!-- APPARELL SECTION-->
								<?php 
									$result = $db->query("SELECT * FROM merch WHERE Type='Apparell'");
								?>
								<table class="striped centered">
								<thead>
										<tr>
											<th data-field="name">Apparell</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$count = 0;
										while($row = mysqli_fetch_array($result)){
											echo "<tr><td>".
												$row['Name']."<br/>
												<!-- Modal Trigger -->
												  <a class='waves-effect waves-light blue btn modal-trigger' href='#modal_merchB".$count."'>Edit</a>
												  
												<!-- Modal Structure -->
											  <div id='modal_merchB".$count."' class='modal modal-fixed-footer'>
												<div class='modal-content'>
												  <h4>Edit ".$row['Name']." Apparell</h4>
												  <img src='../".$row['Photo']."' class='responsive-img circle' width='200'></img>
												  
												  <form action = 'admin.php' method = 'post' enctype='multipart/form-data'>
													  <label class='center-align blue-text darken-2' style='font-size:18px'>Update Name  :</label>
													  <input type = 'text' name = 'Memb_name' class = 'box blue-text darken-2' value='".$row['Name']."'/><br /><br />
													  <input type='hidden' name='id' value='".$row['id']."'/>
													  <input type='hidden' name='type' value='".$row['Type']."'/>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Photo:</label>
													  <select style='display:block;' name='photo'>";?>
													     <option disabled selected value> -- Select a Picture -- </option>
													<?php
														$photos = scandir('../img/merch/apparell');
														for ($i = 0; $i < count($photos); $i++){
															if (strpos($photos[$i], '.png') !== false || strpos($photos[$i], '.jpg') !== false){
																	echo "<option value='".$photos[$i]."'>".$photos[$i]."</option>";
																}
															}
													echo "
													  </select>
													  <br/>
													  <div class='caption center-align'>
														<button style='cursor: pointer;' class='btn-large waves-effect waves-light blue darken-1' name='update' type='submit'>Update</button><br />
													  </div>
												  </form>
												</div>
												<div class='modal-footer'>
												  <a href='#' class=' modal-action modal-close btn waves-effect blue darken-1 waves-blue'>Cancel</a>
												</div>
											  </div>
												</td></tr>";
												$count = $count+1;
										}
										?>
										<!--<img src='../".$row['Photo']."' class='responsive-img circle' width='20%' height='25%'></img><br/>-->
									</tbody>
								</table>
								
								<br/><br/><br/>
								
								<!-- MUGS SECTION-->
								<?php 
									$result = $db->query("SELECT * FROM merch WHERE Type='Mugs'");
								?>
								<table class="striped centered">
								<thead>
										<tr>
											<th data-field="name">Mugs</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$count = 0;
										while($row = mysqli_fetch_array($result)){
											echo "<tr><td>".
												$row['Name']."<br/>
												<!-- Modal Trigger -->
												  <a class='waves-effect waves-light blue btn modal-trigger' href='#modal_merchC".$count."'>Edit</a>
												  
												<!-- Modal Structure -->
											  <div id='modal_merchC".$count."' class='modal modal-fixed-footer'>
												<div class='modal-content'>
												  <h4>Edit ".$row['Name']." Mug</h4>
												  <img src='../".$row['Photo']."' class='responsive-img circle' width='200'></img>
												  
												  <form action = 'admin.php' method = 'post' enctype='multipart/form-data'>
													  <label class='center-align blue-text darken-2' style='font-size:18px'>Update Name  :</label>
													  <input type = 'text' name = 'Memb_name' class = 'box blue-text darken-2' value='".$row['Name']."'/><br /><br />
													  <input type='hidden' name='id' value='".$row['id']."'/>
													  <input type='hidden' name='type' value='".$row['Type']."'/>
													  <label class='blue-text darken-2' style='font-size:18px'>Update Photo:</label>
													  <select style='display:block;' name='photo'>";?>
													     <option disabled selected value> -- Select a Picture -- </option>
													<?php
														$photos = scandir('../img/merch/mugs');
														for ($i = 0; $i < count($photos); $i++){
															if (strpos($photos[$i], '.png') !== false || strpos($photos[$i], '.jpg') !== false){
																	echo "<option value='".$photos[$i]."'>".$photos[$i]."</option>";
																}
															}
													echo "
													  </select>
													  <br/>
													  <div class='caption center-align'>
														<button style='cursor: pointer;' class='btn-large waves-effect waves-light blue darken-1' name='update' type='submit'>Update</button><br />
													  </div>
												  </form>
												</div>
												<div class='modal-footer'>
												  <a href='#' class=' modal-action modal-close btn waves-effect blue darken-1 waves-blue'>Cancel</a>
												</div>
											  </div>
												</td></tr>";
												$count = $count+1;
										}
										?>
										<!--<img src='../".$row['Photo']."' class='responsive-img circle' width='20%' height='25%'></img><br/>-->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Other admin section -->
				<div class="row" id="other">
					<div class="col s12">
						<div class="card grey lighten-4">
							<div class="card-content black-text">
								<span class="card-title blue-text darken-1">Other</span><br/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
   </body>
   
</html>