// JavaScript Document
function homelink()
{
	document.getElementById('homepage').style.visibility='visible';
	document.getElementById('memberspage').style.visibility='hidden';
	document.getElementById('aboutpage').style.visibility='hidden';
	document.getElementById('contactpage').style.visibility='hidden';
}
function contactlink()
{
	document.getElementById('homepage').style.visibility='hidden';
	document.getElementById('memberspage').style.visibility='hidden';
	document.getElementById('aboutpage').style.visibility='hidden';
	document.getElementById('contactpage').style.visibility='visible';
}
function aboutlink()
{
	document.getElementById('homepage').style.visibility='hidden';
	document.getElementById('memberspage').style.visibility='hidden';
	document.getElementById('aboutpage').style.visibility='visible';
	document.getElementById('contactpage').style.visibility='hidden';
}
function memberlink()
{
	document.getElementById('homepage').style.visibility='hidden';
	document.getElementById('memberspage').style.visibility='visible';
	document.getElementById('aboutpage').style.visibility='hidden';
	document.getElementById('contactpage').style.visibility='hidden';
}
function checkfields()
{				
				var name=document.getElementById('name').value;
				var mail=document.getElementById('mailid').value;
				var comment=document.getElementById('comment').value;
				if(name=="" || mail=="" || comment==""){
					alert("Fill in all details");
					return false;
				}
				else
					return true;
}