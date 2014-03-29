<html>

<body>

<?php

$teamname = $_POST["teams"];

$name 	  = $_POST["redirect"];

$proto    = $_POST["proto"];

$url      = $_POST["dest"];

### For testing at work on sysapp01
$dir = "/var/www/html/redirector/redirect-files/maps/";
### For testing at home on aws
#$dir = "/opt/redirect-files/maps/";
$file = $dir .$teamname. ".textmap";
$redirect = $name ."\t". $proto.$url .PHP_EOL;

#file_put_contents($file, $redirect, FILE_APPEND | LOCK_EX);

if (file_exists($file)) {
	### Trying to get this to work with RCS so far no go for it to work again, writable_file in file_put_contents needs to be changed to $file
	$writable_file = shell_exec("co $file");	
	file_put_contents($writable_file, $redirect, FILE_APPEND | LOCK_EX);
	shell_exec("ci $writable_file");
	echo "File has been written;
} else {
        echo "The $file does not exist";
}

?>

</body>

</html>
