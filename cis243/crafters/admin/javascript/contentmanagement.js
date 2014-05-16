/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the main page*/
function showModifyMain()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectMain.php');
}

/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the member benefits page*/
function showModifyMemberBenefits()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectMemberBenefits.php');
}

/*In the selectMemberBenefits.php script, the user has the option of going to the testimonials page to input a new testimonial.  
This function stops the form submission from happening and loads the selectTestimonial.php script if that is the case.*/
function checkForTestimonials()
{
	if  (document.forms[1].rdoLatest.checked == true)
	{
		$('#contentSection').load('scriptFiles/selectTestimonial.php');
		return false;
	}
}

/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the partner vendors page*/
function showModifyPartnerVendors()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectPartnerVendors.php');
}

/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the testimonials page*/
function showModifyTestimonials()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectTestimonial.php');
}

/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the about page*/
function showModifyAbout()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectAbout.php');
}

/*This function appends the contentSection div with the PHP script for selecting the section to edit on
the about page*/
function showModifyUsers()
{
	$('#statusMsg').append("");
	$('#contentSection').load('scriptFiles/selectModifyUsers.php');
}

/*This fuction calls up a PHP script in the testSelection div to select a sepcific testimonial for editing
or deleting*/
function createTestSelection()
{
	if (document.forms[1].rdoNew.checked == true)
	{
		$('#testSelection').empty();
	}
	else
	{
		$('#testSelection').load('scriptFiles/selectTestSection.php');
	}
}

/*This fuction calls up a PHP script in the vendorSelection div to select a sepcific vendor for editing
or deleting*/
function openVendorSelection()
{
	if (document.forms[1].rdoNew.checked == true)
	{
		$('#vendorSelection').empty();
	}
	else
	{
		$('#vendorSelection').load('scriptFiles/selectVendorNames.php');
	}
}

/*This fuction calls up a PHP script in the vendorSelection div to select a sepcific vendor for editing
or deleting*/
function openUserSelection()
{
	if (document.forms[1].rdoNew.checked == true)
	{
		$('#userSelection').empty();
	}
	else
	{
		$('#userSelection').load('scriptFiles/selectUsers.php');
	}
}

/*This function asks the user to confirm or cancel the deleting of a testimonial*/
function confirmDelete()
{
	if (document.forms[0].txtPageSection.value == 3)
	{
		var answer = confirm("Do you really want to delete this testiminial?");
		if (answer)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

/*This function asks the user to confirm or cancel the deleting of a picture on the main page*/
function deletePicture()
{
	if (document.forms[1].deletePics.value == "")
	{
		alert("You must select a picture to delete.");
		return false;
	}
	else
	{
		var answer = confirm("Do you really want to delete this picture?");
		if (answer)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

/*This function shows the specific picture from the main page that the user wants to delete in a div element, or hides the div element 
if needed*/
function showPictureToDelete()
{
	if (document.forms[1].deletePics.value == "")
	{
		$('#showPicture').empty();
	}
	else
	{
		$('#showPicture').empty();
		var picture = document.forms[1].deletePics.value;
		var pictureScript = '<p><img src="../mainPictures/' + picture + '"width="50" height="76" />';
		$('#showPicture').append(pictureScript);
	}
}

//This fuction ensures that vendor values cannot be left blank when the user wishes to enter a new vendor
function checkVendorValues()
{
	if (document.forms[0].txtVendorName.value == "")
	{
		alert("Please enter a value for the vendor name");
		document.forms[0].txtVendorName.focus();
		return false;
	}
	else if (document.forms[0].txtVendorWebsite.value == "")
	{
		alert("Please enter a value for the vendor website");
		document.forms[0].txtVendorWebsite.focus();
		return false;
	}
	else if (document.forms[0].uploadVendorPic.value == "")
	{
		alert("Please select a vendor logo to upload");
		document.forms[0].uploadVendorPic.focus();
		return false;
	}
	else
	{
		return true;
	}
}

/*This function shows and hides a div element that can load a PHP script to allow the user to relpace 
the current vendor logo for a new one if they so desire*/
function openLogoUploader()
{
	if (document.forms[0].rdoKeep.checked == true)
	{
		$('#pictureSelector').empty();
	}
	else
	{
		$('#pictureSelector').load('scriptFiles/includeLogoUploader.php');
	}
}

/*This function calls up the logout script to log the user out of the system*/
function logout()
{
	var answer = confirm("Are you sure you want to logout of the system?");
		if (answer)
		{
			return true;
		}
		else
		{
			return false;
		}
}

/*This function ensures that the values for adding a new user are filled out.  It will also ask the user 
to confirm the delete*/
function checkForUserValues()
{
	if (document.forms[0].txtPageSection == 3)
	{
		var answer = confirm("Are you sure you want to logout of the system?");
		if (answer)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	if (document.forms[0].txtUsername.value == "")
	{
		alert("Please enter a value for the username");
		document.forms[0].txtUsername.focus();
		return false;
	}
	if (document.forms[0].txtUserPassword.value == "")
	{
		alert("Please enter a value for the user password");
		document.forms[0].txtUserPassword.focus();
		return false;
	}
	if (document.forms[0].txtUserFirstName.value == "")
	{
		alert("Please enter a value for the user first name");
		document.forms[0].txtUserFirstName.focus();
		return false;
	}
	if (document.forms[0].txtUserLastName.value == "")
	{
		alert("Please enter a value for the user last name");
		document.forms[0].txtUserLastName.focus();
		return false;
	}
	if (document.forms[0].txtUserEmail.value == "")
	{
		alert("Please enter a value for the user email");
		document.forms[0].txtUserEmail.focus();
		return false;
	}
	if (document.forms[0].txtUserQuestion.value == "")
	{
		alert("Please enter a value for the user question");
		document.forms[0].txtUserQuestion.focus();
		return false;
	}
	if (document.forms[0].txtUserAnswer.value == "")
	{
		alert("Please enter a value for the user answer");
		document.forms[0].txtUserAnswer.focus();
		return false;
	}
}