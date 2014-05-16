//These functions are used to eventually collect the data from the order page and pass them into cookies.
var summaryName = "";
var summaryAddress = "";
var summaryAddress2 = "N/A";
var summaryCityStateZip = "";
var summaryDeliveryAddress = "N/A";
var summaryDeliveryAddress2 = "N/A";
var summaryDeliveryCityState = "N/A"
var summaryDeliveryZip = "N/A"
var summaryEmail = "";
var summaryPhone = "";
var summaryPaymentMethod = "";
var summaryCardNumber = "";
var summaryCardExpire = "";
var summaryOrderType = "";
var summaryPizzaSize = "";
var summaryPizzaCrust = "";
var summaryGlutenFree = "No";
var summaryPizzaStyle = "Custom";
var summaryVeganCheese = "No";
var summaryComments = "";
var summaryToppings = "";
var summarySubtotal = "";
var summarySalesTax = "";
var summaryTotal = "";

//This function is the onload for the menu and the welcome page.
function checkCookie()
{
	var retCustomer = GetCookie("agreeCookie");
	var retCustomerYes = '<a href="order.html"><img src="pictures/placeorder.jpg" alt="Place Order" title="Place your order" border="0" height="100" width="100"></a>';
	var retCustomerNo = '<a href="disclosure.html"><img src="pictures/placeorder.jpg" alt="Place Order" title="Place your order" border="0" height="100" width="100"></a>';
	if (retCustomer == "yes")
	{
		$('div.retCustomer').append(retCustomerYes);
	}
	if (retCustomer != "yes")
	{
		$('div.retCustomer').append(retCustomerNo);
	}
}

//This function is the onload for the disclosure page
function detectCookies()
{
	if(!navigator.cookieEnabled)
    {
    	alert("You will need to enable cookies for this site to work.");
    }
    checkCookie();
}

//This function is the onload for the order page.  If the agreement cookie is not set, the user will be 
//automatically redirected to the disclosure page
function initializePage()
{
	var retCustomer = GetCookie("agreeCookie");
	if (retCustomer != "yes")
	{
		alert("You have not yet agreed to our disclosure page and are being redirected there.");
		window.location = 'disclosure.html';
 	}
}

//This sets up the array for tracking all the costs for the customer's pizza
var pizzaTotalTracker = new Array(28);
for (var i = 0; i < pizzaTotalTracker.length; i++)
{
	pizzaTotalTracker[i] = 0;
}

//These booleans help keep track of certain events in the order page
var blnHideVeganCheese = false;
var blnCompTopping = true;
var blnDiffAddress = false;

//This array keeps track of the pizza crust style the customer orders (except for choosing gluten free)
var pizzaCrust = new Array;
pizzaCrust[0] = "";

//This function collects the kind of pizza crust the customer wants
function detPizzaCrust(txt)
{
	pizzaCrust[0] = txt;
}

//This function sets the base price for the pizza's size, and calls on the calculateTotal function to 
//automatically compute the cost.
function pizzaSize(txt)
{
	pizzaTotalTracker[0] = txt;
	calculateTotal();
}

//This function adjusts the price if the customer chooses a house specialty, and calls on the calculateTotal function to 
//automatically compute the cost.
function pizzaStyle(txt)
{
	pizzaTotalTracker[2] = txt;
	//This if statement makes the vegan cheese option become visible if the customer previously choose the vegan specialty
	if (blnHideVeganCheese)
	{
		document.getElementById("vegan").style.visibility = "visible";
		blnHideVeganCheese = false;
	}
	calculateTotal();
}

//This function adjusts the price if the customer chooses the vegan specialty, and calls on the calculateTotal function to 
//automatically compute the cost.
function veganDelight()
{
	pizzaTotalTracker[2] = 4;
	pizzaTotalTracker[26] = 0;
	//The below if statement ensures that if the customer chooses the Vegan specailty and previously
	//choose vegan cheese, the vegan cheese topping cost will be taken off and the vegan cheese option is hidden
	if (document.forms[0].chkVegan.checked == true)
	{
		document.forms[0].chkVegan.checked = false;
	}
	document.getElementById("vegan").style.visibility = "hidden";
	blnHideVeganCheese = true;
	calculateTotal();
}

