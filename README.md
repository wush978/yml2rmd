 

# Introduction


convert .yml to .Rmd

# Example

## yml



```
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
          1: test
        distance:
          distance0: 1
          distance1: 10
          distance2: 100
          distance3: 1000
        test:
          test0: 1
          test1: 10
          test2: 100
      Normality Src:
        _attribute:
          _class_name: RmdRsrcNode
          _src_name: misq1-%@distance%-%@test%.R
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
            cache.source("misq1-%@distance%-%@test%.R")
            test.normality(sim.data)
            ```
      
```




## shell


mkdir build
cd build && php ../yml2rmd.php ../test/test.yml test.Rmd && cd ..

## Rmd



```
##  
## 
## # Simulation
## 
## ## $latex \phi = (-1, 1)^T$
## 
## ### Parameters
## 
## ```{r params-misq1, echo=FALSE}
## source("pre.R")
## show.source("misq1.params.R")
## ```
## 
## ### Experiments
## 
## #### Normality Test
## 
## ##### D = 1
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1,1)$ distributed.
## ```{r qqnorm-misq1-1, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance0-test0.R")
## test.normality(sim.data)
## ```
## ##### D = 1
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1,1)$ distributed.
## ```{r qqnorm-misq1-1, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance0-test1.R")
## test.normality(sim.data)
## ```
## ##### D = 1
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1,1)$ distributed.
## ```{r qqnorm-misq1-1, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance0-test2.R")
## test.normality(sim.data)
## ```
## ##### D = 10
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(10,1)$ distributed.
## ```{r qqnorm-misq1-10, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance1-test0.R")
## test.normality(sim.data)
## ```
## ##### D = 10
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(10,1)$ distributed.
## ```{r qqnorm-misq1-10, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance1-test1.R")
## test.normality(sim.data)
## ```
## ##### D = 10
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(10,1)$ distributed.
## ```{r qqnorm-misq1-10, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance1-test2.R")
## test.normality(sim.data)
## ```
## ##### D = 100
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(100,1)$ distributed.
## ```{r qqnorm-misq1-100, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance2-test0.R")
## test.normality(sim.data)
## ```
## ##### D = 100
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(100,1)$ distributed.
## ```{r qqnorm-misq1-100, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance2-test1.R")
## test.normality(sim.data)
## ```
## ##### D = 100
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(100,1)$ distributed.
## ```{r qqnorm-misq1-100, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance2-test2.R")
## test.normality(sim.data)
## ```
## ##### D = 1000
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1000,1)$ distributed.
## ```{r qqnorm-misq1-1000, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance3-test0.R")
## test.normality(sim.data)
## ```
## ##### D = 1000
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1000,1)$ distributed.
## ```{r qqnorm-misq1-1000, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance3-test1.R")
## test.normality(sim.data)
## ```
## ##### D = 1000
## 
## - $latex S_1(t)$ is $latex N(0,1)$ distributed.
## - $latex S_2(t)$ is $latex N(1000,1)$ distributed.
## ```{r qqnorm-misq1-1000, echo=FALSE}
## source("pre.R")
## cache.source("misq1-distance3-test2.R")
## test.normality(sim.data)
## ```
## 
```




## R src



```
## 
## 
## 
## misq1-distance0-test0.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance0-test1.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance0-test2.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance1-test0.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 10)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance1-test1.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 10)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance1-test2.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 10)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance2-test0.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 100)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance2-test1.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 100)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance2-test2.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 100)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance3-test0.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1000)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance3-test1.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1000)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
## 
## 
## 
## misq1-distance3-test2.R
## library(MISQPlus, quietly=TRUE)
## source("misq1.params.R")
## misq1 <- new("MISQ", phi)
## sim.unit <- function(i) {
##   S <- cbind(rnorm(data.length), rnorm(data.length) + 1000)
##   dist(S, misq1)
## }
## sim.data <- sapply(1:sim.size, sim.unit)
```




