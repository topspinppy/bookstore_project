<?php
require_once 'config.php';
$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
function dbQuery($sql)
{
  return mysqli_query($sql) or die ('Query failed. ' . mysqli_error() );
}
function dbAffectedRows()
{
  global $dbConn;
  return mysql_affected_rows($dbConn);
}
function dbFetchArray($result, $resultType = MYSQL_NUM)
{
  return mysqli_fetch_array($result, $resultType);
}
function dbFetchRow($result)
{
  return mysqli_fetch_row($result);
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
function dbSetutf($dbConn,$lang)
{
  return mysqli_set_charset($dbConn,$lang);
}
?>
