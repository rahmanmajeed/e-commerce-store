<?php
//error_reporting(0);
//include('DBconn.php');
$conn=mysql_connect("localhost","root","") or die("can't connect");
@mysql_select_db("ecommerce",$conn);
$result=mysql_query("SELECT * FROM register");
//$result1=mysql_query("SELECT * FROM register");
$writer = new XMLWriter();  
$writer->openURI('userinfo.xml'); 
$writer->startDocument();   
$writer->setIndent(true); 
$writer->startElement('INFORMATION');
while ($row = mysql_fetch_assoc($result)){
	
	
	$writer->startElement("information");
	$writer->writeAttribute('firstname', $row['fname']);
	$writer->writeAttribute('lastname', $row['lname']);
	$writer->writeAttribute('phone', $row['phone']);
	$writer->writeAttribute('address', $row['address']);
	$writer->writeAttribute('gender', $row['gender']);
	//$writer->writeAttribute('Status', $status );
	//$writer->writeRaw($row['Message']);
	$writer->endElement();
}
$writer->endElement();   
$writer->endDocument();   
$writer->flush(); 
?>

<?php header('Location:admin_panel.php'); ?>