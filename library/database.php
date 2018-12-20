<?php
require_once 'config.php';

$dbConn = new mysqli ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' . mysql_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = mysqli_select_db($dbConn, $dbName) or die(mysqli_error($con));
/* change character set to utf8 */
if (!$dbConn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
}
mysqli_query($dbConn, $sql);

function dbQuery($sql)
{
	// database connection config
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'itbookonline';
	$dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die ('MySQL connect failed. ' . mysql_error());
	if (!$dbConn->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $mysqli->error);
		exit();
	}
	if (!$dbConn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	// echo "Host information: " . mysqli_get_host_info($dbConn) . PHP_EOL;
	$result = mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));
	
	return $result;
}

function dbAffectedRows()
{
	global $dbConn;
	
	return mysqli_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQL_NUM) {
	return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       return $row; 
	}
	
}

function dbFetchRow($result) 
{
	/* fetch associative array */
    while ($row = $result->fetch_row()) {
		return $row; 
	 }
	
}

function dbFreeResult($result)
{
	return mysqli_free_result($result);
}

function dbNumRows($result)
{
	return mysqli_num_rows($result);

}

function dbSelect($dbName)
{
	return mysqli_select_db($dbName);
}

function dbInsertId()
{
	return mysqli_insert_id();
}
?>