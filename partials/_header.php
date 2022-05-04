<?php
session_start();
echo '<header id="header" class="alt">
			<h1><a href="/OS-Visual-Studio/index.html">OS</a> Visual Studio</h1>
			<nav id="nav">
				<ul>	
					<li><a href="../index.html">Home</a></li>
					<li>
						<a href="../index.html#os-algorithms" class="icon solid fa-angle-down">OS Algorithms</a>
						<ul>
							<li>
								<a href="../cpu-scheduling.html">CPU Scheduling</a>
							</li>
							<li>
								<a href="../disk-scheduling.html">Disk Scheduling</a>
							</li>
							<li>
								<a href="../page-replacement.html">Page Replacement</a>
							</li>
							<li>
								<a href="../deadlock-avoidance.html">Deadlock Avoidance</a>
							</li>
							<li>
								<a href="#">Memory Allocation</a>
							</li>
						</ul>
					</li>
					<li><a href="../tutorial.html">Tutorial</a></li>
					<li><a href="../forum-backend/forum.php">Discussion Forum</a></li>
					<li><a href="../contact.php">Contact</a></li>';

                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                        echo '<li style="color:white;">Welcome '. $_SESSION['user_email']. '</li>';
                        echo '<li><a href="/OS-Visual-Studio/partials/_logout.php" class="button">Logout</a></li>';
					}
                    else{
                        echo '<li><button class="button alt small" data-toggle="modal" data-target="#loginModal">Login</button></li>
                        <li><button class="button alt small" data-toggle="modal" data-target="#myModal">Signup</button></li>';
                        }	
						echo '
				</ul>
			</nav>
		</header>';
?>