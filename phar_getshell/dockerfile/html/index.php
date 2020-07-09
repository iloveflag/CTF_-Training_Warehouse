<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="#" method="POST" enctype="multipart/form-data">
		<input type="file" name='file' >
		<button type="submit" name="submit">upload</button>
	</form>
	<a href="lfi.php">lfi</a>
	<?php
		if(isset($_POST['submit'])){
			$file=$_FILES['file'];
			$fileName=$_FILES['file']['name'];
			$fileTmpName=$_FILES['file']['tmp_name'];
			$fileError=$_FILES['file']['error'];
			$fileExt=explode('.',$fileName);
			$fileActualExt=strtolower(end($fileExt));
			$allowd=array('txt');
			if(in_array($fileActualExt,$allowd)){
				if($fileError===0){
					$fileDestination='./upload/'.md5(time()).'.txt';
					move_uploaded_file($fileTmpName,$fileDestination);
					echo 'Your file in '.$fileDestination;
				}else{
					echo 'There is error uploading your file!';
				}
			}else{
				echo 'txt only!';
			}
		}

	?>
</body>
</html>