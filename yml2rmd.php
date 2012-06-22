<?php

function echoHelp() {
	echo "Usage: php yml2rmd.php <input .yml file path> [output .Rmd file path]\n";
	exit(1);
}

if (count($argv) < 2 || count($argv) >= 4)
	echoHelp();

try {
	// Checking parameters
	$yml_file_name = $argv[1];
	if (!file_exists($yml_file_name)) {
		throw new Exception($yml_file_name . " is not existed.");
	}
	
	if (count($argv) == 3)
		$rmd_file_name = $argv[2];
	else
		$rmd_file_name = str_replace(".yml", ".Rmd", $yml_file_name);
	if (file_exists($rmd_file_name))
		throw new Exception($rmd_file_name . " is already existed.");
	
	// Loading file content
	$yml_file = yaml_parse_file($yml_file_name);
	if ($yml_file === FALSE) {
		throw new Exception("$yml_file_name is an invalid .yml file");
	}
	
	require_once __DIR__ . '/src/RmdGeneratedNode.php';
	
	$rmd_root = new RmdNode( '', 0, $yml_file);
	file_put_contents($rmd_file_name, $rmd_root->render()); 
	exit(0);
}
catch (Exception $e) {
	echo $e->getMessage() . "\n";
	echoHelp();
}
