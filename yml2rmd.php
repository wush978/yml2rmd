<?php

function echoHelp() {
	echo "Usage: php yml2rmd.php <input .yml file path> <output .Rmd file path>\n";
	exit(1);
}

if (count($argv) != 2)
	echoHelp();



exit(0);
