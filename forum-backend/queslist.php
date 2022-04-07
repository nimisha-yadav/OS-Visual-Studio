<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/OS.ico" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
		  <link rel="stylesheet" href="../assets/css/main1.css" />
		  <link rel="stylesheet" href="../assets/css/main.css" />
		  <link rel="stylesheet" href="../assets/css/design.css" />
	</head>

	<body class="landing is-preload">

	<?php include '../partials/_header.php';?>
	<?php include '../partials/_signupModal.php';?>
	<?php include '../partials/_loginModal.php';?>
    <?php include '../partials/_dbconnect.php';?>

    <?php
    	$id = $_GET['modid'];
    	$sql = "SELECT * FROM `modules` WHERE module_id=$id"; 
    	$result = mysqli_query($conn, $sql);
    	while($row = mysqli_fetch_assoc($result)){
        	$modname = $row['module_name'];
        	$modesc = $row['module_description'];
    	}
    ?>
    
		<div id="page-wrapper">

			<!-- Header -->
				<!-- <header id="header" class="alt">
					<h1><a href="../index.html">OS</a> Visual Studio</h1>
					<nav id="nav">
						<ul>
							<li><a href="../index.html">Home</a></li>
							<li>
								<a href="#os-algorithms" class="icon solid fa-angle-down">OS Algorithms</a>
								<ul>
									<li>
										<a href="generic.html">CPU Scheduling</a>
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
										<a href="elements.html">Disk Scheduling</a>
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
							<li><a href="index.html">Tutorial</a></li>
							<li><a href="forum.php">Discussion Forum</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header> -->

			<!-- Banner -->
				<section id="banner">
					<h2><?php echo $modname;?></h2>
					<p><?php echo $modesc;?></p>
					<ul class="actions special"></ul>
				</section>
                  
				<?php
					$showAlert=false;
					$method = $_SERVER['REQUEST_METHOD'];
					if($method=='POST'){
						$q_title = $_POST['title'];
        				$q_desc = $_POST['desc'];
						$user_id = $_POST['user_id']; 

					$sql = "INSERT INTO `questions` (`ques_title`, `ques_desc`, `ques_mod_id`, `ques_user_id`, `ask_time`) VALUES ('$q_title', '$q_desc', '$id', '$user_id', current_timestamp())";

					$result = mysqli_query($conn, $sql);
					$showAlert=true;

						if($showAlert)
						{
							echo '<script>window.alert("Your thread has been added! Please wait for community to respond.")</script>';
							echo ' 	<div class="alert alert-success alert-dismissible fade show shadow">
                        	   		<strong>Success!</strong> Your thread has been added! Please wait for community to respond
                        	   		<button type="button" class="btn-close" data-bs-dismiss="alert">
                               		</button>
                  			   		</div>';
						}
					}
				?>
     			<!-- Main -->	

				 <?php

					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

					// echo $_SESSION['user_id'];
					echo '<div class="container">
					<form action="'. $_SERVER["REQUEST_URI"] . '" method="post" autocomplete="off">
						<h2 class="py-2">Start a Discussion</h2> 
						<div class="form-group">
							<label for="exampleInputEmail1">Problem Title</label>
							<input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
						</div>
						<input type="hidden" name="user_id" value="'. $_SESSION["user_id"]. '">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
							<textarea id="message" name="desc" rows="6" required></textarea>
						</div>
						<input type="submit" value="Submit" />
					</form>
					</div>';
					}
					else{
						echo 	'<div class="container">
									<h2 class="py-2">Start a Discussion</h2> 
						 			<blockquote>
									 <div class="jumbotron" style="background-color:#d8d4d4">
										<div class="container-1">
											<p class="display-5"style="margin:2%; padding:1%"><b> You are not logged in! </b></p>
											<p class="lead" style="margin:2%; padding:1%"> Login to start a discussion </p>
										</div>
							 		 </div>
									</blockquote>
								</div>';
					}

				?>
                      <div class="container" id="os-algorithms">
	                  <div class="firstDiv">
		               <h1><b> Browse Questions</b> </h1>
  
                      <?php 
							$id = $_GET['modid'];	
							$sql = "SELECT * FROM `questions` WHERE ques_mod_id=$id"; 
							$result = mysqli_query($conn, $sql);
							$noResult = true;
							while($row = mysqli_fetch_assoc($result)){
								$noResult = false;
                                $id = $row['ques_id'];
                                $title = $row['ques_title'];
                                $desc = $row['ques_desc']; 
								$ask_time = $row['ask_time'];
								$time = strtotime($ask_time);
								$time_view = date("d M Y g:i A", $time);
								$ques_user_id = $row['ques_user_id'];
								$sql2 = "SELECT user_email FROM `users` WHERE user_id='$ques_user_id'";
								$result2 = mysqli_query($conn, $sql2);
        						$row2 = mysqli_fetch_assoc($result2);
								$user_email = $row2['user_email'];

								echo '<blockquote><div class="media">
								<img  class="img" src="../images/avtar.png"  class="mr-3" alt="..." >
								<div class="mta"><b>
									' .$user_email. '</b> at ' . $time_view .'
									<br>
								   <b><a style="font-style:normal;" href="question.php?quesid=' . $id. '">'. $title . '</a></b> 
								  <p style="font-style:normal;"> '. $desc . ' </p>
								</div>
							  </div></blockquote>';
							}
					         
							if($noResult){
								echo '<blockquote><div class="jumbotron" style="background-color:#d8d4d4">
										<div class="container-1">
											<p class="display-5"style="margin:2%; padding:1%">No Results Found</p>
											<p class="lead" style="margin:2%; padding:1%"> Be the first person to ask a question</p>
										</div>
									 </div></blockquote>';
							}
							?>
						
					

					<!-- LEFT HERE JUST FOR REFERENCE OF HTML -->
					   <!-- <div class="media">
						<img  class="img" src="images/avtar.jpg"  class="mr-3" alt="..." >
						   <b>What is CPU Scheduling?</b> 
						  <div class="mt">
						  <p> CPU Scheduling is a process of determining which process will own CPU for execution while another process is on hold.</p>
						</div>
					  </div> -->
					  
                      
	               </div>
                       </div>
					   


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

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

	</body>
</html>