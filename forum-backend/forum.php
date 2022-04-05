<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
			echo '<script>alert("Welcome to Geeks for Geeks")</script>';
		}
		?>
		<div id="page-wrapper">

			<!-- Header -->
				<!-- <?php echo '<header id="header" class="alt">
					<h1><a href="../index.html">OS</a> Visual Studio</h1>
					<nav id="nav">
						<ul>
							<li><a href="../index.html">Home</a></li>
							<li>
								<a href="../index.html#os-algorithms" class="icon solid fa-angle-down">OS Algorithms</a>
								<ul>
									<li>
										<a href="../cpu-scheduling.html">CPU Scheduling</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
									<li>
										<a href="contact.html">Page Replacement</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
									<li>
										<a href="../disk-scheduling.html">Disk Scheduling</a>
										<ul>
											<li><a href="#">FCFS Algorithm</a></li>
											<li><a href="#">SSTF Algorithm</a></li>
											<li><a href="#">SCAN Algorithm</a></li>
											<li><a href="#">CSCAN Algorithm</a></li>
											<li><a href="#">LOOK Algorithm</a></li>
											<li><a href="#">CLOOK Algorithm</a></li>
											<li><a href="#">LIFO Algorithm</a></li>
										</ul>
									</li>
									<li>
										<a href="elements.html">Deadlock Avoidance</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
									<li>
										<a href="elements.html">Deadlock Detection</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Memory Allocation</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#main">About</a></li>
							<li><a href="../index.html">Tutorial</a></li>
							<li><a href="forum.php">Discussion Forum</a></li>
							<li><a href="../contact.html">Contact</a></li>';
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                                echo 'Welcome';
                              }
                            else{
                                echo '<li><button class="button" data-toggle="modal" data-target="#loginModal">Login</button></li>
                                <li><button class="button" data-toggle="modal" data-target="#myModal">Signup</button></li>';
                            }
                            
							
						echo '</ul>
					</nav>
				</header>';?> -->
			
			<!-- Banner -->
				<section id="banner" style="background-image: url('../images/pic04.jpg'); background-size:cover;">
					<h2>OS Visual Studio | Discussion Forum</h2>
					<p>A dedicated forum to solve all your doubts related to operating systems and it's algorithms.</p>
					<p style="font-size:1.3rem;"><i>
						<li>No Spam / Advertising / Self-promote in the forums. Remain respectful of other members at all times.</li>
						<li>Do not post copyright-infringing material. Do not post “offensive” posts, links or images.</li>
						</i></p>
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
<!-- <div class="modal fade" id="myModal" role="dialog" style="z-index:10000;">
    <div class="modal-dialog">
     -->
      <!-- Modal content-->
      <!-- <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="/forum/partials/_handleSignup.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> User Email</label>
              <input type="text" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="signupPassword" name="signupPassword" placeholder="Enter password">
            </div>
			<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
              <input type="text" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Enter password">
            </div> -->
            <!-- <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div> -->
              <!-- <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> -->
          <!-- <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p> -->
        <!-- </div>
      </div> -->
      
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
											<span class="image featured"><img src="../images/pic02.jpg" alt="" /></span>
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
				<section id="cta">

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

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; <a href="http://github.com">OS Visual Studio.</a>   All rights reserved.</li>
					</ul>
				</footer>

				<?php 
		
		if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
			echo "Welcome to Geeks for Geeks";
		}
		?>
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