<?php
//error_reporting(0);
//include('DBconn.php');
$conn=mysql_connect("localhost","root","") or die("can't connect");
@mysql_select_db("ecommerce",$conn);
$result=mysql_query("SELECT * FROM product");
//$result1=mysql_query("SELECT * FROM register");
$writer = new XMLWriter();  
$writer->openURI('product.xml'); 
$writer->startDocument();   
$writer->setIndent(true); 
$writer->startElement('Product');
while ($row = mysql_fetch_assoc($result)){
	
	
	$writer->startElement("information");
	$writer->writeAttribute('Title', $row['title']);
	$writer->writeAttribute('id', $row['product_id']);
	$writer->writeAttribute('price', $row['price']);
	$writer->writeAttribute('image', $row['image']);
	$writer->writeRaw($row['desp']);
	//$writer->writeAttribute('Status', $status );
	//$writer->writeRaw($row['Message']);
	$writer->endElement();
}
$writer->endElement();   
$writer->endDocument();   
$writer->flush(); 
header('location:admin_panel.php');
?>