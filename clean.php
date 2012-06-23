<?php

$readme = file_get_contents("README.md");
$pattern = "/^## \\$\\$/m";
$replacement = "";
$output = preg_replace($pattern, $replacement, $readme);
file_put_contents("README.md", $output);
