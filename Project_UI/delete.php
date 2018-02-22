<?php

/*

DELETE.PHP



*/



// connect to the database

include('db_connection.php');


// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['name']))

{

// get id value

$name = $_GET['name'];



// delete the entry

$result = mysql_query("DELETE FROM players WHERE name=$name")

or die(mysql_error());



// redirect back to the view page

header("Location: view.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: view.php");

}



?>