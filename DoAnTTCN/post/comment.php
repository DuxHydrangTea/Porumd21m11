<?php 
include '../config/config.php';
if (isset($_POST['comment-button'])) {
	$us = $_POST['username'];
	$p = $_POST['postid'];
	$cmt = $_POST['commenttext'];
	$date = date('Y-m-d H:i:s');
	$queryAddcmt = "insert into tbl_comment values (NULL, '$us',$p, '$cmt', '$date') ";
	if($conn->query($queryAddcmt)){
		$address = "location: post-detail.php?postid=$p";
		header($address);
	}
else{
	echo "fal cmt";
}
}
 ?>