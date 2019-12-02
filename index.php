<?php
require_once 'config.php';
date_default_timezone_set('Asia/Kolkata');
$pc_name= getenv("username");
$user_sys= get_current_user();
$sys_info = base64_encode(hexdec($pc_name.'|'.$user_sys));
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$date_time=date('Y-m-d h:i:s');
$userID=hexdec($pc_name.'|'.$user_sys);
$ip_host=get_client_ip();

$curDate=date('Y-m-d');
$qur="SELECT * FROM user_time WHERE logged_time LIKE '%$curDate%' AND user_id='".$userID."' ";
$res=mysqli_query($conn, $qur);
if($res->num_rows > 0){
  //Update Details 
  $query="UPDATE user_time SET logged_out = '".$date_time."' WHERE user_id= '".$userID."' AND logged_time LIKE '%$curDate%'";
  $result=mysqli_query($conn, $query);
  if(mysqli_affected_rows($conn)){
      echo '<script language="javascript">';
      echo 'alert("Updated successfully sent")';
      echo '</script>';
  }
}else{
  //Insert New dated Data
  $query ="INSERT INTO user_time (user_id, logged_time, ip_add) VALUES ( '". $userID."','".$date_time."','".$ip_host."' )";
  $result=mysqli_query($conn, $query);
  if(mysqli_affected_rows($conn)){
          echo '<script language="javascript">';
          echo 'alert("New Day Welomes You.!! Greetings.!")';
          echo '</script>'; 
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Stop Timer</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>

<div class="table">
	<input type="hidden" id="user_ip_add" name="user_ip_add" value="<?= get_client_ip(); ?>" style="display: none;">
  <input type="hidden" id="sys_info" name="sys_info" value="<?= $sys_info; ?>" style="display: none;">
  <div class="cell">
    <h1>
      <span id="hour"></span>
      :
      <span id="minute"></span>
      :
      <span id="second"></span>
    </h1>
  </div>
</div>
</body>
</html>





