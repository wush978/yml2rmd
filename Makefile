all : README.md

README.md : README.Rmd
	Rscript -e "require(markdown);require(knitr);knit('README.Rmd', 'README.md')"

README.Rmd : README.yml
	php yml2rmd.php README.yml
