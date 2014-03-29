<html>

<head>

<title> MLB Redirecter Page </title>

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
#$dir = "/opt/redirect-files/maps";
###For work testing on sysapp01
$dir = "/var/www/html/redirector/redirect-files/maps";

###This works, returns an array of the textmap files

$files = array_filter(scandir($dir), function($item) { return !is_dir(($dir) . $item); });

?>

<form action="redirector.php" method="post">

<p>Teams:

<select name="teams">

<?php foreach($files as $textmap){ ?>

<!--use php substr to get only the team names from the textmap files-->

<?php $fuckyocouch = substr($textmap, 0, -10); ?>

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

<input type="submit">

</form>

</div>



</body>



</html>
