<?php 

	// error_reporting(0);
    //koneksi database
    require_once("config/koneksi.php");
    //mulai session
    session_start();

    if(!isset($_SESSION['username'])){
            //jika sudah login
            header("location:./");
    }

?>
<!DOCTYPE html>
<html class=''>
	<head>

		<title>Chat</title>
		<meta charset='UTF-8'>
		<meta name="robots" content="noindex">

		<?php include("component/component_style.php"); ?>
		
	</head>
	<body>
		<div id="frame">
			
			<?php include("component/component_sidepanel.php"); ?>

			<!-- Content -->
			<div class="content">
				<div class="contact-profile">
					<img src="assets/images/user.jpg" alt="" />
					<p>Rio Prastiawan</p>
					<!-- <div class="social-media">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</div> -->
				</div>
				<!-- Pesan -->
				<div class="messages">
					<ul>
						
					</ul>
				</div>
				<div class="message-input">
					<div class="wrap">
						<input type="text" placeholder="Tulis pesan..." autofocus="" />
						<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
						<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("component/component_script.php"); ?>

	</body>
</html>