//This function adjusts the price for any $1 topping chosen, and calls on the calculateTotal function to 
//automatically compute the cost.
function changeValue1(txt)
{
	 if (pizzaTotalTracker[txt] == "0")
	 {
	 	pizzaTotalTracker[txt] = 1;
	 }
	 else
	 {
	 	pizzaTotalTracker[txt] = 0;
	 }
	 calculateTotal();
	 
}

//This function adjusts the price if the customer chooses vegan cheese or gluten free crust, and calls on the calculateTotal function to 
//automatically compute the cost.
function changeValue2(txt)
{
	 if (pizzaTotalTracker[txt] == "0")
	 {
	 	pizzaTotalTracker[txt] = 2;
	 }
	 else
	 {
	 	pizzaTotalTracker[txt] = 0;
	 }
	 calculateTotal();
}

//The house specialties are hidden by default.  This function makes them visible if the customer wishes to order one.
function makeSpecialityVis()
{
	document.getElementById("specialties").style.visibility = "visible";
	blnCompTopping = false;
	calculateTotal();
}

//If the customer decides not to order a house specialty,  this function makes them invisible
//and ensures the applicable radio button is deselected as well as cost readjusted.
function makeSpecialityInv()
{
	for (var i = 0; i < document.forms[0].rdoHouse.length; i++)
	{
		if (document.forms[0].rdoHouse[i].checked == true)
		{
				document.forms[0].rdoHouse[i].checked = false;
		}
	}
	pizzaTotalTracker[2] = 0;
	document.getElementById("specialties").style.visibility = "hidden";
	if (blnHideVeganCheese)
	{
		document.getElementById("vegan").style.visibility = "visible";
		blnHideVeganCheese = false;
	}
	blnCompTopping = true;
	calculateTotal();
}

//This function adjusts the views if the customer originally decides to have the pizza delivered and then decides against it.
function noDelivery()
{
	pizzaTotalTracker[27] = 0;
	document.forms[0].chkDifferent.checked = false;
	document.getElementById("deliveryAddress").style.visibility = "hidden";
	if (blnDiffAddress)
	{
		blnDiffAddress = false;
		document.getElementById("deliveryAddressAa").style.visibility = "hidden";
		document.getElementById("deliveryAddressAb").style.visibility = "hidden";
		document.getElementById("deliveryAddressAc").style.visibility = "hidden";
		document.getElementById("deliveryAddressAd").style.visibility = "hidden";
		document.getElementById("deliveryAddressAe").style.visibility = "hidden";
		document.getElementById("deliveryAddressAf").style.visibility = "hidden";
		document.getElementById("deliveryAddressAg").style.visibility = "hidden";
	}
	calculateTotal();
}

//This function makes the option to select a different delivery address available if the customer chooses to have
//the pizza delivered.
function delivery()
{
	pizzaTotalTracker[27] = 1;
	document.getElementById("deliveryAddress").style.visibility = "visible";
	calculateTotal;
}

//If the customer indicates a different delivery address from their billing address, this function will
//make the delivery address (hidden by default) appear.  The same function will also render the fields invisible
function delAddressVisibility()
{
	if (document.forms[0].chkDifferent.checked == true)
	{
		document.getElementById("deliveryAddressAa").style.visibility = "visible";
		document.getElementById("deliveryAddressAb").style.visibility = "visible";
		document.getElementById("deliveryAddressAc").style.visibility = "visible";
		document.getElementById("deliveryAddressAd").style.visibility = "visible";
		document.getElementById("deliveryAddressAe").style.visibility = "visible";
		document.getElementById("deliveryAddressAf").style.visibility = "visible";
		document.getElementById("deliveryAddressAg").style.visibility = "visible";
		blnDiffAddress = true;
	}
	if (document.forms[0].chkDifferent.checked == false)
	{
		document.getElementById("deliveryAddressAa").style.visibility = "hidden";
		document.getElementById("deliveryAddressAb").style.visibility = "hidden";
		document.getElementById("deliveryAddressAc").style.visibility = "hidden";
		document.getElementById("deliveryAddressAd").style.visibility = "hidden";
		document.getElementById("deliveryAddressAe").style.visibility = "hidden";
		document.getElementById("deliveryAddressAf").style.visibility = "hidden";
		document.getElementById("deliveryAddressAg").style.visibility = "hidden";
		blnDiffAddress = false;
		
	}
}

