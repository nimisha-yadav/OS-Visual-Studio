<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/OS.ico" />
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
		<style>
  				.modal-header, h4, .close {
    				background-color: #c18978;
    				color:white !important;
    				text-align: center;
    				font-size: 30px;
  				}
  				.modal-footer {
    				background-color: #f9f9f9;
  				}
  		</style>
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/design.css" />
	</head>

	<body class="landing is-preload">
		<?php include '../partials/_header.php';?>
		<?php include '../partials/_signupModal.php';?>
		<?php include '../partials/_loginModal.php';?>
		<?php include '../partials/_dbconnect.php';
		
		if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
			echo '<script>alert("Welcome to OS Visual Studio | Discussion Forum")</script>';
		}
		?>

		<div id="page-wrapper">

			<!-- Header -->
			
			<!-- Banner -->
				<section id="banner" style="background-image: url('../images/pic04.jpg'); background-size:cover;">
					<h2>OS Visual Studio | Discussion Forum</h2>
					<p>A dedicated forum to ask and answer queries related to Operating Systems and its algorithms.</p>
					<p style="font-size:1.3rem;"><i>
						<li>No Spam / Advertising / Self-promotion allowed in the forum. Remain respectful of other members at all times.</li>
						<li>Do not post copyright-infringing material, “offensive” posts, links or images.</li>
						</i>
					</p>
					<p>Search keywords related to your query:</p>
					<ul class="actions special">
						<form method="post" action="#">
							<div class="row gtr-uniform gtr-50">
								<div class="col-9 col-12-mobilep">
									<input type="text" name="query" id="query" value="" placeholder="Query" style="color:black;"/>
								</div>
								<div class="col-3 col-12-mobilep">
									<input type="submit" value="Search" class="fit" />
								</div>
							</div>
						</form>
					</ul>
				</section>
  
			<!-- Modal -->
      
    		</div>
  		</div> 
			<!-- Main -->
				<section id="main" class="container">

					<section id="os-algorithms" class="container">
						<div class="row">
							<!-- FETCH ALL THE MODULES FROM DATABASE -->
							<?php 
							$sql = "SELECT * FROM `modules`";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)){
								$id = $row['module_id'];
								$mod = $row['module_name'];
								$desc = $row['module_description'];
								echo '<div class="col-6 col-12-narrower">
										<section class="box special">
											<span class="image featured"><img src="../images/dis' .$id. '.jpeg" alt="" /></span>
											<h3><a href="queslist.php?modid=' . $id . '">' . $mod . '</a></h3>
											<p>' . $desc . '</p>
											<ul class="actions special">
											<li><a href="queslist.php?modid=' . $id . '" class="button alt">View Questions</a></li>
											</ul>
										</section>
									</div>';
									
							}
							?>
						</div>
					</section>
				</section>

			<!-- CTA -->
				<!-- <section id="cta">

					<h2>Sign up for beta access</h2>
					<p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>

					<form>
						<div class="row gtr-50 gtr-uniform">
							<div class="col-8 col-12-mobilep">
								<input type="email" name="email" id="email" placeholder="Email Address" />
							</div>
							<div class="col-4 col-12-mobilep">
								<input type="submit" value="Sign Up" class="fit" />
							</div>
						</div>
					</form>

				</section> -->

			<!-- Footer -->
			
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://github.com/nimisha-yadav/OS-Visual-Studio" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="mailto:osvisstudio@gmail.com" class="icon brands fa-google"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; <a href="https://github.com/nimisha-yadav/OS-Visual-Studio">OS Visual Studio. </a>   All Rights Reserved.</li>
					</ul>
				</footer>

		</div>
		<script>
			$(document).ready(function(){
  				$("#myBtn").click(function(){
    			$("#myModal").modal();
  			});
			});
		</script>
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>