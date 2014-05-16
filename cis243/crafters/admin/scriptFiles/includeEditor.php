<?php

/*Since the CKEditor would be called from several locations, it made sense to make it its own PHP
script*/
//This page will throw out any unauthorized users and redirect them back the login page with an error message if they attempt to access this page without being logged in properly.
if (!isset($_SESSION['authorized']))
	{
	$_SESSION['errorMsg'] = "<p color='red'>You are not logged into the system.  Please log in.</p>";
	header("Location: ../login-crafters-home.php");
	}
	
print <<<here
<p><textarea name="editor1" id="editor1" cols="55" rows="15">&lt;p&gt;$content&lt;/p&gt;</textarea></p>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1',
    {
        filebrowserBrowseUrl : '../images/',
        filebrowserUploadUrl : '../images/'
    });
</script>
here;
?>