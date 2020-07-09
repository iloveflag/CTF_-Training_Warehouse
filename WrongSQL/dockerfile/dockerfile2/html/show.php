
<?php 

include_once 'header.php';
include 'includes/dbh.inc.php';
if(!isset($_SESSION['u_id'])){
	header('Location:index.php');
	exit();
}


?>
<link rel="stylesheet" type="text/css" href="style.css">
	<section class="mian-container">
		<div class="main-wrapper">
			<h2>SHOW</h2>
			<?php 
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$waf="/union|updatexml|ascii|mid|left|greatest|least|sleep|benchmark|like|regexp|if|-|<|>|[\s#%]+/i";
				if(preg_match($waf,$id)){
			        die("Sorry!Some things have been filtered!");
			    }
				$id=$_GET['id'];
				$sql="SELECT * FROM users WHERE id='$id' limit 1";
				$result=mysqli_query($conn,$sql);
				if(!$result){
					echo mysqli_error($conn);
					exit();
				}
				$resultCheck=mysqli_num_rows($result);
				if ($resultCheck<1) {
					echo '<p class="error">No this user!</p><br/>';;
					exit();	
				}else{
					while($row=mysqli_fetch_assoc($result)){
					$user_email= $row['user_email'];
					$user_uid=$row['user_uid'];
					echo '<p class="success">Your email is:'.$user_email.'</p><br/>';
					echo '<p class="success">Your username is:'.$user_uid.'</p>';
					}
				}				
			}


			 ?>
		</div>
	</section>
<?php  
include_once 'footer.php';
?>