//This function is called upon every time a function that involves adjusting the pizza cost is used.
function calculateTotal()
{
	//sets up initial values
	var subTotal = 0;
	var toppingTracker = 0;
	var salesTax = 0;
	var salesTaxA = 0;
	var salesTaxB = 0;
	var total = 0;
	
	//This for statement collects the stored cost information, adds it up, and passes it to the subTotal variable.
	for (var i = 0; i <pizzaTotalTracker.length; i++)
	{
		subTotal +=pizzaTotalTracker[i];
	}
	//Evaluates the total of all the numbers in the variable.
	subTotal = eval(subTotal);
	//This if statement will check to see if a custom pizza is chosen, and will automatically deduct the cost of the complimentary topping if that is the case
	if(blnCompTopping)
	{
		for (var i = 3; i < 26; i++)
		{
			toppingTracker +=pizzaTotalTracker[i]
		}
		toppingTracker = parseInt(toppingTracker)
		if (toppingTracker >= 1)
		{
			subTotal = subTotal - 1;
		}
	}
	//This part computes the sales tax and the grand total
	salesTaxA = subTotal * 9.5;
	salesTaxB = Math.round(salesTaxA);
	salesTax = salesTaxB / 100;
	total = subTotal + salesTax;
	
	//This part writes the information to the total box.  The whole process is automatic
	document.forms[0].subtotal.value = "$" + parseFloat(subTotal).toFixed(2);
	document.forms[0].salestax.value = "$" + parseFloat(salesTax).toFixed(2);
	document.forms[0].total.value = "$" + parseFloat(total).toFixed(2);
}	

//This expression is called upon to check the validity of the zip code entered
function validZipCode(txt)
{
	var zipCodeExp = /\d{5}$/;
	return (zipCodeExp.test(txt));
}

//This expression is called upon to check the validity of the phone number entered.
function validPhoneNumber(txt)
{
	var phoneExp = /\d\d\d-\d\d\d-\d\d\d\d$/;
	return (phoneExp.test(txt));
}

//This expression checks the validity of the e mail address entered.
function validEmail(txt)
{
	var emailExp = /^{A-Z0-9._%+-]+@[A=-Z0-9.-]+\.{A-Z]{2,4}$/i;
	return (emailExp.test(txt));
}

//This expression checks to ensure that if a Visa card is used, it is the proper format.
function validVisa(txt)
{
	var visaExp = /4\d{15}$/;
	return (visaExp.test(txt));
}

//This expression checks to ensure that if a MasterCard card is used, it is the proper format.
function validMC(txt)
{
	var mcExp = /5\d{15}$/;
	return (mcExp.test(txt));
}

//This expression checks to ensure that if an American Express card is used, it is the proper format.
function validAmEx(txt)
{
	var amexExp = /3\d{14}$/;
	return (amexExp.test(txt));
}

//This expression checks to ensure that if a Discover card is used, it is the proper format.
function validDiscover(txt)
{
	var discoverExp = /6011\d{12}$/;
	return (discoverExp.test(txt));
}

