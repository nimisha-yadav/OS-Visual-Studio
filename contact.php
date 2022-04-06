!DOCTYPE HTML>
<html>
	<head>
		<title>OS Visual Studio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="icon" href="images/OS.ico" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/design.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">
			<header id="header">
          <h1><a href="https://github.com/nimisha-yadav/OS-Visual-Studio">OS</a> Visual Studio</h1>
          <nav id="nav">
            <ul>
              <li><a href="index.html">Home</a></li>
              <li>
                <a href="index.html#os-algorithms" class="icon solid fa-angle-down">OS Algorithms</a>
                <ul>
                  <li>
                    <a href="cpu-scheduling.html">CPU Scheduling</a>
                  </li>
                  <li>
                    <a href="disk-scheduling.html">Disk Scheduling</a>
                  </li>
                  <li>
                    <a href="page-replacement.html">Page Replacement</a>
                  </li>
                  <li>
                    <a href="deadlock-avoidance.html">Deadlock Avoidance</a>
                  </li>
                  <li>
                    <a href="memory-allocation.html">Memory Allocation</a>
                  </li>
                </ul>
              </li>
              <li><a href="tutorial.html">Tutorial</a></li>
              <li><a href="forum-backend/forum.php">Discussion Forum</a></li>
              <li><a href="index.html#team">About Team</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="#" class="button">Sign Up</a></li>
            </ul>
          </nav>
        </header>


	<center>
  <section id="main" class="container medium">
					<header>
						<h2>Contact Us</h2>
						<p>Tell us what you think about our little operation.</p>
					</header>
		<h4 class="sent-notification"></h4>

		<form id="myForm">

  
	
		<input type="text" name="name" id="name" value="" placeholder="Name" />
    <br><br>

			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<input id="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<textarea id="body" rows="5" placeholder="Type Message"></textarea>
			<br><br>

		<button class="button " onclick="sendEmail()" value="Send An Email" style="font-family:'Source Sans Pro';font-size:18px;">Submit</button>
		</form>
	</center>

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

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>