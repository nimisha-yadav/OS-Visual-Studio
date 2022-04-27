<!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="../images/OS.ico" />
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
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

		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/design.css" />
	</head>

	<body class="landing is-preload">
		<?php include '../partials/_header.php';?>
		<?php include '../partials/_signupModal.php';?>
		<?php include '../partials/_loginModal.php';?>
		<?php include '../partials/_dbconnect.php';
		?>



		<div id="page-wrapper">

			<!-- Header -->
			
			<!-- Banner -->
			<section id="banner" style="background-image: url('../images/banner4.png'); background-size:cover;">
					<h2>Search results for <em>"<?php echo $_GET['query']?>"</em></h2>
					<p>These are your search results. If you are unable to find a similar question then feel free to post a question in the relevant category and our community will respond.</p>
					<p>Search keywords related to your query:</p>
					<ul class="actions special">
						<form method="get" action="search.php" autocomplete="off">
							<div class="row gtr-uniform gtr-50">
								<div class="col-9 col-12-mobilep">
									<input type="text" name="query" id="query" value="" placeholder="Search" style="color:black;" required/>
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

          <div class="container my-3" id="maincontainer">
              <br>
        <!-- <h1 class="py-3">Search results for <em>"<?php echo $_GET['query']?>"</em></h1> -->

		<?php
        $noresults = true;
		$query=$_GET["query"];
    	$sql = "SELECT * FROM questions where match(ques_title,ques_desc) against ('$query');"; 
    	$result = mysqli_query($conn, $sql);
		
    	while($row = mysqli_fetch_assoc($result)){
        	$title = $row['ques_title'];
        	$desc = $row['ques_desc'];
			$ques_id = $row['ques_id'];
			$url= "question.php?quesid=". $ques_id;
            $noresults = false;

		 // Display the search result
		 echo '<div class="result">
		 <blockquote>
		 <h1><a href="'. $url. '" class="text-dark">'. $title. '</a> </h1>
		 <p>'. $desc .'</p>
   </div></blockquote>'; 
        }

        if ($noresults){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4"><b>No Results Found</b></p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords. </li></ul>
                        </p>
                    </div>
                 </div>';
        }        
	?>

            
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
		<?php
		if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
			echo '<script>window.onload = function(){
				alert("Welcome to OS Visual Studio | Discussion Forum")}
			      </script>';
			
		}
		?>
</html>