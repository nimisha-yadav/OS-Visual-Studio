<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="../assets/css/main1.css" />
	</head>

	<body class="landing is-preload">
    <?php include '../partials/_dbconnect.php';?>
    
	<?php
    $id = $_GET['quesid'];
    $sql = "SELECT * FROM `questions` WHERE ques_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['ques_title'];
        $desc = $row['ques_desc'];
    }
	?>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt" style="background-color:#575556;">
					<h1><a href="../index.html">OS</a> Visual Studio</h1>
					<nav id="nav">
						<ul>
							<li><a href="../index.html">Home</a></li>
							<li>
								<a href="../index.html#os-algorithms" class="icon solid fa-angle-down">OS Algorithms</a>
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
										<a href="../contact.html">Page Replacement</a>
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
							<li><a href="../index.html">Tutorial</a></li>
							<li><a href="forum.php">Discussion Forum</a></li>
							<li><a href="../contact.html">Contact</a></li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
            <section id="main" class="container" >
            <section class="box special" style="margin-top:25%;">
				<header class="major">
					<h1 style="text-align:left;"><b>Posted By : Sakshi</b></h1>
					<h2><?php echo $title;?></h2>
					<p><?php echo $desc;?></p>
					<br>
				</header>
			</section>
            </section>
     			<!-- Main -->	

				 <?php
				$showAlert=false;
					$method = $_SERVER['REQUEST_METHOD'];
					if($method=='POST'){
						$reply = $_POST['reply'];

					$sql = "INSERT INTO `replies` (`reply_content`, `reply_ques_id`, `reply_user_id`, `reply_time`) VALUES ('$reply', '$id', '0', current_timestamp());";

					$result = mysqli_query($conn, $sql);
					$showAlert=true;
					if($showAlert)
					{
						echo ' <div class="alert alert-success alert-dismissible fade show shadow">
                        <strong>Success!</strong> Your thread has been added! Please wait for community to respond
                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                  </div>';
						
					}
					}
				?>

				 <div class="container">
					<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" autocomplete="off">
						<h2 class="py-2">Post a Reply</h2> 
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Type your reply</label>
							<textarea id="message" name="reply" rows="6" required></textarea>
						</div>
						<input type="submit" value="Submit" />
					</form>
					</div>

                      <div class="container">
	                  <div class="firstDiv">
		               <h1><b> View Discussions</b> </h1>

                      <?php 
							$id = $_GET['quesid'];	
							$sql = "SELECT * FROM `replies` WHERE reply_ques_id=$id"; 
							$result = mysqli_query($conn, $sql);
                             $noResult=true;
							while($row = mysqli_fetch_assoc($result)){
								$noResult=false;
								$id = $row['reply_id'];
        						$content = $row['reply_content'];

								echo '<div class="media">
								<img  class="img" src="../images/avtar.jpg"  class="mr-3" alt="..." >
								  <div class="mt">
								  <p> '. $content . ' </p>
								</div>
							  </div>';
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