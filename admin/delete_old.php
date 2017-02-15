<?php require ('../scripts/Connection/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if ((isset($_GET['u'])) && ($_GET['u'] != "")) {
  $deleteSQL = sprintf("DELETE FROM user WHERE username=%s",
                       GetSQLValueString($_GET['u'], "text"));

  //mysql_select_db($database_conn, $conn);
  $Result1 = $conn->query($deleteSQL) or die(mysql_error());



  $deleteGoTo = "user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['u'])) && ($_GET['u'] != "")) {
  $deleteSQL = sprintf("DELETE FROM g_201 WHERE username=%s",
                       GetSQLValueString($_GET['u'], "text"));


  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($deleteSQL) or die(mysql_error());


  $deleteGoTo = "user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['u'])) && ($_GET['u'] != "")) {
  $deleteSQL = sprintf("DELETE FROM g_202 WHERE username=%s",
                       GetSQLValueString($_GET['u'], "text"));



  //mysql_select_db($database_conn, $conn);
  $Result1 = $conn->query($deleteSQL) or die(mysql_error());



  $deleteGoTo = "user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['u'])) && ($_GET['u'] != "")) {
  $deleteSQL = sprintf("DELETE FROM g_203 WHERE username=%s",
                       GetSQLValueString($_GET['u'], "text"));



  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($deleteSQL) or die(mysql_error());



  $deleteGoTo = "user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['u'])) && ($_GET['u'] != "")) {
  $deleteSQL = sprintf("DELETE FROM g_204 WHERE username=%s",
                       GetSQLValueString($_GET['u'], "text"));



  //mysql_select_db($database_conn, $conn);
  $Result1 =  $conn->query($deleteSQL) or die(mysql_error());



  $deleteGoTo = "user.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
