<?php
highlight_file(__FILE__);
error_reporting(0);
$file=$_REQUEST['file'];
if($file !=''){
    $inc=sprintf("%s.php",$file);
    echo $inc;
    include($inc);
}else{
    echo 'no';
}