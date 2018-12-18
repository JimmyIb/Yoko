<?php

	include '../php/sqlHelper.php';

	$query = deleteRow('client' ,'clientid' ,$_GET['id']);
	$results = sendToDB('localhost', 'root', '', 'yokotest', $query);

    if($results)
		header("refresh:1; url=clientManager.php");
	else
		echo "Not deleted";

?>