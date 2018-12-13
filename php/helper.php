<?php
	function addRecord(){
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'yokotest';
		
		$sql = "INSERT INTO client (clientid, pointstierid, points, name, address, email, phonenum, occupation, agegroup) VALUES ('$_POST[clientid]', '$_POST[pointstierid]', '$_POST[points]', '$_POST[name]', '$_POST[address]', '$_POST[email]', '$_POST[phonenum]', '$_POST[occupation]', '$_POST[agegroup]')";
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if(mysqli_query($conn, $sql))
			header("refresh:1; url=../databaseSite.php");
		else
			echo "Not Added";
	}
	
	
	function editForm($row){
		echo "<td><input type=text name=clientid value=".$row['clientid']."></td>";
		echo "<td><input type=text name=pointstierid value=".$row['pointstierid']."></td>";
		echo "<td><input type=text name=points value=".$row['points']."></td>";
		echo "<td><input type=text name=name value=".$row['name']."></td>";
		echo "<td><input type=text name=agegroup value=".$row['agegroup']."></td>";
		echo "<td><input type=text name=address value=".$row['address']."></td>";
		echo "<td><input type=text name=email value=".$row['email']."></td>";
		echo "<td><input type=text name=phonenum value=".$row['phonenum']."></td>";
		echo "<td><input type=text name=occupation value=".$row['occupation']."></td>";
	}
?>