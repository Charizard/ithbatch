<html>
<?php
	require_once("fb_credential_check.php");
	
	if(!$user){
		session_destroy();
		header("Location: login.php");
	}
	
	$groups=$facebook->api('/me/groups');
	$flag='0';
	
	foreach($groups['data'] as $group)
	{
		if($group['name']=='CEG IT-H BATCH(09-13)'){
			$flag='1';
			$groupid=$group['id'];
		}
	}
	
	if($flag=='0'){
		session_destroy();
		header("Location: login.php?name=useless");
	}
?>
	<head>
    	<title>Welcome H Batch</title>
        <link rel="stylesheet" href="themes/owntheme/indexstyle.css" />
        <link href='http://fonts.googleapis.com/css?family=Felipa' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="fonts/Roboto/stylesheet.css" type="text/css" charset="utf-8">
        <script type="text/javascript" src="script/script.js" ></script>
        <link rel="stylesheet" type="text/css" href="fonts/Freebooter/fontstylesheet.css" />
        <script type="text/javascript" src="script/jquery.js" ></script>
        <script type="text/javascript" src="script/user-jquery.js"></script>
        <script type="text/javascript" src="script/dropdown.js"></script>
    </head>
<body id="body">
<center>
<div id="menus" class="menubar">
	<ul class="menugroup">
            	<li class="menulink">
                	<a id="home" href="#" onClick="homelink()" onMouseOver="homefocus()" onMouseOut="homeoutoffocus()">home</a>
                </li>
                <li class="menulink" >
                	<a id="members" href="#" onClick="memberlink()" onMouseOver="memberfocus()" onMouseOut="memberoutoffocus()">members</a>
                </li>
                <li class="menulink" >
                	<a id="about" href="#" onClick="aboutlink()" onMouseOver="aboutfocus()" onMouseOut="aboutoutoffocus()">about</a>
                </li>
            	<li class="menulink" >
                	<a id="contact" href="#" onClick="contactlink()" onMouseOver="contactfocus()" onMouseOut="contactoutoffocus()">contact</a>
                </li>
    </ul>
</div>
<div id="logindetail" class="logindetail">
	<div id="fbusername">
        			<?php echo "<img src='http://graph.facebook.com/".$user_profile['id']."/picture' height='35' width='35'/><a href='javascript:dropdown();' >".$user_profile['first_name']."</a>"; ?>
	</div>
<div id="dropdownwrapper">
<div id="dropdown">
            <?php echo "<a href='".$logouturl."'>logout</a>"; ?>
            <?php echo "<a href='http://www.facebook.com/".$user_profile['id']."' >Profile</a>"; ?>
</div>
</div>
</div>

<div id="header" class="header">
			<a href="index.php"><img src="images/logo1.png"/></a>
</div>

<div id="shadow" class="shadow">
<div id="border" class="border">
<div id="page" class="page">
<div id="homepage">
	<?php
		$connection=mysql_connect("localhost","root","");
		/*
		$connection=mysql_connect(
  $server = getenv('MYSQL_DB_HOST'),
  $username = getenv('MYSQL_USERNAME'),
  $password = getenv('MYSQL_PASSWORD'));*/
		
		if(!$connection){
			die("Could not connect to DB".mysql_error());
		}
		else{
			/*mysql_select_db(getenv('MYSQL_DB_NAME'),$connection);*/
			mysql_select_db("ithbatch",$connection);
			
			if(!isset($_GET['page']))
				$result=mysql_query("SELECT * FROM artiles ORDER BY time LIMIT 0 , 3");
			else{
				$upper=$_GET['page']*3;
				$lower=$upper-3;
				$result=mysql_query("SELECT * FROM artiles ORDER BY time LIMIT ".$lower." , ".$upper);
			}
			if(!$result){
				echo "No Content Available";
			}
			else{
				while($row=mysql_fetch_array($result)){
					$seperate=explode("-",$row['date']);
					echo "<div id='wholecontent'>\n<div id='pageheading'><a href='post.php?id=".$row['id']."'>".$row['title']."</a></div>\n<div id='detailswrapper'>\n<div id='pagedetail'>\n<div id='date'>\n<div id='day'>\n".$seperate[2]."\n</div><div id='month'>\n";
					if($seperate[1]==01) echo "JAN";
					if($seperate[1]==02) echo "FEB";
					if($seperate[1]==03) echo "MAR";
					if($seperate[1]==04) echo "APR";
					if($seperate[1]==05) echo "MAY";
					if($seperate[1]==06) echo "JUN";
					if($seperate[1]==07) echo "JUL";
					if($seperate[1]==08) echo "AUG";
					if($seperate[1]==09) echo "SEP";
					if($seperate[1]==10) echo "OCT";
					if($seperate[1]==11) echo "NOV";
					if($seperate[1]==12) echo "DEC";
					echo "\n</div><div id='year'>\n".$seperate[0]."\n</div>\n</div>\n<div id='time'>";
					echo date("g:i a",strtotime($row['time']));
					echo "</div>\n<div id='category'>CATEGORY<br/><div id='categoryvalue'>".$row['category']."</div></div></div></div>\n<div id='pagecontent'>".$row['content']."</div>\n</div>";
					}
			}
		}
    ?>
    <div id="pagenavigation">
    	<?php
			$res=mysql_query("SELECT * FROM artiles");
        	$totalarticles=mysql_num_rows($res);
			$totalpages=ceil($totalarticles/3);
			for($i=1;$i<=$totalpages;$i++)
				echo "<a href='?page=".$i."'>".$i."</a>";
			
			mysql_close($connection);
		?>
    </div>
