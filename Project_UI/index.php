<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("files.xml");
include('db_connection.php');
$xmlObject = $xmlDoc->getElementsByTagName('document');
$itemCount = $xmlObject->length;

for ($i=0; $i < $itemCount; $i++){
  $docID = $xmlObject->item($i)->getElementsByTagName('docID')->item(0)->childNodes->item(0)->nodeValue;
  $Person = $xmlObject->item($i)->getElementsByTagName('Person')->item(0)->childNodes->item(0)->nodeValue;
  $Location  = $xmlObject->item($i)->getElementsByTagName('Location')->item(0)->childNodes->item(0)->nodeValue;
  $Date = $xmlObject->item($i)->getElementsByTagName('Date')->item(0)->childNodes->item(0)->nodeValue;
  $sql   = "INSERT INTO `pro3` (Name, Person, Date ) VALUES ('$Location', '$Person', '$Date')";
  mysql_query($sql);
  print "Finished Item $docID n<br/>";
}

?>