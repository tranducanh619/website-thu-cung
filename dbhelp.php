<?php
define('HOST', 'cwe1u6tjijexv3r6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('USERNAME', 'jj608qdjuiy6ku3k');
define('PASSWORD', 'uu04yqztydmu498a');
define('DATABASE', 'l9mxt2x7yzjbotk5');
// insert, update, delete,
function execute($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE, 3306) or die("connect fail");
	mysqli_query($conn, $sql);
}
function executeresult($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE, 3306) or die("connect fail");
	$resultset = mysqli_query($conn, $sql);
	$List = [];
	while ($row = mysqli_fetch_array($resultset,1)) {
		$List[] = $row;
	}return $List;
}
?>