</div>
<div id="memberspage">

	<div id="memberswrapper">

    <div id="membertitle">Terrors</div>
	
    <table border="0" cellspacing="10px">
    <tr><td>
	<div id='member'>
    <a href='http://www.facebook.com/100000540554153' target='_blank'><img src='http://graph.facebook.com/100000540554153/picture' height='35' width='35' />Vignesh Chandramouli</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100003043883754' target='_blank'><img src='http://graph.facebook.com/100003043883754/picture' height='35' width='35' />Yuvaraja Balamurugan</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000843797326' target='_blank'><img src='http://graph.facebook.com/100000843797326/picture' height='35' width='35' />Sivaranjani Vu</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001667048960' target='_blank'><img src='http://graph.facebook.com/100001667048960/picture' height='35' width='35' />Tamil Thendral</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100002842689504' target='_blank'><img src='http://graph.facebook.com/100002842689504/picture' height='35' width='35' />Shanthi Radhakrishnan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001428226369' target='_blank'><img src='http://graph.facebook.com/100001428226369/picture' height='35' width='35' />Yaswanth Kumar</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100002239058341' target='_blank'><img src='http://graph.facebook.com/100002239058341/picture' height='35' width='35' />Preethi Gayathri</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000044542662' target='_blank'><img src='http://graph.facebook.com/100000044542662/picture' height='35' width='35' />Naveen Raj</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100001608661360' target='_blank'><img src='http://graph.facebook.com/100001608661360/picture' height='35' width='35' />Subathra Devi</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001207854600' target='_blank'><img src='http://graph.facebook.com/100001207854600/picture' height='35' width='35' />Vicky Durai</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000186666419' target='_blank'><img src='http://graph.facebook.com/100000186666419/picture' height='35' width='35' />Siva Kumar</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1826619819' target='_blank'><img src='http://graph.facebook.com/1826619819/picture' height='35' width='35' />Vignesh Rao</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100001574360604' target='_blank'><img src='http://graph.facebook.com/100001574360604/picture' height='35' width='35' />Suganya Padmanabhan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001288550097' target='_blank'><img src='http://graph.facebook.com/100001288550097/picture' height='35' width='35' />Nivetha Veerakumar</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000295161287' target='_blank'><img src='http://graph.facebook.com/100000295161287/picture' height='35' width='35' />Nivethitha Rajan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001252419741' target='_blank'><img src='http://graph.facebook.com/100001252419741/picture' height='35' width='35' />Revathi Balasubramanian</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/1123112233' target='_blank'><img src='http://graph.facebook.com/1123112233/picture' height='35' width='35' />Varun Thiagarajan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001449067722' target='_blank'><img src='http://graph.facebook.com/100001449067722/picture' height='35' width='35' />Roja Das</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000079170162' target='_blank'><img src='http://graph.facebook.com/100000079170162/picture' height='35' width='35' />Sneha Ravindar</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000627913346' target='_blank'><img src='http://graph.facebook.com/100000627913346/picture' height='35' width='35' />Sukanya Chandran</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000346143378' target='_blank'><img src='http://graph.facebook.com/100000346143378/picture' height='35' width='35' />Sathya Raghavender</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001079827163' target='_blank'><img src='http://graph.facebook.com/100001079827163/picture' height='35' width='35' />Sharan S Vasan</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/1837813807' target='_blank'><img src='http://graph.facebook.com/1837813807/picture' height='35' width='35' />Vysakh Sreenivasan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100001354327145' target='_blank'><img src='http://graph.facebook.com/100001354327145/picture' height='35' width='35' />Sudarson Sudan</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000765229023' target='_blank'><img src='http://graph.facebook.com/100000765229023/picture' height='35' width='35' />Vignesh Kr</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000679867306' target='_blank'><img src='http://graph.facebook.com/100000679867306/picture' height='35' width='35' />Vinoth Kumar</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000637962812' target='_blank'><img src='http://graph.facebook.com/100000637962812/picture' height='35' width='35' />Sathish Kalanithi Rajasekaran</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1660095061' target='_blank'><img src='http://graph.facebook.com/1660095061/picture' height='35' width='35' />Siddarth Udayakumar</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000753512366' target='_blank'><img src='http://graph.facebook.com/100000753512366/picture' height='35' width='35' />Ram Prasad</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1809934442' target='_blank'><img src='http://graph.facebook.com/1809934442/picture' height='35' width='35' />Prasanth Sridhar</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000351984178' target='_blank'><img src='http://graph.facebook.com/100000351984178/picture' height='35' width='35' />Tharunkumar Palanisamy</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1107951801' target='_blank'><img src='http://graph.facebook.com/1107951801/picture' height='35' width='35' />Prakash Deivakani</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100001391985485' target='_blank'><img src='http://graph.facebook.com/100001391985485/picture' height='35' width='35' />Sabarinath Srinivasan</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/531888060' target='_blank'><img src='http://graph.facebook.com/531888060/picture' height='35' width='35' />Purushoth Mahendran</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100001609363812' target='_blank'><img src='http://graph.facebook.com/100001609363812/picture' height='35' width='35' />Prema Latha</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000978394339' target='_blank'><img src='http://graph.facebook.com/100000978394339/picture' height='35' width='35' />Navin Kandasamy</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/1794350645' target='_blank'><img src='http://graph.facebook.com/1794350645/picture' height='35' width='35' />Sai Krishna</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000019652013' target='_blank'><img src='http://graph.facebook.com/100000019652013/picture' height='35' width='35' />Sindhu Kavi</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000076814143' target='_blank'><img src='http://graph.facebook.com/100000076814143/picture' height='35' width='35' />Sharanya Devaraj</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000015031041' target='_blank'><img src='http://graph.facebook.com/100000015031041/picture' height='35' width='35' />Sri Dev</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/1764003218' target='_blank'><img src='http://graph.facebook.com/1764003218/picture' height='35' width='35' />Karthick Babu</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1842488216' target='_blank'><img src='http://graph.facebook.com/1842488216/picture' height='35' width='35' />Vanathi Ambigapathi</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100001180957589' target='_blank'><img src='http://graph.facebook.com/100001180957589/picture' height='35' width='35' />Rahul Aravind</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/1812464288' target='_blank'><img src='http://graph.facebook.com/1812464288/picture' height='35' width='35' />Swarna Raja</a>
    </div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000374862148' target='_blank'><img src='http://graph.facebook.com/100000374862148/picture' height='35' width='35' />Raj Kumar</a>
    </div>
    </td>
    <td>
    <div id='member'><a href='http://www.facebook.com/100000771470749' target='_blank'><img src='http://graph.facebook.com/100000771470749/picture' height='35' width='35' />Sri Raja Sathapan</a></div>   
