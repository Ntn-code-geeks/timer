<?php
require_once 'config.php';
date_default_timezone_set('Asia/Kolkata');
$get_data=base64_decode((base64_decode($_GET['id'])));
$data=explode('_',$get_data);
$ip_add=$data[1];
$user_id=base64_decode($data[2]);
$curDate=date('Y-m-d');

$qur="SELECT * FROM user_time WHERE logged_time LIKE '%$curDate%' AND user_id='".$user_id."' ";
$res=mysqli_query($conn, $qur);
$row = $res->fetch_assoc();

/*Exact DateTime Difference*/
$dteStart = new DateTime($row['logged_time']);
$dteEnd   = new DateTime($row['logged_out']);
$dteDiff  = $dteStart->diff($dteEnd);

 	// $exct=  strtotime($row['logged_time']) - strtotime($row['logged_out']);
	// $date_exact=date('Y-m-d H:i:s',$exct);
	// $time=explode(':',$date_exact);
	// $time_string= $time[0]." Hours ".$time[1]." Minutes ".$time[2]." Seconds";
	$time_string= $dteDiff->format("%H"." Hours "."%I"." Minutes "."%S"." Seconds");


?>
<head>
	<style type="text/css">

		body{
	width:100%;
	height:100%;
	margin: 0; height: 100%; overflow: hidden;
}
.contain{
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	background: linear-gradient(90deg,#189086,#2f8198);
background-image: linear-gradient(to bottom right,#02b3e4,#02ccba);	
}

.done{
	width:100px;
	height:100px;
	position:relative;
	left: 0;
	right: 0;
	top:-20px;
	margin:auto;
}
.contain h1{
	font-family: 'Julius Sans One', sans-serif;
	font-size:1.4em;
	color: #02b3e4;
}

.congrats{
	position:relative;
	left:50%;
	top:50%;
	max-width:800px;	transform:translate(-50%,-50%);
	width:80%;
	min-height:300px;
	max-height:900px;
	border:2px solid white;
	border-radius:5px;
	    box-shadow: 12px 15px 20px 0 rgba(46,61,73,.3);
    background-image: linear-gradient(to bottom right,#02b3e4,#02ccba);
	background:#fff;
	text-align:center;
	font-size:2em;
	color: #189086;
}

.text{
	position:relative;
	font-weight:normal;
	left:0;
	right:0;
	margin:auto;
	width:80%;
	max-width:800px;

	font-family: 'Lato', sans-serif;
	font-size:0.6em;

}


.circ{
    opacity: 0;
    stroke-dasharray: 130;
    stroke-dashoffset: 130;
    -webkit-transition: all 1s;
    -moz-transition: all 1s;
    -ms-transition: all 1s;
    -o-transition: all 1s;
    transition: all 1s;
}
.tick{
    stroke-dasharray: 50;
    stroke-dashoffset: 50;
    -webkit-transition: stroke-dashoffset 1s 0.5s ease-out;
    -moz-transition: stroke-dashoffset 1s 0.5s ease-out;
    -ms-transition: stroke-dashoffset 1s 0.5s ease-out;
    -o-transition: stroke-dashoffset 1s 0.5s ease-out;
    transition: stroke-dashoffset 1s 0.5s ease-out;
}
.drawn svg .path{
    opacity: 1;
    stroke-dashoffset: 0;
}

.regards{
	font-size:.7em;
}


@media (max-width:600px){
	.congrats h1{
		font-size:1.2em;
	}
	
	.done{
		top:-10px;
		width:80px;
		height:80px;
	}
	.text{
		font-size:0.5em;
	}
	.regards{
		font-size:0.6em;
	}
}

@media (max-width:500px){
	.congrats h1{
		font-size:1em;
	}
	
	.done{
		top:-10px;
		width:70px;
		height:70px;
	}
	
}

@media (max-width:410px){
	.congrats h1{
		font-size:1em;
	}
	
	.congrats .hide{
		display:none;
	}
	
	.congrats{
		width:100%;
	}
	
	.done{
		top:-10px;
		width:50px;
		height:50px;
	}
	.regards{
		font-size:0.55em;
	}
	
}
	</style>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<div class="contain">
	<div class="congrats">
		<h1>Good<span class="hide"> Bye</span> !</h1>
		<div class="done">
			<svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
<path class="circ path" style="fill:#0cdcc7;stroke:#07a796;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" d="
	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z"
	/>
<polyline class="tick path" style="fill:none;stroke:#fff;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
	11.6,20 15.9,24.2 26.4,13.8 "/>
</svg>
			</div>
		<div class="text">
		<p>You have successfully logged out from B-Prompt session. <br>
			Here are your details<br>
			Date: <span style="font-weight: 700;"><?=date('d F, Y (l)'); ?></span><br>
			Total Working Hours: <span style="font-weight: 700;"><?=$time_string ?></span> <br>
			Last Working Hours: <span style="font-weight: 700;"><?=$data[0]; ?> </span><br>
			<span style="font-weight: 700;">Emp ID: <?=$user_id; ?></span>
		</p>
			<p>See you soon.!</p>
			</div>
		<p class="regards">Regards, NITIN KUMAR	</p>
	</div>
</div>

<script type="text/javascript">
	$(window).on("load",function(){
	setTimeout(function(){$('.done').addClass("drawn");},500)
});
</script>