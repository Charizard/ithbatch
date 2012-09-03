<html>
	<head>
    	<link rel="stylesheet" href="themes/owntheme/style.css"/>
        <script type="text/javascript">
		<!-- Check the password match -->
		function check()
		{
			var cpword=document.getElementById('cpword').value;
			var pword=document.getElementById('pword').value;
			if(pword!=cpword)
				alert("Password don't match");
		}
        </script>
        <title>Login</title>
    </head>
    <body>
        <div id="page">
        	<form id="login" name="login" method="post" action="user_details_enter.php">
            	User Name:<br /><input type="text" name="uname" value="" border="10"/><br />
                Password:<br /><input id="pword" type="password" name="pword" value=""/><br />
                Confirm Password:<br /><input id="cpword" type="password" name="cpword" value="" onBlur="check();" /><br />
                Mail ID:<br /><input type="text" name="mailid" value=""/><br />
                <input type="submit" name="submit" value="Submit"/>
                <input type="button" name="clear" value="Clear"/>
            </form>
        </div>
    <body>
</html>