//Clicking the place order button will activate this function
function reviewOrder()
{
	//The next series of if statements will check to ensure certain values will entered, and will return an
	//applicable alert statement and stop the function if necessary
	if (pizzaTotalTracker[0] == "0")
	{
		alert("Please choose a pizza size");
		document.forms[0].rdoSmall.focus();
		return false;
	}
	if (pizzaCrust[0] == "")
	{
		alert("Please choose a pizza crust style");
		document.forms[0].rdoRCrust.focus();
		return false;
	}
	if ((!blnCompTopping) && (pizzaTotalTracker[2] == "0"))
	{
		alert("You indicated that you want a house speciality.  Please choose they sepciality style, or choose custom pizza");
		document.forms[0].rdoMeatLovers.focus();
		return false;
	}
	if (document.forms[0].txtFName.value == "")
	{
		alert("Please enter a valid first name");
		document.forms[0].txtFName.focus();
		return false;
	}
	if (document.forms[0].txtLName.value == "")
	{
		alert("Please enter a valid last name");
		document.forms[0].txtLName.focus();
		return false;
	}
	if (document.forms[0].txtAddress.value == "")
	{
		alert("Please enter a valid billing address");
		document.forms[0].txtAddress.focus();
		return false;
	}
	if (document.forms[0].txtCity.value == "")
	{
		alert("Please enter a valid city for the billing address");
		document.forms[0].txtCity.focus();
		return false;
	}
	if (document.forms[0].txtState.value == "")
	{
		alert("Please enter a valid state for the billing address");
		document.forms[0].txtState.focus();
		return false;
	}
	//The zip code, phone number, and e mail checks will call upon their respective expressions to check
	//the validity of the data.
	if (validZipCode(document.forms[0].txtZip.value) == false)
	{
		alert("Please enter a valid billing zip code");
		document.forms[0].txtZip.focus();
		return false;
	}

	if (validPhoneNumber(document.forms[0].txtPhone.value) == false)
	{
		alert("Please enter a valid phone number.  \nMust be a xxx-xxx-xxxx format.");
		document.forms[0].txtPhone.focus();
		return false;
	}
	if (validEmail(document.forms[0].txtEmail.value) == -1)
	{
		alert("Please enter a valid e mail address");
		document.forms[0].txtEmail.focus();
		return false;
	}
	//The next variable declaration and switch statement captures the customer's payment method
	summaryPaymentMethod = document.forms[0].creditCard.selectedIndex;
	switch(summaryPaymentMethod)
	{
		case 0:
			summaryPaymentMethod = "";
			break;
		case 1:
 		 	summaryPaymentMethod = "Visa";
 		 	break;
		case 2:
 		 summaryPaymentMethod = "MasterCard";
  		break;
  		case 3:
 		 summaryPaymentMethod = "American Express";
  		break;
  		case 4:
 		 summaryPaymentMethod = "Discover";
  		break;
	}
	//The next several functions will check for valid credit/debit card information by calling upon their respective functions
	//and will return an applicable alert statement and stop the function if they are not valid.
	if (summaryPaymentMethod == "")
	{
		alert("Please choose a method of payment");
		document.forms[0].card.focus();
		return false;
	}
		
	if (summaryPaymentMethod == "Visa")
	{
		if (validVisa(document.forms[0].txtCardNumber.value) == false)
		{
			alert("Please enter a valid Visa card number");
			document.forms[0].txtCardNumber.focus();
			return false;
		}
	}
	if (summaryPaymentMethod == "MasterCard")
	{
		if (validMC(document.forms[0].txtCardNumber.value) == false)
		{
			alert("Please enter a valid MasterCard number");
			document.forms[0].txtCardNumber.focus();
			return false;
		}
	}
	if (summaryPaymentMethod == "American Express")
	{		
		if (validAmEx(document.forms[0].txtCardNumber.value) == false)
		{
			alert("Please enter a valid American Express card number");
			document.forms[0].txtCardNumber.focus();
			return false;
		}
	}
	if (summaryPaymentMethod == "Discover")
	{
			if (validDiscover(document.forms[0].txtCardNumber.value) == false)
			{
				alert("Please enter a valid Discover card number");
				document.forms[0].txtCardNumber.focus();
				return false;
			}
	}
	//The next several functions check the validity of the expiration month/year information
	if ((isNaN(document.forms[0].txtExpMonth.value)) || (document.forms[0].txtExpMonth.value.length < 2))
	{
		alert("Please enter a valid card expiration month.  \nMust be 2 digits long.");
		document.forms[0].txtExpMonth.focus();
		return false;
	}
	if ((isNaN(document.forms[0].txtExpYear.value)) || (document.forms[0].txtExpYear.value.length < 4))
	{
		alert("Please enter a valid card expiration year. \nMust be 4 digits.");
		document.forms[0].txtExpMonth.focus();
		return false;
	}
	var expYear = document.forms[0].txtExpYear.value;
	if (expYear < 2011)
	{
		alert("Please enter a valid card expiration year.");
		document.forms[0].txtExpMonth.focus();
		return false;
	}
	//American Express has a different security code lenght than the other forms of payment.  The next two functions will
	//Figure out if the card is or isn't American Express, and execute the applicable check for the proper security code.
	if (summaryPaymentMethod == "American Express")
	{
		if ((document.forms[0].txtCardSecurity.value.length != 4) || (isNaN(document.forms[0].txtCardSecurity.value)))
		{
			alert("Please enter a valid card security code. \nMust be 4 digits.");
			document.forms[0].txtCardSecurity.focus();
			return false;
		}
	}
	if (summaryPaymentMethod != "American Express")
	{
		if ((document.forms[0].txtCardSecurity.value.length != 3) || (isNaN(document.forms[0].txtCardSecurity.value)))
		{
			alert("Please enter a valid card security code. \nMust be 3 digits.");
			document.forms[0].txtCardSecurity.focus();
			return false;
		}
	}
	//If the customer indicated to have the pizza delivered to their billing address, this function will check to see if the zip code falls within
	//the valid delivery area.
	if (document.forms[0].rdoDelivery.checked == true)
	{
		if (!blnDiffAddress)
		{
			if (document.forms[0].txtZip.value !=(("98107") || ("98117") || ("98103") || ("98199") || ("98109")))
			{
				alert("You entered a zip code that we don't deliver to. \nPlease re-enter your zip code, or choose a different delivery address.");
				document.forms[0].txtZip.focus;
				return false;
			}
		}
	}
	//If the customer chose a different delivery address but didn't enter in the necessary information
	//this if statement will catch that and stop the function if necessary.
	if (blnDiffAddress)
	{
		if (document.forms[0].txtAddressD.value =="")
		{
			alert("Please enter a valid delivery address.");
			document.forms[0].txtAddressD.focus();
			return false;
		}
	}
	//I split this function up into two, so the next function will activate.
	getOrder();
}

