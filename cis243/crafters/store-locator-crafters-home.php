<?php

session_start();
require "common_elements/checkstatus.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 
<html>
 
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Crafters Home Landing Page</title>
<meta name="robots" content="none" />
<link rel="stylesheet" type="text/css" href="style.css" />
 
</head>
 
<script language="javaScript"> 
<!--
	function searchState(state){
		if (state != ""){
			document.location='store-detail-crafters-home.php?c=1&state1=' + state
		}
	}
	function selSt(state){
		if (state != ""){
			document.location='store-detail-crafters-home.php?c=1&state2=' + document.stateLoc.State2.value
		}
	}
//-->
</script>
<body>
 
<div align="center">
	
	<br>
	<form name="stateLoc" action="passState.php">
	<table border="2" cellpadding="1" width="900" cellspacing="3" bgcolor="#FFFFFF">
		<tr>
			<td colspan="3" bgcolor="#F6B2C0">
          <table width="100%"><tr><td class="navTop">
			<img border="0" src="images/logo.jpg" width="266" height="58" align="left"></td>
			<td align="right"><b><i><font size="3" color="#5C4E23">
			Creativity is our passion; inspiration is our specialty!</font></i></b></td>
            </tr></table>
            </td>
		</tr>
		<tr>
			<td colspan="3">
			<div align="center">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="navigation" style="border-collapse: collapse">
        <tr>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="index.php"> home </a></td>            
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="membership-benefits-crafters-home.php">membership benefits</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="partner-vendors-crafters-home.php">partner vendors</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="store-locator-crafters-home.php">store locator</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="testimonials-crafters-home.php">testimonials</a></td>
           	<td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="about-crafters-home.php">about us</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0"><a href="contact-crafters-home.php">contact us</a></td>
            <td align="center"><a href="login-crafters-home.php"><b>MEMBER LOGIN</b></a></td>
 
        </tr>
    </table>
</div>
 
			</td>
		</tr>
		<tr>
			
			<td width="67%" valign="top">
			<h3>Store Locator</h3>
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" >
			  <tr>
			    <td align="center" valign="top">
             
                <p align="left" style="margin-left: 10px">United States </p>
				<p align="left" style="margin-left: 35px">
                <select name="State" onchange="submit()">
                <option value="">Choose a state</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                </select>
                
                
                </p>
                
                
                <p>&nbsp;</p>
				<p>Outside the USA </p>
				<p style="margin-left: 35px">
                <select name="State2" onchange="submit()">
                <option value="">International Locations</option>
                <option value="9">Australia</option>
                <option value="3">Canada</option>
                <option value="19">Hong Kong</option>
                <option value="20">Netherlands</option>
                <option value="17">New Zealand</option>
                <option value="18">South Africa</option>
                <option value="8">United Kingdom</option>
                <option value="99">Other</option>
                </select></td>
			    <td align="center" valign="top">
				<a href="store-detail-crafters-home.php">
				<img src="images/map_pink.jpg" width="384" height="245" alt="Store Locator" usemap="#stateClick"></a><br>
				<br />
               	</td>
      </tr>
      <tr>
      <td colspan="2" align="center">
      &nbsp;</td>
      </tr>
    </table>
 
                
               
		  
			</tr>
		<tr>
			<td colspan="3" bgcolor="#F6B2C0">
			<div align="center">
<table border="0" cellpadding="3" style="border-collapse: collapse" width="600">
        <tr height="20px;">
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="index.php" class="footer"> home </a>&nbsp;&nbsp;</td>
           
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="membership-benefits-crafters-home.php" class="footer">membership benefits</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="partner-vendors-crafters-home.php" class="footer">partner vendors</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="store-locator-crafters-home.php" class="footer">store locator</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="testimonials-crafters-home.php" class="footer">testimonials</a></td>
             <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="about-crafters-home.php" class="footer">about us</a></td>
             <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="contact-crafters-home.php" class="footer">contact us</a></td>
            <td align="center" style="border-right: 1px solid #5C4E23; padding: 0" class="footer"><a href="login-crafters-home.php"><b>LOGIN</b></a></td>
            <td align="center"><a href="common_elements/logout.php" class="footer"><b>SITE LOGOUT</b></a></td>
        </tr>
    </table>
</div>
			</td>
		</tr>
	</table>
</form>
</div>
 
