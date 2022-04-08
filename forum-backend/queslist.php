<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/OS.ico" />
		<link rel="stylesheet" href="../assets/css/bootstrap/bootstrap-3.4.1-dist/css/bootstrap.css" />
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
		  <link rel="stylesheet" href="../assets/css/discussion.css" />
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
							echo '<script>window.alert("Your thread has been added! Please wait for someone to respond.")</script>';
							echo ' 	<div class="alert alert-success alert-dismissible fade show shadow">
                        	   		<strong>Success!</strong> Your thread has been added! Please wait for someone to respond.
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
						<br><br>
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
						<br>
						<input type="submit" value="Submit" />
					</form>
					</div>';
					}
					else{
						echo 	'<div class="container">
									<br><br>
									<h2 class="py-2">Start a Discussion</h2> 
						 			<blockquote>
									 <div class="jumbotron" style="background-color:#d8d4d4">
										<div class="container-1">
											<p class="display-5"style="margin:2%; padding:1%"><b> You are not logged in! </b></p>
											<p class="lead" style="margin:2%; padding:1%"> Please login to participate in the discussion. </p>
										</div>
							 		 </div>
									</blockquote>
								</div>';
					}

				?>
                      <div class="container" id="os-algorithms">
	                  <div class="firstDiv">
		               <h1><b> Browse Questions</b> </h1><br>
  
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
								<img  class="img" src="../images/avtar.png"  class="mr-3" alt="...">
								<div class="mta"><b class="qutz">
									' .$user_email. '</b> at ' . $time_view .'
									<br>
								   <b class="qutz1"><a style="font-style:normal;" href="question.php?quesid=' . $id. '">'. $title . '</a></b> 
								  <p class="qutz2" style="font-style:normal;"> '. $desc . ' </p>
								</div>
							  </div></blockquote>';
							}
					         
							if($noResult){
								echo '<blockquote><div class="jumbotron" style="background-color:#d8d4d4">
										<div class="container-1">
											<p class="display-5"style="margin:2%; padding:1%">No Results Found.</p>
											<p class="lead" style="margin:2%; padding:1%"> Be the first person to ask a question.</p>
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