//It probably wasn't necessary to write all of this extra code, but I did so anyway so I didn't get all the previous work messed up
function getOrder()
{
	//The information was already validated, so this function will go through and save it to their respective variable.
	summaryName = document.forms[0].txtFName.value + " " + document.forms[0].txtLName.value;
	summaryAddress = document.forms[0].txtAddress.value;
	if (document.forms[0].txtAddress2.value !="")
	{
		summaryAddress2 = document.forms[0].txtAddress2.value;
	}
	summaryCityStateZip = document.forms[0].txtCity.value + ", " + document.forms[0].txtState.value + "  " + document.forms[0].txtZip.value;
	if (document.forms[0].txtAddressD.value !="")
	{
		summaryDeliveryAddress = document.forms[0].txtAddressD.value;
		summaryDeliveryCityState  = "Seattle, WA";
		summaryDeliveryZip = document.forms[0].zipCode.value;
	}
	summaryEmail = document.forms[0].txtEmail.value;
	summaryPhone = document.forms[0].txtPhone.value;
	summaryCardNumber = document.forms[0].txtCardNumber.value;
	if (summaryPaymentMethod == "American Express")
	{
		summaryCardNumber = summaryCardNumber.substring(11, 15);
		summaryCardNumber = "xxxxxxxxxxx" + summaryCardNumber;
	}
	else
	{
		summaryCardNumber = summaryCardNumber.substring(12, 16);
		summaryCardNumber = "xxxxxxxxxxxx" + summaryCardNumber;
	}
	alert(summaryCardNumber);
	summaryCardExpire = document.forms[0].txtExpMonth.value + "-" + document.forms[0].txtExpYear.value;
	for (var i = 0; i < document.forms[0].rdoSize.length; i++)
	{
		if (document.forms[0].rdoSize[i].checked == true)
		{
			summaryPizzaSize = document.forms[0].rdoSize[i].value;
		}
	}
	for (var i = 0; i < document.forms[0].rdoCrust.length; i++)
	{
		if (document.forms[0].rdoCrust[i].checked == true)
		{
			summaryPizzaCrust = document.forms[0].rdoCrust[i].value;
		}
	}
	if (document.forms[0].chkGluten.checked == true)
	{
		glutenFree = "Yes";
	}
	for (var i = 0; i<document.forms[0].rdoKind.length; i++)
	{
		summaryOrderType = document.forms[0].rdoKind[i].value;
	}
	if (pizzaTotalTracker[2] != "0")
	{
		for (var i = 0; i < document.forms[0].rdoHouse.length; i++)
		{
			if (document.forms[0].rdoHouse[i].checked == true)
			{
				summaryPizzaStyle = document.forms[0].rdoHouse[i].value;
			}
		}
	}
	if (document.forms[0].chkVegan.checked == true)
	{
		summaryVeganCheese = "Yes"
	}
	if (summaryPizzaStyle == "Vegan Delight")
	{
		summaryVeganCheese = "N/A";
	}
	summaryComments = document.forms[0].comments.value;
	if (document.forms[0].chkSpinach.checked == true)
	{
		summaryToppings += "Spinach  ";
	}
	if (document.forms[0].chkGarlic.checked == true)
	{
		summaryToppings += "Garlic  ";
	}
	if (document.forms[0].chkOnions.checked == true)
	{
		summaryToppings += "Onions  ";
	}
	if (document.forms[0].chkGreenPeppers.checked == true)
	{
		summaryToppings += "Green Peppers  ";
	}
	if (document.forms[0].chkArtichokes.checked == true)
	{
		summaryToppings += "Artichokes  ";
	}
	if (document.forms[0].chkCapers.checked == true)
	{
		summaryToppings += "Capers  ";
	}
	if (document.forms[0].chkEggplant.checked == true)
	{
		summaryToppings += "Eggplant  ";
	}
	if (document.forms[0].chkOlives.checked == true)
	{
		summaryToppings += "Olives  ";
	}
	if (document.forms[0].chkMushrooms.checked == true)
	{
		summaryToppings += "Mushrooms  ";
	}
	if (document.forms[0].chkTomatoes.checked == true)
	{
		summaryToppings += "Tomatoes  ";
	}
	if (document.forms[0].chkPepperoni.checked == true)
	{
		summaryToppings += "Pepperoni  ";
	}
	if (document.forms[0].chkSausage.checked == true)
	{
		summaryToppings += "Sausage  ";
	}
	if (document.forms[0].chkCanadianBacon.checked == true)
	{
		summaryToppings += "Canadian Bacon  ";
	}
	if (document.forms[0].chkSalumi.checked == true)
	{
		summaryToppings += "Salumi  ";
	}
	if (document.forms[0].chkProsciutto.checked == true)
	{
		summaryToppings += "Prosciutto  ";
	}
	if (document.forms[0].chkChicken.checked == true)
	{
		summaryToppings += "Chicken Sausage  ";
	}
	if (document.forms[0].chkAnchoves.checked == true)
	{
		summaryToppings += "Anchoves  ";
	}
	if (document.forms[0].chkClams.checked == true)
	{
		summaryToppings += "Clams  ";
	}
	if (document.forms[0].chkShrimp.checked == true)
	{
		summaryToppings += "Shrimp  ";
	}
	if (document.forms[0].chkFetaCheese.checked == true)
	{
		summaryToppings += "Feta Cheese  ";
	}
	if (document.forms[0].chkExtraCheese.checked == true)
	{
		summaryToppings += "Extra Cheese  ";
	}
	summarySubtotal = document.forms[0].subtotal.value;
	summarySalesTax = document.forms[0].salestax.value;
	summaryTotal = document.forms[0].total.value;
	//Yet another function
	pizzaCookie();
	return true;	
}

