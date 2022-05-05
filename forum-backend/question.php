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
		<link rel="stylesheet" href="../assets/css/main1.css" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/design.css" />
		<link rel="stylesheet" href="../assets/css/discussion.css" />

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
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	</head>

	<body class="landing is-preload">

	<?php include '../partials/_header.php';?>
	<?php include '../partials/_signupModal.php';?>
	<?php include '../partials/_loginModal.php';?>
    <?php include '../partials/_dbconnect.php';?>
    
	<?php
    	$id = $_GET['quesid'];
    	$sql = "SELECT * FROM `questions` WHERE ques_id=$id"; 
    	$result = mysqli_query($conn, $sql);
		
    	while($row = mysqli_fetch_assoc($result)){
        	$title = $row['ques_title'];
        	$desc = $row['ques_desc'];
			$ques_user_id = $row['ques_user_id'];
			$sql2 = "SELECT user_email FROM `users` WHERE user_id='$ques_user_id'";
			$result2 = mysqli_query($conn, $sql2);
        	$row2 = mysqli_fetch_assoc($result2);
			$user_email = $row2['user_email'];
    	}
	?>
		<div id="page-wrapper">

			<!-- Header -->

			<!-- Banner -->
            <section id="main" style="background-color:#e89980;">
            	<section class="box special" style="margin-top:25%;">
					<header class="major">
						<h1 style="text-align:left;"><b>Posted By : <?php echo $user_email;?></b></h1>
						<h2><?php echo $title;?></h2>
						<p><?php echo $desc;?></p>
						<br>
					</header>
				</section>
            </section>
            <br><br>

     		<!-- Main -->	

				<?php
					$showAlert=false;
					$method = $_SERVER['REQUEST_METHOD'];
					if($method=='POST'){
						$reply = $_POST['reply'];
						$user_id = $_POST['user_id']; 

						$sql = "INSERT INTO `replies` (`reply_content`, `reply_ques_id`, `reply_user_id`, `reply_time`) VALUES ('$reply', '$id', '$user_id', current_timestamp());";

						$result = mysqli_query($conn, $sql);
						$showAlert=true;
						if($showAlert)
						{
							echo '<script>window.alert("Your comment has been added! Thanks for helping the community.")</script>';
							echo ' <div class="alert alert-success alert-dismissible fade show shadow">
                        		<strong>Success!</strong> Your thread has been added! Please wait for community to respond.
                        		<button type="button" class="btn-close" data-bs-dismiss="alert">
                        		</button>
                  				</div>';

						}
					}
				?>


				<?php 	
    					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
							echo '<div class="container">
				 					<form action="'. $_SERVER["REQUEST_URI"] . '" method="post" autocomplete="off">
										<h2 class="py-2">Post a Reply</h2> 
										<div class="form-group">
											<label for="exampleFormControlTextarea1">Type your reply</label>
											<textarea id="message" name="reply" rows="6" required></textarea>
											<input type="hidden" name="user_id" value="'. $_SESSION["user_id"]. '">
										</div>
										<br>
										<input type="submit" value="Submit" />
									</form>
								  </div>';
						}
						else{
							echo '<div class="container">
									<h2 class="py-2">Post a Comment</h2> 
					 				<blockquote>
					 					<div class="jumbotron" style="background-color:#d8d4d4">
											<div class="container-1">
												<p class="display-5"style="margin:2%; padding:1%"><b> You are not logged in! </b></p>
												<p class="lead" style="margin:2%; padding:1%"> Please login to post a comment. </p>
											</div>
					  					</div>
									</blockquote>
								  </div>';
						}
				?>

                <div class="container" id="os-algorithms">
	                <div class="firstDiv">
		               	<h1><b> View Discussions</b></h1>
                      	
						  <?php 

							$id = $_GET['quesid'];	
							$sql = "SELECT * FROM `replies` WHERE reply_ques_id=$id"; 
							$result = mysqli_query($conn, $sql);
                            $noResult=true;

							while($row = mysqli_fetch_assoc($result)){
								$noResult=false;
								$id = $row['reply_id'];
        						$content = $row['reply_content'];
								$reply_time = $row['reply_time'];

								$time = strtotime($reply_time);
								$time_view = date("d M Y g:i A", $time);
								$reply_user_id = $row['reply_user_id'];

								$sql2 = "SELECT user_email FROM `users` WHERE user_id='$reply_user_id'";
								$result2 = mysqli_query($conn, $sql2);
        						$row2 = mysqli_fetch_assoc($result2);
								$user_email = $row2['user_email'];


								echo '<div class="media">
										<img  class="img" src="../images/avtar.png"  class="mr-3" alt="..." >
								  		<div class="mt"><b class="qutz3">
								  		' .$user_email . '</b> at '. $time_view .'
								  		<p class="qutz4"> '. $content . ' </p>
										</div>
							  		</div>';
							}

							if($noResult){
								echo '<blockquote>
										<div class="jumbotron" style="background-color:#d8d4d4">
											<div class="container-1">
												<p class="display-5"style="margin:2%; padding:1%">No Results Found</p>
												<p class="lead" style="margin:2%; padding:1%"> Be the first person to answer this question.</p>
											</div>
							 			</div>
									  </blockquote>';
							}
					  	 ?> 
                      
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