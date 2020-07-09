<?php 
include_once 'header.php';
 ?>
 <link rel="stylesheet" type="text/css" href="style.css">
	<section class="mian-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
		<div><input type="text" name="email" placeholder="E-mail"></div>
		<?php 
			if(isset($_GET['uid'])){
				$uid=$_GET['uid'];
				echo '<div><input type="text" name="uid" placeholder="Username" value="'.$uid.'"></div>';
			}
			else{
				echo  '<div><input type="text" name="uid" placeholder="Username"></div>';
			}
		 ?>
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwdConfirm" placeholder="PasswordConfirm">
				<button type="submit" name="submit">Sign up</button>
			</form>
			<?php 
				if(!isset($_GET['signup'])){
			exit();
			}
			else{
				$signupCheck=$_GET['signup'];
				if($signupCheck=='empty'){
				echo "<p class='error'>You did not fill in all fields!</p>";
				exit();
				}
				elseif($signupCheck=='email'){
				echo "<p class='error'>You used an intvalid e-mail!</p>";
				exit();				
				}
				elseif($signupCheck=='usertaken'){
				echo "<p class='error'>The user has been used!</p>";
				exit();				
				}
				elseif($signupCheck=='password_unconfirm'){
				echo "<p class='error'>Please confirm the password!</p>";
				exit();
				}
				elseif($signupCheck=='success'){
				echo "<p class='success'>You have signed up!</p>";
				exit();				
				}
			}
			 ?>
		</div>
	</section>
<?php 
include_once 'footer.php';
 ?>