//This function sets all of the cookies for the verification and thank you pages.  As before, I could have probably
//simplified all of the steps, but since so much code was already written, I dind't want to chance messing up code that
//already worked.
function pizzaCookie()
{
	SetCookie("name", summaryName);
	SetCookie("address", summaryAddress);
	SetCookie("address2", summaryAddress2);
	SetCookie("cityStateZip", summaryCityStateZip);
	SetCookie("deliveryAddress", summaryDeliveryAddress);
	SetCookie("deliveryAddress2", summaryDeliveryAddress2);
	if (summaryDeliveryAddress !="N/A")
	{
		SetCookie("deliveryCityStateZip", summaryDeliveryCityState + "  " + summaryDeliveryZip);
	}
	else
	{
		SetCookie("deliveryCityStateZip", "N/A");
	}
	SetCookie("email", summaryEmail);
	SetCookie("phone", summaryPhone);
	SetCookie("paymentMethod", summaryPaymentMethod);
	SetCookie("cardNumber", summaryCardNumber);
	SetCookie("cardExpire", summaryCardExpire);
	SetCookie("orderType", summaryOrderType);
	SetCookie("pizzaSize", summaryPizzaSize);
	SetCookie("pizzaCrust", summaryPizzaCrust);
	SetCookie("veganCheese", summaryVeganCheese);
	SetCookie("glutenFree", summaryGlutenFree);
	SetCookie("pizzaStyle", summaryPizzaStyle);
	SetCookie("extraToppings", summaryToppings);
	SetCookie("comments", summaryComments);
	SetCookie("subtotal", summarySubtotal);
	SetCookie("salesTax", summarySalesTax); 
	SetCookie("total", summaryTotal);

}

