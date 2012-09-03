<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="themes/owntheme/loginstyle.css" />
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#loginbutton a").mousedown(function(){
				$(this).css({
					'-moz-box-shadow':    '0px 0px 0px 0px #FFF',
  					'-webkit-box-shadow': '0px 0px 0px 0px #FFF',
  					'box-shadow':         '0px 0px 0px 0px #FFF'
				});
		});
		$("#loginbutton a").mouseup(function(){
				$(this).css({
					'-moz-box-shadow':    '0px 0px 10px 1px #999',
  					'-webkit-box-shadow': '0px 0px 10px 1px #999',
  					'box-shadow':         '0px 0px 10px 1px #999'
				});
		});
	});
</script>
<title>Welcome H Batch | Login with Facebook</title>
</head>
<?php
	require_once("fb_credential_check.php");
?>
<body>
<center>
	<div id="loginwrapper">
    	<div id="facebooklogin">
        	<div id="loginbutton">
            <?php 
				if(!isset($_GET['name'])){
			?>
				<a href='<?php if($user){ header("Location: index.php"); }else{echo $loginurl; }?>'><img src="images/loginfb1.png"/>Login with Facebook</a>
             <?php
				}
             	else
				{
			?>
             	U are not a terror.LOL...!!!
            <?php
				}
			?>
          	</div>
        </div>
    </div>
</center>
</body>
</html>