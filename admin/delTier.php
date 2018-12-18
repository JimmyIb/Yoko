<?php

	include '../php/sqlHelper.php';

	$query = deleteRow('pointstier', 'tierid', $_GET['id']);
	$results = sendToDB('localhost', 'root', '', 'yokotest', $query);

    if($results)
		header("refresh:1; url=pointsTierManager.php");
	else
		echo "Not deleted";

?>