<?php 
include_once 'header.php';
 ?>
 <link rel="stylesheet" type="text/css" href="style.css">
	<section class="mian-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php 
				if (isset($_SESSION['u_id'])) {
					echo '<p class="success">You are logged in!</p>';
				}
				else{
					echo '<p class="error">You are not logged in!</p>';
				}
				if(!isset($_GET['login'])){
				exit();
				}
				else{
					$loginCheck=$_GET['login'];
					if($loginCheck=='empty'){
					echo "<p class='error'>You did not fill in all fields!</p>";
					exit();
					}
					elseif($loginCheck=='error'){
						echo "<p class='error'>An incorrect username or password</p>";
						exit();
					}
				}
			 ?>
		</div>
	</section>
<?php 
include_once 'footer.php';
 ?>