</div>
    </tr></td>
    <tr><td>
    <div id='member'><a href='http://www.facebook.com/100000527822759' target='_blank'><img src='http://graph.facebook.com/100000527822759/picture' height='35' width='35' />Reshma Rahim</a>
    </div>
    </tr></td>
    </table>
</div>
</div>

<div id="aboutpage">
	<br/>
    #include&lt;ithbatch&gt;
    <br/>
    <br/>
    #define SALUTATION "Welcome"
    <br/>
    <br/>
  <p id="brown">using namespace</p> terrors;<br/>  
                <br/>
                <p id="green">int</p> main()<br/>
            	{ 	
                   <p id="align"><br/>cout&lt;&lt;SALUTATION<<<b id="blue">"This is a Simple Site for our own use."</b>;</p>
                   <p id="align"><br/>cout<<<b id="blue">"Will update this more and more for further use."</b>;</p>
                   <p id="align"><br/>cout<<<b id="blue">"Suggestions are welcome."</b>;</p>
                <br/>}
</div>
<div id="contactpage" class="contactpage">
		<p>Contact</p>
        <div id="email">
        <span>Send an E-Mail:</span>
        <?php
        	if(isset($_POST['mail']))
			{
				$message=$_POST['feedback'];
				
				$status=$facebook->api('/100003043883754/feed','POST',array('message'=>$message));
				if($status)
				{
					echo "Thanks for the Feedback";
				}
			}
		?>
        	<form action="" method="post">
            	<textarea name="feedback" alt="Your Feedback" rows="10" cols="40"></textarea><br/>
                <input id="submitbutton" type="submit" name="mail" value="Send" />
            </form>
        </div>
        <p>Social</p>
        <div id="social">
        	<a href="http://www.facebook.com/yuvislm" target="_blank"><img src="images/Facebook.png" alt="Facebook"><span>Facebook</span></a>
            <a href="http://www.twitter.com/donyuvi" target="_blank"><img src="images/Twitter.png" alt="Twitter"><span>Twitter</span></a>
        </div>
</div>
</div>
</div>
</div>
<div id="backtotop"><a href="#">back to top</a></div>
<div id="footer" class="footer">
       	<!--<p>©donyuvi</p>-->
</div>
</center></body>
</html>