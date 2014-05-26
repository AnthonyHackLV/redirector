<html>

<body>

<?php

$teamname = $_POST["teams"];

$name 	  = $_POST["redirect"];

$proto    = $_POST["proto"];

$url      = $_POST["dest"];

$comment  = $_POST["comment"];

### For testing at work on sysapp01
#$dir = "/var/www/html/redirector/redirect-files/maps/";
### For testing at home on laptop dont forget to startup MAMP and go to localhost:8888/main.php
### Apache doc root should be set to ~/redirector/redirect-files/maps/
$dir = "/Users/hack/redirect-files/maps/";
$file = $dir .$teamname. ".textmap";
$redirect = $name ."\t". $proto.$url .PHP_EOL;

#file_put_contents($file, $redirect, FILE_APPEND | LOCK_EX);

if (file_exists($file)) {	
	file_put_contents($file, $redirect, FILE_APPEND | LOCK_EX);
	#See if this works to commit to git
	print shell_exec('/Users/hack/redirector/git_scripts/gitpush' .$comment);
} else {
        echo "The $file does not exist";
}

?>

</body>

</html>
