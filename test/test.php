<?php

require_once __DIR__ . '/../src/RmdNode.php';

$config = yaml_parse_file( __DIR__ . '/test.yml' );

$rmd_root = new RmdNode( '', 0, $config);

echo $rmd_root->render();