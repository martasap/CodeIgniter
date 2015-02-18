<?php

mysqli_connect("localhost", "root", "", "blog");
//mysql_select_db("test");

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$sql = "SELECT * FROM 'data' WHERE title LIKE '%$s%'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		//$url = $row['Searchlink'];
		$title = $row['title'];
		echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;' >" . $title . "</a>" . "</div>";
	}
	
}
else {
	echo "xdfcvghbjn";
}

?>