//Both the verification and thank you pages call upon this fuction to get the cookie information.
function getOrderInfo()
{
	document.forms[0].txtName.value = GetCookie("name");
	document.forms[0].txtAddress.value = GetCookie("address");
	document.forms[0].txtAddress2.value = GetCookie("address2");
	document.forms[0].txtCityStateZip.value = GetCookie("cityStateZip");
	document.forms[0].txtDeliveryAddress.value = GetCookie("deliveryAddress");
	document.forms[0].txtDeliveryAddress2.value = GetCookie("deliveryAddress2");
	document.forms[0].txtDeliveryCityStateZip.value = GetCookie("deliveryCityStateZip");
	document.forms[0].txtEmail.value = GetCookie("email");
	document.forms[0].txtPhone.value = GetCookie("phone");
	document.forms[0].txtMethod.value = GetCookie("paymentMethod");
	document.forms[0].txtCardNumber.value = GetCookie("cardNumber");
	document.forms[0].txtCardExpire.value = GetCookie("cardExpire");
	document.forms[0].txtOrderType.value = GetCookie("orderType");
	document.forms[0].txtPizzaSize.value = GetCookie("pizzaSize");
	document.forms[0].txtPizzaCrust.value = GetCookie("pizzaCrust");
	document.forms[0].txtGlutenFree.value = GetCookie("glutenFree");
	document.forms[0].txtVeganCheese.value = GetCookie("veganCheese");
	document.forms[0].txtExtraToppings.value = GetCookie("extraToppings");
	document.forms[0].txtPizzaStyle.value = GetCookie("pizzaStyle");
	document.forms[0].txtComments.value = GetCookie("comments");
	document.forms[0].txtSubtotal.value = GetCookie("subtotal");
	document.forms[0].txtSalesTax.value = GetCookie("salesTax");
	document.forms[0].txtTotal.value = GetCookie("total");
	if (document.forms[0].txtPizzaStyle.value !="Custom");
	{
		$('div.toppings').show();
	}
}