<?php
$mydb = mysql_connect("sql.mit.edu", "alanma", "daBrav3s") or die(mysql_error());
mysql_select_db("alanma+C") or die(mysql_error());

$mode = $_GET["mode"];
if ($mode=="start"){
	$sql="INSERT INTO c (END) VALUES (0)";
	$result = mysql_query($sql);
	header("Location: http://alanma.scripts.mit.edu/C/index.php?mode=stop");
} elseif ($mode=="stop"){
	$sql="SELECT LAST_INSERT_ID() AS A FROM c";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$id = $row['A'];
	
	echo $id;
	
	$sql="UPDATE c SET End='".time()."' WHERE ID=$id";
	echo $sql;
	$result = mysql_query($sql);
	#header("Location: http://alanma.scripts.mit.edu/C/index.php?mode=start");
}

?>