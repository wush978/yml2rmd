#! /bin/bash
mkdir build
cd build && php ../yml2rmd.php ../test/test.yml test.Rmd && cd ..
	