<map name="stateClick">
	<area alt="" shape="poly" coords="56,5,86,13,82,37,70,35,60,36,48,32,48,27,43,26,44,6,53,12" href="store-detail-crafters-home.php?state=WA">
	<area alt="" shape="poly" coords="43,25,48,27,48,32,62,36,82,37,84,40,77,50,78,52,74,68,31,59,30,53" href="store-detail-crafters-home.php?state=OR">
	<area alt="" shape="poly" coords="30,57,31,64,26,72,37,124,53,136,56,145,72,147,77,127,50,90,56,65" href="store-detail-crafters-home.php?state=CA">
	<area alt="" shape="poly" coords="86,13,92,14,90,25,96,35,95,43,102,53,113,54,110,76,74,68" href="store-detail-crafters-home.php?state=ID">
	<area alt="" shape="poly" coords="56,65,92,74,82,120,79,120,77,128,50,91" href="store-detail-crafters-home.php?state=NV">
	<area alt="" shape="POLY" coords="92,73,110,75,108,85,122,86,116,117,83,113" href="store-detail-crafters-home.php?state=UT">
	<area alt="" shape="poly" coords="84,113,116,118,110,166,103,165,71,149,78,120,82,121" href="store-detail-crafters-home.php?state=AZ" nohref>
	<area alt="" coords="34,169,107,239" href="store-detail-crafters-home.php?state=AK">
	<area alt="" coords="118,207,169,243" href="store-detail-crafters-home.php?state=HI">
	<area alt="" shape="poly" coords="91,14,157,24,154,56,114,52,113,55,101,52,95,42,96,34,91,26" href="store-detail-crafters-home.php?state=MT">
	<area alt="" shape="poly" coords="114,52,107,85,152,91,154,57" href="store-detail-crafters-home.php?state=WY" nohref>
	<area alt="" shape="poly" coords="121,86,164,91,162,122,117,119" href="store-detail-crafters-home.php?state=CO">
	<area alt="" shape="POLY" coords="116,117,156,122,153,165,116,162,116,165,111,164" href="store-detail-crafters-home.php?state=NM" nohref>
	<area alt="" shape="poly" coords="156,24,196,26,198,51,155,49" href="store-detail-crafters-home.php?state=ND" nohref>
	<area alt="" shape="poly" coords="155,49,198,51,197,74,153,73" href="store-detail-crafters-home.php?state=SD">
	<area alt="" shape="poly" coords="163,100,207,100,198,75,152,73,152,88,164,91" href="store-detail-crafters-home.php?state=NE" nohref>
	<area alt="" shape="poly" coords="163,100,207,100,207,104,210,106,210,125,161,124" href="store-detail-crafters-home.php?state=KS">
	<area alt="" shape="poly" coords="156,124,210,126,211,152,202,151,188,150,181,147,175,144,174,128,155,127" href="store-detail-crafters-home.php?state=OK">
	<area alt="" shape="poly" coords="155,127,174,128,174,143,192,151,210,152,215,152,215,166,218,175,217,186,210,187,193,198,191,205,191,216,182,214,174,202,163,184,154,183,149,191,139,182,139,175,128,164,152,165" href="store-detail-crafters-home.php?state=TX">
	<area alt="" shape="poly" coords="194,25,209,26,218,29,236,33,224,44,222,45,223,50,220,52,220,58,229,67,229,70,198,71" href="store-detail-crafters-home.php?state=MN">
	<area alt="" shape="poly" coords="197,70,229,71,231,77,237,82,237,86,232,87,231,93,229,95,204,94,200,82,200,82,200,82" href="store-detail-crafters-home.php?state=IA">
	<area alt="" shape="poly" coords="202,94,229,94,230,100,238,108,238,115,244,121,245,126,244,132,239,131,239,127,210,128,210,106" href="store-detail-crafters-home.php?state=MO">
	<area alt="" shape="poly" coords="210,128,239,128,238,131,243,132,240,140,237,146,235,148,235,157,216,156,216,153,212,152" href="store-detail-crafters-home.php?state=AR">
	<area alt="" shape="poly" coords="215,156,236,158,236,165,234,168,233,173,245,173,246,177,250,180,246,181,247,186,244,186,244,188,239,188,232,184,229,184,228,186,218,186" href="store-detail-crafters-home.php?state=LA" nohref>
	<area alt="" shape="POLY" coords="239,140,254,139,254,174,259,174,259,177,256,178,248,178,244,173,233,173,237,164,236,157,234,149" href="store-detail-crafters-home.php?state=MS" nohref>
	<area alt="" shape="POLY" coords="222,44,230,43,248,50,250,58,250,78,233,79,229,74,229,68,220,60,220,52,223,50" href="store-detail-crafters-home.php?state=WI">
	<area alt="" shape="poly" coords="233,78,250,78,252,83,255,104,254,110,253,114,250,121,244,122,239,117,238,107,230,100,230,95,232,92,231,87,237,84" href="store-detail-crafters-home.php?state=IL">
	<area alt="" shape="POLY" coords="231,42,263,28,277,48,278,56,274,60,274,63,276,63,280,58,282,59,285,66,284,72,280,81,259,82,260,72,258,67,258,59,248,50" href="store-detail-crafters-home.php?state=MI">
	<area alt="" shape="POLY" coords="252,84,258,82,270,82,272,107,268,106,266,114,262,113,262,114,253,114,255,108" href="store-detail-crafters-home.php?state=IN">
	<area alt="" shape="POLY" coords="252,114,262,115,272,103,285,105,290,114,284,123,268,124,254,126,253,127,245,127,245,121,249,121" href="store-detail-crafters-home.php?state=KY">
	<area alt="" shape="poly" coords="244,127,254,127,254,125,294,122,294,125,278,136,254,139,240,140" href="store-detail-crafters-home.php?state=TN">
	<area alt="" shape="POLY" coords="254,139,271,138,271,143,277,160,276,164,278,168,279,171,260,173,262,177,259,177,258,174,253,174" href="store-detail-crafters-home.php?state=AL">
	<area alt="" shape="POLY" coords="270,81,280,81,283,83,295,76,296,96,286,107,284,104,271,103" href="store-detail-crafters-home.php?state=OH">
	<area alt="" shape="POLY" coords="286,108,296,96,297,89,298,93,305,94,305,98,308,92,316,91,316,95,312,95,312,98,308,104,305,103,303,113,297,116,292,116,290,114" href="store-detail-crafters-home.php?state=WV">
	<area alt="" shape="poly" coords="294,76,298,73,300,75,328,70,328,72,331,72,331,76,329,76,329,80,333,82,328,89,316,92,299,94,297,89" href="store-detail-crafters-home.php?state=PA">
	<area alt="" shape="POLY" coords="298,75,304,67,304,63,314,62,318,59,318,53,320,47,331,43,333,52,337,60,337,67,338,74,336,78,331,74,327,69,326,69" href="store-detail-crafters-home.php?state=NY">
	<area alt="" shape="poly" coords="316,91,316,95,321,98,321,102,325,104,326,98,325,92,329,90,329,88" href="store-detail-crafters-home.php?state=MD">
	<area alt="" shape="POLY" coords="326,92,327,100,334,99,334,95,330,91" href="store-detail-crafters-home.php?state=DE">
	<area alt="" shape="POLY" coords="331,75,337,75,335,78,335,81,338,81,338,88,335,92,332,92,329,90,329,88,334,83,330,80" href="store-detail-crafters-home.php?state=NJ">
	<area alt="" shape="POLY" coords="337,66,338,74,348,70,348,64" href="store-detail-crafters-home.php?state=CT">
	<area alt="" shape="poly" coords="337,60,337,66,348,64,351,66,355,65,354,62,352,60,352,56,349,56,349,58" href="store-detail-crafters-home.php?state=MA">
	<area alt="" shape="poly" coords="332,43,343,40,343,46,341,46,341,59,337,60,333,52" href="store-detail-crafters-home.php?state=VT" nohref>
	<area alt="" shape="poly" coords="342,39,344,38,347,48,351,55,349,58,341,60,342,46,344,46" href="store-detail-crafters-home.php?state=NH">
	<area alt="" shape="poly" coords="342,37,346,34,346,23,350,17,352,18,354,16,359,17,360,26,368,34,368,36,351,54" href="store-detail-crafters-home.php?state=ME" nohref>
	<area alt="" shape="poly" coords="348,64,348,71,358,66" href="store-detail-crafters-home.php?state=RI">
	<area alt="" shape="POLY" coords="283,122,291,114,293,117,303,113,305,102,307,104,312,99,312,94,318,94,321,98,320,102,325,104,327,110,332,114,331,114" href="store-detail-crafters-home.php?state=VA">
	<area alt="" shape="poly" coords="294,121,332,115,334,121,332,130,322,140,317,140,311,134,303,134,302,133,291,134,287,136,278,136,294,124" href="store-detail-crafters-home.php?state=NC" nohref>
	<area alt="" shape="poly" coords="285,136,292,134,296,134,302,133,302,134,311,134,317,140,319,140,306,157,301,150,289,140,286,139" href="store-detail-crafters-home.php?state=SC" nohref>
	<area alt="" shape="poly" coords="270,137,285,137,285,139,299,148,306,158,303,170,300,170,300,172,281,172" href="store-detail-crafters-home.php?state=GA">
	<area alt="" shape="poly" coords="261,172,261,176,270,175,270,176,275,177,276,180,282,180,286,176,296,183,297,193,299,194,300,200,308,207,312,208,312,212,315,217,319,211,318,196,304,170,300,170,300,172,280,172" href="store-detail-crafters-home.php?state=FL">
</map>
 
</body>
 
</html>
