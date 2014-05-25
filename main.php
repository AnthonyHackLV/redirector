<html>

<head>

<title> MLB Redirecter Page </title>

<?php
print shell_exec('/Users/hack/redirector/git_scripts/gitpull');
?>

</head>


<body>

<div id="logo">

<!--<img id="mlblogo" src="images/MLBLogo2.png" />-->

<br>

<h1>MLB Redirecter Page</h1>

</div>

<br>

<br>

<div id="form">

<?php

###Have to adjust the directory to the proper one once completed
###For home testing
$dir = "/Users/hack/redirector/redirect-files/maps";
###For work testing on sysapp01
#$dir = "/var/www/html/redirector/redirect-files/maps";

###This works, returns an array of the textmap files

$files = array_filter(scandir($dir), function($item) { return !is_dir(($dir) . $item); });

?>

<form action="redirector.php" method="post">

<p>Teams:

<select name="teams">

<?php foreach($files as $textmap){ ?>

<!--use php substr to get only the team names from the textmap files-->
<!--This should be -8 to get teamname.com in the drop down menu, can be -12 to just have teamname without .com-->
<?php $fuckyocouch = substr($textmap, 0, -8); ?>

                <option value=<?php echo $fuckyocouch ?>><?php echo $fuckyocouch ?></option>

<?php }?>

</select>  / </p> <input type="text" name="redirect">

<p> Destination URL:

<select name="proto">

<option value="http://">http://</option>

<option value="https://">https://</option>

</select> </p> <input type="text" name="dest">

<br>

<br>

<p> Git comment (for testing only)

<br>

<br>

<input type="text" name="comment">

<br>

<br>

<input type="submit">

</form>

</div>



</body>



</html>
