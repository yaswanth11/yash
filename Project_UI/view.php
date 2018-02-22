<?php



// connect to the database

include('db_connection.php');



// get results from database

$result = mysql_query("SELECT * FROM reports")

or die(mysql_error());



// display data in table

echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Name</th> <th>Details</th>  <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysql_fetch_array( $result )) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['name'] . '</td>';

echo '<td>' . $row['details'] . '</td>';



echo '<td><a href="add.php?name=' . $row['name'] . '">Edit</a></td>';

echo '<td><a href="delete.php?name=' . $row['name'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>
