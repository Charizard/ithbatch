<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<?php
		$connection=mysql_connect("localhost","root","");
		if(!$connection){
			die('Cound not Connect'.mysql_error());
		}
		else{
			mysql_select_db('ithbatch',$connection);
			if(mysql_query("INSERT INTO login (uname,pword,mailid) VALUES ('$_POST[uname]',password('$_POST[pword]'),'$_POST[mailid]')"))
			{
					header("Location: Sample.php");
			}
			mysql_close($connection);
		}
	?>
</body>
</html>