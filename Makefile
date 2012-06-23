all : README.md

README.md : README.Rmd
	Rscript -e "require(markdown);require(knitr);knit('README.Rmd', 'README.md')"
	php clean.php

README.Rmd : README.yml
	php yml2rmd.php README.yml

clean :
	-rm README.md
	-rm README.Rmd
