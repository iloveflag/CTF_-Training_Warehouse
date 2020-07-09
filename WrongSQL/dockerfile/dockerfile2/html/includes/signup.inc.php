<?php 
if(isset($_POST['submit'])){
	include_once 'dbh.inc.php';
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$uid=mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	$pwdConfirm=mysqli_real_escape_string($conn,$_POST['pwdConfirm']);
	//Error han
	//Check for empty fields
	if (empty($email)||empty($uid)||empty($pwd)||empty($pwdConfirm)) {
		header("Location:../signup.php?signup=empty");
		exit();		
	}else{
			//Check if email is valid
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location:../signup.php?signup=email&uid=$uid");
			}else{
				if($pwd!=$pwdConfirm){
					header("Location:../signup.php?signup=password_unconfirm");
					exit();
				}
				else{				
					$sql="SELECT * FROM users WHERE user_uid='$uid';";
					$result=mysqli_query($conn,$sql);
					$resultCheck=mysqli_num_rows($result);
					if ($resultCheck>0) {
						header("Location:../signup.php?signup=usertaken");
						exit();
					}else{
						//Hash the password
						$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT); //(PHP 5 >= 5.5.0, PHP 7)
						//Insert the user into the database
						$sql="INSERT INTO users(user_email,user_uid,user_pwd)VALUES('$email','$uid','$hashedPwd');";
						mysqli_query($conn,$sql);
						header("Location:../signup.php?signup=success");
						exit();
					}
				}
			}
		}

}else{
	header("Location:../signup.php");
	exit();
}
?>
