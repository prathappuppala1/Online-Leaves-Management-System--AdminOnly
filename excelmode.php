<?php
session_start();
error_reporting(0);
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS","prathap@pass");
define ("DB_NAME","leave_data");

$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

$setCounter = 0;
$date=date("d-m-Y");
$setExcelName = $date;

$setSql = "SELECT * FROM mainoutings WHERE date='".mysql_real_escape_string($date)."'";


$setRec = mysql_query($setSql);

$setCounter = mysql_num_fields($setRec);
$setMainHeader.="\t$date Outing Report\t\t\t\t\t\t\t$date Leave Report\n\n";
for ($i = 0; $i < $setCounter; $i++) {
    $setMainHeader .= mysql_field_name($setRec, $i)."\t";
}
$setMainHeader .="\t\t\t";
while($rec = mysql_fetch_row($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  $setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}




$setCounter = mysql_num_fields($setRec);


$setSql = "SELECT * FROM mainleaves WHERE date='".mysql_real_escape_string($date)."'";


$setRec = mysql_query($setSql);

$setCounter = mysql_num_fields($setRec);

for ($i = 0; $i < $setCounter; $i++) {
    $setMainHeader .= mysql_field_name($setRec, $i)."\t";
}

while($rec = mysql_fetch_row($setRec))  {
  $rowLine = '';
  foreach($rec as $value)       {
    if(!isset($value) || $value == "")  {
      $value = "\t";
    }   else  {
//It escape all the special charactor, quotes from the data.
      $value = strip_tags(str_replace('"', '""', $value));
      $value = '"' . $value . '"' . "\t";
    }
    $rowLine .= $value;
  }
  $setData .= trim($rowLine)."\n";
}
  $setData = str_replace("\r", "", $setData);

if ($setData == "") {
  $setData = "\nno matching records found\n";
}




$setCounter = mysql_num_fields($setRec);


//This Header is used to make data download instead of display the data
 header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=".$setExcelName."_Report.xls");

header("Pragma: no-cache");
header("Expires: 0");

//It will print all the Table row as Excel file row with selected column name as header.
echo ucwords($setMainHeader)."\n".$setData."\n";

?>
