# Introduction

convert .yml to .Rmd

# Example


## test/test.yml 

	Simulation:
	  $latex \phi = (-1, 1)^T$:
	    Parameters:
	      _content: |
	        ```{r params-misq1, echo=FALSE}
	        source("pre.R")
	        show.source("misq1.params.R")
	        ```
	    Experiments:
	      _attribute:
	        _generator:
	          0: distance
	        distance:
	          0: 0
	          1: 1
	          10: 10
	          100: 100
	      Normality Src:
	        _attribute:
	          _class_name: RmdRsrcNode
	          _src_name: misq1-%distance%.R
	          _template: |
	            library(MISQPlus, quietly=TRUE)
	            source("misq1.params.R")
	            misq1 <- new("MISQ", phi)
	            sim.unit <- function(i) {
	              S <- cbind(rnorm(data.length), rnorm(data.length) + %distance%)
	              dist(S, misq1)
	            }
	            sim.data <- sapply(1:sim.size, sim.unit)
	      Normality Test:
	        _attribute:
	          _class_name: RmdGeneratedNode
	          _template: |
	            ##### D = %distance%
	            
	            - $latex S_1(t)$ is $latex N(0,1)$ distributed.
	            - $latex S_2(t)$ is $latex N(%distance%,1)$ distributed.
	            ```{r qqnorm-misq1-%distance%, echo=FALSE}
	            source("pre.R")
	            cache.source("misq1-%distance%.R")
	            test.normality(sim.data)
	            ```

## shell

	mkdir build
	cd build && php ../yml2rmd.php ../test/test.yml test.Rmd && cd ..

## result

### build/test.Rmd:

	# Simulation
	
	## $latex \phi = (-1, 1)^T$
	
	### Parameters
	
	```{r params-misq1, echo=FALSE}
	source("pre.R")
	show.source("misq1.params.R")
	```
	
	### Experiments
	
	#### Normality Test
	
	##### D = %distance
	
	- $latex S_1(t)$ is $latex N(0,1)$ distributed.
	- $latex S_2(t)$ is $latex N(0,1)$ distributed.
	```{r qqnorm-misq1-0, echo=FALSE}
	source("pre.R")
	test.normality(sim.data)
	```
	##### D = %distance
	
	- $latex S_1(t)$ is $latex N(0,1)$ distributed.
	- $latex S_2(t)$ is $latex N(1,1)$ distributed.
	```{r qqnorm-misq1-1, echo=FALSE}
	source("pre.R")
	test.normality(sim.data)
	```
	##### D = %distance
	
	- $latex S_1(t)$ is $latex N(0,1)$ distributed.
	- $latex S_2(t)$ is $latex N(10,1)$ distributed.
	```{r qqnorm-misq1-10, echo=FALSE}
	source("pre.R")
	test.normality(sim.data)
	```
	##### D = %distance
	
	- $latex S_1(t)$ is $latex N(0,1)$ distributed.
	- $latex S_2(t)$ is $latex N(100,1)$ distributed.
	```{r qqnorm-misq1-100, echo=FALSE}
	source("pre.R")
	test.normality(sim.data)
	```

### build/misq1-0.R

	library(MISQPlus, quietly=TRUE)
	source("misq1.params.R")
	misq1 <- new("MISQ", phi)
	sim.unit <- function(i) {
	  S <- cbind(rnorm(data.length), rnorm(data.length) + 0)
	  dist(S, misq1)
	}
	sim.data <- sapply(1:sim.size, sim.unit)
