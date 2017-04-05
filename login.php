<?php require_once('Connections/webfarmpic.php'); ?>
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

mysql_select_db($database_webfarmpic, $webfarmpic);
$query_Recordset1 = "SELECT * FROM std";
$Recordset1 = mysql_query($query_Recordset1, $webfarmpic) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "loginsuccess.php";
  $MM_redirectLoginFailed = "loginfail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_webfarmpic, $webfarmpic);
  
  $LoginRS__query=sprintf("SELECT username, password FROM std WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $webfarmpic) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tubtim Farm</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/Users/JameBall/Desktop/daily_ui_day1_sign_in/daily_ui_day1_sign_in/css/style.css" rel="stylesheet" type="text/css" />

<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

<link rel="stylesheet" href="css/style2.css">

</head>
<body>
<div class="wrapper">
  <div class="logo-menu-container">
    <div class="logo">ทับทิมสุกรฟาร์ม</div>
    <div class="menu">
      <ul>
        <li><a href="index.php">หน้าแรก</a></li>
        <li>เมนูหลัก</li>
        <li><a href="insert.php">สมัครสมาชิก</a></li>
        <li>เกี่ยวกับ</li>
        <li class="nobg"><a href="login.php">เข้าสู่ระบบ</a></li>
      </ul>
    </div>
  </div>
  <div class="searchform-container">
    <div class="searchform-content">ฟาร์มสุกร พ่อพันธุ์ แม่พันธุ์ ลูกสุกรขุน</div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div>
    <div class="left-column">
      <div class="dark-panel">
        <div class="dark-panel-top"></div>
        <div class="dark-panel-center">
          <ul>
            <ul>
              <p>&nbsp;</p>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li>
                  <h1> เข้าสู่ระบบ</h1>
                </li>
              </ul>
            </ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </div>
        <div class="dark-panel-bottom"></div>
      </div>
      <div class="light-panel">
        <div class="light-panel-top"></div>
        <div class="light-panel-center">
          <h1>เมนูหลัก</h1>
          <ul>
            <li>+ ข่าวสาร</li>
            <li>+ ข้อมูลในฟาร์ม</li>
            <li>+ แนะนำการเลี้ยงสุกรเบื้องต้น</li>
            <li>+ ราคาสุกร ราคาวัตถุดิบ</li>
          </ul>
        </div>
        <div class="light-panel-bottom"></div>
      </div>
      <div class="dark-panel">
        <div class="dark-panel-top"></div>
        <div class="dark-panel-center">
          <ul>
            <li></li>
            <li class="date"> เจ้าของฟาร์ม</li>
            <li class="news"></li>
            <li class="news">นาย อติชาต มีภูมิ </li>
            <li class="news">โทรศัพท์ 088-783-0530</li>
          </ul>
        </div>
        <div class="dark-panel-bottom"></div>
      </div>
    </div>
    <div class="right-column">
      <div class="right-column-content">
      <div class="login-card">
    <h1>เข้าสู่ระบบ</h1><br>
  <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST"  name="form1">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
    
  <div class="login-help">
    <p><a href="insert.php">สมัครสมาชิก</a></p>
    <p>   <a href="login2.php">Admin</a></p>
  </div>
</div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>***หากมีปัญหาการใช้งาน กรุณาติดต่อ Admin Tel: 086-287-8476  Email: admin@gmail.com***</p>
      </div>
      
    </div>
  </div>
</div>
<div class="footer-wrapper">
  <div class="footer-top"></div>
  <div class="footer-center">
    <div class="footer-content-left">
      <h1>ทับทิมสุกรฟาร์ม</h1>
      <h2>ฟาร์มสุกร พ่อพันธุ์ แม่พันธุ์ ลูกสุกร สุกรขุน</h2>
      <p>มาตรฐานฟาร์มเลี้ยงสุกรนี้ กำหนดขึ้นเป็นมาตรฐานเพื่อให้ฟาร์มที่ต้องการขึ้นทะเบียนเป็นฟาร์มที่ได้มาตรฐานเป็นที่ยอมรับ ได้ ยึดถือปฏิบัติ เพื่อให้ได้การรับรองจากกรมปศุสัตว์ ซึ่งมาตรฐานนี้เป็นเกณฑ์มาตรฐานขั้นพื้นฐานสำหรับฟาร์มที่จะได้การรับรอง</p>
      <p>มาตรฐานฟาร์มเลี้ยงสุกรนี้กำหนดวิธีปฏิบัติด้านการจัดการฟาร์ม การจัดการด้านสุขภาพสัตว์ และการจัดการด้านสิ่งแวดล้อม เพื่อให้ได้สุกรที่ถูกสุขลักษณะ และเหมาะสมต่อผู้บริโภค</p>
    </div>
    <div class="footer-content-right">
      <h1>&nbsp;</h1>
      <h1>ที่อยู่ฟาร์ม </h1>
      <p>&nbsp;</p>
      <p>ตั้งอยู่ ตำบล นาขยาด อำเภอ ควนขนุน จังหวัด พัทุลง 93110 </p>
      <p>อีเมลล์: tumtim_farm@gmail.com</p>
      <p>โทรศัพท์: 074-631-349</p>
    </div>
  </div>
  <div class="footer-bottom"></div>
</div>
<div class="clear"></div>
<div class="copyrights">Copyright (c) Web Programming. Design by Pitpipat Ramthong. Photos by JameBall
  <div class="copyrights-bottom"></div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
