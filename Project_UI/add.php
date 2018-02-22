<?php
	include_once('db_connection.php');

	if( isset($_GET['name']) )
	{
		$name = $_GET['name'];
		$res= mysql_query("SELECT * FROM reports WHERE name='$name'");
		$row= mysql_fetch_array($res);
	}

	if( isset($_POST['newName']) )
	{
		$newName = $_POST['newName'];
		$name  	 = $_POST['name'];
		$sql     = "UPDATE reports SET details='$newName' WHERE name='$name'";
		$res 	 = mysql_query($sql) 
                                    or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=view.php'>";
	}

?>
<form action="add.php" method="POST">
Details <input type="text" name="newName" value="<?php echo $row[1]; ?>">
Name<input type="text" name="name" value="<?php echo $row[0]; ?>">
<input type="submit" value=" Update "/>
</form>