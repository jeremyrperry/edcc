// JavaScript Document

var selectedMenuItem = 0;

function menuOpen(id)
{
	if(selectedMenuItem)
	selectedMenuItem.style.visibility = 'hidden';
	selectedMenuItem = document.getElementById(id);
	selectedMenuItem.style.visibility = 'visible';
}
	
function menuClose()
{
	if(selectedMenuItem)
	selectedMenuItem.style.visibility = 'hidden';
}

function validPhoneNumber1(txt)
{
	var phoneExp1 = /\d{3}$/;
	return (phoneExp1.test(txt));
}
function validPhoneNumber2(txt)
{
	var phoneExp2 = /\d{4}$/;
	return (phoneExp2.test(txt));
}

function chkForm()
{
	if (document.forms[0].txtFName.value == "")
	{
		alert("Please enter your first name");
		document.forms[0].txtFName.focus();
		return false;
	}
	if (document.forms[0].txtLName.value == "")
	{
		alert("Please enter your last name");
		document.forms[0].txtLName.focus();
		return false;
	}
	var emailExp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	if (!emailExp.test(document.forms[0].txtEmail.value))
	{
		alert("Please enter a valid e mail address.");
		document.forms[0].txtEmail.focus();
		return false;
	}
	if (document.forms[0].txtMessage.value == "")
		{
		alert ("Please enter a message in the message field");
		document.forms[0].txtMessage.focus();
		return false;
		}
	if (document.forms[0].chkSendCopy.checked == true)
	{
		document.forms[0].chkSendCopy.value = "true";
	}
	return true;
	
}

function loadDoc()
{
	var newDoc = document.forms[0].selectFile.value;
	var iFrame = '<a href="documents/' + newDoc + '">Click here</a> to view or download the displayed assignment directly<br />';
	iFrame += '<iframe src="http://docs.google.com/gview?url=http://www.jeremyrperry.com/edcc/documents/' + newDoc + '&embedded=true" style="width:600px; height:700px;" frameborder="0"></iframe>'
	$('#gDoc').empty();
	$('#gDoc').append(iFrame);
}
