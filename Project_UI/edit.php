<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($name, $details	)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="name" value="<?php echo $name; ?>"/>

<div>



<strong>Name *</strong> <input type="text" name="name" value="<?php echo $name; ?>"/><br/>

<strong>Details*</strong> <input type="text" name="details" value="<?php echo $details; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}







// connect to the database

include('db_connection.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if ($name != '' || $details != '')

{

// get form data, making sure it is valid

$name = $_POST['name'];

$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));

$details = mysql_real_escape_string(htmlspecialchars($_POST['details']));



// check that name/details fields are both filled in

if ($name == '' || $details == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($name, $details	);

}

else

{

// save the data to the database

mysql_query("UPDATE reports SET name='$name', details='$details' WHERE name='$name'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: view.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['name']) && $_GET['name'] > 0)

{

// query db

$name = $_GET['name'];

$result = mysql_query("SELECT * FROM reports WHERE name=$name")

or die(mysql_error());

$row = mysql_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$name = $row['name'];

$details = $row['details'];



// show form

renderForm($name, $details);

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>