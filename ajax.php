<?php
error_reporting(0);
$query=mysql_connect("localhost","root","");
mysql_select_db("ecommerce",$query);
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysql_query("SELECT * FROM product WHERE title LIKE '%$name%' OR desp LIKE '%$name%'");
echo "<ul>";
while($query3=mysql_fetch_array($query2))
{
?>

<li onclick='fill("<?php echo $query3['title']; ?>")'>

<?php echo "<a style='text-decoration:none' href='view_details.php?id=$query3[product_id]'>".$query3['title']."</a>"; ?></li>
<?php
}
}
?>